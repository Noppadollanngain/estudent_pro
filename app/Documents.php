<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Documents extends Model
{
    protected $table = "documents";

    public static function searchByName($name){
        $data = DB::table('students')
                 ->leftJoin('documents','documents.student', '=', 'students.id')
                 ->where('students.name', 'like', '%' .$name. '%')
                 ->select('students.id','students.name','documents.id as docStatus','documents.confrim','students.stdId','students.peopleId');
        return $data;
    }

    public static function searchBystdId($stdId){
        $data = DB::table('students')
                 ->leftJoin('documents','documents.student', '=', 'students.id')
                 ->where('students.stdId', 'like', '%' .$stdId. '%')
                 ->select('students.id','students.name','documents.id as docStatus','documents.confrim','students.stdId','students.peopleId');
        return $data;
    }

    public static function searchBypeopleId($peopleId){
        $data = DB::table('students')
                 ->leftJoin('documents','documents.student', '=', 'students.id')
                 ->where('students.peopleId', 'like', '%' .$peopleId. '%')
                 ->select('students.id','students.name','documents.id as docStatus','documents.confrim','students.stdId','students.peopleId');
        return $data;
    }

    public static function searchByestdId($estdId){
        $data = DB::table('students')
                 ->leftJoin('documents','documents.student', '=', 'students.id')
                 ->where('documents.estdId', 'like', '%' .$estdId. '%')
                 ->select('students.id','students.name','documents.id as docStatus','documents.confrim','students.stdId','students.peopleId');
        return $data;
    }

    public static function oneDocument($id){
        $data = DB::table('students')
            ->leftJoin('documents','documents.student', '=', 'students.id')
            ->leftJoin('users as nameIsget1','nameIsget1.id','=','documents.whoIsget1')
            ->leftJoin('users as nameIsget2','nameIsget2.id','=','documents.whoIsget2')
            ->leftJoin('users as nameIsget3','nameIsget3.id','=','documents.whoIsget3')
            ->leftJoin('users as confirm','confirm.id','=','documents.whoIsconfrim')
            ->select('documents.id as idDoc','students.id as idStd','students.name','students.stdId','students.peopleId','documents.*','nameIsget1.name as getName1','nameIsget2.name as getName2','nameIsget3.name as getName3','confirm.name as getNameconfirm')
            ->where('documents.student', '=' , $id);
        return $data;
    }

    public static function updateAll(){
        DB::table('documents')->update(array(
            'confrim' => 0,
            'doc1' => 0,
            'doc2' => 0,
            'doc3' => 0,
            'added_doc1' => null,
            'added_doc2' => null,
            'added_doc3' => null,
            'added_confrim' => null,
            'whoIsget1' => null,
            'whoIsget2' => null,
            'whoIsget3' => null,
            'whoIsconfrim' => null,
        ));
    }

    public static function updateType(){
        $data = DB::table('documents')->orWhere('typestudent','=',1)->orWhere('typestudent','=',2)->update(
            array(
                'typestudent' => 3
            )
        );
    }
}
