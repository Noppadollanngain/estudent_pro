<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeList(){
        $data = DB::table('users')->select("id","name","email","status","created_at")->where('id','!=',1)->where('id','!=',Auth::user()->id)->orderBy("created_at","DESC");
        return $data;
    }

    public static function aminEdit($id){
        $data = DB::table('users')->select("id","name","email")->where('id','=',$id);
        return $data;
    }

    public static function adminCheckEmail($id,$email){
        $count = User::where("email","=",$email)->where("id","!=",$id)->count();
        return $count;
    }
}
