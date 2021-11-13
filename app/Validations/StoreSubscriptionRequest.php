<?php

namespace App\Validations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreSubscriptionRequest
{
	/**
	 * Validate incoming request
	 * 
	 * @param  array  $data
	 * @return \Illuminate\Validation\Validator
	 */
	public static function validate(array $data)
	{
		return Validator::make($data, [
            'email' => 'required|email|unique:subscriptions',
            'name' => 'required|string',
            'website_id' => 'required|integer'
        ]);
	}
}