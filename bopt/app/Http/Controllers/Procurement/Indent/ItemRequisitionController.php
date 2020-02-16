<?php

namespace App\Http\Controllers\Procurement\Indent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Unit;
use App\Model\Masters\Item;
use App\Model\Indent\IndentItem;
use App\Model\Indent\RequisitionItem;
use App\Model\Masters\Institute;
use App\Department;

class ItemRequisitionController extends Controller
{
	public function getRequisitionItem()
	{
		$req_item_rs=DB::Table('requisition_item')
							->leftJoin('item','requisition_item.item_code','=','item.id')
							->leftJoin('units','requisition_item.unit_id','=','units.id')
							->leftJoin('employee','requisition_item.requisition_made_by','=','employee.emp_code')
							->select('requisition_item.*','item.name as item_name','units.name as unit_name', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
							->groupBy('requisition_no')
							->get();
							// dd($req_item_rs);
		return view('procurement/indent/requisition-item', compact('req_item_rs'));
	}

	public function viewRequisitionItem()
	{
		$item_rs = Item::where('status','=','active')->get();
		$unit_rs = Unit::where('unit_status','=','active')->get();
		// $institute_rs = Institute::where('institute_status','=','active')->get();
		$department_rs = Department::where('department_status','=','active')->get();
		return view('procurement/indent/add-new-requisition-item', compact('unit_rs','item_rs','department_rs'));
	}

	public function saveRequisitionItem(Request $request)
	{
//		 dd($request->all());
		$validator=Validator::make($request->all(),[
		'item_code'=>'required',
		'unit_id'=>'required',
		'quantity'=>'required',

		],
		[
		'item_code.required'=>'Item is  Required',
		'unit_id.required'=>'Unit is Required',
		'quantity.required'=>'Quantity is Required',

		]);

		if($validator->fails())
		{
			return redirect('procurement/indent/add-new-requisition-item')->withErrors($validator)->withInput();
		}



		$data=request()->except(['_token','item_code','item_type','unit_id','price','quantity','total']);
		$tot_item=count($request->item_code);
		//DB::enableQueryLog();
		/*$last_id=DB::Table('requisition_item')
				->orderBy('id DESC')
				->select('requisition_item.id')
				->get()->first();*/
		$last_id=RequisitionItem::orderBy('id', 'desc')->select('id')->get()->first();

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
		$req_no="PRC-".date('Y')."-".date('m')."-".$id;
		//echo $req_no;die;
		$requisition_item=new RequisitionItem();

        if(!empty($request->doc_upload)){
            $files = $request->file('doc_upload');
            $filename = $files->store('purchase_request_docs');
        }
        else{
            $filename = '';
        }


		for($i=0;$i<$tot_item;$i++)
		{

			$data['item_code'] = $request->item_code[$i];
			$data['item_type'] = $request->item_type[$i];
			$data['unit_id'] = $request->unit_id[$i];
			$data['price'] = $request->price[$i];
			$data['quantity'] = $request->quantity[$i];
			$data['total'] = $request->total[$i];
			$data['requisition_no'] = $req_no;
			$data['requisition_date'] = $request->request_date;
			$data['required_date'] = $request->required_date;
			$data['department_name'] = $request->department_name;
			$data['requisition_made_by'] = $request->empployee_id;
            $data['doc_upload'] = $filename;
			$data['status'] = 'Not Approved';
			$req_id=$requisition_item->create($data)->id;
		}

		//dd($req_id);
		Session::flash('message','Purchase request for Item Successfully Saved.');
		return redirect('procurement/indent/requisition-item');
	}

	public function editStatusRequisitionItem($id)
	{
		$comp_detail_rs=DB::Table('requisition_item')
				->where('requisition_item.requisition_no','=',$id)
				->update(array('status' => 'Approved'));

	return redirect('procurement/indent/requisition-item');
	}

	public function viewRequestItemById($requestNo)
	{
		$item_rs = Item::where('status','=','active')->get();
		$unit_rs = Unit::where('unit_status','=','active')->get();
		// // $institute_rs = Institute::where('institute_status','=','active')->get();
		$department_rs = Department::where('department_status','=','active')->get();
		// return view('procurement/indent/add-new-requisition-item', compact('unit_rs','item_rs','department_rs'));

		$items=DB::Table('requisition_item')
							->leftJoin('item','requisition_item.item_code','=','item.id')
							->leftJoin('units','requisition_item.unit_id','=','units.id')
							->leftJoin('employee','requisition_item.requisition_made_by','=','employee.emp_code')
							->select('requisition_item.*','item.name as item_name','units.name as unit_name', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
							->where('requisition_no', $requestNo)
							->get();
						// dd($items);

		return view('procurement/indent/edit-requisition-item', compact('items', 'item_rs', 'unit_rs', 'department_rs'));
	}

	public function editPurchaseRequestByIndentNo(Request $request)
	{
		// dd($request->all());

		RequisitionItem::where('requisition_no', $request->indent_no)->delete();

		$validator=Validator::make($request->all(),[
		'item_code'=>'required',
		'unit_id'=>'required',
		'quantity'=>'required',

		],
		[
		'item_code.required'=>'Item is  Required',
		'unit_id.required'=>'Unit is Required',
		'quantity.required'=>'Quantity is Required',

		]);

		if($validator->fails())
		{
			return redirect('procurement/indent/add-new-requisition-item')->withErrors($validator)->withInput();
		}


		$data=request()->except(['_token','item_code','item_type','unit_id','price','quantity','total']);
		$tot_item=count($request->item_code);

		$last_id=RequisitionItem::orderBy('id', 'desc')->select('id')->get()->first();


		if($last_id == '')
		{
		$id=1;
		}
		else
		{
		$id=$last_id->id+1;
		}
		$req_no="REQ-".date('Y')."-".date('m')."-".$id;
		//echo $req_no;die;
		$requisition_item=new RequisitionItem();

		for($i=0;$i<$tot_item;$i++)
		{

			$data['item_code'] = $request->item_code[$i];
			$data['item_type'] = $request->item_type[$i];
			$data['unit_id'] = $request->unit_id[$i];
			$data['price'] = $request->price[$i];
			$data['quantity'] = $request->quantity[$i];
			$data['total'] = $request->total[$i];
			$data['requisition_no'] = $req_no;
			$data['requisition_date'] = $request->request_date;
			$data['required_date'] = $request->required_date;
			$data['department_name'] = $request->department_name;
			$data['requisition_made_by'] = $request->empployee_id;
			$data['remarks'] = $request->remarks;
			$data['status'] = 'Not Approved';
			$req_id=$requisition_item->create($data)->id;
		}

		//dd($req_id);
		Session::flash('message','Purchase request for Item Successfully Updatd.');
		return redirect('procurement/indent/requisition-item');
	}

	public function viewRequisitionItemByPR($req_no)
    {
//        dd($req_no);

//        $req_items = DB::table('requisition_item')->where('requisition_item.requisition_no', $req_no)
//            ->leftJoin('item','requisition_item.item_code','=','item.item_code')
//            ->leftJoin('unit','requisition_item.unit_id','=','unit.id')
//            ->leftJoin('stock_masters','requisition_item.item_code','=','stock_masters.item_id')
//            ->leftJoin('stock_opening','requisition_item.item_code','=','stock_opening.item_id')
//            ->select('requisition_item.*', 'item.name as item_name', 'unit.unit_name as unit_name', 'stock_masters.closing_balance as avl_bal', 'stock_opening.closing_stock as avl_closing_bal')
//            // ->groupBy('purchase_order_no')
//            ->get();
//        dd($req_items);
        $req_items = DB::table('requisition_item')
            ->leftJoin('item','requisition_item.item_code','=','item.item_code')
            ->leftJoin('unit','requisition_item.unit_id','=','unit.id')
            ->where('requisition_item.requisition_no', $req_no)
            ->select('requisition_item.*', 'item.name as item_name', 'unit.unit_name as unit_name')
            // ->groupBy('purchase_order_no')
            ->get();
//        dd($req_items);

        foreach ($req_items as $req_item)
        {
            $available_balance = DB::table('stock_masters')
                        ->where('item_id', '=', $req_item->item_code)
                        ->select('closing_balance')
                        ->orderByDesc('id')
                        ->first();

            if (empty($available_balance->closing_balance))
            {
                $avl_bal = DB::table('stock_opening')
                    ->where('item_id', '=', $req_item->item_code)
                    ->select('closing_stock')
                    ->first();
//                dd($avl_bal);
                $closing_stock = $avl_bal->closing_stock;
            }
            else{
                $closing_stock = $available_balance->closing_balance;
            }

            $data['results'][]= array("req_no"=>$req_item->requisition_no,"itemname"=>$req_item->item_name,"avl_bal"=>$closing_stock,"proposed_qty"=>$req_item->quantity,"rate_price"=>$req_item->price,"total_price"=>$req_item->total);
        }
//        echo "<pre>"; print_r($data['results']); exit;
        return view('procurement/indent/requisition-item-report', $data);
    }
	
	public function addRequisitionByItemId($id)
	{
		$item_rs = Item::leftjoin('unit', 'item.unit_id', '=', 'unit.id')
				->where('status','=','active')
				->where('item_code', '=', $id)
				->select('item.*', 'unit.unit_name')
				->first();
		// dd($item_rs);
		// $unit_rs = Unit::where('unit_status','=','active')->get();
		// $institute_rs = Institute::where('institute_status','=','active')->get();
		$department_rs = Department::where('department_status','=','active')->get();
		return view('procurement/indent/add-requisition-itemwise', compact('item_rs','department_rs'));
	}

	public function saveRequisitionByItemId(Request $request)
	{
				//  dd($request->all());
		$validator=Validator::make($request->all(),[
			'item_code'=>'required',
			'unit_id'=>'required',
			'quantity'=>'required',
	
			],
			[
			'item_code.required'=>'Item is  Required',
			'unit_id.required'=>'Unit is Required',
			'quantity.required'=>'Quantity is Required',
	
			]);
	
			if($validator->fails())
			{
				return redirect('procurement/indent/add-new-requisition-item')->withErrors($validator)->withInput();
			}
	
	
	
			$data=request()->except(['_token','item_code','item_type','unit_id','price','quantity','total']);
			$tot_item=count($request->item_code);
			//DB::enableQueryLog();
			/*$last_id=DB::Table('requisition_item')
					->orderBy('id DESC')
					->select('requisition_item.id')
					->get()->first();*/
			$last_id=RequisitionItem::orderBy('id', 'desc')->select('id')->get()->first();
	
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
			$req_no="PRC-".date('Y')."-".date('m')."-".$id;
			//echo $req_no;die;
			$requisition_item=new RequisitionItem();
	
			if(!empty($request->doc_upload)){
				$files = $request->file('doc_upload');
				$filename = $files->store('purchase_request_docs');
			}
			else{
				$filename = '';
			}
	
	
			for($i=0;$i<$tot_item;$i++)
			{
	
				$data['item_code'] = $request->item_code[$i];
				$data['item_type'] = $request->item_type[$i];
				$data['unit_id'] = $request->unit_id[$i];
				$data['price'] = $request->price[$i];
				$data['quantity'] = $request->quantity[$i];
				$data['total'] = $request->total[$i];
				$data['requisition_no'] = $req_no;
				$data['requisition_date'] = $request->request_date;
				$data['required_date'] = $request->required_date;
				$data['department_name'] = $request->department_name;
				$data['requisition_made_by'] = $request->empployee_id;
				$data['doc_upload'] = $filename;
				$data['remarks'] = $request->remarks;
				$data['status'] = 'Not Approved';
				$req_id=$requisition_item->create($data)->id;
			}
	
			//dd($req_id);
			Session::flash('message','Purchase request for Item Successfully Saved.');
			return redirect('procurement/indent/requisition-item');
	}
}
