<?php

namespace App\Http\Controllers;

use App\Member;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('users.profile');
    }

    public function update(Request $request,$id){

        $user=User::findOrFail($id);
        $member=Member::where('user_id',$user->id)->first();

        $user->update($request->all());

        if (!empty($member)) {
            $member->update($request->all());
        }

        return redirect('/profile');
    }
}
