<?php

namespace App\Http\Controllers\Procurement\Indent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Admission\Batch;
use App\Model\Masters\Unit;
use App\Model\Masters\Item;
use App\Model\Indent\IndentItem;
use App\Model\Masters\Institute;
use App\Department;

class ItemIndentController extends Controller
{
	public function getIndentItem()
	{
		// $indent_item_rs=DB::Table('indent_item')
		// 				->leftJoin('item','indent_item.item_id','=','item.id')
		// 				->leftJoin('units','indent_item.unit_id','=','units.id')
		// 				->leftJoin('employee','indent_item.indent_made_by','=','employee.emp_code')
		// 				->select('indent_item.*','item.name as item_name','units.name as unit_name', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
		// 				->get();
						// dd($indent_item_rs);

		$indent_item_rs=DB::Table('indent_item')
						// ->leftJoin('item','indent_item.item_id','=','item.id')
						// ->leftJoin('units','indent_item.unit_id','=','units.id')
						->leftJoin('employee','indent_item.indent_made_by','=','employee.emp_code')
						->select(DB::raw('indent_item.id, indent_item.indent_no, SUM(indent_item.required_qty) as required_qty, indent_item.department_name, indent_item.indent_date, indent_item.required_date, indent_item.status, employee.emp_fname, employee.emp_mname, employee.emp_lname'))
						->groupBy('indent_no')
						->get();
						// dd($indent_item_rs);
		return view('procurement/indent/indent-item', compact('indent_item_rs'));
	}

	public function getApprovedIndentItem()
	{
		$indent_item_rs=DB::Table('indent_item')
						// ->leftJoin('item','indent_item.item_id','=','item.id')
						// ->leftJoin('units','indent_item.unit_id','=','units.id')
						->leftJoin('employee','indent_item.indent_made_by','=','employee.emp_code')
						->select(DB::raw('indent_item.id, indent_item.indent_no, SUM(indent_item.required_qty) as required_qty, indent_item.department_name, indent_item.indent_date, indent_item.required_date, indent_item.status, employee.emp_fname, employee.emp_mname, employee.emp_lname'))
						->where('indent_item.status', 'not approved')
						->groupBy('indent_no')
						->get();
						 // dd($indent_item_rs);

		return view('procurement/indent/approve-indent-item', compact('indent_item_rs'));
	}

