<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Http\Request;

class ApproveController extends Controller
{
    public function __construct()
    {
        $this->middleware('librarian');
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
        $member=Member::where('user_id',$user->id);
        $member->update([
            'hasPaid'=>1,
        ]);
        return redirect('/approve');
    }

    public function delete($id){
        $user=User::findOrFail($id);
        if (file_exists($user->image)){
            \File::delete($user->image);
        }
        $user->delete();
        return redirect('/approve');
    }
}
