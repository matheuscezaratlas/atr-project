<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Services\Subscriptions\Contracts\SubscriptionServiceContract;
use App\Exceptions\EventNotFoundException;
use App\Exceptions\EventSoldOutException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StoreSubscriptionController extends Controller
{
    public function __invoke(StoreSubscriptionRequest $request, SubscriptionServiceContract $service): JsonResponse
    {
        $requestData = $request->validated();

        try {
            $service->storeSubscription($requestData);
            return new JsonResponse([], Response::HTTP_CREATED, [], true);
        } catch (EventNotFoundException $exception) {
            return new JsonResponse($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, [], true);
        } catch (EventSoldOutException $exception) {
            return new JsonResponse($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, [], true);
        } catch (Exception $exception) {
            return new JsonResponse($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR, [], true);
        }
    }
}
