<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::get(['name', 'email', 'status', 'user_type']);
    }

    public function headings(): array
    {
        return [
            'User Name',
            'Email',
            'Status',
            'User Type',
        ];
    }
}


