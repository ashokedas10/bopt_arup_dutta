<?php

namespace App\Http\Controllers\Procurement\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Item;
use App\Model\Indent\IndentItem;
use App\Model\Inventory\IssueItem;
use App\Model\Inventory\StockItem;


class ItemIssueController extends Controller
{
	public function getItemIssue()
	{
		DB::enableQueryLog();
		$issue_item_rs=DB::Table('issue_item')
						->leftJoin('item','issue_item.item_code','=','item.item_code')
						->leftJoin('unit','issue_item.unit_id','=','unit.id')
						->select('issue_item.*','item.item_name','unit.unit_name')
						->get();
		//dd(DB::getQueryLog());
		//dd($po_comp_rs);
		return view('procurement/inventory/issue-register-item', compact('issue_item_rs'));
	}
	
	public function viewItemIssue()
	{
		$indent_rs = IndentItem::where('status','=','active')->groupBy('indent_no')->get(); 
		return view('procurement/inventory/add-issue-register-item', compact('indent_rs'));
	}
	
	public function saveItemIssue(Request $request)
	{
			$indent_no = request()->indent_no;
			$data=request()->except(['_token','item_code','unit_id','opening_stock','indent_required_qty','issue_qty','issue_date']);
			$tot_item=count($request->item_code);
			//DB::enableQueryLog();
			
			$last_id=IssueItem::orderBy('id', 'desc')->select('id')->get()->first();
			
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
			$issue_no="ISSUE-I-".date('Y')."-".$id;
			//echo $req_no;die;
			$issue_item=new IssueItem();
			$stock_item=new StockItem();
			
			for($i=0;$i<$tot_item;$i++)
			{
				
				$data['item_code'] = $item_code = $request->item_code[$i];
				$data['unit_id'] = $request->unit_id[$i];
				$data['opening_stock'] = $request->opening_stock[$i];
				$data['indent_required_qty'] = $r_qty = $request->indent_required_qty[$i];
				$data['issue_qty'] = $issue_qty = $request->issue_qty[$i];
				$data['issue_date'] = $request->issue_date[$i];
				$data['issue_no'] = $issue_no;
				$issue_item->create($data);
				
				$data1['item_code'] = $request->item_code[$i];
				$data1['opening_balance'] = $opening = $request->opening_stock[$i];
				$data1['receive_balance'] = $receive = 0;
				$data1['issue_balance'] = $issue = $request->issue_qty[$i];
				$data1['rcv_date'] = $request->issue_date[$i];
				$data1['closing_balance'] = ($opening + $receive - $issue); 
				$stock_item->create($data1);
				
				if($r_qty == $issue_qty)
				{
					$data2['status'] = $status = 'close';
				}
				
				//DB::enableQueryLog();
				$upd_indent= DB::Table('indent_item')
							->where('indent_no','=',$indent_no)
							->where('item_code','=',$item_code)
							->update(array('status' => $status));
				//dd(DB::getQueryLog());

		}
		
		//dd($data);
		Session::flash('message','Issue Of Item Successfully Saved.');
		return redirect('procurement/inventory/issue-register-item');
	}
}
