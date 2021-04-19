<?php

namespace App\Http\Controllers\Api;

use InvalidArgumentException;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Http\Requests\SaveProductRequest;

class SaveProduct extends Controller
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

    public function __invoke(SaveProductRequest $request)
    {
        if(!$this->repository->store($request->getProduct())) {
            throw new InvalidArgumentException('Can not store product.');
        }
    }
}
