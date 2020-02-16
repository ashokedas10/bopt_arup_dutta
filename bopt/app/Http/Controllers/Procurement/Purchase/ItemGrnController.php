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
use App\Model\Indent\RequisitionItem;
use App\Model\Purchase\PurchaseItem;
use App\Model\Purchase\GrnItem;

class ItemGrnController extends Controller
{
	public function getItemGrn()
	{
		DB::enableQueryLog();
		$grn_item_rs=DB::Table('grn_item')
							->leftjoin('purchase_item', 'grn_item.requisition_no', '=', 'purchase_item.requisition_no')
							->select('grn_item.grn_no','grn_item.receive_date','grn_item.purchase_order_no','grn_item.grn_no','purchase_item.purchase_order_date')
							->groupBy('grn_item.grn_no')
							->get();
		//dd(DB::getQueryLog());
		// dd($grn_item_rs);
		return view('procurement/purchase/GRN-item', compact('grn_item_rs'));
	}
	
	public function viewItemGrn()
	{
		//$supplier_rs = Supplier::where('supplier_status','=','active')->get(); 
		//$pr_component_rs = PurchaseComponent::where('status','=','Approved')->groupBy('requisition_no')->get();
		
		$pr_no_rs = PurchaseItem::where('status','!=','GRN Completed')->groupBy('requisition_no')->select('*')->get();
		return view('procurement/purchase/add-GRN-item', compact('pr_no_rs'));
	}
	
	public function saveItemGrn(Request $request)
	{
		// dd($request->all());
		$postat = request()->po_status;
		$req_no = request()->requisition_no;
		$po_no = request()->purchase_order_no;

			
			$data=request()->except(['_token','po_status','item_code','qty','balance_qty','unit_id','price','delivery_date','receive_qty','receive_date','tax','total_without_tax','total_with_tax']);
			$tot_item=count($request->item_code);
			//DB::enableQueryLog();
			
			$last_id=GrnItem::orderBy('id', 'desc')->select('id')->get()->first();
			
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
			$grn_no="GRN-I-".date('Y')."-".$id;
			//echo $req_no;die;
			$grn_item=new GrnItem();
			
			for($i=0;$i<$tot_item;$i++)
			{
				
				$data['item_code'] = $item_code = $request->item_code[$i];
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
				$grn_item->create($data);
				
				if($bal_qty == 0)
				{
					$data1['status'] = $status = 'GRN Completed';
				}
				else
				{
					$data1['status'] = $status = 'GRN Partially Completed';
				}
				//DB::enableQueryLog();
				$upd_req_item= DB::Table('purchase_item')
							->where('purchase_order_no','=',$po_no)
							->where('item_code','=',$item_code)
							->update(array('balance_qty' => $bal_qty,'receive_qty' => $rcv_qty,'status' => $status));
				//dd(DB::getQueryLog());
			}
		
		
		
		//dd($data);
		Session::flash('message','GRN Successfully Saved.');
		return redirect('procurement/purchase/GRN-item');
	}
}
