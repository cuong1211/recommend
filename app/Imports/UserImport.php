<?php

namespace App\Imports;

use App\Models\Classes;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;
use App\Models\Course;
use App\Models\Class_user;

class UserImport implements ToArray, WithHeadingRow
{

    public function array($array)
    {
        foreach ($array as $student) {
            $user = User::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => bcrypt('123456'),
            ]);
        }
    }
}