	public function viewIndentItemByIndentNo($indent_no)
	{
		$items=DB::Table('indent_item')
						->leftJoin('item','indent_item.item_id','=','item.item_code')
						->leftJoin('units','indent_item.unit_id','=','units.id')
						->leftJoin('employee','indent_item.indent_made_by','=','employee.emp_code')
						->select('indent_item.*','item.name as item_name', 'item.item_code as item_code', 'units.name as unit_name', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
						->where('indent_item.indent_no', $indent_no)
						->get();
						// dd($items);

		$item_rs = Item::where('status','=','active')->get();
//		 dd($item_rs);
		$unit_rs = Unit::where('unit_status','=','active')->get();
		// $institute_rs = Institute::where('institute_status','=','active')->get();
		$department_rs = Department::where('department_status','=','active')->get();

		return view('procurement/indent/view-indent-item', compact('items', 'item_rs', 'unit_rs', 'department_rs'));
	}

	public function saveIndentItemByIndentNo(Request $request)
	{
		// dd($request->all());
		IndentItem::where('indent_no', $request->indent_no)->delete();

		$validator=Validator::make($request->all(),[
			'status'=>'required'
		]);


		$tot_item=count($request->item_code);

		$data=request()->except(['_token','id','item_code','item_type','unit_id','required_qty','approved_qty','rejected_qty']);

		$indent_no = $request->indent_no;
		$indent_item=new IndentItem();
		for($i=0;$i<$tot_item;$i++)
		{
			$data['indent_no'] = $indent_no;
			$data['item_id'] = $request->item_code[$i];
			$data['item_type'] = $request->item_type[$i];
			$data['unit_id'] = $request->unit_id[$i];
			$data['required_qty'] = $request->required_qty[$i];
			$data['approved_qty'] = $request->approved_qty[$i];
			$data['rejected_qty'] = $request->rejected_qty[$i];
			$data['status'] = $request->status[$i];
			$data['department_name'] = $request->department_name;
			$data['indent_made_by'] = $request->empployee_id;
			$data['indent_date'] = $request->indent_date;
			$data['required_date'] = $request->required_date;

			$indent_item->create($data);
		}



			Session::flash('message','Information Successfully Updated.');
			return redirect('procurement/indent/approve-indent-item');


		// IndentItem::where('indent_no', $request->indent_no)->update(['status' => $request->status, ]);

		return redirect('procurement/indent/indent-item');
	}

	public function viewIndentItem()
	{
		$item_rs = Item::where('status','=','active')->get();
		// dd($item_rs);
		$unit_rs = Unit::where('unit_status','=','active')->get();
		// $institute_rs = Institute::where('institute_status','=','active')->get();
		$department_rs = Department::where('department_status','=','active')->get();
		return view('procurement/indent/add-new-indent-item', compact('unit_rs','item_rs','department_rs'));
	}

	public function getIndentItemById($indent_no)
	{
		$items=DB::Table('indent_item')
				->leftJoin('item','indent_item.item_id','=','item.item_code')
				->leftJoin('units','indent_item.unit_id','=','units.id')
				->leftJoin('employee','indent_item.indent_made_by','=','employee.emp_code')
				->select('indent_item.*','item.name as item_name','units.name as unitname', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
				->where('indent_item.indent_no', $indent_no)
				->get();
		// dd($items);
		$item_rs = Item::where('status','=','active')->get();
		// dd($unit_rs);
		$unit_rs=Unit::where('unit_status','=','active')->get();
		// dd($unit_rs);
		$department_rs = Department::where('department_status','=','active')->get();
		return view('procurement/indent/edit-indent-item', compact('unit_rs','items','department_rs', 'item_rs'));
	}

	public function editIndentItemByIndentNo(Request $request)
	{

		// dd($request->all());
		// echo"<pre>"; print_r($request->all()); exit;
		IndentItem::where('indent_no', $request->indent_no)->delete();

		$validator=Validator::make($request->all(),[
			'item_code'=>'required',
			'item_type'=>'required',
			'unit_id'=>'required',
			'required_qty'=>'required',
			'department_name'=>'required',
			'indent_date'=>'required'
			],
			[
			'item_code.required'=>'Item is  Required',
			'item_type.required'=>'Item Type is  Required',
			'unit_id.required'=>'Unit is Required',
			'required_qty.required'=>'Quantity is Required',
			'department_name.required'=>'Department is Required',
			'indent_date.required'=>'Indent Date is required'
			]);

			if($validator->fails())
			{
				return redirect('procurement/indent/add-new-indent-item')->withErrors($validator)->withInput();
			}

			$data=request()->except(['_token','id','item_code','item_type','unit_id','required_qty']);

			$tot_item=count($request->item_code);
			$indent_no = $request->indent_no;
			$indent_item=new IndentItem();
			for($i=0;$i<$tot_item;$i++)
			{
				$data['indent_no'] = $indent_no;
				$data['item_id'] = $request->item_code[$i];
				$data['item_type'] = $request->item_type[$i];
				$data['unit_id'] = $request->unit_id[$i];
				$data['required_qty'] = $request->required_qty[$i];
				$data['approved_qty'] = $request->approved_qty[$i];
				$data['department_name'] = $request->department_name;
				$data['indent_made_by'] = $request->empployee_id;
				$data['indent_date'] = $request->indent_date;
				$data['required_date'] = $request->required_date;
				$data['status'] = 'not approved';
				$indent_item->create($data);
			}



			Session::flash('message','Information Successfully Updated.');
			return redirect('procurement/indent/indent-item');

	}

	public function saveIndentItem(Request $request)
	{
		// echo "<pre>";print_r($request->all()); exit;
		// dd($request->all());
		if(empty($request->id))
		{
			//
			$validator=Validator::make($request->all(),[
			'item_code'=>'required',
			'item_type'=>'required',
			'unit_id'=>'required',
			'required_qty'=>'required',
			'department_name'=>'required',
			'indent_date'=>'required'
			],
			[
			'item_code.required'=>'Item is  Required',
			'item_type.required'=>'Item Type is  Required',
			'unit_id.required'=>'Unit is Required',
			'required_qty.required'=>'Quantity is Required',
			'department_name.required'=>'Department is Required',
			'indent_date.required'=>'Indent Date is required'
			]);

			if($validator->fails())
			{
				return redirect('procurement/indent/add-new-indent-item')->withErrors($validator)->withInput();
			}


			//dd($data);
			$data=request()->except(['_token','item_code','item_type','unit_id','required_qty']);
			// dd($data);
			$tot_item=count($request->item_code);
			// $last_id=IndentItem::orderBy('id', 'desc')->select('id')->get()->first();

			//echo $last_id;die;
			//dd(DB::getQueryLog());
			// if($last_id == '')
			// {
			// $id=1;
			// }
			// else
			// {
			// $id=$last_id->id+1;
			// }
			$indent_no="BOPT-INDE-".time();


			//echo $tot_component;die;
			$indent_item=new IndentItem();
			for($i=0;$i<$tot_item;$i++)
			{

				$data['indent_no'] = $indent_no;
				$data['item_id'] = $request->item_code[$i];
				$data['item_type'] = $request->item_type[$i];
				$data['unit_id'] = $request->unit_id[$i];
				$data['required_qty'] = $request->required_qty[$i];
				$data['approved_qty'] = $request->required_qty[$i];
				$data['department_name'] = $request->department_name;
				$data['indent_made_by'] = $request->empployee_id;
				$data['indent_date'] = $request->indent_date;
				$data['required_date'] = $request->required_date;
				$data['status'] = 'not approved';

				// dd($data);
				$indent_item->create($data);
			}
			Session::flash('message','Indent Of Item Successfully Saved.');
		}
		else
		{


			//$data2=request()->except(['_token']);

			$data2['item_id'] = $request->item_code['0'];
			$data2['item_type'] = $request->item_type['0'];
			$data2['unit_id'] = $request->unit_id['0'];
			$data2['required_qty'] = $request->required_qty['0'];
			$data2['department_name'] = $request->department_name;
			$data2['indent_made_by'] = $request->empployee_id;
			$data2['indent_date'] = $request->indent_date;
			$data2['required_date'] = $request->required_date;
			$data2['status'] = 'active';

			IndentItem::where('id', $request->id)->update($data2);

			Session::flash('message','Information Successfully Updated.');
		}



		return redirect('procurement/indent/indent-item');
	}

	public function viewIndentReport($indentno)
	{
		$data['indent_item'] = IndentItem::where('indent_no', $indentno)
					->leftJoin('item','indent_item.item_id','=','item.item_code')
					->leftJoin('units','indent_item.unit_id','=','units.id')
					->leftJoin('employee','indent_item.indent_made_by','=','employee.emp_code')
					->select('indent_item.*','item.name as item_name','units.name as unitname', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
					->where('indent_item.status', 'approved')
					->get();

//		 dd($data);

		return view('procurement/indent/indent-item-report', $data);
	}
}
