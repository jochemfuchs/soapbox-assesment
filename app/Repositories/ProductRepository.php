<?php

namespace App\Repositories;

use Exception;
use App\Models\Product;
use App\Contracts\Repository;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductRepository implements Repository
{
    /**
     * @inheritDoc
     */
    public function all(): JsonResource
    {
        return new ProductResource(Product::orderBy('created_at', 'DESC')->get());
    }

    /**
     * @inheritDoc
     */
    public function store(array $input): bool
    {
        try {
            Product::create($input);
        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}