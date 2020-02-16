<?php

namespace App;
namespace App\Http\Controllers\Payroll;

use App\Department;
use App\Company;
use App\Designation;
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
                  $data['designation']=Designation::where('id','=',Input::get('id'))->get();
                  $data['department']=Department::where('department_status','=','active')->get();
                  return view('pis/designation', $data);
              }else{
		$data['department']=Department::where('department_status','=','active')->get();
		return view('pis/designation',$data);
              }
	}
	
	public function saveDesignation(Request $request)
	{
             //dd(Input::get('id'));
		$dept_code=$request->department_code;
		$designation_name=$request->designation_name;
		$designation_code=$request->designation_code;
		$validator=Validator::make($request->all(),[
                    'department_code'=>'required',
                    'designation_code'=>'required|unique:designation,designation_code',
		'designation_name'=>'required|max:255'
		],
		[
		'department_code.required'=>'Please Select Department',
		'designation_code.required'=>'Designation Code Required',
		'designation_name.required'=>'Designation Name Required',
                 'designation_code.unique'=>'Designation Code Already Exist'  
		]);
		
		if($validator->fails())
		{
			return redirect('pis/designation')->withErrors($validator)->withInput();
		}
                else
                {
                   
              if(Input::get('id'))
              {
                  
                  $data=array(
                   'department_code'=>$dept_code,
'designation_code'=>$designation_code,
'designation_name'=>$designation_name,
'created_at'=>date('Y-m-d h:i:s'),
'updated_at'=>date('Y-m-d h:i:s'),
'designation_status'=>$request->des_status,
                    );
		Designation::where('id',Input::get('id'))->update($data);
                  Session::flash('message','Designation Information Successfully Updated.');
		return redirect('pis/vw-designation');
              }else{ 

                  $data=request()->except(['_token'])+['designation_status' => 'active'];
                  
		$designation=new Designation();
		$designation->create($data);
		Session::flash('message','Designation Information Successfully saved.');
		return redirect('pis/vw-designation');
              }
                }
	}
	
	public function getDesignations()
	{
             if(Input::get('del'))
             {
                  DB::table('designation')
            ->where('id', Input::get('del'))
            ->update(['designation_status' => 'Trash']);
                   Session::flash('message','Designation Successfully Deleted.');
                  return back();
             }

		$data['designation_rs']=DB::Table('designation')
                         ->join('department', 'designation.department_code', '=', 'department.department_code')
                        ->where('designation.designation_status','=','active')
            ->select('designation.*', 'department.department_name')
                        ->get();
                
		return view('pis/view-designation',$data);
	}
}
