<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
// use App\Exports\TransactionsExport;
use App\Imports\VotersImport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    public function index()
    {
        $voters = Voter::simplePaginate(30);

        return view('voters', compact('voters'));
    }

    // public function export()
    // {
    //     return Excel::download(new TransactionsExport, 'transactions.csv');
    // }
    
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required',
        ]);

        Excel::import(new VotersImport, request()->file('import_file'));

        return back()->withStatus('Import done!');
    }
}
