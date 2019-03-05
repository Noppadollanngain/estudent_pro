<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use DB;
use Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function block(){
        if(Auth::user()->status){
            Auth::logout();
            abort(403);
        }
    }

    public function searchBy(Request $request){
        $this->block();
        if((!empty($request->data))||(!empty($request->typesearch))){
            if($request->typesearch==1){
                $data = Students::SearchByName($request->data)->paginate(10);
                $data->appends(array(
                    'typesearch' => $request->typesearch,
                    'data' => $request->data
                ));
            }elseif($request->typesearch==2){
                $data = Students::SearchBystdId($request->data)->paginate(10);
                $data->appends(array(
                    'typesearch' => $request->typesearch,
                    'data' => $request->data
                ));
            }elseif($request->typesearch==3){
                $data = Students::SearchBypeopleId($request->data)->paginate(10);
                $data->appends(array(
                    'typesearch' => $request->typesearch,
                    'data' => $request->data
                ));
            }
            
            return view('student-list')->withData($data);
        }
        session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ กรุณาลองอีกครั้ง');
        return back();
  }

  public function studentEdit(Request $request){
    $this->block();
    $data = Students::oneStudent($request->id)->first();
    return view('student-edit',[
        'data' => $data,
    ]);
  }

  public function studentEditForm(Request $request){
    $this->block();
    if($this->updataOnestudent($request->id,$request->name)){
        session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
        return back();
    }else{
        session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ กรุณาลองอีกครั้ง');
        return back();
    }
  }

  private function updataOnestudent($id,$name){
    $data = Students::find($id);
    $data->name = $name;
    $data->whoIsupdate = Auth::user()->id;
    $data->save();
    return 1;
  }
}
