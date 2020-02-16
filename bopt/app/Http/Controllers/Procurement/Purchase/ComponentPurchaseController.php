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

class ComponentPurchaseController extends Controller
{
	public function getPurchaseComponent()
	{
		DB::enableQueryLog();
		$po_comp_rs=DB::Table('purchase_component')
							->leftJoin('component','purchase_component.component_id','=','component.id')
							->leftJoin('unit','purchase_component.unit_id','=','unit.id')
							->select('purchase_component.*',DB::raw("SUM(purchase_component.total_with_tax) as total"),'component.component_name','unit.unit_name')
							->groupBy('purchase_component.requisition_no')
							->get();
		//dd(DB::getQueryLog());
		//dd($po_comp_rs);
		return view('procurement/purchase/PO-component', compact('po_comp_rs'));
	}
	
	public function viewPurchaseComponent()
	{
		$supplier_rs = Supplier::where('supplier_status','=','active')->get(); 
		$req_component_rs = RequisitionComponent::where('status','=','Approved')->groupBy('requisition_no')->get();
		
		
		return view('procurement/purchase/add-po-component', compact('req_component_rs','supplier_rs'));
	}
	
	public function savePurchaseComponent(Request $request)
	{
		$req_no = request()->requisition_no;//dd($req_no);
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
		
		
		$data=request()->except(['_token','component_id','qty','balance_qty','unit_id','price','offer_price','tax','total_without_tax','total_with_tax']);
		$tot_comp=count($request->component_id);
		//DB::enableQueryLog();
		
		$last_id=PurchaseComponent::orderBy('id', 'desc')->select('id')->get()->first();
		
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
		$po_no="PRC-".date('Y')."-".$id;
		//echo $req_no;die;
		$purchase_comp=new PurchaseComponent();
		
		for($i=0;$i<$tot_comp;$i++)
		{
			
			$data['component_id'] = $request->component_id[$i];
			$data['qty'] = $request->qty[$i];
			$data['balance_qty'] = $request->balance_qty[$i];
			$data['unit_id'] = $request->unit_id[$i];
			$data['price'] = $request->price[$i];
			$data['offer_price'] = $request->offer_price[$i];
			$data['tax'] = $request->tax[$i];
			$data['total_without_tax'] = $request->total_without_tax[$i];
			$data['total_with_tax'] = $request->total_with_tax[$i];
			
			$data['purchase_order_no'] = $po_no;
			$data['purchase_order_date'] = date('Y-m-d');
			$purchase_comp->create($data);
			$upd_req_comp= DB::Table('requisition_component')
						->where('requisition_no','=',$req_no)
						->update(array('status' => 'PO Generated'));
		}
		
		//dd($data);
		Session::flash('message','Purchase Order Of Component Successfully Saved.');
		return redirect('procurement/purchase/PO-component');
	}
}
