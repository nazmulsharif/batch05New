<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecentWorkCategory;
use Auth;
use DB;
class RecentWorkCategoryController extends Controller
{
    public function index(){
        $recentWorksCategory = RecentWorkCategory::all();

        return view('backEnd.pages.recentWork.category.index', compact('recentWorksCategory'));
    }
    public function create(){
        return view('backEnd.pages.recentWork.category.create');
    }
    public function store(Request $request){
        $request->validate([

            'name'=>'required'
        ]);
        $recentWorksCategory = new RecentWorkCategory;
        $recentWorksCategory->name = $request->name;
        $recentWorksCategory->user_id =Auth::user()->id;
        $recentWorksCategory->save();
        return back()->with('message','category is added successfully');

    }
    public function statusChange($id, $status){

        $recentWorksCategory = RecentWorkCategory::find($id);
        if($status == true){
            $recentWorksCategory->status = false;
        }
        else{
            $recentWorksCategory->status = true;
        }
        $recentWorksCategory->save();
        return back()->with('message','recentWorksCategory is updated successfully');
    }
}
