<?php

namespace Axitdev\LaravelFastComments\Tests\Models;

use Axitdev\LaravelFastComments\Traits\HasComments;
use Illuminate\Database\Eloquent\Model;

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