<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users=User::all()->where("type", 2);

        return view('admin.user.list', compact('users'));
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
    public function show($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user.show', compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add($user_id)
    {
        $user = User::find($user_id);
        $permissions_u = $user->permissions; //bring all permission for the user
       
        
        if(empty($permissions_u)){
              $permissions_users=Permission::where('id','!=', 1)->get();
              
        }
        else{

                $data=array(1);
                foreach ($permissions_u as $permission) 
                {
                /*array_push($available_permission_id,$permission->id);*/
                $data[] = $permission->id;
                }
                array_push($data);
                $permissions_users=Permission::whereNotIn('id', $data)->get();
                

        }

        /*dd($permissions_users);*/
        
        return view('admin.user.add_permission')->with('user',$user)->with('permissions_users',$permissions_users);
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user.edit')->with('user',$user);

    }

    public function update(Request $request, $user_id)
    {
        
        $this->validate(
        $request, 
        [   
            'name' => 'required|max:255|string',
            'email' => 'required|email|string|unique:users',
        ],
        [   
            
            'email.unique'      => 'Email Already Exist and Need to be Unique',
            
        ],[   
            
            'name' => 'user name',
            
        ]
        );


        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        session()->flash('message', "User Information Updated");
        return redirect()->route('user.list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_permission(Request $request, $user_id)
    {
        
        $user = User::find($user_id);
        $permission_arr=explode(",",$request->permission_id); //explode multi id
        
        foreach ($permission_arr as $value) {
            $user->revokePermissionTo($value);
        }
        
        session()->flash('message', "Permission Delete");
        return redirect()->route('user.list');
    }

    public function add_permission(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $permission_arr=explode(",",$request->permission_id); //explode multi id
        
        foreach ($permission_arr as $value) {
            $user->givePermissionTo($value);
        }
        
        session()->flash('message', "Permission Add");
        return redirect()->route('user.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        
    }
    public function delete($user_id)
    {
        $user = User::find($user_id);
        return view('admin.user.delete_permission')->with('user',$user);
    }
}
