<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\RecentWork;
use App\Models\RecentWorkCategory;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Slider;
use App\Models\HomeAboutSection;
class PagesController extends Controller
{
    public function index(){
        $logo = Logo::where('status',1)->get();
        $categories = RecentWorkCategory::where('status',1)->get();
        $sliders = Slider::where('status', 1)->orderBy('priority','asc')->get();
        $recentWorks = RecentWork::where('status',1)->get();
        $aboutSections =  HomeAboutSection::all();
    	return view('frontEnd.pages.home', compact('logo','sliders', 'aboutSections', 'categories','recentWorks'));
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
