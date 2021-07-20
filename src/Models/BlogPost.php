<?php

namespace Rapidez\MageplazaBlog\Models;

use Illuminate\Database\Eloquent\Builder;
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
    }
}
