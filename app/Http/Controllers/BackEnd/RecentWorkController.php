<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\RecentWork;
use App\Models\RecentWorkCategory;
use Illuminate\Http\Request;
use Auth;
class RecentWorkController extends Controller
{
    public function index(){
        $RecentWorks = RecentWork::all();

        return view('backEnd.pages.recentWork.work.index', compact('RecentWorks'));
    }
    public function create(){
        $categories = RecentWorkCategory::all();
        return view('backEnd.pages.recentWork.work.create', compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'image'=>'required|image',
            'category'=>'required'
        ]);
       $recentWork = new RecentWork();
       $recentWork->title = $request->title;
       $recentWork->sub_title = $request->sub_title;
       $recentWork->link = $request->link;
       $image = $request->image->store('public/images/recentWorks');
       $recentWork->image = $image;
       $recentWork->category_id = $request->category;
       $recentWork->user_id = Auth::user()->id;
       $recentWork->save();
        return back()->with('message','recent Work is added successfully');

    }
    public function statusChange($id, $status){

        $recentWorks = RecentWork::find($id);
        if($status == true){
            $recentWorks->status = false;
        }
        else{
            $recentWorks->status = true;
        }
        $recentWorks->save();
        return back()->with('message','recentWorks is updated successfully');
    }
}
