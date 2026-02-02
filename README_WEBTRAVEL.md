# 🚗 WebTravel - Modern Travel Booking System

Sistem booking travel door-to-door dengan UI modern dan dashboard admin lengkap.

## 🎯 Fitur Utama

### Frontend (Public)
- ✅ Homepage dengan 8 sections dinamis
- ✅ Search & filter rute perjalanan
- ✅ Detail page untuk setiap rute
- ✅ Dark mode toggle
- ✅ Responsive design (mobile/tablet/desktop)
- ✅ WhatsApp integration untuk booking
- ✅ SEO friendly

### Backend (Admin)
- ✅ Dashboard dengan statistics
- ✅ CRUD untuk Routes, Services, Locations
- ✅ Schedule & Facilities management
- ✅ User management dengan roles (owner/admin/editor)
- ✅ Settings management
- ✅ Posts & Pages CMS

## 🚀 Quick Start

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Setup Environment
```bash
copy .env.example .env
php artisan key:generate
```

### 3. Configure Database
Edit `.env`:
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=webtravel
DB_USERNAME=postgres
DB_PASSWORD=your_password
```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Seed Data (Optional)
```bash
php artisan db:seed
```

### 6. Run Development Server
```bash
php artisan serve
```

Akses: `http://localhost:8000`

## 📂 Struktur Folder Penting

```
app/
├── Http/Controllers/
│   ├── FrontendController.php    # Frontend routes
│   ├── DashboardController.php   # Admin dashboard
│   └── [Other Controllers]       # CRUD controllers
│
resources/views/
├── frontend/                      # Public pages files
│   ├── layout.blade.php
│   ├── index.blade.php
│   ├── detail.blade.php
│   ├── partials/
│   └── sections/
│
├── admin/                         # Admin panel
│   └── [Admin views]
│
routes/
└── web.php                        # All routes
```

## 🔐 Keamanan

**PENTING!** Baca dan implementasi fixes dari:
- `LAPORAN_KEAMANAN_ADMIN.md` - Audit keamanan lengkap
- `QUICK_FIX_KEAMANAN.md` - Panduan perbaikan step-by-step

### Priority Fixes:
1. Set `APP_DEBUG=false` di production
2. Implement rate limiting
3. Fix authorization di Form Requests
4. Enable activity logging

## 📖 Dokumentasi Lengkap

- **FRONTEND_DOKUMENTASI.md** - Panduan lengkap frontend
- **LAPORAN_KEAMANAN_ADMIN.md** - Audit keamanan
- **QUICK_FIX_KEAMANAN.md** - Security fixes

## 🎨 Customization

### Mengubah Data (Via Admin Panel)

1. Login ke `/admin/dashboard`
2. Kelola:
   - **Routes** - Tambah/edit rute perjalanan
   - **Services** - Jenis layanan yang ditawarkan
   - **Locations** - Kota/tempat tujuan
   - **Settings** - Konfigurasi website (nama, kontak, dll)

### Mengubah Warna/Theme

Edit `resources/views/frontend/layout.blade.php`:
```javascript
tailwind.config = {
    // Customize colors here
}
```

## 🔗 URL Routes

### Public
- `/` - Homepage
- `/route/{id}` - Detail rute

### Admin (requires login & role)
- `/admin/dashboard` - Dashboard
- `/admin/user` - User management
- `/admin/route` - Routes management
- `/admin/service` - Services management
- dll (lihat routes/web.php)

## 🛠️ Development Commands

### Clear All Cache
```bash
php artisan optimize:clear
```

### Cache untuk Production
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Run Tests (jika ada)
```bash
php artisan test
```

## 📱 WhatsApp Integration

WhatsApp number dikonfigurasi di admin panel:
1. Masuk ke Settings
2. Set key: `whatsapp_number`
3. Format: `62xxxxxxxxxx` (tanpa +)

## 🐛 Common Issues & Solutions

### Routes tidak muncul
- Pastikan `is_active = true` di database
- Clear cache: `php artisan cache:clear`

### Images tidak loading
- Run: `php artisan storage:link`
- Check file permissions

### Error 500
- Check `storage/logs/laravel.log`
- Pastikan `.env` configured correctly
- Set `APP_DEBUG=true` untuk debugging (local only!)

## 📊 Database Schema

### Main Tables:
- `users` - User accounts
- `routes` - Travel routes
- `locations` - Cities/destinations
- `services` - Service types
- `route_schedules` - Departure times
- `route_facilities` - Route amenities
- `settings` - Site configuration
- `pages` - CMS pages
- `posts` - Blog/testimonials

## 🎯 Next Steps

1. ✅ Isi data produksi di admin panel
2. ✅ Upload gambar berkualitas untuk routes
3. ✅ Test di berbagai browser & device
4. ✅ Implement security fixes
5. ✅ Deploy ke production server
6. ✅ Setup SSL certificate (HTTPS)
7. ✅ Setup backup automation
8. ✅ Monitor & maintain

## 👤 Default Admin Account

**IMPORTANT:** Change this after first login!

```
Email: admin@example.com
Password: [Set during seeding]
```

## 📞 Support & Credits

- **Template UI**: https://github.com/herryrplteacher/uitravel
- **Framework**: Laravel 11
- **CSS**: Tailwind CSS
- **Icons**: Emoji (native)

## 📄 License

Proprietary - All rights reserved

---

**Built with ❤️ using Laravel & Tailwind CSS**
