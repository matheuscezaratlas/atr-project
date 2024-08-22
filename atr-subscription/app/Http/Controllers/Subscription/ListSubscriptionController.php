<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Services\Subscriptions\Contracts\SubscriptionServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ListSubscriptionController extends Controller
{
    public function __invoke(SubscriptionServiceContract $service): JsonResponse
    {
        try {
            return new JsonResponse(json_decode($service->getSubscriptions()->toJson()), Response::HTTP_OK, [], true);
        } catch (Exception $exception) {
            return new JsonResponse($exception, Response::HTTP_INTERNAL_SERVER_ERROR, [], true);
        }
    }
}
