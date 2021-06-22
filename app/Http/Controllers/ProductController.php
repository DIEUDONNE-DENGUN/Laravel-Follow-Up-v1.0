<?php
/*
 * @Author:Dieudonne Dengun
 * @Description: Manage all product operations
 * @Date: 22/06/2021
 */

namespace App\Http\Controllers;

use App\Http\Requests\CreateProduct;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function showHomePage()
    {
        //get all previously store data in json store
        $products = $this->productService->findAllProducts();
        return view('home')->with(['products' => collect($products)]);
    }

    //save product form request into json store
    public function saveProduct(CreateProduct $request)
    {
        $productDTO = $request->getProductDTO();
        $productDTO["product_date"] = date('Y-m-d H:i:s');

        //save product details in the json store
        $savedProducts = $this->productService->saveProduct($productDTO);
        //build ajax response and send back
        return json_encode(['products' => $savedProducts, 'status' => 'success']);
    }
}
