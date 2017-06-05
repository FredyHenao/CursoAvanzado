<?php

namespace Foro;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tb_posts';
    protected $fillable = [
        'title', 'content',
    ];
}
