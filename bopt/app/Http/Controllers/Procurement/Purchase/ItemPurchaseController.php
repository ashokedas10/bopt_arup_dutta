<?php

namespace App\Http\Controllers\Procurement\Purchase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Unit;
use App\Model\Masters\Item;
use App\Model\Masters\State;
use App\Model\Masters\District;
use App\Model\Masters\Component;
use App\Model\Masters\Supplier;
use App\Model\Indent\IndentItem;
use App\Model\Indent\RequisitionItem;
use App\Model\Purchase\PurchaseItem;

class ItemPurchaseController extends Controller
{
    public function getDashboard()
    {
        $po_items = DB::Table('requisition_item')
            ->leftJoin('employee', 'requisition_item.requisition_made_by', '=', 'employee.emp_code')
            ->where('requisition_item.status', '=', 'Approved')
            ->groupBy('requisition_item.requisition_no')
            ->select('requisition_item.*', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
            ->get();

//        dd($po_items);

        return View('procurement/purchase/dashboard', compact('po_items'));
    }

    public function getIssuedPurchaseItem()
    {
        $issued_po_items = DB::Table('purchase_item')
//            ->leftJoin('employee', 'purchase_item.requisition_made_by', '=', 'employee.emp_code')
            ->where('status', '=', 'PO Generated')
             ->orWhere('status', '=', 'GRN Partially Completed')
            ->groupBy('purchase_order_no')
//            ->select('requisition_item.*', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
            ->get();
//        dd($issued_po_items);

        return View('procurement/purchase/get-issued-po-items', compact('issued_po_items'));
    }

	public function getPurchaseItem()
	{
		//DB::enableQueryLog();
		$po_item_rs=DB::Table('purchase_item')
							->leftJoin('item','purchase_item.item_code','=','item.item_code')
							->leftJoin('unit','purchase_item.unit_id','=','unit.id')
							->select('purchase_item.*',DB::raw("SUM(purchase_item.total_with_tax) as total"),'item.name','unit.unit_name')
							->groupBy('purchase_item.requisition_no')
							->get();
		//dd(DB::getQueryLog());
//		dd($po_item_rs);
		return view('procurement/purchase/PO-item', compact('po_item_rs'));
	}

	public function viewPurchaseItem()
	{
		$supplier_rs = Supplier::where('supplier_status','=','active')->get();
		$req_item_rs = RequisitionItem::where('status','=','Approved')->groupBy('requisition_no')->get();

		$states = State::all();
		$districts = District::all();


		return view('procurement/purchase/add-po-item', compact('req_item_rs','supplier_rs', 'states', 'districts'));
	}

	public function viewPurchaseItemById($id)
	{
		$po_items = PurchaseItem::where('requisition_no', $id)
					->leftJoin('item','purchase_item.item_code','=','item.id')
					->leftJoin('unit','purchase_item.unit_id','=','unit.id')
					->select('purchase_item.*', 'item.name as item_name', 'unit.unit_name as unit_name')
					->get();
//		 dd($po_items);
		$supplier_rs = Supplier::where('supplier_status','=','active')->get();
		// $req_item_rs = RequisitionItem::where('status','=','Approved')->groupBy('requisition_no')->get();

		return view('procurement/purchase/edit-po-item', compact('po_items','supplier_rs'));
	}

	public function savePurchaseItem(Request $request)
	{
//		 dd($request->all());
		$req_no = request()->requisition_no;
		$supplier_name = request()->supplier_name;
		$terms_n_conditions = request()->terms_conditions;
        $quotation_no = request()->quotation_no;
        $quotation_date = request()->quotation_date;
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


		$data=request()->except(['_token','item_code','qty','unit_id','price','offer_price','tax','total_without_tax','total_with_tax']);
		$tot_comp=count($request->item_code);
		//DB::enableQueryLog();

		$last_id=PurchaseItem::orderBy('id', 'desc')->select('id')->get()->first();

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
		$po_no="PO-".date('Y')."-".$id;
		//echo $req_no;die;
		$purchase_item=new PurchaseItem();

		for($i=0;$i<$tot_comp;$i++)
		{

			$data['item_code'] = $request->item_code[$i];
			$data['qty'] = $request->qty[$i];
			$data['balance_qty'] = $request->balance_qty[$i];
			$data['unit_id'] = $request->unit_id[$i];
			$data['price'] = $request->price[$i];
			$data['offer_price'] = $request->offer_price[$i];
			$data['sgst'] = $request->sgst[$i];
			$data['cgst'] = $request->cgst[$i];
			$data['igst'] = $request->igst[$i];
			$data['total_without_tax'] = $request->total_without_tax[$i];
			$data['total_with_tax'] = $request->total_with_tax[$i];
			$data['status'] = 'PO Generated';
			$data['purchase_order_no'] = $po_no;
			$data['purchase_order_date'] = date('Y-m-d');
            $data['terms_n_condition'] = $terms_n_conditions;
            $data['quotation_no'] = $quotation_no;
            $data['quotation_date'] = $quotation_date;
			//dd($data);
			$purchase_item->create($data);
			$upd_req_item= DB::Table('requisition_item')
						->where('requisition_no','=',$req_no)
						->update(array('status' => 'PO Generated'));
		}

		//dd($data);
		Session::flash('message','Purchase Order Of Item Successfully Saved.');
		return redirect('procurement/purchase/PO-item');
	}

	public function updatePurchaseItem(Request $request)
	{
		// dd($request->all());

		PurchaseItem::where('requisition_no', $request->requisition_no)->delete();

		$req_no = request()->requisition_no;

		$data=request()->except(['_token','item_code','qty','unit_id','price','offer_price','tax','total_without_tax','total_with_tax', 'supplier_name']);
		$tot_comp=count($request->item_code);


		$last_id=PurchaseItem::orderBy('id', 'desc')->select('id')->get()->first();


		if($last_id == '')
		{
		$id=1;
		}
		else
		{
		$id=$last_id->id+1;
		}
		$po_no="PRC-".date('Y')."-".$id;

		$purchase_item=new PurchaseItem();

		for($i=0;$i<$tot_comp;$i++)
		{

			$data['item_code'] = $request->item_code[$i];
			$data['qty'] = $request->qty[$i];
			$data['balance_qty'] = $request->balance_qty[$i];
			$data['unit_id'] = $request->unit_id[$i];
			$data['price'] = $request->price[$i];
			$data['offer_price'] = $request->offer_price[$i];
			$data['sgst'] = $request->sgst[$i];
			$data['cgst'] = $request->cgst[$i];
			$data['igst'] = $request->igst[$i];
			$data['total_without_tax'] = $request->total_without_tax[$i];
			$data['total_with_tax'] = $request->total_with_tax[$i];
			$data['status'] = 'PO Generated';
			$data['purchase_order_no'] = $po_no;
			$data['purchase_order_date'] = date('Y-m-d');
			//dd($data);
			$purchase_item->create($data);
			$upd_req_item= DB::Table('requisition_item')
						->where('requisition_no','=',$req_no)
						->update(array('status' => 'PO Generated'));
		}

		Session::flash('message','Purchase Order Of Item Successfully Updated.');
		return redirect('procurement/purchase/PO-item');
	}

	public function viewPurchaseItemByPO($po_no)
	{
		$po_items = PurchaseItem::where('purchase_order_no', $po_no)
					->leftJoin('item','purchase_item.item_code','=','item.item_code')
					->leftJoin('unit','purchase_item.unit_id','=','unit.id')
                    ->leftJoin('supplier','purchase_item.supplier_name','=','supplier.id')
					->select('purchase_item.*', 'item.name as item_name', 'item.item_desc as item_desc', 'unit.unit_name as unit_name', 'supplier.contact_person_address as supplier_address', 'supplier.supplier_business_name as supplier_name', 'supplier.supplier_state as supplier_state')
					// ->groupBy('purchase_order_no')
					->get();
//		 dd($po_items);
		$supplier_rs = Supplier::where('supplier_status','=','active')->get();
		// $req_item_rs = RequisitionItem::where('status','=','Approved')->groupBy('requisition_no')->get();

		return view('procurement/purchase/purchase-order-report', compact('po_items','supplier_rs'));
	}

}
