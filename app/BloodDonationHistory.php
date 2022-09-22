<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodDonationHistory extends Model
{
    
    protected $table = 'blood_donation_history';
    protected $guarded = [];


    public function receiver(){
        return $this->hasOne('App\User', 'id', 'reciever_id');
        
    }
    public function donar(){
        return $this->hasOne('App\User', 'id', 'donar_id');
        
    }
   
}
