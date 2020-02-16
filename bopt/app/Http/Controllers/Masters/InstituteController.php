<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Institute;
use Validator;
use Session;

class InstituteController extends Controller
{
    //Get Institute
	public function getInstitutes()
	{	
		$institute_rs=Institute::get();
		return view('masters/view-institute',compact('institute_rs'));
	}
	
	public function viewFormInstitutes()
	{
		return view('masters/institute');
	}
	public function saveInstitutes(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'institute_code'=>'required|unique:institute',
		'institute_name'=>'required',
		'institute_location'=>'required',
		'institute_status'=>'required'
		
		],
		[
		'institute_code.required'=>'Institute Code Required',
		'institute_code.unique'=>'Institute Code already exists',
		'institute_name.required'=>'Institute Name Required',
		'institute_status.required'=>'Course Status Required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('masters/institute')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token','logo_name']);
		$filename='';
		
		if($request->hasFile('logo_name'))
		{
			$files = $request->file('logo_name');		
			$filename = $files->store('institute_logo');
		}
		
		$data['logo_name']=$filename;
		$institute=new Institute();
		
		$institute->create($data);
		
		Session::flash('message','Institute Information Successfully Saved.');
		return redirect('masters/vw-institute');
	}
	
}
