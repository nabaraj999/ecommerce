<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function available_address(): BelongsTo
    {
        return $this->belongsTo(AvailableAddress::class);
    }

    public function order_descriptions(): HasMany
    {
        return $this->hasMany(OrderDescription::class);
    }
}
