<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{
    public function index($id = null){ 
        $loans = Loan::with('user:id,name')->get(); 
 
        $data = [
            'loans' => $loans,
            'loan_id' => $id
        ];
        return view('deposits.deposit-insert', $data);
    }

    public function store(Request $request)
    {
        $deposit = Deposit::create([
            'loan_id' => $request['loan_id'],
            'instalment_date' => $request['instalment_date'],
            'instalment_rate' => $request['instalment_rate'],
        ]);
        
        return redirect('deposits')->with('user_name', Loan::find($request['loan_id'])->name);
    }

    public function deposits(){
        // $deposits = Deposit::with('loan', 'user')->get();
        $deposits = DB::table('deposits')
        ->select('users.name', 'deposits.*')
        ->join('loans', 'deposits.loan_id', '=', 'loans.id')
        ->join('users', 'loans.user_id', '=', 'users.id')
        ->get();
        
        return view('deposits.deposits', ['deposits'=>$deposits]);
    }

    public function delete($id){
        $data = Deposit::find($id);
        $data->delete();
        return redirect('deposits');
    }

    public function showName($id){ 
        $deposit = Deposit::find($id);
        $loan = Loan::with('user:id,name')->where('id', '=', $deposit->loan_id)->first();
        // dd($loan);
        $data = [
            'deposit' => $deposit,
            'loan' => $loan
        ];
        return view('deposits.deposit-update', $data);
    }

    public function update(Request $request)
    {
        $deposit = Deposit::find($request->id);
        $deposit->instalment_date = $request->instalment_date;
        $deposit->instalment_rate = $request->instalment_rate;
        $deposit->save();
        return redirect('deposits')->with('user_name', Loan::find($request['loan_id'])->name);
    }

   
}
