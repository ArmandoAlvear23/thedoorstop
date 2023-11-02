<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Door extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'description', 'img_location'];

    public function scopeFilter($query, array $filters) {
        
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('sku', 'like', '%' . request('search') . '%')
            ->orWhereHas('categories',  
            function(Builder $query) {
                $query->where('name', 'like', '%'.request('search').'%');
            });
        }

        if($filters['category'] ?? false) {
            if(is_array(request('category')))
            {
                $query->whereHas('categories',  
                function(Builder $query) {
                    $query->distinct()->whereIn('categories.id', request('category'));
                }, count(request('category')));
            }
        }
        
        if($filters['promotion'] ?? false) {
            if(is_array(request('promotion')))
            {
                $query->whereHas('promotions',  
                function(Builder $query) {
                    $query->distinct()->whereIn('promotions.id', request('promotion'));
                }, count(request('promotion')));
            }
        }
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function promotions(): BelongsToMany {
        return $this->belongsToMany(Promotion::class)->withTimestamps();
    }
}
