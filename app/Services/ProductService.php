<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Imports\ProductImport;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProductService
{
    /**
     * Get all products.
     */
    public function show()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();
        $data = ProductResource::collection($products);
        return $data->additional([
            'status' => 'success',
            'message' => 'Product list',
        ]);
    }

    /**
     * Import csv products.
     */
    public function import(Request $request)
    {
        $validated = Validator::make(request()->all(), [
            'select_file' => 'required|file|max:1000',

        ]);
        if ($validated->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error occured',
                'data' => ['errors' => $validated->errors()->toArray()],
            ], 422);

        } else {
            $result = Excel::import(new ProductImport, request()->file('select_file'));
            if ($result) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Service added successfully!!',
                    'data' => [],
                ], 200);
            } else {
                $data = [
                    'status' => '0',
                    'msg' => 'fail',
                ];
                return response()->json($data);
            }
        }

    }

}
