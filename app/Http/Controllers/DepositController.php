<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use App\Models\Loan;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index($id = null){ 
        $loans = Loan::with('user:id,name')->get(); //fetch data from db users table
 
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
        
        return redirect('deposits');
    }

    public function deposits(){
        $deposits = Deposit::with('loan:id')->get();
        return view('deposits.deposits', ['deposits'=>$deposits]);
    }

    public function delete($id){
        $data = Loan::find($id);
        $data->delete();
        return redirect('loans');
    }

    public function showName($id){ 
        $loan = Loan::find($id);
        $users = User::all(['id', 'name']);
        $data = [
            'users' => $users,
            'loan' => $loan
        ];
        return view('loans.loan-update', $data);
    }

    // public function showData($id){
    //     $data = Loan::with('user:id,name')->where('id', $id)->first();
    //     return view('loans.loan-update',['data'=>$data]);
    // }

    public function update(Request $request)
    {
        $loan = Loan::find($request->id);

        // echo '<pre>';
        // print_r($loan);
        // die();
        
        $loan->user_id = $request->user_id;
        $loan->amount = $request->amount;
        $loan->interest_rate = $request->interest_rate;
        $loan->frequency = $request->frequency;
        $loan->start_date = $request->start_date;
        $loan->handover_date = $request->handover_date;
        $loan->granter_name = $request->granter_name;
        $loan->save();
        return redirect('loans')->with('user_name', User::find($request['user_id'])->name);
    }

   
}
