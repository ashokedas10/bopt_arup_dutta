<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Classes;
use Validator;
use Session;

class ClassController extends Controller
{
    //
	public function getClass()
	{
		$class_rs=Classes::get();
		return view('masters/view-class',compact('class_rs'));
	}
	
	public function viewFormClass()
	{
		return view('masters/class');
	}
	
	public function saveClass(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'class_code'=>'required|unique:class',
		'class_name'=>'required',
		'class_status'=>'required',
		'class_capacity'=>'required'
		
		],
		[
		'class_code.required'=>'Class Code Required',
		'class_code.unique'=>'Class Code already exists',
		'class_name.required'=>'Class Name Required',
		'class_status.required'=>'Class Status Required',
		'class_capacity.required'=>'Class Capacity Required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('masters/class')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$classes=new Classes();
		$classes->create($data);
		Session::flash('message','Class Information Successfully Saved.');
		return redirect('masters/vw-class');
	}
}
