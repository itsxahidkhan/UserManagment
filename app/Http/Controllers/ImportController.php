<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class ImportController extends Controller
{
    public function showImportForm()
    {
        return view('import');
    }


    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls', // Include xlsx and xls if needed
        ]);

        $file = $request->file('file');
        if ($file) {
            Excel::import(new UsersImport, $request->file('file'));
            return redirect()->back()->with('success', 'Import successful.');
        } else {
            return redirect()->back()->withErrors('No file uploaded');
        }
    }

    public function downloadSample()
    {
         $headers = [
            'name',
            'email',
            'password',
            'status',
            'user_type',
        ];

        // Create a temporary file
        $fileName = 'sample-users-' . now()->format('Ymd_His') . '.csv';
        $handle = fopen('php://output', 'w');

        // Set the headers for the response
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');

        // Write the headers to the CSV file
        fputcsv($handle, $headers);

        fputcsv($handle, ['Zahid Khan', 'zahid@example.com', '12345678', 'Active', 'Employee']);
        fputcsv($handle, ['Admin User', 'admin@example.com', 'adminpassword', 'Active', 'Admin']);

        // Close the file handle
        fclose($handle);
        exit; // Make sure to exit to prevent further output
    }
}






