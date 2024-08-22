<?php

namespace App\Services\Api;

use App\Services\Api\Contracts\EventClientContract;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Response;

class EventClient implements EventClientContract
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws Exception
     */
    public function request(
        string $method,
        string $uri,
        array $options = []
    ) {
        try {
            return $this->client->request($method, $uri, $options);
        } catch (ClientException $exception) {
            return $exception->getResponse();
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
