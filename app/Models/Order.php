<?php

namespace App\Models;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tracking_id',
        'fullname',
        'email',
        'phone',
        'pincode',
        'address',
        'state_id',
        'lga_id',
        'total',
        'status_message',
        'payment_mode',
        'payment_id',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function lga(): BelongsTo
    {
        return $this->belongsTo(LocalGovernment::class);
    }

    public function item(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
