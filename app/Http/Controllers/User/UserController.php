<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; //this is model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\EmergencyPost;
use App\BloodDonationHistory;
use App\BloodGroup;
use App\District;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        
        

        $user_id = Auth::user()->id;
        $user_blood_group = Auth::user()->blood_group;
        
                                                    
        $history = EmergencyPost::with('bloodGroup','user')->where('user_id','!=',$user_id)->where('blood_group','=',$user_blood_group)->where('status',2)->orderBy('id','desc')->get();
        $emergeny_post_count=count($history);
        // dd($emergeny_post_count);
        $donate_history = BloodDonationHistory::where('donar_id',$user_id)->get();
        $donate_history_count = count($donate_history);

        
        // dd($donate_history_count);

        $request_history = EmergencyPost::with('bloodGroup','user')->where('user_id',$user_id)->where('status',2)->orderBy('id','desc')->get();
        $request_history_count = count($request_history);

        $donar_history = User::with('bloodGroup','district')->where('id','!=',$user_id)->where('type',3)->get();
        $donar_history_count = count($donar_history);

        $country_wise_blood_group_data = array();
        $district_wise_blood_group_data = array();

        $blood_groups = BloodGroup::all();
        $user_district_id = Auth::user()->district_id;
        // dd($blood_group);

        foreach ($blood_groups as $key => $blood) {

           
            $country_wise_donar = User::where('id','!=',$user_id)->where('type',3)->where('blood_group',$blood->id)->where('status',1)->get();
            $country_wise_donar_count = count($country_wise_donar);
            $user_district_wise_donar = User::where('id','!=',$user_id)->where('type',3)->where('blood_group',$blood->id)->where('status',1)->where('district_id',$user_district_id)->get();
            $user_district_wise_donar_count = count($user_district_wise_donar);
            //load data in to array
            $country_wise_blood_group_data[$blood->group_name] = $country_wise_donar_count;
            $district_wise_blood_group_data[$blood->group_name] = $user_district_wise_donar_count;
        }

    //    dd($district_wise_blood_group_data);
        
        $currentuser = User::find($id);
        return view('user.user_dashboard',compact('currentuser','emergeny_post_count','donate_history_count','request_history_count','donar_history_count','country_wise_blood_group_data','district_wise_blood_group_data'));
    }

    public function info($user_id)
    {
       
        // $user = DB::select('select * from users where id="'.$user_id.'"');
        // dd($user);
        $user_info = User::with('bloodGroup','district')->where('id',$user_id)->first();
        // $user_info = $user[0];

        return view('user.show',compact('user_info'));
    }

    public function change_info($user_id)
    {
       
        // $user = DB::select('select * from users where id="'.$user_id.'"');
         //dd($user_id);
         $info =User::where('id',$user_id)->first();
       //dd($info);
       return view('user.changeinfo',compact('info'));

    }
public function update_info(Request $request , $user_id)
    {
       
        
      //dd($request->phone_number);
       $user=User::find($user_id);
       //dd($user);
       $user->name=$request->name;
       $user->phone_number=$request->phone_number;
       $user->save();
       session()->flash('message', "Information changed Successfully");
        return redirect()->route('user.profile', $user_id);

    }

    
    
   

   

   
}
