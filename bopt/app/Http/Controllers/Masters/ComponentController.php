<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Masters\Unit;
use App\Model\Masters\Component;
use Validator;
use Session;

class ComponentController extends Controller
{
    //
	public function getComponent()
	{
		//$component_rs=Component::where('component_status','=','active')->get();
		$component_rs=DB::Table('component')
					->leftJoin('unit','component.unit_id','=','unit.id')
					->select('component.*','unit.unit_name')
					->get();
		return view('masters/view-component', compact('component_rs'));
	}
	
	public function viewComponent()
	{
		$unit_rs = Unit::where('unit_status','=','active')->get();
		return view('masters/component', compact('unit_rs'));
	}
	
	public function saveComponent(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'component_name'=>'required',
		'component_type'=>'required',
		'unit_id'=>'required',
		'rate'=>'required',
		'min_stock_level'=>'required',
		'hsn_code'=>'required',
		'sac_code'=>'required',
		'component_status'=>'required'
		],
		[
		'component_name.required'=>'Component Name Required',
		'component_type.required'=>'Component Type Required',
		'unit_id.required'=>'Component Unit Required',
		'rate.required'=>'Rate Required',
		'min_stock_level.required'=>'Minimum Stock Required',
		'hsn_code.required'=>'HSN Code Required',
		'sac_code.required'=>'SAC Code Required',
		'component_status.required'=>'Status Required'
		]);
		
		if($validator->fails())
		{
			return redirect('masters/component')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token']);
		
		//dd($data);
		$component=new Component();
		$component->create($data);
		Session::flash('message','Component Information Successfully Saved.');
		return redirect('masters/vw-component');
	}
}
