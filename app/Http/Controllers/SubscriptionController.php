<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SubscriptionService;
use App\Validations\StoreSubscriptionRequest;

class SubscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Create new subscription
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = StoreSubscriptionRequest::validate($request->all());

        if ($validation->fails()) return $this->errorResponse($validation->errors()->first());

        $subscription = $this->subscriptionService->store($request->all());

        return $this->successResponse($subscription);
    }
}
