<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social extends Model
{
    /**
     * Get the user that owns the Social
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
