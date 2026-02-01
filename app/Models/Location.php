<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'type',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public static function getTypeOptions(): array
    {
        return [
            'city' => 'Kota',
            'airport' => 'Bandara',
            'area' => 'Area',
        ];
    }

    public function getTypeLabel(): string
    {
        return self::getTypeOptions()[$this->type] ?? $this->type;
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
