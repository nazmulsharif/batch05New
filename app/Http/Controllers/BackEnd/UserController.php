<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_type == 'super_admin'){
            $users = User::all();
            return view('backEnd.pages.user.index')->with('users', $users);
        }
        else
            return back();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(Auth::user()->user_type == 'super_admin'){
            return view('backEnd.pages.user.create');
        }
        else
            return back();
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required',
        'email'=>'required|unique:users',
        'image'=>'nullable',
        'password'=>'required|min:6|confirmed',
      ]);
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->gender = $request->gender;
      $user->user_type = $request->user_type;
      if($request->hasFile('image')){
        $image = $request->image->store('public/user/images');
        $user->image = $image;
      }
      $user->save();
      return redirect()->back()->with('message','New User is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user = User::find($id); 
       return view('backEnd.pages.user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'name'=>'required',
         'image'=>'nullable',


        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->user_type = $request->user_type;
        if($request->hasFile('image')){
            if($request->old_image!=null){
                 unlink('.'.Storage::url($request->old_image));
            }
           
            $image = $request->image->store('public/user/images');
            $user->image = $image;
        }
        $user->save();
        return redirect()->back()->with('message','User is updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
