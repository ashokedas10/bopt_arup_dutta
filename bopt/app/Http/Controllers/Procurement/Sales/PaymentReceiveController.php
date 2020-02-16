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
use App\Model\Sales\PaymentReceived;

class PaymentReceiveController extends Controller
{
	public function getPaymentReceive()
	{
		/*$billing_rs=DB::Table('billing')
							->leftJoin('institute','billing.institute_code','=','institute.institute_code')
							->leftJoin('item','billing.item_code','=','item.item_code')
							->select('billing.*','item.item_name','institute.institute_name')
							->get();*/
		return view('procurement/sales/payment-recieved');
	}
	
	public function viewAddPaymentReceive()
	{
		$billing_rs = Billing::where('billing_status','=','active')->get();
		return view('procurement/sales/add-new-payment-recieved', compact('billing_rs'));
	}
	
	public function savePaymentReceive(Request $request)
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
		$last_id=PaymentReceived::orderBy('id', 'desc')->select('id')->get()->first();
		
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
		$payment_rcv_no="PAY-RCV-".date('Y')."-".$id;
		$data['payment_rcv_no'] = $payment_rcv_no;
		$payment_rcv=new PaymentReceived();
		if($request->due_amt == '0')
		{
		$payment_rcv->create($data);
		}
		else
		{
		Session::flash('message','You have to pay in one time.');
		return redirect('procurement/sales/add-new-payment-recieved');
		}
		Session::flash('message','Payment Receive Of Item Successfully Saved.');
		return redirect('procurement/sales/payment-recieved');
	}
}
