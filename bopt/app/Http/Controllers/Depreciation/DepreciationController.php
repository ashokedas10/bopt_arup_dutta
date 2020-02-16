<?php

namespace App\Http\Controllers\Depreciation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DepreciationController extends Controller
{
    public function viewDepreciationData()
    {
        
        return view('depreciation/get-asset-list');
    }

    public function populateDepreciationData(Request $request)
    {

        $getyear_range = explode("-",$request->financial_year);
		$start_year=date("$getyear_range[0]-04-01");
        $end_year=date("$getyear_range[1]-03-31");

        $asset_lists = DB::table('asset_masters')->get();
    
        foreach($asset_lists as $key=>$asset_list)
        {
           
            $addition = DB::table('voucher_entry')
                ->select(DB::raw('sum(payable_amt) as total_amt'))
                ->where('bill_status', '=', 'Paid')
                ->where('account_head_id', 'LIKE', $asset_list->account_code.'%')
                ->whereBetween('bill_booking_date',[$start_year,$end_year])
                ->get();

            if(empty($addition[0]->total_amt)){
                $total=0;
            }else{
                $total=$addition[0]->total_amt;
            }
            //$gross_closing_balance= 0+$total;
        
            $data['result'][]=array('asset_code'=>$asset_lists[$key]->account_code,'asset_name'=>$asset_lists[$key]->head_name, 'gross_opening_balance'=>0, 'gross_addition'=>$total, 'depreciation_opening_balance'=>0);
            
        }

        return view('depreciation/get-asset-list', $data);
    }



    public function saveDepreciationData(Request $request)
    {
        if($request->has('savedata')){
           //echo "<pre>"; print_r($request->all()); exit;
            foreach($request->asset_code as $key=>$value)
            {
                DB::table('depreciation_master')->insert(
                ['assets_code' => $value,'gross_addition' => $request->gross_addition[$key], 'gross_deduction' => $request->gross_deduction[$key] ,'gross_closingbalance' =>  $request->gross_closingbalance[$key], 'depreciation' =>  $request->depreciation[$key] , 'depreciation_deduction' =>  $request->depreciation_deduction[$key] ,'netclosing_balance' =>  $request->netclosing_balance[$key] ,'created_at' => date("Y-m-d H:i:s")]
                ); 
            }
        }
        
        return redirect('depreciation/show-table');
    }


    public function depreciationReportView()
    {
        
        return view('depreciation/vw-depreciation');
    }


    public function depreciationReport(Request $request)
    {
        $getyear_range = explode("-",$request->financial_year);
        $start_year=date("$getyear_range[0]-04-01");
        $end_year=date("$getyear_range[1]-03-31");

        $data['land'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/001%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();

        $data['buildings'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/003%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();


        $data['roads'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/004%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();
                                    

        $data['tubewells'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/005%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();
                                    
        $data['sewerage'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/006%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();
                                    
        $data['electrical'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/007%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();
                                    
        $data['plant'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/008%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();
                                    
        $data['office_equipment'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/010%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();

        $data['audio'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/011%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();
                                    
        $data['computer'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/012%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();

        $data['furniture'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/013%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();

        $data['vehicles'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/014%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();
                                    
        $data['lib_books'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/015%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();
                                    
        $data['small_value_assets'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/016%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();                                                                                                                  
        $data['capital_work'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/017%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();

         $data['computer_software'] = DB::table('depreciation_master')
                                    ->where('assets_code', 'LIKE', '04/018%')
                                    ->whereBetween('created_at',[$start_year,$end_year])
                                    ->first();                                                                                                                                                                                            

        $data['start_year']=$getyear_range[0];
        $data['end_year']=$getyear_range[1];
        //echo "<pre>"; print_r($data['depreciation_lists']); exit;
           
        return view('depreciation/depreciation-report',$data);
    }


}
