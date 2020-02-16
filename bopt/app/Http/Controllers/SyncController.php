<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Model\Role\RoleAuthorization;
use Validator;
use Session;
use View;

class SyncController extends Controller
{
    	
	public function saveAPIData(Request $request)
	{
		
		/*
			if($request->hasFile('resume_name'))
			{
				$files = $request->file('resume_name');		
				$filename = $files->store('resume');
			}
			
			$data = request()->except(['_token','resume_name']);
			$data['resume_name']=$filename;
		*/
	
		$joapplication=new JobApplication();
		$joapplication->create($data);
		Session::flash('message','Job Application Information Successfully Saved.');
		return redirect('hr/vw-job-application');
	}
}
