<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Typestudents;
use Auth;
use App\Students;
use App\News;
use Image;
use File;
use DB;

class NewsController extends Controller
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
    public function createNew(){
        $typestudent = Typestudents::all();
        return view('news-create',[
            'typestudent' => $typestudent
        ]);
    }

    public function createNewform(Request $request){
        $this->block();
        if($request->head){
            if($request->typestudent){
                if($request->hasFile('image')){
                    $data = new News();
                    $data->admincreate = Auth::user()->id;
                    $data->head = $request->head;
                    $data->typestudent = $request->typestudent;
                    $data->body = $request->body;
                    $data->title = $request->title;
                    $data->linkdownload = $request->link;
                    $filename = str_random(10) . '_450x450.' . $request->file('image')->getClientOriginalExtension();
                    $data->image = $filename;
                    if($this->createNewdatabase($data)){
                        Image::make($request->file('image'))->resize(450,450)->save(public_path() . '/images/News/' . $filename);
                        session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
                        return redirect()->route('new-edit', [
                            'id' => $data->id
                        ]);
                    }else{
                        session()->flash('msg_error', 'เกิดข้อผิดพลาด กรุณาลองอีกครั้ง');
                        return back();
                    }
                }
                else{
                    session()->flash('head', $request->head);
                    session()->flash('title', $request->title);
                    session()->flash('typestudent', $request->typestudent);
                    session()->flash('msg_error', 'ระบุเลือกรูปภาพ');
                    return back();
                }
            }else{
                session()->flash('title', $request->title);
                session()->flash('head', $request->head);
                session()->flash('msg_error', 'ระบุประเภทนักศึกษา');
                return back();
            }
        }else{
            session()->flash('msg_error', 'ระบุข้อหัวข้อข่าว');
            session()->flash('title', $request->title);
            return back();
        }
    }

    private function createNewdatabase($data){
        $data->save();
        return 1;
    }

    public function listNews(){
        $data = News::listselectNews()->paginate(20);
        return view('news-list',[
            'data' => $data
        ]);
    }

    public function newEdit(Request $request){
        $data = News::editNew($request->id)->first();
        $typestudent = Typestudents::all();
        return view('new-edit',[
            'typestudent' => $typestudent,
            'data' => $data
        ]);
    }

    public function newEditform(Request $request){
        $data = News::find($request->id);
        $data->head = $request->head;
        $data->title = $request->title;
        $data->typestudent = $request->typestudent;
        $data->body = $request->body;
        $data->linkdownload = $request->link;
        $data->adminupdate = Auth::user()->id;
        if ($request->hasFile('image')) {
            File::delete(public_path() . '/images/News/' . $data->image);
            $filename = str_random(10) . '_450x450.' . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->resize(450,450)->save(public_path() . '/images/News/' . $filename);
            $data->image = $filename;
            if($this->createNewdatabase($data)){
                session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
                return redirect()->route('new-edit',[
                    'id' => $data->id
                ]);
            }else{
                session()->flash('msg_error', 'ระบุเลือกรูปภาพ');
                return back();
            }
        }else{
            if($this->createNewdatabase($data)){
                session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
                return redirect()->route('new-edit',[
                    'id' => $data->id
                ]);
            }else{
                session()->flash('msg_error', 'ระบุเลือกรูปภาพ');
                return back();
            }
        }
    }

    public function sendNew(Request $request){
        $data = News::find($request->id);
        $data->adminsend = Auth::user()->id;
        $data->send_add = now();
        if($this->createNewdatabase($data)){
            $this->sendNoti($data->head,$data->body,$data->typestudent);
            session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
            return redirect()->route('new-edit',[
                'id' => $data->id
            ]);
        }else{
            session()->flash('msg_error', 'ระบุเลือกรูปภาพ');
            return back();
        }
    }

    private function sendNoti($head,$body,$typestudent){

        if($typestudent!=4){
            $data = News::getNoti($typestudent)->get();
            $title = $head;
            $body = $body;
            foreach($data as $send_data){
                header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json");
                $ch = curl_init("https://expo.io/--/api/v2/push/send");
                # Setup request to send json via POST.
                $payload = json_encode( array( "to"=> $send_data->notification_token, "body"=>(string)$body, "title"=>(string)$title) );
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
                curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                # Return response instead of printing.
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                # Send request.
                $result = curl_exec($ch);
                curl_close($ch);
            }
        }else{
            $data = Students::all();
            $title = $head;
            $body = $body;
            foreach($data as $send_data){
                header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json");
                $ch = curl_init("https://expo.io/--/api/v2/push/send");
                # Setup request to send json via POST.
                $payload = json_encode( array( "to"=> $send_data->notification_token, "body"=>(string)$body, "title"=>(string)$title) );
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
                curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                # Return response instead of printing.
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                # Send request.
                $result = curl_exec($ch);
                curl_close($ch);
            }
        }
        
    }
}
