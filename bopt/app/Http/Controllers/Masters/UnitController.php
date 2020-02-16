<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Unit;
use Validator;
use Session;

class UnitController extends Controller
{
    //
	public function getUnit()
	{
		$unit_rs=Unit::where('unit_status','=','active')->get();
		return view('masters/view-unit', compact('unit_rs'));
	}
	
	public function viewUnit()
	{
		
		return view('masters/unit');
	}
	
	public function saveUnit(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'unit_name'=>'required',
		'unit_status'=>'required'
		],
		[
		'unit_name.required'=>'Unit Required',
		'unit_status.required'=>'Status Required'
		]);
		
		if($validator->fails())
		{
			return redirect('masters/unit')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$unit=new Unit();
		$unit->create($data);
		Session::flash('message','Unit Information Successfully Saved.');
		return redirect('masters/vw-unit');
	}
}
