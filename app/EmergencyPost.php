<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyPost extends Model
{
    
    protected $table = 'emergency_post';
    protected $guarded = [];

    public function bloodGroup(){
        return $this->hasOne('App\BloodGroup', 'id', 'blood_group');
        
    }
    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
        
    }
    public function donar(){
        return $this->hasOne('App\User', 'id', 'donator_id');
        
    }
}
