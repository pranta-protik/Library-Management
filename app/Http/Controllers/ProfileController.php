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

        if ($request->hasFile('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            if (file_exists($user->image)){
                \File::delete($user->image);
            }
            $image = $request->file('image');
            $name = auth()->user()->username.'.'.$image->getClientOriginalExtension();
            $destinationPath = 'img/profile';
            $image->move($destinationPath, $name);
            $user->update(['image'=>$destinationPath.'/'.$name]);
            return back();
        }

        $member=Member::where('user_id',$user->id)->first();
        $user->update($request->all());

        if (!empty($member)) {
            $member->update($request->all());
        }
        return back();
    }
}
