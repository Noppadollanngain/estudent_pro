<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class News extends Model
{
    protected $table = 'news';

    public static function listselectNews(){
        $data = DB::table('news')->select('id','created_at','head','updated_at','send_add')->orderBy("created_at","DESC");
        return $data;
    }

    public static function editNew($id){
        $data = DB::table('news')
                    ->leftJoin('users as namecreate','namecreate.id','=','news.admincreate')
                    ->leftJoin('users as nameupdate','nameupdate.id','=','news.adminupdate')
                    ->leftJoin('users as namesend','namesend.id','=','news.adminsend')
                    ->select('news.*','namecreate.name as whocreate','nameupdate.name as whoupdate','namesend.name as whosend')
                    ->where('news.id','=',$id)->get();
        return $data;
    }

    public static function getNoti($typestudent){
        $data = DB::table('documents')->join('students','documents.student','=','students.id')->select('students.notification_token')->where('typestudent','=',$typestudent)->where('students.notification_token','!=',null)->where('documents.typestudent','=',$typestudent);
        return $data;
    }

    public static function getNotiAlert(){
        $data = DB::table('documents')->join('students','documents.student','=','students.id')->select('students.notification_token')->where('confrim','=',0)->where('students.notification_token','!=',null);
        return $data;
    }
}
