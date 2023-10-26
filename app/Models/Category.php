<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'classification_id'];

    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('category') . '%');
        }
    }

    public function doors(): BelongsToMany
    {
        return $this->belongsToMany(Door::class)->withTimestamps();
    }

    public function classification(): BelongsTo
    {
        return $this->belongsTo(Classification::class);
    }
}
