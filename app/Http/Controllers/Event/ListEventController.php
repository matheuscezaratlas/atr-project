<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Services\Events\Contracts\EventServiceContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ListEventController extends Controller
{
    public function __invoke(EventServiceContract $service): JsonResponse
    {
        try {
            return new JsonResponse(json_decode($service->getEvents()->toJson()), Response::HTTP_OK, [], true);
        } catch (Exception $exception) {
            return new JsonResponse($exception, Response::HTTP_INTERNAL_SERVER_ERROR, [], true);
        }
    }
}
