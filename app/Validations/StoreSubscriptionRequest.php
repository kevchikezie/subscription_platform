<?php

namespace App\Validations;

use App\Models\Subscription;
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
		$subscription = new Subscription;

		return Validator::make($data, [
            'email' => [
            	'required', 
            	'email',
            	function ($attribute, $value, $fail) use ($subscription, $data) {
                    $exists = $subscription->where('email', $value)->where('website_id', $data['website_id'])->first();
                    
                    if ($exists) {
                        $fail("Email already subscribed to this website");
                    }
                }
            ],
            'name' => ['required', 'string'],
            'website_id' => ['required', 'integer'],
        ]);
	}
}