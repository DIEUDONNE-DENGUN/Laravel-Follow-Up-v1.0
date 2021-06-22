<?php
/*
 * @Author:Dieudonne Takougang
 * @Description: Handle product data persistent layer
 */

namespace App\Http\Repositories;


class ProductRepository
{
    public $productDataStorePath;

    public function __construct()
    {
        $this->productDataStorePath = public_path() . "/data/data.json";
    }


    public function create(array $product): array
    {
        //get all active products in the json data store
        $productArrayList = $this->findAll();
        //add new product to exist product data array
        array_push($productArrayList, $product);
        //persist updated product list to json store
        file_put_contents($this->productDataStorePath, json_encode($productArrayList));
        return $productArrayList;
    }

    //get the json data containing the list of active products added
    public function findAll(): array
    {
        $productList = file_get_contents($this->productDataStorePath);
        //convert json file content to array
        $productArrayList = json_decode($productList);
        //unset the file to prevent memory leak and return array
        return $productArrayList;
    }
}
