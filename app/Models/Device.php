<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Device extends Model
{
//    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'type',
        'description',
        'metadata',
        'secret_key',
        'user_id',
        'wifi_ssid',
        'wifi_password',
        'status'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
            $model->secret_key = Str::random(32);
        });
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function thing(): BelongsTo
    {
        return $this->belongsTo(Thing::class);
    }

    public function setWifiPasswordAttribute(string $value): void
    {
        $this->attributes['wifi_password'] = encrypt($value);
    }

    public function getWifiPasswordAttribute(string $value): string
    {
        return decrypt($value);
    }
}
