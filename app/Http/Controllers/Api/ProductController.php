<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    /**
    * @var ProductRepository
    */
    private $repository;

    /**
     * @param ProductRepository $repository
     */
    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return JsonResource
     */
    public function getProducts(): JsonResource
    {
        return $this->repository->all();
    }
}
