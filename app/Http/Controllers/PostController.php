<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PostPublished;
use App\Services\PostService;
use App\Validations\StorePostRequest;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Create new post
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = StorePostRequest::validate($request->all());

        if ($validation->fails()) return $this->errorResponse($validation->errors()->first());

        $post = $this->postService->createPost($request->all());

        event(new PostPublished($post));

        return $this->successResponse($post);
    }

}
