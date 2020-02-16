<?php

namespace App\Http\Controllers\Procurement\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Item;
use App\Model\Masters\Unit;
use App\Department;
use App\Model\Indent\IndentItem;
use App\Model\Inventory\IssueItem;
use App\Model\Inventory\StockItem;


class ItemIssueController extends Controller
{
    public function getDashboard()
    {
        $items =  DB::table('stock_opening')
            ->leftJoin('item', 'stock_opening.item_id', 'item.item_code')
            ->select('stock_opening.closing_stock', 'item.*')
////            ->orderByDesc('stock_masters.id')
            ->get();
//        dd($items);
//
//
        foreach ($items as $item)
        {
            if($item->closing_stock < $item->min_stock || $item->closing_stock == $item->min_stock)
            {
                $stock_bal = DB::table('stock_masters')->where('item_id', $item->item_code)->select('closing_balance')->orderByDesc('id')->first();

                if(empty($stock_bal->closing_balance))
                {
                    $closingstock=$item->closing_stock;

                }
                else{
                    $closingstock = $stock_bal->closing_balance;
                }

                $data['results'][]= array("itemcode"=>$item->item_code,"itemname"=>$item->name,"itemminimumstock"=>$item->min_stock,"closing_balance"=>$closingstock);
            }



        }
//        dd($results);
//        echo "<pre>"; print_r($data['results']); exit;
        return View('procurement/inventory/dashboard', $data);
    }

    public function getIndentItemList()
    {
        $indent_lists = DB::table('indent_item')
            ->leftJoin('employee', 'indent_item.indent_made_by', '=', 'employee.emp_code')
            ->where('indent_item.status', '=', 'approved')
            ->groupBy('indent_item.indent_no')
            ->select('indent_item.*', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
            ->get();

        return view('procurement/inventory/get-approve-indent-list', compact('indent_lists'));
    }

	public function getItemIssue()
	{
		DB::enableQueryLog();
		$issue_item_rs=DB::Table('issue_item')
						->leftJoin('item','issue_item.item_code','=','item.item_code')
						->leftJoin('unit','issue_item.unit_id','=','unit.id')
						->select('issue_item.*','item.name as item_name','unit.unit_name')
//						->groupBy('indent_no')
						->get();
		// dd(DB::getQueryLog());
		// dd($issue_item_rs);
		return view('procurement/inventory/issue-register-item', compact('issue_item_rs'));
	}

	public function viewItemIssue()
	{
		$indent_rs = IndentItem::where('status','=','approved')->groupBy('indent_no')->get();

		$item_rs = Item::where('status','=','active')->get();
		$unit_rs = Unit::where('unit_status','=','active')->get();
		// $institute_rs = Institute::where('institute_status','=','active')->get();
		$department_rs = Department::where('department_status','=','active')->get();
		return view('procurement/inventory/add-issue-register-item', compact('indent_rs', 'item_rs', 'unit_rs', 'department_rs'));
	}

	public function saveItemIssue(Request $request)
	{
//			 dd($request->all());
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
			$issue_no="ISSUE-I-".time();
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

				$data1['item_id'] = $request->item_code[$i];
				$data1['item_name'] = $request->item_name[$i];
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
							->where('item_id','=',$item_code)
							->update(array('status' => 'close'));
				//dd(DB::getQueryLog());

		}

		//dd($data);
		Session::flash('message','Issue Of Item Successfully Saved.');
		return redirect('procurement/inventory/issue-register-item');
	}

	public function viewItemIssuebyIndentNo($indent_no)
    {
//        dd($indent_no);
        $issued_items = DB::table('issue_item')->where('indent_no', $indent_no)
            ->leftjoin('item', 'issue_item.item_code', '=', 'item.item_code')
            ->select('issue_item.*', 'item.name as item_name')
            ->get();
//        dd($issued_item);
        return view('procurement/inventory/issue-register-report-indent', compact('issued_items'));
    }

    public function getItemIssueReport()
    {
        return view('procurement/inventory/get-issue-register-report');
    }

    public function getItemIssueResult(Request $request)
    {
//        dd($request);
        $start = $request->start_date;
        $end = $request->to_date;

        $issued_items = DB::table('issue_item')
                    ->leftjoin('item', 'issue_item.item_code', '=', 'item.item_code')
                    ->select('issue_item.*', 'item.name as item_name')
                    ->whereBetween('issue_date', [$start, $end])
                    ->get();
//        dd($issued_items);
        return view('procurement/inventory/issue-register-report', compact('issued_items', 'start', 'end'));
    }

    public function getIssueReportItemWise()
    {
        $items = DB::table('issue_item')
            ->leftjoin('item', 'issue_item.item_code', '=', 'item.item_code')
            ->select('issue_item.*', 'item.name as item_name')
            ->get();
        return view('procurement/inventory/get-issue-register-report-itemwise', compact('items'));
    }

    public function getIssueResultItemWise(Request $request)
    {
//        dd($request->all());
        $start = $request->start_date;
        $end = $request->to_date;

        $issued_items = DB::table('issue_item')
            ->leftjoin('item', 'issue_item.item_code', '=', 'item.item_code')
            ->select('issue_item.*', 'item.name as item_name')
            ->where('issue_item.item_code', '=', $request->item_name)
            ->whereBetween('issue_date', [$start, $end])
            ->get();
//        dd($issued_items);
        return view('procurement/inventory/issue-register-report-itemwise', compact('issued_items', 'start', 'end'));

    }


}
