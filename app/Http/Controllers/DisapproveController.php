<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use App\User;

class DisapproveController extends Controller
{
    public function __construct()
    {
        $this->middleware('librarian');
    }

    public function index(){
        $users=User::where('isApproved','=',1)->where('id','!=',auth()->user()->id)->get();
        return view('admin.disapprove',compact('users'));
    }

    public function update($id){
        $user=User::findOrFail($id);
        $user->update([
            'isApproved'=>0,
        ]);
        $member=Member::where('user_id',$user->id);
        $member->update([
            'hasPaid'=>0,
        ]);
        return redirect('/disapprove');
    }

    public function delete($id){
        $user=User::findOrFail($id);
        if (file_exists($user->image)){
            \File::delete($user->image);
        }
        $user->delete();
        return redirect('/disapprove');
    }
}
