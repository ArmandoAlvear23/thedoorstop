<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Promotion extends Model
{
    use HasFactory;

    public function doors(): BelongsToMany
    {
        return $this->belongsToMany(Door::class)->withTimestamps();
    }
}
