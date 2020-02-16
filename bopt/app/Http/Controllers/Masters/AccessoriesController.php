<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Accessories;
use Validator;
use Session;

class AccessoriesController extends Controller
{
    //
	public function getAccessories()
	{
		$accessories_rs=Accessories::get();
		return view('masters/view-accessories',compact('accessories_rs'));
	}
	
	public function formAccessories()
	{
		return view('masters/accessories');
	}
	
	public function saveAccessories(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'accessories_code'=>'required|unique:accessories',
		'accessories_name'=>'required',
		'accessories_status'=>'required'
		
		]);
		
		if($validator->fails())
		{
			return redirect('masters/accessories')->withErrors($validator)->withInput();
			
		}
		
		
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$accessories=new Accessories();
		$accessories->create($data);
		Session::flash('message','Accessories Information Successfully Saved.');
		return redirect('masters/vw-accessories');
	}
}
