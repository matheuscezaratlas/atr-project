<?php

namespace App\Models;

use App\Services\Api\Contracts\EventApiServiceContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'event_id',
        'email',
    ];

    protected $appends = [
        'event',
    ];

    public function getEventAttribute()
    {
        try {
            $eventApiService = app()->make(EventApiServiceContract::class);
            $response = $eventApiService->getEvent($this->event_id);
            $statusCode = $response->getStatusCode();
            $reponseData = json_decode($response->getBody(), true);
            if ($statusCode == Response::HTTP_OK) {
                return $reponseData['name'];
            }
            return 'evento não encontrado';
        } catch (Exception $e) {
            return 'evento não encontrado';
        }
    }
}