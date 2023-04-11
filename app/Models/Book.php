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
     * Scope a query to search books.
     */
    public function scopeSearch($query, $search)
    {
        $query->when($search, function($query) use ($search) {
            $query->where('title', 'like', "%{$search}%");
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
