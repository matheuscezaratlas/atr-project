<?php

namespace App\Services\Api\Contracts;

interface EventClientContract
{
    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request(string $method, string $uri, array $options = []);
}
