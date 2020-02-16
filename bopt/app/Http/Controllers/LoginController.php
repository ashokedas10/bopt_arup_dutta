<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            return redirect('main');
        }
        //return view('pis/login');
        return View('loginIndex');
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
          return redirect('login')->withErrors($validator)->withInput();   
       }
       else
       {
            if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('psw'),'user_type'=>'user']))
           {
                    $user = auth()->user(); 
                    return redirect()->intended('main');
           }
           else if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('psw'),'user_type'=>'admin']))
           {
                  $user = auth()->user(); 
                    return redirect()->intended('main');
           }
           
           else
           {
               Session::flash('login_error', 'Your email and password wrong!!');
                return redirect('login');
           }
       }
       //  @if(auth()->check())
       //auth()->user()->name
    }
    public function Dashboard() {
        
      if(Auth::check())
      {
                 $email = Auth::user()->email;  
                 $data['Roledata'] = DB::table('role_authorization')      
                  ->join('module', 'role_authorization.module_name', '=', 'module.id')
                  ->select('role_authorization.*', 'module.module_name')
                  ->where('member_id','=',$email) 
                  ->get();
      	return View('main',$data);        
       }
       else
       {
            return redirect('/');
       }
    }
    
    public function Logout(Request $request)
    {
          Auth::logout();
          Session::flash('message','You are successfully Logout.');
          return redirect('/');
    }

    public function HCMDashboard()
    {
        if(Auth::check()){
          $email = Auth::user()->email;  
          $data['Roledata'] = DB::table('role_authorization')      
          ->join('module', 'role_authorization.module_name', '=', 'module.id')
          ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
          ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
          ->where('member_id','=',$email) 
          ->get();
        
        	return View('hcm-dashboard',$data);
        }else{
            return redirect('login');
        }  
    }

    public function FinanceDashboard()
    {
        if(Auth::check()){
          $email = Auth::user()->email;  
          $data['Roledata'] = DB::table('role_authorization')      
          ->join('module', 'role_authorization.module_name', '=', 'module.id')
          ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
          ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
          ->where('member_id','=',$email) 
          ->get();
        
          return View('finance-dashboard',$data);
        }else{
            return redirect('login');
        }  
    }


    public function dakDashboard()
    {
        if(Auth::check()){
          $email = Auth::user()->email;  
          $data['Roledata'] = DB::table('role_authorization')      
          ->join('module', 'role_authorization.module_name', '=', 'module.id')
          ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
          ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name')
          ->where('member_id','=',$email) 
          ->get();
        
          return View('dak-dashboard',$data);
        }else{
            return redirect('login');
        }  
    }
    
}
