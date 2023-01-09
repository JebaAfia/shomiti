<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(){ 
        $users = User::all(['id', 'name']); //fetch data from db users table
        $data = [
            'users' => $users
        ];
        return view('loans.loan-insert', $data);
    }
    public function store(Request $request)
    {
        $loan = Loan::create([
            'name' => $request['name'],
            'amount' => $request['amount'],
            'interest_rate' => $request['interest_rate'],
            'frequency' => $request['frequency'],
            'start_date' => $request['start_date'],
            'handover_date' => $request['handover_date'],
            'granter_name' => $request['granter_name'],
        ]);

        return redirect('loans')->with( ['name' => $request['name']]);
    }

    public function loans(){
        return view('loans.loans');
    }
}
