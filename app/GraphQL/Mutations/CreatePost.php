<?php

namespace App\GraphQL\Mutations;

class CreatePost
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $data = [
            'title' => $args["title"],
            'content' => $args["content"]
        ];
        $post = auth()->user()->posts()->create($data);
        return $post;
    }
}
