<?php

namespace App\Http\Controllers;

use App\Book;
use App\Issue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index(){
        $issues=Issue::orderBy('issueDate','desc')->paginate(10);
        return view('admin.issue',compact('issues'));
    }

    public function update($id){
        $issue=Issue::findOrFail($id);
        echo $issue;
        $issue->update([
            'issueDate'=>Carbon::now(),
            'isIssued'=>1,
        ]);
        return back();
    }

    public function delete($id){
        $issue=Issue::findOrFail($id);
        $issue->delete();
        return back();
    }

    public function receiveBook(){
        $book=Book::where('serialNo',$_POST['serialNo'])->first();
        $issue=Issue::where('book_id',$book->id);
        $issue->delete();
        return back();
    }

}
