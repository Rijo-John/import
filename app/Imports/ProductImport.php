<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            // 'name'     => $row['name'],
            // 'email'    => $row['email'], 
            // 'password' => $row['password'],
            'product_name' => $row['0'],
            'price' => $row['1'],
            'sku' => $row['2'],
            'description' => $row['3'],
        ]);
        
    }
}
