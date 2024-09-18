<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (!isset($row['name'], $row['email'], $row['password'], $row['status'], $row['user_type'])) {
            return null;
        }

        return new User([
            'name' => $row['name'], 
            'email' => $row['email'],
            'password' => Hash::make($row['password']), // Hash the password
            'status' => $row['status'],
            'user_type' => $row['user_type'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
