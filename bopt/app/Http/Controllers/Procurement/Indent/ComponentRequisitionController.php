<?php

namespace App\Http\Controllers\Procurement\Indent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Unit;
use App\Model\Masters\Item;
use App\Model\Masters\Component;
use App\Model\Indent\IndentItem;
use App\Model\Indent\RequisitionComponent;
use App\Model\Masters\Institute;
use App\Department;

class ComponentRequisitionController extends Controller
{
	public function getRequisitionComponent()
	{
		$req_comp_rs=DB::Table('requisition_component')
							->leftJoin('component','requisition_component.component_id','=','component.id')
							->leftJoin('unit','requisition_component.unit_id','=','unit.id')
							->select('requisition_component.*','component.component_name','unit.unit_name')
							->get();
		return view('procurement/indent/requisition-component', compact('req_comp_rs'));
	}
	
	public function viewRequisitionComponent()
	{
		$component_rs = Component::where('component_status','=','active')->get();
		$unit_rs = Unit::where('unit_status','=','active')->get();
		$institute_rs = Institute::where('institute_status','=','active')->get();
		$department_rs = Department::where('department_status','=','active')->get();
		return view('procurement/indent/add-new-requisition-component', compact('unit_rs','component_rs','institute_rs','department_rs'));
	}
	
	public function saveRequisitionComponent(Request $request)
	{
		//dd($request->all());
		/*$validator=Validator::make($request->all(),[
		'item_code'=>'required',
		'unit_id'=>'required',
		'required_qty'=>'required',
		'indent_date'=>'required'
		],
		[
		'item_code.required'=>'Item is  Required',
		'unit_id.required'=>'Unit is Required',
		'required_qty.required'=>'Quantity is Required',
		'indent_date.required'=>'Indent Date is required'
		]);
		
		if($validator->fails())
		{
			return redirect('procurement/indent/add-new-requisition-item')->withErrors($validator)->withInput();			
		}
		*/
		
		
		$data=request()->except(['_token','component_id','component_type','unit_id','price','quantity','total']);
		$tot_comp=count($request->component_id);
		//DB::enableQueryLog();
		/*$last_id=DB::Table('requisition_item')
				->orderBy('id DESC')
				->select('requisition_item.id')
				->get()->first();*/
		$last_id=RequisitionComponent::orderBy('id', 'desc')->select('id')->get()->first();
		
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
		$req_no="REQ-".date('Y')."-".$id;
		//echo $req_no;die;
		$requisition_comp=new RequisitionComponent();
		
		for($i=0;$i<$tot_comp;$i++)
		{
			
			$data['component_id'] = $request->component_id[$i];
			$data['component_type'] = $request->component_type[$i];
			$data['unit_id'] = $request->unit_id[$i];
			$data['price'] = $request->price[$i];
			$data['quantity'] = $request->quantity[$i];
			$data['total'] = $request->total[$i];
			$data['requisition_no'] = $req_no;
			$data['requisition_date'] = date('Y-m-d');
			$req_id=$requisition_comp->create($data);
		}
		
		//dd($data);
		Session::flash('message','Purchase Request for Component Successfully Saved.');
		return redirect('procurement/indent/requisition-component');
	}
	
	
	public function editRequisitionComponent($id)
	{
		$comp_detail_rs=DB::Table('requisition_component')
				->where('requisition_component.id','=',$id)
				->update(array('status' => 'Approved'));
	
	return redirect('procurement/indent/requisition-component');
	}
}
