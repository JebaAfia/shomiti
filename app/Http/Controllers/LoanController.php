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
            'user_id' => $request['user_id'],
            'amount' => $request['amount'],
            'interest_rate' => $request['interest_rate'],
            'frequency' => $request['frequency'],
            'start_date' => $request['start_date'],
            'handover_date' => $request['handover_date'],
            'granter_name' => $request['granter_name'],
        ]);
        
        return redirect('loans')->with('user_name', User::find($request['user_id'])->name);
    }

    public function loans(){
        $loans = Loan::with('user:id,name')->get();
        return view('loans.loans', ['loans'=>$loans]);
    }

    public function delete($id){
        $data = Loan::find($id);
        $data->delete();
        return redirect('loans');
    }
}
