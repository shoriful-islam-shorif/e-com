<?php

namespace App\Http\Controllers\admin;

use App\Models\admin;
Use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();


class ControllerAdmin extends Controller
{
    public function login(){
        return view('admin.admin_login');
    }

    
    public function show_deshboard(Request $request){
        $admin_email=$request->email;
        $admin_password=md5($request->password);
       
        $result=admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        dd($result);
        if($result){

           session::put('admin_id',$result->admin_id);
            session::put('admin_name', $result->admin_name);
            return Redirect::to('/deshboard');
          
        }else{
            //session::put('message', 'Email and password Invalit!!');
            //return Redirect::to('/deshboard');
          

        }

        
    }



    public function deshboard()
    {
        //$this->AdminAuthChack();
        return view('admin.deshboard');
    }

    public function register()
    {
        return view('admin.registation');
    }
    
}
