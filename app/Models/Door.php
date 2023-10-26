<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Door extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'img_location'];

    public function scopeFilter($query, array $filters) {
        if($filters['category'] ?? false) {
            $query->where('');
        }
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
