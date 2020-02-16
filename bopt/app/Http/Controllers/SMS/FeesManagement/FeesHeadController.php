<?php

namespace App\Http\Controllers\SMS\FeesManagement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use App\Model\Fees\FeesHead;

class FeesHeadController extends Controller
{
	public function getFeesHead()
	{
		$feesHead_rs=FeesHead::all();
		return view('sms/fees-management/view-fees-head',compact('feesHead_rs'));
	}
	
	public function formFeesHead()
	{
		return view('sms/fees-management/fees-head');
	}
	
	public function saveFeesHead(Request $request)
	{
		//dd($request->all());
		$validator=Validator::make($request->all(),[
		'fees_head_code'=>'required|unique:fees_head',
		'fees_head_name'=>'required',
		'fees_head_status'=>'required'		
		],
		[
		'fees_head_code.required'=>'Fees Head Code Required',
		'fees_head_code.unique'=>'Fees Head Code already exists',
		'fees_head_name.required'=>'Fees Head Name Required',
		'fees_head_status.required'=>'Fees Head Status Required'		
		]);
		
		if($validator->fails())
		{
			return redirect('sms/fees-management/fees-head')->withErrors($validator)->withInput();			
		}
		
		$data=request()->except(['_token']);
		//dd($data);
		$feesHead=new FeesHead();
		
		$feesHead->create($data);
		
		Session::flash('message','Fees Head Successfully Saved.');
		return redirect('sms/fees-management/view-fees-head');
	}
}
