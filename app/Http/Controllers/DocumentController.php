<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Documents;
use App\Typestudents;
use App\Students;
use Auth;

class DocumentController extends Controller
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
        if($request->typesearch==1){
            $data = Documents::searchByName($request->data)->paginate(10);
            $data->appends(array(
                'typesearch' => $request->typesearch,
                'data' => $request->data
            ));
        }elseif($request->typesearch==2){
            $data = Documents::searchBystdId($request->data)->paginate(10);
            $data->appends(array(
                'typesearch' => $request->typesearch,
                'data' => $request->data
            ));
        }elseif($request->typesearch==3){
            $data = Documents::searchBypeopleId($request->data)->paginate(10);
            $data->appends(array(
                'typesearch' => $request->typesearch,
                'data' => $request->data
            ));
        }elseif($request->typesearch==4){
            $data = Documents::searchByestdId($request->data)->paginate(10);
            $data->appends(array(
                'typesearch' => $request->typesearch,
                'data' => $request->data
            ));
        }
        return view('document-list')->withData($data);
    }

    public function documentEdit(Request $request){
        $this->block();
        $data = Documents::oneDocument($request->id)->first();
        $typestudent = Typestudents::all();
        return view('document-manage',[
            'data' => $data,
            'typestudent' => $typestudent
        ]);
    }

    public function documentEditForm(Request $request){
        $this->block();
        $data = Documents::find($request->id);
        if($request->doc1){
            if($request->doc1!=$data->doc1){
                $data->doc1 = $request->doc1;
                $data->added_doc1 = now();
                $data->whoIsget1 = Auth::user()->id;
            }
        }else{
            $data->doc1 = 0;
            $data->added_doc1 = null;
            $data->whoIsget1 = null;
        }
        if($request->doc2){
            if($request->doc2!=$data->doc2){
                $data->doc2 = $request->doc2;
                $data->added_doc2 = now();
                $data->whoIsget2 = Auth::user()->id;
            }
        }else{
            $data->doc2 = 0;
            $data->added_doc2 = null;
            $data->whoIsget2 = null;
        }
        if($request->doc3){
            if($request->doc3!=$data->doc3){
                $data->doc3 = $request->doc3;
                $data->added_doc3 = now();
                $data->whoIsget3 = Auth::user()->id;
            }
        }else{
            $data->doc3 = 0;
            $data->added_doc3 = null;
            $data->whoIsget3 = null;
        }
        if($request->typestudent){
            $data->typestudent = $request->typestudent;
        } 
        if($request->estdId){
            $data->estdId = $request->estdId;
        }    
        if($this->documentEditFormdatabase($data)){
            session()->flash('msg_success', 'บันทึกข้อมูลเสร็จสิ้น');
            return back();
        }else{
            session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ กรุณาลองอีครั้ง');
            return back();
        }
    }

    private function documentEditFormdatabase($data){
        $data->save();
        return 1;
    }

    public function documentEditconfrim(Request $request){
       $this->block();
       $data = Documents::find($request->id);
       if($request->status){
        $data->confrim = 1;
        $data->added_confrim = now();
        $data->whoIsconfrim = Auth::user()->id;
       }else{
        $data->confrim = 0;
        $data->added_confrim = null;
        $data->whoIsconfrim = null;
       }
       if($this->documentEditFormdatabase($data)){
            session()->flash('msg_success', 'บันทึกข้อมูลเสร็จสิ้น');
            return redirect()->route('document-edit',[
                    'id' => $request->id
                ]); 
        }else{
            session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ กรุณาลองอีครั้ง');
            return back();
        }
    }

    public function documentCreate(Request $request){
        $this->block();
        $data = Students::listoneStudent($request->id)->first();
        $typestudent = Typestudents::all();
        return view('document-create',[
            'data' => $data,
            'typestudent' => $typestudent
        ]);
    }

    public function documentCreateForm(Request $request){
        $this->block();
        $count = Documents::where('student','=',$request->id)->count();
       if($count>1){
            session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ กรุณาลองอีกครั้ง');
            return back();
       }else{
        if($request->id!=null&&$request->typestudent!=null){
            $data = new Documents();
            $data->student = $request->id;
            $data->typestudent = $request->typestudent;
            if($request->doc1){
                $data->doc1 = $request->doc1;
                $data->added_doc1 = now();
                $data->whoIsget1 = Auth::user()->id;
            }
            if($request->doc2){
                $data->doc2 = $request->doc2;
                $data->added_doc2 = now();
                $data->whoIsget2 = Auth::user()->id;
            }
            if($request->doc3){
                $data->doc3 = $request->doc3;
                $data->added_doc3 = now();
                $data->whoIsget3 = Auth::user()->id;
            }
            if($this->CreateDocument($data)){
                session()->flash('msg_success', 'บันทึกข้อมูลเสร็จสิ้น');
                return redirect()->route('document-edit',[
                    'id' => $request->id
                ]); 
            }else{
                session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ กรุณาลองอีกครั้ง');
                return back();
            }
           
        }else{
            session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ กรุณาเลือกประเภท');
            return back();
        }
       }
        
    }

    private function CreateDocument($data){
        $data->save();
        return 1;
    }
}
