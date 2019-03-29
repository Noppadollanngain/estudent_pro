<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use App\Documents;

class AnyFunctionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function block()
    {
        if (Auth::user()->status) {
            Auth::logout();
            abort(403);
        }
    }
    public function index()
    {
        $this->block();
        return view('anyIndex');
    }
    public function alert_doc(){
        $data = News::getNotiAlert()->get();
        $title = "แจ้งเตือนจากกองทุนกู้ยืน";
        $body = "คุณขาดส่งเอกสาร กรุณาติดต่อกองทุนกู้ยืมเพื่อการศึกษา";
        foreach($data as $key){
            header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json");
                $ch = curl_init("https://expo.io/--/api/v2/push/send");
                # Setup request to send json via POST.
                $payload = json_encode( array( "to"=> $key->notification_token, "body"=>(string)$body, "title"=>(string)$title) );
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
                curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                # Return response instead of printing.
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                # Send request.
                $result = curl_exec($ch);
                curl_close($ch);
        }
        session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
        return redirect()->route('any');
    }

    public function resetDoc(){
        Documents::updateAll();
        session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
        return redirect()->route('any');
    }

    public function updateType(){
        Documents::updateType();
        session()->flash('msg_success', 'ดำเนินการเส็จสิ้น');
        return redirect()->route('any');
    }
}
