<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wa_Leads extends Model
{
    use HasFactory;

    protected $table = 'wa__leads';

    protected $fillable = [
        'route_id',
        'customer_name',
        'phone',
        'source',
        'clicked_at',
    ];

    protected function casts(): array
    {
        return [
            'clicked_at' => 'datetime',
        ];
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function getSourceLabel(): string
    {
        return match ($this->source) {
            'home' => 'Halaman Home',
            'detail' => 'Halaman Detail',
            'promo' => 'Halaman Promo',
            'other' => 'Lainnya',
            default => $this->source,
        };
    }

    public function scopeFromRoute($query, $routeId)
    {
        return $query->where('route_id', $routeId);
    }

    public function scopeFromSource($query, $source)
    {
        return $query->where('source', $source);
    }
}
