<?php
namespace App;
namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\JobModel;
use App\JobDescriptionModel;
use Validator;
use Session;
use View;


class JobDescriptionController extends Controller
{
    //
	public function getJobDescription()
	{
		$job_description_rs=JobDescriptionModel::where('status','=','active')->get();
		return view('hr/job-description', compact('job_description_rs'));
	}
	
	public function viewAddJobDescription()
	{
		$job_rs=JobModel::all();
		return view('hr/add-new-job-description', compact('job_rs'));
	}
	
	public function saveAddJobDescription(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'job_title'=>'required',
		'experience'=>'required',
		'key_skill'=>'required',
		'job_description'=>'required',
		'ctc' => 'required',
		'date'=>'required',
		'status'=>'required'
		],
		[
		'job_title.required'=>'Job Title Required',
		'experience.required'=>'Job experience Required',
		'key_skill.required'=>'key skill Required',
		'job_description.required'=>'Job Description Required',
		'ctc.required'=>'CTC Required',
		'date.required'=>'Date Required',
		'status.required'=>'Status Required'
		]);
		
		if($validator->fails())
		{
			return redirect('hr/add-new-job-description')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$jobdescription=new JobDescriptionModel();
		$jobdescription->create($data);
		Session::flash('message','Job Description Information Successfully Saved.');
		return redirect('hr/vw-job-description');
	}
}
