<?php

/*
 * Author:Dieudonne Takougang
 * Description: Handle operations for managing a product
 * Date: 22/06/2021
 */

namespace App\Http\Services;


use App\Http\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function saveProduct(array $productDTO)
    {
        return $this->productRepository->create($productDTO);
    }

    public function findAllProducts()
    {
        return $this->productRepository->findAll();
    }
}
