<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Students extends Model
{
    protected $table = "students";

    public $fillable = ['name','stdId','peopleId','major'];

    public static function SearchByName($name){
        $data = DB::table('students')->select('name','stdId','peopleId','major','id')->where('name', 'like', '%' .$name. '%');
        return $data;
    }
    public static function SearchBystdId($stdId){
        $data = DB::table('students')->select('name','stdId','peopleId','major','id')->where('stdId', 'like', '%' .$stdId. '%');
        return $data;
    }
    public static function SearchBypeopleId($peopleId){
        $data = DB::table('students')->select('name','stdId','peopleId','major','id')->where('peopleId', 'like', '%' .$peopleId. '%');
        return $data;
    }

    public static function oneStudent($id){
        $data = DB::table('students')
                    ->leftJoin('users', 'students.whoIsupdate', '=', 'users.id')
                    ->select('students.name','students.stdId','students.peopleId','students.major','students.id','users.name as whoIsupdatename','students.updated_at','students.whoIsupdate','students.notification_token')
                    ->where('students.id','=',$id);
        return $data;
    }

    public static function listoneStudent($id){
        $data = DB::table('students')->select('name','stdId','peopleId','id')->where('id','=',$id);
        return $data;
    }
}
