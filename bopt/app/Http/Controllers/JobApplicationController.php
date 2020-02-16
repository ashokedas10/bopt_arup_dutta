<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\JobModel;
use App\JobRequisitionModel;
use App\Company;
use App\Branch;
use App\Department;
use App\JobApplication;
use Validator;
use Session;
use View;

class JobApplicationController extends Controller
{
    //
	public function getJobApplication()
	{
		//$jobappplication_rs=JobApplication::all();
		$jobappplication_rs=DB::Table('job_application')
							->leftJoin('company','job_application.company_id','=','company.id')
							->leftJoin('department','job_application.department_id','=','department.id')
							->select('job_application.*','company.company_name','department.department_name')->get();
		return view('hr/job-application-view',compact('jobappplication_rs'));
	}
	
	public function viewAddJobApplication()
	{
		$company_rs=Company::where('company_status','=','active')->get();
		$dept_rs=Department::where('department_status','=','active')->get();
		$post_rs=JobRequisitionModel::where('vacancy_status','=','active')->get();
		return view('hr/add-new-job-application',compact('company_rs','dept_rs','post_rs'));
	}
	
	public function saveAddJobApplication(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'company_id'=>'required',
		'department_id'=>'required',
		'apply_date'=>'required',
		'name'=>'required',
		'post'=>'required',
		'mobile'=>'required',
		'email'=>'required',
		'highest_qualification'=>'required'
		],
		[
		'company_id.required'=>'Company is Required',
		'department_id.required'=>'Department is Required',
		'apply_date.required'=>'Apply Date is Required',
		'name.required'=>'Name is Required',
		'post.required'=>'Post is Required',
		'mobile.required'=>'Mobile No is Required',
		'email.required'=>'Email is Required',
		'highest_qualification.required'=>'Highest Qualification is Required'
		]);
		
		if($validator->fails())
		{
			return redirect('hr/add-new-job-application')->withErrors($validator)->withInput();
			
		}
		if($request->hasFile('resume_name'))
		{
			$files = $request->file('resume_name');		
			$filename = $files->store('resume');
		}
		
		$data = request()->except(['_token','resume_name']);
		$data['resume_name']=$filename;
		
		$joapplication=new JobApplication();
		$joapplication->create($data);
		Session::flash('message','Job Application Information Successfully Saved.');
		return redirect('hr/vw-job-application');
	}
}
