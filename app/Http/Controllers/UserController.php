<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users(){
        $users = User::select('id', 'name', 'phone_number', 'address', 'email')->where('deleted', '=', '0')->get();
        return view('users.users', ['users'=>$users]);
    }

    public function delete($id){
        $user = User::find($id);
        $user->deleted = Auth::user()->id;
        $user->save();
        // User::where('user_id', $id)->delete();

        return redirect('users');
    }

    public function showName($id){ 
        $user = User::find($id);
        $users = User::all(['id', 'name', 'phone_number', 'address', 'email']);
        $data = [
            'users' => $users,
            'user' => $user
        ];
        return view('users.user-update', $data);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
  
        $user->id = $request->id;
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();
        return redirect('users');
    }

   
}
