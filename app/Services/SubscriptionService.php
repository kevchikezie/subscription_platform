<?php

namespace App\Services;

use App\Models\Subscription;

class SubscriptionService
{
	/**
	 * Create a new record in the database
	 * 
	 * @param  array  $data
	 * @return App\Models\Subscription 
	 */
	public function store(array $data)
	{
		return Subscription::create([
			'email' => $data['email'], 
	        'name' => $data['name'],
	        'website_id' => $data['website_id'],
		]);
	}
}