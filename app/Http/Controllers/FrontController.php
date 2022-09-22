<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\EmergencyPost;
use App\BloodDonationHistory;
use App\BloodGroup;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
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

        $donate_list = BloodDonationHistory::with('receiver','donar')->orderBy('id','desc')->get();
        $donate_list_count = count($donate_list);

        $total_user = User::where('status',1)->where('type',3)->get();
        $total_user_count = count($total_user);

        $district_cover = DB::select('Select count(*) from users where status=1 and type = 3 group by district_id');
        $district_cover_count = count($district_cover);

        // dd( $district_cover_count);


        return view('front.index',compact('post_list_count','donate_list_count','total_user_count','district_cover_count'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($post_id)
    {
        
    }

    public function showcategory($category_id)
    {
        
    }

    public function authorwise($author_id)
    {
        
    }

    public function datewise($date)
    {
        /*dd($date);*/
       /* $date_wise_data = User::with(['posts' => function($query) {
            $query->where('status', 1);
        }])->where("type", 2)->whereDay("created_at", $date)->get();*/

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
