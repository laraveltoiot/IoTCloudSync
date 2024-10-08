<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thing extends Model
{
    protected $fillable = ['name', 'description', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function variables(): HasMany
    {
        return $this->hasMany(CloudVariable::class);
    }
}
