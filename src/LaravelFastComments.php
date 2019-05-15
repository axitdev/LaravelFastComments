<?php

namespace Axitdev\LaravelFastComments;

use Exception;
use Illuminate\Database\Eloquent\Model;

class LaravelFastComments extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @throws Exception
     */
    public function commentator()
    {
        return $this->belongsTo($this->getAuthModelName(), 'user_id');
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     * @throws Exception
     */
    protected function getAuthModelName()
    {
        if (! is_null(config('auth.providers.users.model'))) {
            return config('auth.providers.users.model');
        }
        throw new Exception('Could not determine the commentator model name.');
    }
}
