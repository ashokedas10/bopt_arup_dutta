<?php
namespace App;
namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\JobModel;
use Validator;
use Session;
use View;

class JobController extends Controller
{
    //
	public function getJobs()
	{
		$job_rs=JobModel::where('job_status','=','active')->select('id','job_title')->get();
		return View('hr/job', compact('job_rs'));
	}
	public function viewAddJob()
	{
		return View('hr/add-new-job');
	}
	public function saveAddJob(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'job_title'=>'required'
		],
		[
		'job_title.required'=>'Job Title Required'
		]);
		
		if($validator->fails())
		{
			return redirect('hr/add-new-job')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$job=new JobModel();
		$job->create($data);
		Session::flash('message','Job Information Successfully Saved.');
		return redirect('hr/vw-job');
	}
}
