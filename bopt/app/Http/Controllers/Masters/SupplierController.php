<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Masters\Supplier;
use App\Model\Masters\State;
use App\Model\Masters\District;
use DB;
use Validator;
use Session;

class SupplierController extends Controller
{
    //
	public function getSupplier()
	{
		$supplier_rs=DB::table('supplier')
						//->leftjoin('state_master', 'state_master.id', '=', 'supplier.supplier_state')
						//->leftjoin('district_master', 'district_master.id', '=', 'supplier.supplier_district')
						//->select('supplier.*', 'state_master.state_name', 'district_master.name')
						->get();
						
		// $states = State::all();
		// $districts = District::all();
		return view('masters/view-supplier',compact('supplier_rs'));
	}
	
	public function viewSupplier()
	{
		$data['states'] = State::all();
		$data['districts'] = District::all();
		return view('masters/supplier', $data);
	}

	public function getSupplierById($id)
	{
		$data['supplier'] = Supplier::findOrFail($id);
		// dd($supplier);
		$data['states'] = State::all();
		$data['districts'] = District::all();

		return view('masters/supplier', $data);
	}
	
	public function saveSupplier(Request $request)
	{ 
		// dd($request);
		if(empty($request->id))
		{
			// $validator=Validator::make($request->all(),[
			// 'supplier_code'=>'required|unique:supplier',
			// 'supplier_name'=>'required',
			// 'supplier_business_name'=>'required',
			// 'supplier_gstin'=>'required|unique:supplier',
			// 'pan_no'=>'required|unique:supplier',
			// 'supplier_email' => 'required',
			// 'supplier_mobile'=>'required',
			// 'supplier_state'=>'required',
			// 'supplier_district'=>'required',
			// 'supplier_country'=>'required',
			// ],
			// [
			// 'supplier_code.required'=>'Supplier Code Required',
			// 'supplier_code.unique'=>'Supplier Code should be Unique',
			// 'supplier_name.required'=>'Supplier Name Required',
			// 'supplier_business_name.required'=>'Supplier Business Name Required',
			// 'supplier_gstin.required'=>'Supplier GSTIN Required',
			// 'supplier_gstin.unique'=>'Supplier GST NO should be Unique',
			// 'pan_no.required'=>'Supplier PAN NO Required',
			// 'pan_no.unique'=>'Supplier PAN NO should be Unique',
			// 'supplier_email.required'=>'Supplier Email Required',
			// 'supplier_mobile.required'=>'Supplier Mobile Required',
			// 'supplier_state.required'=>'Supplier State Required',
			// 'supplier_district.required'=>'Supplier District Required',
			// 'supplier_country.required'=>'Supplier Country Required',
			
			
			
			// ]);
			
			// if($validator->fails())
			// {
			// 	return redirect('masters/supplier')->withErrors($validator)->withInput();
				
			// }

		
			$data = $request->all();
			$data=request()->except(['_token']);
			$data['supplier_status'] = 'active';
			$data['supplier_created_date'] = date('Y-m-d');
			// dd($data);
			$supplier=new Supplier();
			$supplier->create($data);

			Session::flash('message','Supplier Information Successfully Saved.');
		}
		else
		{
			$data2 = $request->all();
			$data2=request()->except(['_token']);

			$data2['supplier_status'] = 'active';

			Supplier::where('id', $request->id)->update($data2);

			Session::flash('message','Supplier Information Successfully Updated.');
		}
		
		return redirect('masters/vw-supplier');
	}
}
