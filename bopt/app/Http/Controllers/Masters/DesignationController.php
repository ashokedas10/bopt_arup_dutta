<?php

namespace App;
namespace App\Http\Controllers\Masters;

use App\Department;
use App\Company;
use App\Designation;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use Validator;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class DesignationController extends Controller
{
    //
	public function viewAddDesignation()
	{
	      if(Input::get('id'))
	      {
	          $data['designation']=DB::Table('designation')
		        ->join('department', 'designation.department_code', '=', 'department.id')
		        ->where('designation.id','=',Input::get('id'))
		        ->select('designation.*', 'department.department_name')
		        ->first();
		        //print_r($data['designation']); exit;
	          //$data['designation']=Designation::where('id','=',Input::get('id'))->get();
	          $data['department']=Department::where('department_status','=','active')->get();
	          return view('masters/designation', $data);
	      }else{
			$data['department']=Department::where('department_status','=','active')->get();
			return view('masters/designation',$data);
	      }
	}
	
	public function saveDesignation(Request $request)
	{
		//print_r($request->all()); exit;

		$dept_code=$request['department_code'];
		$designation_name=strtoupper(trim($request['designation_name']));

		
		if(is_numeric($designation_name)==1){
			Session::flash('message','Designation Should not be numeric.');
		    return redirect('masters/vw-designation');
		}
		
		$check_designation=DB::table('designation')->where('designation_name', $request->designation_name)->first();
		if(!empty($check_designation)){
			Session::flash('message','Alredy Exists.');
		    return redirect('masters/vw-designation');
		}
		
		$validator=Validator::make($request->all(),[
                    'department_code'=>'required',
                   // 'designation_code'=>'required|unique:designation,designation_code',
					'designation_name'=>'required|max:255'
					],
					[
					'department_code.required'=>'Please Select Department',
					//'designation_code.required'=>'Designation Code Required',
					'designation_name.required'=>'Designation Name Required'
			        //'designation_code.unique'=>'Designation Code Already Exist'  
					]);
		
		if($validator->fails())
		{
			return redirect('masters/designation')->withErrors($validator)->withInput();
		}
        else
        {
                   
            if(Input::get('id'))
            {
                  
                $data=array(
                   	'department_code'=>$dept_code,
					'designation_name'=>$designation_name,
					'updated_at'=>date('Y-m-d h:i:s'),
					'designation_status'=>$request['des_status'],
                    );
				  Designation::where('id',Input::get('id'))->update($data);
                  Session::flash('message','Designation Information Successfully Updated.');
				return redirect('masters/vw-designation');
            }else{ 

                  	//$data=request()->except(['_token'])+['designation_status' => 'active'];
                  	$data=array(
                   	'department_code'=>$dept_code,
					'designation_name'=>$designation_name,
					'created_at'=>date('Y-m-d h:i:s'),
					'designation_status'=>'active',
                    );
                  
					$designation=new Designation();
					$desigdb=DB::table('designation')->where('designation_name','=',$designation_name)->where('designation_status','=','active')->first();
        
		           if(empty($desigdb)){
					$designation->create($data);
					Session::flash('message','Designation Information Successfully saved.');
				   }else{
				   	Session::flash('message','Designation Information Already Exist.');
				   }
					return redirect('masters/vw-designation');
            }
        }

        
	}
	
	public function getDesignations()
	{
		$data['designation_rs']=DB::Table('designation')
        ->join('department', 'designation.department_code', '=', 'department.id')
        ->where('designation.designation_status','=','active')
        ->select('designation.*', 'department.department_name')
        ->get();      
		return view('masters/view-designation',$data);
	}
}
