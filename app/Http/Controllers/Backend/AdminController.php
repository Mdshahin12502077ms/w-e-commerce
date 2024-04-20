<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function login()
   {
    return view('Backend.admin.login');
   }

   public function loginCheck(Request $request){
   $email=$request->email;
   $password=$request->password;
   if(Auth::attempt(['email' => $email, 'password' => $password,'role'=>1])){
    if(Auth::user()){
        if(Auth::user()->role==1)
        return redirect('admin/dashboard');
    }
   }
   else{
    return redirect('admin/login');
   }

   }

   public function Dashboard()
   {
    return view('Backend.admin.AdminDashboard');
   }

public function logout(){
    
    return redirect('admin/login');
}

}
