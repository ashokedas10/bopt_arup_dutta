<?php

namespace App\Http\Controllers\Procurement\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Component;
use App\Model\Indent\IndentComponent;
use App\Model\Inventory\IssueComponent;
use App\Model\Inventory\StockComponent;


class ComponentIssueController extends Controller
{
	public function getComponentIssue()
	{
		DB::enableQueryLog();
		$issue_comp_rs=DB::Table('issue_component')
						->leftJoin('component','issue_component.component_id','=','component.id')
						->leftJoin('unit','issue_component.unit_id','=','unit.id')
						->select('issue_component.*','component.component_name','unit.unit_name')
						->get();
		//dd(DB::getQueryLog());
		//dd($po_comp_rs);
		return view('procurement/inventory/issue-register-component', compact('issue_comp_rs'));
	}
	
	public function viewComponentIssue()
	{
		$indent_rs = IndentComponent::where('status','=','active')->groupBy('indent_no')->get(); 
		return view('procurement/inventory/add-issue-register-component', compact('indent_rs'));
	}
	
	public function saveComponentIssue(Request $request)
	{
			$indent_no = request()->indent_no;
			$data=request()->except(['_token','component_id','unit_id','opening_stock','indent_required_qty','issue_qty','issue_date']);
			$tot_comp=count($request->component_id);
			//DB::enableQueryLog();
			
			$last_id=IssueComponent::orderBy('id', 'desc')->select('id')->get()->first();
			
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
			$issue_no="ISSUE-C-".date('Y')."-".$id;
			//echo $req_no;die;
			$issue_comp=new IssueComponent();
			$stock_comp=new StockComponent();
			
			for($i=0;$i<$tot_comp;$i++)
			{
				
				$data['component_id'] = $comp_id = $request->component_id[$i];
				$data['unit_id'] = $request->unit_id[$i];
				$data['opening_stock'] = $request->opening_stock[$i];
				$data['indent_required_qty'] = $r_qty = $request->indent_required_qty[$i];
				$data['issue_qty'] = $issue_qty = $request->issue_qty[$i];
				$data['issue_date'] = $request->issue_date[$i];
				$data['issue_no'] = $issue_no;
				$issue_comp->create($data);
				
				$data1['component_id'] = $request->component_id[$i];
				$data1['opening_balance'] = $opening = $request->opening_stock[$i];
				$data1['receive_balance'] = $receive = 0;
				$data1['issue_balance'] = $issue = $request->issue_qty[$i];
				$data1['rcv_date'] = $request->issue_date[$i];
				$data1['closing_balance'] = ($opening + $receive - $issue); 
				$stock_comp->create($data1);
				
				if($r_qty == $issue_qty)
				{
					$data2['status'] = $status = 'close';
				}
				
				//DB::enableQueryLog();
				$upd_indent= DB::Table('indent_component')
							->where('indent_no','=',$indent_no)
							->where('component_id','=',$comp_id)
							->update(array('status' => $status));
				//dd(DB::getQueryLog());

		}
		
		//dd($data);
		Session::flash('message','Issue Of Component Successfully Saved.');
		return redirect('procurement/inventory/issue-register-component');
	}
}
