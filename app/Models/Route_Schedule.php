<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Route_Schedule extends Model
{
    use HasFactory;

    protected $table = 'route_schedules';

    protected $fillable = [
        'route_id',
        'schedule_type',
        'day_of_week',
        'specific_date',
        'depart_time',
        'note',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'day_of_week' => 'integer',
            'specific_date' => 'date',
        ];
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    public function getScheduleTypeLabel(): string
    {
        return match ($this->schedule_type) {
            'daily' => 'Setiap Hari',
            'weekday' => 'Hari Kerja (Senin-Jumat)',
            'weekend' => 'Akhir Pekan (Sabtu-Minggu)',
            'dow' => 'Hari Tertentu',
            'date' => 'Tanggal Spesifik',
            default => $this->schedule_type,
        };
    }

    public function getDayOfWeekLabel(): ?string
    {
        if ($this->day_of_week === null) {
            return null;
        }

        return match ($this->day_of_week) {
            0 => 'Minggu',
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            default => null,
        };
    }
}
