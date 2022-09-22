<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use File;
use Illuminate\Support\Carbon;
use App\EmergencyPost;
use App\BloodDonationHistory;
use App\BloodGroup;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $post_list = EmergencyPost::with('bloodGroup','user')->where('status',2)->orderBy('id','desc')->get();
        $post_list_count=count($post_list);

        $today = Carbon::now('Asia/Dhaka')->format('Y-m-d');
        $today_post_list = EmergencyPost::with('bloodGroup','user')->whereDate('date',$today)->where('status',2)->orderBy('id','desc')->get();
        // dd($post_list);
        $today_post_list_count=count($today_post_list);

        $donate_list = BloodDonationHistory::with('receiver','donar')->orderBy('id','desc')->get();
        $donate_list_count = count($donate_list);

        $today_donate_list = BloodDonationHistory::with('receiver','donar')->whereDate('donate_date',$today)->orderBy('id','desc')->get();
        $today_donate_list_count = count($today_donate_list);

        return view('admin.dashboard',compact('post_list_count','today_post_list_count','donate_list_count','today_donate_list_count'));
    }

    public function postList()
    {
        
        $post_list = EmergencyPost::with('bloodGroup','user')->where('status',2)->orderBy('id','desc')->get();
        return view('admin.post_list',compact('post_list'));
    }

    public function todayPostList()
    {
        $today = Carbon::now('Asia/Dhaka')->format('Y-m-d');
        $post_list = EmergencyPost::with('bloodGroup','user')->whereDate('date',$today)->where('status',2)->orderBy('id','desc')->get();
        
        return view('admin.today_post_list',compact('post_list'));
    }

    public function totalDonateList()
    {
        
        $donate_list = BloodDonationHistory::with('receiver','donar')->orderBy('id','desc')->get();
        $blood_group_arr = BloodGroup::get();
        $blood_group=array();
        foreach ($blood_group_arr as $key => $group) {

            $blood_group[$group->id] = $group->group_name;
        }
        // dd( $blood_group);
        // dd($donate_list);
        return view('admin.donate_list',compact('donate_list','blood_group'));
    }

    public function todayDonateList()
    {
        $today = Carbon::now('Asia/Dhaka')->format('Y-m-d');
        $donate_list = BloodDonationHistory::with('receiver','donar')->whereDate('donate_date',$today)->orderBy('id','desc')->get();
        $blood_group_arr = BloodGroup::get();
        $blood_group=array();
        foreach ($blood_group_arr as $key => $group) {

            $blood_group[$group->id] = $group->group_name;
        }
        
        
        return view('admin.today_donate_list',compact('donate_list','blood_group'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function editindex()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
}
