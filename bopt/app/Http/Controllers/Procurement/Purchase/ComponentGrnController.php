<?php

namespace App\Http\Controllers\Procurement\Purchase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Unit;
use App\Model\Masters\Item;
use App\Model\Masters\Component;
use App\Model\Masters\Supplier;
use App\Model\Indent\IndentItem;
use App\Model\Indent\RequisitionComponent;
use App\Model\Purchase\PurchaseComponent;
use App\Model\Purchase\GrnComponent;

class ComponentGrnController extends Controller
{
	public function getGrnComponent()
	{
		DB::enableQueryLog();
		$grn_comp_rs=DB::Table('grn_component')
							->select('grn_component.grn_no','grn_component.receive_date',DB::raw("SUM(grn_component.total_with_tax) as total"),DB::raw("SUM(grn_component.receive_qty) as rcv_qty"))
							->groupBy('grn_component.grn_no')
							->get();
		//dd(DB::getQueryLog());
		//dd($po_comp_rs);
		return view('procurement/purchase/GRN-component', compact('grn_comp_rs'));
	}
	
	public function viewGrnComponent()
	{
		//$supplier_rs = Supplier::where('supplier_status','=','active')->get(); 
		//$pr_component_rs = PurchaseComponent::where('status','=','Approved')->groupBy('requisition_no')->get();
		
		
		return view('procurement/purchase/add-GRN-component-with-po');
	}
	
	public function saveGrnComponent(Request $request)
	{
		$postat = request()->po_status;
		$req_no = request()->requisition_no;
		$po_no = request()->purchase_order_no;
		if($postat == 'with')
		{
			
			
			$data=request()->except(['_token','po_status','component_id','qty','balance_qty','unit_id','price','delivery_date','receive_qty','receive_date','tax','total_without_tax','total_with_tax']);
			$tot_comp=count($request->component_id);
			//DB::enableQueryLog();
			
			$last_id=GrnComponent::orderBy('id', 'desc')->select('id')->get()->first();
			
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
			$grn_no="GRN-C-".date('Y')."-".$id;
			//echo $req_no;die;
			$grn_comp=new GrnComponent();
			
			for($i=0;$i<$tot_comp;$i++)
			{
				
				$data['component_id'] = $comp_id = $request->component_id[$i];
				$data['qty'] = $request->qty[$i];
				$data['balance_qty'] = $bal_qty = $request->balance_qty[$i];
				$data['receive_qty'] = $rcv_qty = $request->receive_qty[$i];
				$data['unit_id'] = $request->unit_id[$i];
				$data['price'] = $request->price[$i];
				$data['tax'] = $request->tax[$i];
				$data['total_without_tax'] = $request->total_without_tax[$i];
				$data['total_with_tax'] = $request->total_with_tax[$i];
				$data['receive_date'] = $request->receive_date[$i];
				$data['requisition_no'] = $request->requisition_no[$i];
				$data['grn_no'] = $grn_no;
				$grn_comp->create($data);
				
				if($bal_qty == 0)
				{
					$data1['status'] = $status = 'GRN Completed';
				}
				else
				{
					$data1['status'] = $status = 'GRN Partially Completed';
				}
				//DB::enableQueryLog();
				$upd_req_comp= DB::Table('purchase_component')
							->where('purchase_order_no','=',$po_no)
							->where('component_id','=',$comp_id)
							->update(array('balance_qty' => $bal_qty,'receive_qty' => $rcv_qty,'status' => $status));
				//dd(DB::getQueryLog());
			}
		}
		else
		{
			$data=request()->except(['_token','po_status','component_id','qty','price','receive_qty','tax','total_with_tax']);
			$tot_comp=count($request->component_id);
			//DB::enableQueryLog();
			
			$last_id=GrnComponent::orderBy('id', 'desc')->select('id')->get()->first();
			
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
			$grn_no="GRN-C-".date('Y')."-".$id;
			//echo $req_no;die;
			$grn_comp=new GrnComponent();
			
			for($i=0;$i<$tot_comp;$i++)
			{
				
				$data['component_id'] = $comp_id = $request->component_id[$i];
				$data['qty'] = $request->qty[$i];
				//$data['balance_qty'] = $bal_qty = $request->balance_qty[$i];
				$data['receive_qty'] = $rcv_qty = $request->receive_qty[$i];
				$data['price'] = $request->price[$i];
				$data['tax'] = $request->tax[$i];
				$data['total_without_tax'] = $request->price[$i] * $request->qty[$i];
				$data['total_with_tax'] = $request->total_with_tax[$i];
				$data['grn_no'] = $grn_no;
				//$data1['status'] = $status = 'GRN Completed';
				$grn_comp->create($data);
				
			}
		}
		
		//dd($data);
		Session::flash('message','GRN Of Component Successfully Saved.');
		return redirect('procurement/purchase/GRN-component');
	}
}
