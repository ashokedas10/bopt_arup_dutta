<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Masters\GeneralLedger;
use View;
use Validator;
use Session;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class GeneralLedgerController extends Controller
{
    

    public function ledgerListing()
	{
		$email = Auth::user()->email;
	   	$data['Roledata']=DB::table('role_authorization')      
	    ->join('module', 'role_authorization.module_name', '=', 'module.id')
	    ->join('sub_module', 'role_authorization.sub_module_name', '=', 'sub_module.id')
	    ->join('module_config', 'role_authorization.menu', '=', 'module_config.id')
	    ->select('role_authorization.*', 'module.module_name', 'sub_module.sub_module_name', 'module_config.menu_name')
	    ->where('member_id','=',$email) 
	    ->get();
		try {			
			$data['ledgerlisting']  = GeneralLedger::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/ledgerlist',$data);
	}
	

	public function viewLedger()
	{
		try {			
			//$data['coalisting']  = Coa::all();
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
		return view('masters/vw-ledger');
	}


	public function saveLedger(Request $request){
			
		try{	
			
			$number_range_check = DB::select( DB::raw("SELECT * FROM `coa_master` WHERE `account_grp`='".$request->asset_grp."' AND '".trim($request->gl_code)."' BETWEEN `coa_min_number` AND `coa_max_number`") );
		
			if(empty($number_range_check)){

				$request->session()->flash('status','success');
				$request->session()->flash('message','Please check your general ledger range');
				return redirect('masters/ledgers');
			}

			$generalledger = new GeneralLedger();
			$data['asset_grp']= $request->asset_grp;
			$data['gl_code'] = $request->gl_code;
			$data['gl_name'] = $request->gl_name;
			$data['gl_type'] = $request->gl_type;
			$data['gl_description'] = $request->gl_description;

			if(empty($request->id)){
				$number_check=DB::table('ledger_master')
				->where('gl_code','=',trim($request->gl_code))
				->first();

				if(empty($number_check)){
					$generalledger->create($data);
					$request->session()->flash('status','success');
					$request->session()->flash('message','Record successfully added!');
					
				}else{
					$request->session()->flash('status','success');
					$request->session()->flash('message','General ledger code alredy Exists');
					
				}

			}else{

				$number_check=DB::table('ledger_master')
				->where('gl_code','=',trim($request->gl_code))
				->where('id','!=',$request->id)
				->first();

				if(empty($number_check)){

					DB::table('ledger_master')
        			->where('id', '=', $request->id)
        			->update(['gl_code' => $data['gl_code'],'gl_name' => $data['gl_name'],'gl_type' => $data['gl_type'],'gl_description' => $data['gl_description']]);
					$request->session()->flash('status','success');
					$request->session()->flash('message','Record Updated successfully!');

				}else{
					$request->session()->flash('status','success');
					$request->session()->flash('message','General ledger code alredy Exists');
					
				}
			}	
			
		}catch(Exception $e){

			$request->session()->flash('status','error');
			$request->session()->flash('message','Some error occured');
		}
		return redirect('masters/ledgers');
	}

	/*
	* update Department view
	* created on: 27-07-2016
	*/
	public function getLedgerById($ledger_id){

		try{
			
			$data['ledger_details']= GeneralLedger::find($ledger_id);		
			
		}catch(Exception $e){
			return $e->getMessage();
		}

		return view('masters/vw-ledger',$data);
	}
		
}
