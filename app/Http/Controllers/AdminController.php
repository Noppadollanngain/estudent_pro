<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth; 
use Excel;
use App\Students;

class AdminController extends Controller
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

    public function indexDashborad(){
        $this->block();
        return view('index');
    }

    public function adminList(){
        $this->block();
        $data = User::List()->paginate(10);
        return view('admin-list',[
            'data' => $data
        ]);
    }

    public function adminBlock(Request $request){
        if(Auth::user()->id==1){
            if($this->adminBlockDatabase($request->id)){
                session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
                return redirect()->route('admin-list'); 
            };
        }else{
            session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ ติดเจ้าหน้าที่สูงสุด');
            return redirect()->route('admin-list');
        }
    }

    public function adminUnblock(Request $request){
        if(Auth::user()->id==1){
            if($this->adminUnblockDatabase($request->id)){
                session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
                return redirect()->route('admin-list'); 
            };
        }else{
            session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ ติดเจ้าหน้าที่สูงสุด');
            return redirect()->route('admin-list');
        }
    }

    private function adminBlockDatabase($id){
        $data = User::find($id);
        $data->status = 1;
        $data->save();
        return 1;
    }

    private function adminUnblockDatabase($id){
        $data = User::find($id);
        $data->status = 0;
        $data->save();
        return 1;
    }

    public function adminEdit(Request $request){
        $this->block();
        $data = User::aminEdit($request->id)->first();
        return view('admin-edit',[
            "data" => $data,
        ]);
    }
    
    public function adminEditForm(Request $request){
        if($request->id!=1&&(Auth::user()->id==1||Auth::user()->id==$request->id)){
            if($this->adminEditDatabase($request->id,$request->name,$request->email)){
                session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
                if(Auth::user()->id!=1){
                    return redirect()->route('home');
                }else{
                    return back();
                }
            }else{
                session()->flash('msg_error', 'ตรวจพบข้อมูลในระบบ กรุณาเปลี่ยน Email');
                return back();
            }
        }else{
            session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ ติดเจ้าหน้าที่สูงสุด');
            return back();
        }
    }

    private function adminEditDatabase($id,$name,$email){
        $count = User::adminCheckEmail($id,$email);
        if($count>0){
            return 0;
        }
        else{
            $data = User::find($id);
            $data->name = $name;
            $data->email = $email;
            $data->save();
            return 1;
        }
    }

    public function adminInsertdatabase(){
        $this->block();
        return view('admin-insertdatabase');
    }

    public function adminInsertdatabaseForm(Request $request){
        if(Auth::user()->id==1){
            if($request->hasFile('excel')){
                $path = $request->file('excel')->getRealPath();
                $data = Excel::load($path)->get();
                if($data->count()){
                    foreach ($data as $key => $value) {
                        $arr[] = ['name' => $value->name,'stdId'=>$value->stdid,'peopleId'=>$value->peopleid,'major'=>$value->major];
                    }
                    if(!empty($arr)){
                        foreach ($arr as $key => $value) {
                           $this->firstOrNewDatabase($value['name'],$value['stdId'],$value['peopleId'],$value['major']);
                        }
                        session()->flash('msg_success', 'เพิ่มข้อมูลเสร็จสิ้น');
                        return redirect()->route('home');
                    }
                }
            }
            else{
                session()->flash('msg_error', 'กรุณาเลือก ไฟล์ EXCEL');
                return back();
            }
        }
        else{
            session()->flash('msg_error', 'ไม่สามารถดำเนินการได้ ติดเจ้าหน้าที่สูงสุด');
            return redirect()->route('home');
        }
    }

    private function firstOrNewDatabase($name,$stdId,$peopleId,$major){
        $data = Students::firstOrNew(['stdId'=>$stdId,'peopleId'=>$peopleId]);
        $data->name =  $name;
        $data->major = $major;
        $data->save();
    }

    public function adminSearchstudent(){
        $this->block();
        return view('admin-searchstudent');
    }
}
