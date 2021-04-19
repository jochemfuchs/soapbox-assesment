<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

interface Repository
{
    /**
     * @return JsonResource
     */
    public function all(): JsonResource;

    /**
     * @return bool
     */
    public function store(array $input): bool;
}