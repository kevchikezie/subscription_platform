<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
	/**
	 * Create a new post in the database
	 * 
	 * @param  array  $data
	 * @return App\Models\Post 
	 */
	public function createPost(array $data)
	{
		return Post::create([
			'title' => $data['title'], 
	        'description' => $data['description'],
	        'website_id' => $data['website_id'],
		]);
	}
}