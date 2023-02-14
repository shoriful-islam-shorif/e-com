<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
session_start();
class SupperAdminController extends Controller
{
     public function deshboard()
    {
        $this->AdminAuthChack();
        return view('admin.deshboard');
    }

    public function logout(){
        session::flush();
        return Redirect::to('/login');
    }
    public function AdminAuthChack(){
        $admin_id=session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/login')->send();
        }
    }
}
