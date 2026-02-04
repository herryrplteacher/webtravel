<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'title',
        'slug',
        'from_location_id',
        'to_location_id',
        'price_from',
        'duration',
        'short_desc',
        'cover_image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'price_from' => 'integer',
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function fromLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'from_location_id');
    }

    public function toLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'to_location_id');
    }

    // Alias untuk snake_case (compatibility dengan blade templates)
    public function from_location(): BelongsTo
    {
        return $this->fromLocation();
    }

    public function to_location(): BelongsTo
    {
        return $this->toLocation();
    }

    // Relasi ke facilities
    public function facilities()
    {
        return $this->hasMany(Route_facilitie::class, 'route_id');
    }

    // Relasi ke schedules
    public function schedules()
    {
        return $this->hasMany(Route_Schedule::class, 'route_id');
    }

    public static function generateSlug(string $title): string
    {
        $slug = Str::slug($title);
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }
}
