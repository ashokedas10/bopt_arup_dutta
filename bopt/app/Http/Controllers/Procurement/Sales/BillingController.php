<?php

namespace App\Http\Controllers\Procurement\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Institute;
use App\Model\Masters\Item;
use App\Model\Masters\Unit;
use App\Model\Sales\Billing;

class BillingController extends Controller
{
	public function getBill()
	{
		$billing_rs=DB::Table('billing')
							->leftJoin('institute','billing.institute_code','=','institute.institute_code')
							->leftJoin('item','billing.item_code','=','item.item_code')
							->select('billing.*','item.item_name','institute.institute_name')
							->get();
		return view('procurement/sales/billing', compact('billing_rs'));
	}
	
	public function viewAddBill()
	{
		$institute_rs = Institute::where('institute_status','=','active')->get();
		$item_rs = Item::where('item_status','=','active')->get();
		$unit_rs = Unit::where('unit_status','=','active')->get();
		return view('procurement/sales/add-new-billing', compact('institute_rs','item_rs','unit_rs'));
	}
	
	public function saveBill(Request $request)
	{
		//dd($request->all());
		/*$validator=Validator::make($request->all(),[
		'item_code'=>'required',
		'item_type'=>'required',
		'unit_id'=>'required',
		'required_qty'=>'required',
		'indent_date'=>'required'
		],
		[
		'item_code.required'=>'Item is  Required',
		'item_type.required'=>'Item Type is  Required',
		'unit_id.required'=>'Unit is Required',
		'required_qty.required'=>'Quantity is Required',
		'indent_date.required'=>'Indent Date is required'
		]);
		
		if($validator->fails())
		{
			return redirect('procurement/indent/add-new-indent-item')->withErrors($validator)->withInput();			
		}
		*/
		
		//dd($data);
		$data=request()->except(['_token']);
		$last_id=Billing::orderBy('id', 'desc')->select('id')->get()->first();
		
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
		$billing_no="BILLING-".date('Y')."-".$id;
		$data['billing_no'] = $billing_no;
		$billing=new Billing();
		$billing->create($data);
		Session::flash('message','Billing Of Item Successfully Saved.');
		return redirect('procurement/sales/billing');
	}
}
