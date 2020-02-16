<?php

namespace App\Http\Controllers\Procurement\Inventory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use Validator;
use App\Model\Masters\Component;
use App\Model\Purchase\GrnComponent;
use App\Model\Inventory\ReceiveComponent;
use App\Model\Inventory\StockComponent;


class ComponentReceiveController extends Controller
{
	public function getComponentReceive()
	{
		DB::enableQueryLog();
		$rcv_comp_rs=DB::Table('stock_of_component')
						->leftJoin('component','stock_of_component.component_id','=','component.id')
						->leftJoin('unit','component.unit_id','=','unit.id')
						->select('stock_of_component.*','component.component_name','component.component_type','unit.unit_name')
						->get();
		//dd(DB::getQueryLog());
		//dd($po_comp_rs);
		return view('procurement/inventory/receive-component', compact('rcv_comp_rs'));
	}
	
	public function viewComponentReceive()
	{
		$grn_rs = GrnComponent::where('status','=','open')->groupBy('grn_no')->get(); 
		return view('procurement/inventory/add-receive-component', compact('grn_rs'));
	}
	
	public function saveComponentReceive(Request $request)
	{
			$grn_no = request()->grn_no;
			$data=request()->except(['_token','component_id','unit_id','opening_stock','receive_stock','closing_stock','rcv_date']);
			$tot_comp=count($request->component_id);
			//DB::enableQueryLog();
			
			$last_id=ReceiveComponent::orderBy('id', 'desc')->select('id')->get()->first();
			
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
			$receive_no="RCV-C-".date('Y')."-".$id;
			//echo $req_no;die;
			$receive_comp=new ReceiveComponent();
			$stock_comp=new StockComponent();
			
			for($i=0;$i<$tot_comp;$i++)
			{
				$comp_id = $request->component_id[$i];
				/*$data['component_id'] = $comp_id = $request->component_id[$i];
				$data['unit_id'] = $request->unit_id[$i];
				$data['opening_stock'] = $opening_stock = $request->opening_stock[$i];
				$data['receive_stock'] = $receive_stock = $request->receive_stock[$i];
				$data['closing_stock'] = $closing_stock = $request->closing_stock[$i];
				$data['rcv_date'] = $request->rcv_date[$i];
				$data['receive_no'] = $receive_no;
				$receive_comp->create($data);*/
				
				$data1['component_id'] = $request->component_id[$i];
				$data1['opening_balance'] = $opening = $request->opening_stock[$i];
				$data1['receive_balance'] = $receive = $request->receive_stock[$i];
				$data1['issue_balance'] = $issue = 0;
				$data1['rcv_date'] = $request->rcv_date[$i];
				$data1['closing_balance'] = ($opening + $receive - $issue); 
				$stock_comp->create($data1);
				
				
				$data2['status'] = $status = 'close';
				
				//DB::enableQueryLog();
				$upd_indent= DB::Table('grn_component')
							->where('grn_no','=',$grn_no)
							->where('component_id','=',$comp_id)
							->update(array('status' => $status));
				//dd(DB::getQueryLog());

		}
		
		//dd($data);
		Session::flash('message','Receive Of Component Successfully Saved.');
		return redirect('procurement/inventory/receive-component');
	}
}
