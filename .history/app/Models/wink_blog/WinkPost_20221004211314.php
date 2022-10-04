<?php

namespace App\Models\wink_blog;

use Wink\WinkPost AS AbstractWinkPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WinkPost extends AbstractWinkPost
{
    use HasFactory;

    /**
     * The post comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(WinkComment::class, 'post_id');
    }
}
