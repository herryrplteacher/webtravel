<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Route_facilitie extends Model
{
    use HasFactory;

    protected $table = 'route_facilities';

    protected $fillable = [
        'route_id',
        'label',
    ];

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }
}
