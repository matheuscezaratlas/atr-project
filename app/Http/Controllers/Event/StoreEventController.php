<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Services\Events\Contracts\EventServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class StoreEventController extends Controller
{
    public function __invoke(StoreEventRequest $request, EventServiceContract $service): JsonResponse
    {
        $requestData = $request->validated();

        try {
            $service->storeEvent($requestData);

            return new JsonResponse([], Response::HTTP_CREATED, [], true);
        } catch (Exception $exception) {
            return new JsonResponse($exception, Response::HTTP_INTERNAL_SERVER_ERROR, [], true);
        }
    }
}
