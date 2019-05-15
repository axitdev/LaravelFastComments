<?php

namespace Axitdev\LaravelFastComments\Tests\Models;

use Illuminate\Database\Eloquent\Model;
use Axitdev\LaravelFastComments\Traits\HasComments;

class Post extends Model
{
    use HasComments;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['title'];
}
