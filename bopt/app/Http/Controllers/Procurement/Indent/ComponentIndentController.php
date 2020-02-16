<?php

namespace App\Http\Controllers\Procurement\Indent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Admission\Batch;
use App\Model\Masters\Unit;
use App\Model\Masters\Component;
use App\Model\Indent\IndentComponent;
use App\Model\Masters\Institute;
use App\Department;

class ComponentIndentController extends Controller
{
	public function getIndentComponent()
	{
		$indent_component_rs=DB::Table('indent_component')
							->leftJoin('component','indent_component.component_id','=','component.id')
							->leftJoin('unit','indent_component.unit_id','=','unit.id')
							->select('indent_component.*','component.component_name','unit.unit_name')
							->get();
		return view('procurement/indent/indent-component',compact('indent_component_rs'));
	}
	
	public function viewIndentComponent()
	{
		$component_rs = Component::where('component_status','=','active')->get();
		$unit_rs = Unit::where('unit_status','=','active')->get();
		$institute_rs = Institute::where('institute_status','=','active')->get();
		$department_rs = Department::where('department_status','=','active')->get();
		return view('procurement/indent/add-new-indent-component', compact('unit_rs','component_rs','institute_rs','department_rs'));
	}
	
	public function saveIndentComponent(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'component_id'=>'required',
		'unit_id'=>'required',
		'required_qty'=>'required',
		'indent_date'=>'required'
		],
		[
		'component_id.required'=>'Component is  Required',
		'unit_id.required'=>'Unit is Required',
		'required_qty.required'=>'No of pieces Required',
		'indent_date.required'=>'Indent Date is required'
		]);
		
		if($validator->fails())
		{
			return redirect('procurement/indent/add-new-indent-component')->withErrors($validator)->withInput();			
		}
		
		
		//dd($data);
		$data=request()->except(['_token','component_id','component_type','unit_id','required_qty']);
		$tot_component=count($request->component_id);
		//echo $tot_component;die;
		$last_id=IndentComponent::orderBy('id', 'desc')->select('id')->get()->first();
		
		//echo $last_id;die;
		//dd(DB::getQueryLog());
		if($last_id == '')
		{
		$id=1;
		}
		else
		{
		$id=$last_id->id+1;
		}
		$indent_no="INDENT-C-".date('Y')."-".$id;
		
		$indent_component=new IndentComponent();
		for($i=0;$i<$tot_component;$i++)
		{
			
			$data['component_id'] = $request->component_id[$i];
			$data['component_type'] = $request->component_type[$i];
			$data['unit_id'] = $request->unit_id[$i];
			$data['required_qty'] = $request->required_qty[$i];
			$data['indent_no'] = $indent_no;
			$indent_component->create($data);
		}
		
		Session::flash('message','Indent Of Component Successfully Saved.');
		return redirect('procurement/indent/indent-component');
	}
}
