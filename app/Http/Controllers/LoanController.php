<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(){ 
        return view('loans.loan-insert');
    }
    public function store(array $request)
    {
        return store::create([
            'name' => $request['name'],
            'amount' => $request['phone_number'],
            'interest_rate' => $request['interest_rate'],
            'frequency' => $request['frequency'],
            'start_date' => $request['start_date'],
            'handover_date' => $request['handover_date'],
            'granter_name' => $request['granter_name'],
            'password' => Hash::make($request['password']),
        ]);
    }
}
