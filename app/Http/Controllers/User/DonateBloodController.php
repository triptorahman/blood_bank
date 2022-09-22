<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\EmergencyPost;
use App\BloodGroup;
use App\District;
use App\BloodDonationHistory;
use Illuminate\Support\Facades\DB; //laravel Query builder
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class DonateBloodController extends Controller
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

        $donar_all_running_request_processing = EmergencyPost::where('donator_id',$user_id)->where('status',3)->get();
        $donar_all_running_request_processing_count = count($donar_all_running_request_processing);
        
                                                    
        $history = EmergencyPost::with('bloodGroup','user')->where('user_id','!=',$user_id)->where('blood_group','=',$user_blood_group)->where('status',2)->orderBy('id','desc')->get();
        // dd($history);
        return view('user.donateblood.list',compact('history','donar_all_running_request_processing_count'));
    }


    public function edit($id)
    {
        $post = EmergencyPost::with('bloodGroup','user')->where('id','=',$id)->first();
        // dd($post);
        $user_id = Auth::user()->id;
        $today = Carbon::now()->format('Y-m-d');

        $last_donate_info = BloodDonationHistory::where('donar_id',$user_id)->orderBy('id','desc')->first();
        $donar_all_running_request_processing = EmergencyPost::where('donator_id',$user_id)->where('status',3)->get();
        $donar_all_running_request_processing_count = count($donar_all_running_request_processing);
        
        // dd($donar_all_running_request_processing_count);
        if(!empty($last_donate_info)){

        
            
            $next_donate_date = strtotime("+3 months", strtotime($last_donate_info->donate_date));
            $next_donate_date_final = date('Y-m-d', $next_donate_date);

        }else{

            $next_donate_date_final = $today;

        }

        // dd()
        
        

        // $blood_group = BloodGroup::all();
        
        //dd($post);
        return view('user.donateblood.edit',compact('post','next_donate_date_final','today','donar_all_running_request_processing_count'));
    }

    public function update(Request $request,$id)
    {
        $this->validate(
            $request, 
            [   
                
                'comment' => 'required',
                
                
            ]
        );

        // dd('heelo');
        
        $post = EmergencyPost::find($id);

        $post->comment = $request->comment;
        $post->donator_id = Auth::user()->id;
        $post->status = 3; // in progress
        $post->save();

        
        
        // dd($post);
        session()->flash('message', "Blood Request Respond Successfully");
        return redirect()->route('donate.history');
    }

    public function history()
    {
        $user_id = Auth::user()->id;

        // dd($user_id);
        // DB::enableQueryLog();
        $history = EmergencyPost::with('bloodGroup','user')->where('donator_id','=',$user_id)->where('status','!=',2)->orderBy('id','desc')->get();
        // dd(DB::getQueryLog());
        //  dd($history);
        return view('user.donateblood.history',compact('history'));
    }

    public function cancel($id)
    {
        $post = EmergencyPost::find($id);

        
        $post->donator_id = 0; // donar id reset
        $post->status = 2; // pending
        $post->save();
        

        
        session()->flash('message', "Blood Request Canceled");
        return redirect()->route('donate.history');
    }

    
    
   

   

   
}
