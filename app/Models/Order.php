<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_price', 'status', 'is_paid', 'paid_at','session_id'];


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(product::class, 'order_items')
            ->withPivot('quantity', 'unit_price', 'total_price','id');

    }

    public function address()
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_address_id');
    }

    public function scopeStatus(Builder $query, string $type): void
    {
        $query->where('status', $type);
    }

    public function user_order()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order_payment()
    {
        return $this->hasOne(Payments::class, 'order_id');
    }
}
