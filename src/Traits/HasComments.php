<?php

namespace Axitdev\LaravelFastComments\Traits;

use Illuminate\Database\Eloquent\Model;
use Axitdev\LaravelFastComments\LaravelFastComments;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComments
{
    /**
     * Return all comments for model.
     *
     * @return MorphMany
     */
    public function comments()
    {
        return $this->morphMany(LaravelFastComments::class, 'commentable');
    }

    /**
     * @param string $comment
     * @param Model|null $user
     * @return false|Model
     */
    public function comment(string $comment, ?Model $user = null)
    {
        $comment = new LaravelFastComments([
            'user_id' => is_null($user) ? auth()->user()->id : $user->id,
            'comment' => $comment,
            'commentable_id' => $this->getKey(),
            'commentable_type' => get_class(),
        ]);

        return $this->comments()->save($comment);
    }
}
