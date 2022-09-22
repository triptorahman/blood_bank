<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;
use Auth;
use File;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('district','bloodGroup')->where('type',3)->get(); //take data from database
        // dd($users);
        return view('admin.user.list',compact('users')); //sent data to view
    }

    public function approve($user_id)
    {
        // dd($user_id);
        $user = User::find($user_id);
        $user->status = 1;
        $user->save();
        
        
        session()->flash('message', "User Approved Sucessfully"); 
        return redirect()->route('admin-usermanagement.list');
    }

    public function block($user_id)
    {
        // dd($user_id);
        $user = User::find($user_id);
        $user->status = 3;
        $user->save();
        
        
        session()->flash('message', "User Blocked Sucessfully"); 
        return redirect()->route('admin-usermanagement.list');
    }   

}
