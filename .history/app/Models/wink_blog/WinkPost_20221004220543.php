<?php

namespace App\Models\wink_blog;

use Wink\WinkPost AS AbstractWinkPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WinkPost extends AbstractWinkPost
{
    use HasFactory;


    protected $connection = 'slice360_blog';

    /**
     * The post comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(WinkComment::class, 'post_id');
    }


    /**
     * CUSTOM SCOPE FOR THIS MODEL
     */

    /**
     * Scope a query to only include posts that have a specific title or excerpt (by search_filter).
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search_filter
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByTitleOrExcerpt($query, $search_filter)
    {
        //process only if search_filter is not empty
        if ($search_filter ?? false) {
            return $query->where('title', 'like', '%'.$search_filter.'%') //select where title matches filters
                ->orWhere('excerpt', 'like', '%'.$search_filter.'%'); //select where excerpt matches filters
        }
    }

    /**
     * Scope a query to only include posts that have a specific title or excerpt (by search_filter).
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search_filter
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByBlogTags($query, $search_filter)
    {
        //process only if search_filter is not empty
        if ($search_filter ?? false) {
            return $query->whereHas('tags', function ($query) use ($search_filter) {
                $query->where('slug', $search_filter);
            });
        }
    }

}
