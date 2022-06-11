<?php

namespace App\GraphQL\Mutations;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;

class UpdatePost
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        if (!$post = Post::find($args["id"])) {
            return json_encode(['error' => 'post not found'], 404);
        }
        if (Gate::allows('updatePost', $post->user->id)) {
            $post->update([
                'title' => $args["title"],
                'content' => $args["content"]
            ]);
            return $post;
        } else {
            return json_encode(['error' => 'forbidden'], 403);
        }
    }
}
