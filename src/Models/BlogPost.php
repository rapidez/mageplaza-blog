<?php

namespace Rapidez\MageplazaBlog\Models;

use Carbon\Carbon;
use Rapidez\Core\Models\Model;
use Rapidez\Core\Models\Scopes\IsActiveScope;

class BlogPost extends Model
{
    protected $table = 'mageplaza_blog_post';

    protected $casts = [
        'publish_date' => 'datetime',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new IsActiveScope('enabled'));
        static::addGlobalScope('only_published_posts', function ($builder) {
            $builder->where('publish_date', '<=', Carbon::now());
        });
    }
}
