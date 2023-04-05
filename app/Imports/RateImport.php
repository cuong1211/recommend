<?php

namespace App\Imports;


use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User_Product;

class RateImport implements ToArray, WithHeadingRow
{

    public function array($array)
    {
        foreach ($array as $student) {
            $user = User_Product::create([
                'user_id' => $student['user_id'],
                'product_id' => $student['product_id'],
                'rate' => $student['rate'],
            ]);
        }
    }
}
