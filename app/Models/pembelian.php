<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pembelian extends Model
{
    protected $fillable = ['user_id', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
