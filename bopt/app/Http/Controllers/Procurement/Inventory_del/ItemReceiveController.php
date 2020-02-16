<?php

namespace App\Http\Controllers\Procurement\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Component;
use App\Model\Purchase\GrnItem;
use App\Model\Inventory\ReceiveItem;
use App\Model\Inventory\StockItem;


class ItemReceiveController extends Controller
{
	public function getItemReceive()
	{
		DB::enableQueryLog();
		$rcv_item_rs=DB::Table('stock_of_item')
						->leftJoin('item','stock_of_item.item_code','=','item.item_code')
						->leftJoin('unit','item.unit_id','=','unit.id')
						->select('stock_of_item.*','item.item_name','item.item_type','unit.unit_name')
						->get();
		//dd(DB::getQueryLog());
		//dd($po_comp_rs);
		return view('procurement/inventory/receive-item', compact('rcv_item_rs'));
	}
	
	public function viewItemReceive()
	{
		$grn_rs = GrnItem::where('status','=','open')->groupBy('grn_no')->get(); 
		return view('procurement/inventory/add-receive-item', compact('grn_rs'));
	}
	
	public function saveItemReceive(Request $request)
	{
			$grn_no = request()->grn_no;
			$data=request()->except(['_token','item_code','unit_id','opening_stock','receive_stock','closing_stock','rcv_date']);
			$tot_item=count($request->item_code);
			//DB::enableQueryLog();
			
			$last_id=ReceiveItem::orderBy('id', 'desc')->select('id')->get()->first();
			
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
			$receive_no="RCV-I-".date('Y')."-".$id;
			//echo $req_no;die;
			$receive_item=new ReceiveItem();
			$stock_item=new StockItem();
			
			for($i=0;$i<$tot_item;$i++)
			{
				$item_code = $request->item_code[$i];
				/*$data['item_code'] = $item_code = $request->item_code[$i];
				$data['unit_id'] = $request->unit_id[$i];
				$data['opening_stock'] = $opening_stock = $request->opening_stock[$i];
				$data['receive_stock'] = $receive_stock = $request->receive_stock[$i];
				$data['closing_stock'] = $closing_stock = $request->closing_stock[$i];
				$data['rcv_date'] = $request->rcv_date[$i];
				$data['receive_no'] = $receive_no;
				$receive_item->create($data);*/
				
				$data1['item_code'] = $request->item_code[$i];
				$data1['opening_balance'] = $opening = $request->opening_stock[$i];
				$data1['receive_balance'] = $receive = $request->receive_stock[$i];
				$data1['issue_balance'] = $issue = 0;
				$data1['rcv_date'] = $request->rcv_date[$i];
				$data1['closing_balance'] = ($opening + $receive - $issue); 
				$stock_item->create($data1);
				
				
				$data2['status'] = $status = 'close';
				
				//DB::enableQueryLog();
				$upd_indent= DB::Table('grn_item')
							->where('grn_no','=',$grn_no)
							->where('item_code','=',$item_code)
							->update(array('status' => $status));
				//dd(DB::getQueryLog());

		}
		
		//dd($data);
		Session::flash('message','Receive Of Item Successfully Saved.');
		return redirect('procurement/inventory/receive-item');
	}
}
