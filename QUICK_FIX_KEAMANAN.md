# 🔧 PANDUAN QUICK FIX - KEAMANAN ADMIN

Panduan langkah demi langkah untuk memperbaiki kelemahan keamanan PRIORITAS TINGGI.

---

## 🔴 FIX #1: Matikan Debug Mode (SEGERA!)

### File: `.env`

**SEBELUM:**
```env
APP_DEBUG=true
APP_ENV=local
```

**SESUDAH:**
```env
APP_DEBUG=false
APP_ENV=production
```

⚠️ **PENTING:** Lakukan ini sebelum deploy ke production!

---

## 🔴 FIX #2: Tambahkan Rate Limiting

### File: `routes/web.php`

**SEBELUM (Line 14):**
```php
Route::prefix('admin')->middleware(['auth', 'role'])->group(function () {
```

**SESUDAH:**
```php
Route::prefix('admin')->middleware(['auth', 'role', 'throttle:60,1'])->group(function () {
    // throttle:60,1 = maksimal 60 request per menit per user
```

### Tambahan: Rate Limit untuk Login

Tambahkan di `routes/web.php` setelah line 9:

```php
Auth::routes([
    'verify' => false,
]);

// Tambahkan rate limiting untuk login
Route::middleware('throttle:5,1')->group(function () {
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
});
```

---

## 🔴 FIX #3: Perbaiki Authorization di Form Requests

### File: `app/Http/Requests/StoreUserRequest.php`

**SEBELUM (Line 12-15):**
```php
public function authorize(): bool
{
    return true;
}
```

**SESUDAH:**
```php
public function authorize(): bool
{
    // Hanya owner dan admin yang bisa membuat user baru
    $user = auth()->user();
    
    if (!$user) {
        return false;
    }
    
    return in_array($user->role, ['owner', 'admin']);
}
```

### File: `app/Http/Requests/UpdateUserRequest.php`

**SEBELUM (Line 13-16):**
```php
public function authorize(): bool
{
    return true;
}
```

**SESUDAH:**
```php
public function authorize(): bool
{
    $user = auth()->user();
    $targetUser = $this->route('user');
    
    if (!$user) {
        return false;
    }
    
    // Owner bisa edit semua
    if ($user->role === 'owner') {
        return true;
    }
    
    // Admin bisa edit semua kecuali owner
    if ($user->role === 'admin' && $targetUser->role !== 'owner') {
        return true;
    }
    
    // Editor hanya bisa edit diri sendiri
    if ($user->role === 'editor' && $user->id === $targetUser->id) {
        return true;
    }
    
    return false;
}
```

**Tambahkan di bagian atas file:**
```php
use Illuminate\Support\Facades\Auth;
```

---

## 🟡 FIX #4: Implementasi Activity Logging

### Buat Migration untuk Activity Log

```bash
php artisan make:migration create_activity_logs_table
```

### File: `database/migrations/xxxx_create_activity_logs_table.php`

```php
public function up(): void
{
    Schema::create('activity_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
        $table->string('action'); // create, update, delete, login, logout
        $table->string('model')->nullable(); // User, Post, Page, etc
        $table->unsignedBigInteger('model_id')->nullable();
        $table->text('description')->nullable();
        $table->json('data')->nullable(); // Old and new values
        $table->ipAddress('ip_address')->nullable();
        $table->string('user_agent')->nullable();
        $table->timestamps();
        
        $table->index(['user_id', 'created_at']);
        $table->index(['model', 'model_id']);
    });
}
```

### Buat Model ActivityLog

```bash
php artisan make:model ActivityLog
```

### File: `app/Models/ActivityLog.php`

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'model',
        'model_id',
        'description',
        'data',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

### Buat Helper Function

Buat file `app/Helpers/ActivityLogger.php`:

```php
<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    public static function log(string $action, string $description, ?string $model = null, ?int $modelId = null, ?array $data = null)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'model' => $model,
            'model_id' => $modelId,
            'description' => $description,
            'data' => $data,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
```

### Tambahkan di `composer.json` (section autoload):

```json
"autoload": {
    "files": [
        "app/Helpers/ActivityLogger.php"
    ],
    "psr-4": {
        "App\\": "app/",
        "Database\\Factories\\": "database/factories/",
        "Database\\Seeders\\": "database/seeders/"
    }
}
```

Jalankan:
```bash
composer dump-autoload
```

### Gunakan di Controllers

**Contoh di `UserController.php`:**

```php
use App\Helpers\ActivityLogger;

public function store(StoreUserRequest $request)
{
    $validated = $request->validated();
    $validated['password'] = Hash::make($validated['password']);
    $validated['is_active'] = $request->has('is_active');

    $user = User::create($validated);
    
    // ✅ Log aktivitas
    ActivityLogger::log(
        'create',
        'User baru dibuat: ' . $user->name,
        'User',
        $user->id,
        ['email' => $user->email, 'role' => $user->role]
    );

    return redirect()->route('index.user')
        ->with('success', 'User berhasil ditambahkan.');
}

public function update(UpdateUserRequest $request, User $user)
{
    $oldData = $user->toArray();
    
    $validated = $request->validated();

    if (! empty($validated['password'])) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        unset($validated['password']);
    }

    $validated['is_active'] = $request->has('is_active');

    $user->update($validated);
    
    // ✅ Log aktivitas
    ActivityLogger::log(
        'update',
        'User diupdate: ' . $user->name,
        'User',
        $user->id,
        [
            'old' => ['email' => $oldData['email'], 'role' => $oldData['role']],
            'new' => ['email' => $user->email, 'role' => $user->role]
        ]
    );

    return redirect()->route('index.user')
        ->with('success', 'User berhasil diperbarui.');
}

public function destroy(User $user)
{
    $userData = [
        'id' => $user->id,
        'name' => $user->name,
        'email' => $user->email,
        'role' => $user->role
    ];
    
    $user->delete();
    
    // ✅ Log aktivitas
    ActivityLogger::log(
        'delete',
        'User dihapus: ' . $userData['name'],
        'User',
        $userData['id'],
        $userData
    );

    return redirect()->route('index.user')
        ->with('success', 'User berhasil dihapus.');
}
```

