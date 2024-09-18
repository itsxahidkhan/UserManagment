<?php
namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class ExportController extends Controller
{
    public function export()
    {
        $filename = 'users_' . now()->format('Ymd_His') . '.xlsx';

        return Excel::download(new UsersExport, $filename);
    }
}