<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    
    public function myprofile()
    {
        $user_id = Auth::user()->id;   
        return Self::where('user_id',$user_id)->first();
    }
}
