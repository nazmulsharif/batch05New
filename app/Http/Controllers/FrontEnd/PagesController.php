<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;

class PagesController extends Controller
{
    public function index(){
        $logo = Logo::where('status',1)->get();
    	return view('frontEnd.pages.home', compact('logo'));
    }
    public function about(){
        $logo = Logo::where('status',1)->get();
    	return view('frontEnd.pages.about', compact('logo'));
    }
    public function services(){
        $logo = Logo::where('status',1)->get();
    	return view('frontEnd.pages.services', compact('logo'));
    }
    public function blog(){
        $logo = Logo::where('status',1)->get();
    	return view('frontEnd.pages.blog', compact('logo'));
    }
    public function contact(){
       $logo = Logo::where('status',1)->get();
    	return view('frontEnd.pages.contact', compact('logo'));
    }
}
