<?php

namespace App\Http\Controllers\Payroll;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Department;
use Validator;
use Session;
use View;
use Illuminate\Support\Facades\Input;
use Auth;
class DepartmentMasterController extends Controller
{

    
	public function getDepartment()
	{
             if(Input::get('del'))
                {
                   $dataUpdate=DB::table('department')  
                ->where('id', Input::get('del'))
                ->update(['department_status' => 'Trash']);
                   return back()->with('delete','Department Information Successfully Deleted.');
               }
               else
               {
		$department_rs = Department::where('department_status', '=', 'active')->get();
		return view('pis/department-master',compact('department_rs'));
               }
	}
	public function viewAddNewDepartment()
	{
                if(Input::get('id'))
                {
                    $dt=DB::table('department')->where('id','=',Input::get('id'))->where('department_status','=','active')->get();
                 if(count($dt)>0){
                      $data['departments']=DB::table('department')->where('id','=',Input::get('id'))->get();
          
                     return view('pis/add-new-department',$data);
                 }else{
                     return redirect('pis/add-new-department');
                 }
                
                }
                else
                {
                     return view('pis/add-new-department');
                }
                
	}
	public function saveDepartmentData(Request $request)
	{
          
               
		
                if(Input::get('id'))
                {
                   
                   $validator=Validator::make($request->all(),[
		'department_name'=>'required',
		'department_code'=>'required'		
		],
		[
		'department_name.required'=>'Department Name Required',
		'department_code.required'=>'Department Code Required',	
					
		]);
		
		if($validator->fails())
		{
			return redirect('pis/add-new-department')->withErrors($validator)->withInput();
			
		}
                    
                $data=array(
                'department_name'=>$request->input('department_name'),
                'department_code'=>$request->input('department_code'),

                );

                $dataInsert=DB::table('department')  
                ->where('id', Input::get('id'))
                ->update($data);
                Session::flash('message','Department Information Successfully Updated.');
                return redirect('pis/vw-department');
                
                
                }
                else
                {
                    $validator=Validator::make($request->all(),[
		'department_name'=>'required',
		'department_code'=>'required|unique:department'		
		],
		[
		'department_name.required'=>'Department Name Required',
		'department_code.required'=>'Department Code Required',	
		'department_code.unique'=>'Department Code already exists'				
		]);
		
		if($validator->fails())
		{
			return redirect('pis/add-new-department')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$department=new Department();
		$department->create($data);
		Session::flash('message','Department Information Successfully Saved.');
		return redirect('pis/vw-department');
	
                }
                
                }
}
