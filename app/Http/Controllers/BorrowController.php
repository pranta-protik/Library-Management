<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
	 public function __construct()
    {
        $this->middleware('member');
    }
    
    public function index(){
        $issues=Issue::where('user_id',auth()->user()->id)->paginate(10);
        return view('users.borrow',compact('issues'));
    }

}
