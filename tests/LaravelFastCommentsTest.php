<?php

namespace Axitdev\LaravelFastComments\Tests;

use Axitdev\LaravelFastComments\Tests\Models\Post;
use Illuminate\Foundation\Auth\User;

class LaravelFastCommentsTest extends TestCase
{
    /** @test */
    public function models_can_store_comments()
    {
        $user = User::first();

        auth()->login($user);

        $post = Post::create([
            'title' => 'Post title'
        ]);
        $post->comment('here is the first comment');
        $post->comment('here is the second comment');
        $this->assertCount(2, $post->comments);
        $this->assertSame('here is the first comment', $post->comments[0]->comment);
        $this->assertSame('here is the second comment', $post->comments[1]->comment);
    }

    /** @test */
    public function comments_can_be_posted_by_authenticated_users()
    {
        $user = User::first();

        auth()->login($user);

        $post = Post::create([
            'title' => 'Post title'
        ]);
        $comment = $post->comment('here is a comment');
        $this->assertSame($user->toArray(), $comment->commentator->toArray());
    }

    /** @test */
    public function comments_can_be_posted_by_different_users()
    {
        $user = User::first();

        $post = Post::create([
            'title' => 'Post title'
        ]);
        $comment = $post->comment('here is a comment', $user);
        $this->assertSame($user->toArray(), $comment->commentator->toArray());
    }
}
