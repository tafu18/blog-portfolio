<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gift extends Model
{
    protected $fillable = [
        'letter',
        'name',
        'image',
        'partner',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}