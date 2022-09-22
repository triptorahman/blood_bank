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



class BloodNeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        // dd($user_id);

        $history = EmergencyPost::with('bloodGroup')->where('user_id',$user_id)->orderBy('id','desc')->get();
        // dd($history);
        return view('user.needblood.list',compact('history'));
    }

    public function create()
    {
        // $id = Auth::user()->id;

        //  dd($id);
        $blood_group = BloodGroup::all();

        // dd($blood_group);

        // $currentuser = User::find($id);
        return view('user.needblood.create',compact('blood_group'));
    }

    public function store(Request $request)
    {
        
        $this->validate(
            $request, 
            [   
                'blood_group' => 'required',
                'purpose' => 'required',
                'date' => 'required|after:yesterday',
                
            ],
            [
                'date.after' => 'Date Should not be a Back Date',
                
            ]
        );
       
        $post = new EmergencyPost; //model diye korbo laravel Eloquent
        $post->user_id = Auth::id();
        $post->blood_group = $request->blood_group; //form thake ja paisi
        $post->purpose = $request->purpose; //form thake ja paisi
        $post->date = $request->date; //form thake ja paisi
        $post->status = 2;
        $post->donator_id = 0;
        $post->save();
        

        session()->flash('message', "Blood Request Submitted Successfully");
        return redirect()->route('bloodneed.history');
    }

    public function edit($id)
    {
        $post = EmergencyPost::find($id);

        $blood_group = BloodGroup::all();
        
        //dd($post);
        return view('user.needblood.edit',compact('post','blood_group'));
    }

    public function update(Request $request,$id)
    {
        $post = EmergencyPost::find($id);

        $post->blood_group = $request->blood_group;
        $post->purpose = $request->purpose;
        $post->date = $request->date;
        $post->save();

        
        
        // dd($post);
        session()->flash('message', "Blood Request Edit Successfully");
        return redirect()->route('bloodneed.history');
    }

    public function response($id)
    {
        
        $post = EmergencyPost::with('bloodGroup','user','donar')->where('id','=',$id)->first();
        

        $district_all = District::all();
        $district = array();
        foreach ($district_all as $key => $district_single) {
            $district[$district_single->id] = $district_single->name;
        }
        
        // dd($district);
        return view('user.needblood.response',compact('post','district'));
    }

    

    public function response_update(Request $request,$id)
    {
        // dd($request->all());
        $post = EmergencyPost::find($id);
        

        $post->status = 1; //resolved
        $post->save();

        $donation_history = new BloodDonationHistory;

        $donation_history->donar_id = $request->donar_id;
        $donation_history->donate_date = $request->blood_donate_date;
        $donation_history->recieve_date = $request->blood_donate_date;
        $donation_history->reciever_id =  Auth::id(); //user id who actually receive
        $donation_history->save();
        
        // dd($post);
        session()->flash('message', "Blood Recieved Successfully");
        return redirect()->route('bloodneed.history');
    }

    public function destroy($id)
    {
        $post = EmergencyPost::find($id);
        
        $post->delete(); //delete


        session()->flash('message', "Blood Request Delete Successfully");
        return redirect()->route('bloodneed.history');
    }

    
    
   

   

   
}
