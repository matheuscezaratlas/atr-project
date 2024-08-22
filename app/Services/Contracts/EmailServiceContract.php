<?php

namespace App\Services\Contracts;

use App\Models\Event;
use Illuminate\Support\Collection;

interface EmailServiceContract
{
    /**
     * @param  array  $event
     * @return void
     */
    public function dispatchNewEventEmail(int $categoryId): void;
}
