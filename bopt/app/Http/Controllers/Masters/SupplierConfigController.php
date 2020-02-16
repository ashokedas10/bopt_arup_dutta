<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Supplier;
use Illuminate\Support\Facades\DB;
use App\Model\Masters\SupplierConfig;
use Validator;
use Session;

class SupplierConfigController extends Controller
{
    //
	public function getSupplierConfig()
	{
		$supplier_config_rs=DB::Table('supplier_config')
							->leftJoin('supplier','supplier_config.supplier_code','=','supplier.supplier_code')
							->leftJoin('cost_centre','supplier_config.cost_centre_code','=','cost_centre.cost_centre_code')
							->select('supplier_config.*','supplier.supplier_name','cost_centre.cost_centre_name')
							->get();
		return view('masters/view-supplier-config', compact('supplier_config_rs'));
	}
	
	public function viewSupplierConfig()
	{
		$supplier_rs = Supplier::where('supplier_status','active')->get();
		$cost_centre_rs = DB::Table('cost_centre')->get();
		return view('masters/supplier-config', compact('supplier_rs','cost_centre_rs'));
	}
	
	public function saveSupplierConfig(Request $request)
	{
		$validator=Validator::make($request->all(),[
		'supplier_code'=>'required',
		'cost_centre_code'=>'required'
		],
		[
		'supplier_code.required'=>'Supplier Name Required',
		'cost_centre_code.required'=>'Location Required'
		]);
		
		if($validator->fails())
		{
			return redirect('masters/supplier-config')->withErrors($validator)->withInput();
			
		}
		$data = $request->all();
		$data=request()->except(['_token'],['cost_centre_code']);
		$len = count($request->cost_centre_code);
		//dd($len);
		DB::beginTransaction();
		try 
		{
			$supplierconfig=new SupplierConfig();
			for($i=0;$i<$len;$i++)
			{
				$data['cost_centre_code'] = $request->cost_centre_code[$i];//dd($data);
				$supplierconfig->create($data);
			}
			DB::commit();
			Session::flash('message','Supplier Configuration Information Successfully Saved.');
		} 
		catch (\Exception $e) 
		{
			DB::rollback();
			Session::flash('message','Supplier Configuration Information not Saved.');
		}
		
		return redirect('masters/vw-supplier-config');
	}
}