---

## 🟡 FIX #5: Session Security

### File: `.env`

```env
SESSION_LIFETIME=480  # 8 jam
SESSION_ENCRYPT=true  # Encrypt session data
SESSION_DRIVER=database
```

---

## 🟢 FIX #6: Password Policy yang Lebih Kuat

### File: `app/Http/Requests/StoreUserRequest.php`

**Tambahkan di bagian atas:**
```php
use Illuminate\Validation\Rules\Password;
```

**Update rules() method:**
```php
public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'password' => [
            'required',
            'confirmed',
            Password::min(8)
                ->letters()      // Harus ada huruf
                ->mixedCase()    // Huruf besar dan kecil
                ->numbers()      // Harus ada angka
                ->symbols()      // Harus ada simbol
                ->uncompromised() // Cek apakah password pernah bocor di data breach
        ],
        'role' => ['required', 'in:owner,admin,editor'],
        'is_active' => ['nullable', 'boolean'],
    ];
}
```

**Update messages():**
```php
public function messages(): array
{
    return [
        'name.required' => 'Nama wajib diisi.',
        'name.max' => 'Nama maksimal 255 karakter.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
        'password.required' => 'Password wajib diisi.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
        'role.required' => 'Role wajib dipilih.',
        'role.in' => 'Role yang dipilih tidak valid.',
    ];
}
```

### Lakukan hal yang sama untuk `UpdateUserRequest.php`

---

## 🟢 FIX #7: Security Headers

### Buat Middleware Baru

```bash
php artisan make:middleware SecurityHeaders
```

### File: `app/Http/Middleware/SecurityHeaders.php`

```php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');
        
        // Hanya di production, enforce HTTPS
        if (app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        return $response;
    }
}
```

### Register Middleware di `bootstrap/app.php`

```php
->withMiddleware(function (Middleware $middleware): void {
    $middleware->alias([
        'role' => \App\Http\Middleware\CheckRole::class,
        'security.headers' => \App\Http\Middleware\SecurityHeaders::class,
    ]);
    
    // Apply globally
    $middleware->append(\App\Http\Middleware\SecurityHeaders::class);
})
```

---

## 📋 CHECKLIST IMPLEMENTASI

Gunakan checklist ini untuk memastikan semua fix sudah diimplementasikan:

- [ ] Fix #1: APP_DEBUG = false di .env
- [ ] Fix #2: Rate limiting di routes/web.php
- [ ] Fix #3: Authorization di StoreUserRequest.php
- [ ] Fix #3: Authorization di UpdateUserRequest.php
- [ ] Fix #4: Migration activity_logs dibuat
- [ ] Fix #4: Model ActivityLog dibuat
- [ ] Fix #4: Helper ActivityLogger dibuat
- [ ] Fix #4: ActivityLogger digunakan di UserController
- [ ] Fix #4: composer dump-autoload dijalankan
- [ ] Fix #5: SESSION_ENCRYPT = true di .env
- [ ] Fix #5: SESSION_LIFETIME = 480 di .env
- [ ] Fix #6: Password policy di StoreUserRequest
- [ ] Fix #6: Password policy di UpdateUserRequest
- [ ] Fix #7: SecurityHeaders middleware dibuat
- [ ] Fix #7: SecurityHeaders middleware registered
- [ ] Testing semua fitur admin setelah fix
- [ ] Deploy ke staging untuk testing
- [ ] Deploy ke production

---

## 🧪 TESTING SETELAH FIX

### 1. Test Rate Limiting
```bash
# Coba login 10x dengan password salah
# Seharusnya di-block setelah 5x percobaan
```

### 2. Test Authorization
```bash
# Login sebagai Editor
# Coba akses halaman create user
# Seharusnya mendapat error 403
```

### 3. Test Activity Log
```bash
# Buat user baru
# Cek database table activity_logs
# Seharusnya ada record baru
```

### 4. Test Security Headers
```bash
# Buka browser DevTools > Network
# Lihat Response Headers
# Seharusnya ada X-Frame-Options, X-Content-Type-Options, dll
```

---

## ⚠️ CATATAN PENTING

1. **Backup dulu sebelum implement!**
   ```bash
   php artisan backup:run  # Atau backup manual
   ```

2. **Test di local/staging dulu**
   - Jangan langsung ke production
   - Pastikan semua fitur masih berfungsi

3. **Update dependencies**
   ```bash
   composer update
   php artisan migrate
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   ```

4. **Monitor setelah deploy**
   - Cek error logs
   - Cek activity logs
   - Test login/logout
   - Test CRUD operations

---

**Good luck! 🚀**
