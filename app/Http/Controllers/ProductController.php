<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function import(Request $request)
    {
        return $this->productService->import($request);
    }

    public function show()
    {
        return $this->productService->show();
    }
    
}
