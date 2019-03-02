<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexDashborad()
    {
        return view('index');
    }

    public function adminList(){
        $data = User::List()->paginate(20);
        return view('admin-list',[
            'data' => $data
        ]);
    }
}
