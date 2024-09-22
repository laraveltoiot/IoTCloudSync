<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CloudVariable extends Model
{
    protected $fillable = ['name', 'type', 'value', 'thing_id'];

    public function thing(): BelongsTo
    {
        return $this->belongsTo(Thing::class);
    }
}
