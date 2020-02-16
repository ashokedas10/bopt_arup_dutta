<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Masters\Gpfrate;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class GpfRateController extends Controller
{
    

    public function gpfRateListing()
	{
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();
		try {			
			$data['gpfratelisting']  = Gpfrate::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/gpfratelist',$data);
	}
	

	public function viewGpfRate()
	{
		try {			
			//$data['coalisting']  = Coa::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/vw-gpfrate');
	}


	public function saveGpfRate(Request $request){
		
		try{	
			$gpfrate = new Gpfrate();
			$data['rate_of_interest'] = $request->rate_of_interest;
			$data['from_date'] = $request->from_date;
			$data['to_date'] = $request->to_date;
			$data['created_at']= date('Y-m-d');
			
			$gpfrate->create($data);
			$request->session()->flash('status','success');
			$request->session()->flash('message','Record successfully added!');

			
			
		}catch(Exception $e){

			$request->session()->flash('status','error');
			$request->session()->flash('message','Some error occured');
		}
		return redirect('masters/gpf-rate-listing');
	}

	
}
