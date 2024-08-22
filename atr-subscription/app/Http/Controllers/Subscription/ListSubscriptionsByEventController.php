<?php

namespace App\Http\Controllers\Subscription;

use App\Exceptions\EventNotFoundException;
use App\Http\Controllers\Controller;
use App\Services\Subscriptions\Contracts\SubscriptionServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ListSubscriptionsByEventController extends Controller
{
    public function __invoke(string $eventIds, SubscriptionServiceContract $service): JsonResponse
    {
        try {
            $eventIds = explode(',', $eventIds);
            return new JsonResponse(json_decode($service->getSubscriptionsByEventIds($eventIds)->toJson()), Response::HTTP_OK, [], true);
        } catch (EventNotFoundException $exception) {
            return new JsonResponse($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, [], true);
        } catch (Exception $exception) {
            return new JsonResponse($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, [], true);
        }
    }
}
