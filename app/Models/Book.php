<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'publisher', 'qty', 'category_id', 'image'];

    /**
     * Get the category that owns the book.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope a query to filter books.
     */
    public function scopeFilter($query, $params)
    {
        $search = $params['search'] ?? null;
        $category = $params['category'] ?? null;

        // check if search is not null
        $query->when($search, function($query) use ($search) {
            $query->where('title', 'like', "%{$search}%");
        });

        // check if category is not null
        $query->when($category, function($query) use ($category) {
            $query->where('category_id', $category);
        });
    }

    /**
     * Get the image url.
     */
    public function getImageUrlAttribute()
    {
        // check if image is not null
        if (!is_null($this->image)) {
            // return image url
            return asset('storage/' . $this->image);
        }

        // return default image url
        return asset('images/no-image.jpg');
    }
}
