<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\District;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('user');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;

        

        // dd($id);

        $currentuser = User::find($id);

        if($currentuser->type==1){
            return redirect()->route('admin.index');
        }else{

            return redirect()->route('user.index');
           

        }
  
    }

    public static function GetAllDistrict(){
        $districts = District::orderby('name','asc')->get();
        return $districts;
    }

}
