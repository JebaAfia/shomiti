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
        
        return view('loans.loans', [ 'loans' => $loans ]);
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
