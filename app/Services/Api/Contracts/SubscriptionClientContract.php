<?php

namespace App\Services\Api\Contracts;

interface SubscriptionClientContract
{
    /**
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function request(string $method, string $uri, array $options = []);
}
