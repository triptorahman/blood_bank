<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\EmergencyPost;
use App\BloodGroup;
use App\BloodDonationHistory;

use App\District;
use Illuminate\Support\Facades\DB; //laravel Query builder
use Illuminate\Support\Facades\Auth;



class DonarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user_blood_group = Auth::user()->blood_group;

        $blood_group = BloodGroup::all();

        $district = District::orderBy('name','asc')->get();

        

        //$history = EmergencyPost::with('bloodGroup','user')->where('user_id','!=',$user_id)->where('blood_group','=',$user_blood_group)->where('status',2)->orderBy('id','desc')->get();
        
        return view('user.donar.list',compact('blood_group','district'));
    }


   

    public function filter(Request $request)
    {
        

        // dd($request->all());
        $user_id = Auth::user()->id;
        
        
        $blood_group = BloodGroup::all();
        $district = District::orderBy('name','asc')->get();
        //$donar_list = EmergencyPost::with('bloodGroup','user')->where('user_id','!=',$user_id)->where('status',2)->orderBy('id','desc')->get();

        $query = User::with('bloodGroup','district')->where('id','!=',$user_id)->where('type',3);
        if($request->blood_group){
            $query->where('blood_group',$request->blood_group);
        }

        if($request->district_id){

            $query->where('district_id',$request->district_id);

        }

        $donar_list = $query->get();

    //    dd($donar_list);
        
        return view('user.donar.list',compact('donar_list','blood_group','district'));
    }

   

    
    
   

   

   
}
