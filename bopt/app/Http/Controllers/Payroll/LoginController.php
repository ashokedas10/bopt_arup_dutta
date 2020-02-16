<?php

namespace App\Http\Controllers\Payroll;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use view;
use Validator;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use Auth;
class LoginController extends Controller
{
 
    public function ViewLogin()
    {
        if(Auth::check()){
            return redirect('hcm-dashboard');
        }
        return view('pis/login');
    }
    public function DoLogin(Request $request) 
    {
       
         $validator = Validator::make($request->all(), [
           'email' => 'required',
           'psw' => 'required',
          
       ],
	[
		'email.required'=>'Email Required',
		'psw.required'=>'Password Required'		
	]);
        
       if ($validator->fails()) 
       {
          return redirect('pis/login')->withErrors($validator)->withInput();
           
       }
       else
       {
           
            if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('psw'),'user_type'=>'admin']))
           {
                    $user = auth()->user(); 
                    return redirect()->intended('hcm-dashboard');
                    
           }
           else
           {
               \Session::flash('login_error', 'Your email and password wrong!!');
                return redirect('pis/login');
           }
           
           
       }
       
       
       
       
    }

public function Logout(Request $request)
{
     Auth::logout();
     return redirect('/');
}

public function Dashboard()
{

 if(Auth::check())
 {
	return View('payroll-dashboard');
 }
 else
 {
      return redirect('pis/login');
 }
 
}




}
