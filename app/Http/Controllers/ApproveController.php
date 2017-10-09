<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users=User::where('isApproved',0)->get();
        return view('admin.approve',compact('users'));
    }

    public function update($id){

        $user=User::findOrFail($id);
        $user->update([
           'isApproved'=>1,
        ]);
        return redirect('/approve');
    }

    public function delete(Request $request,$id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect('/approve');
    }
}
