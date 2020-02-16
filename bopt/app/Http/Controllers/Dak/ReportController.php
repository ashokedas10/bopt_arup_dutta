<?php
namespace App;
namespace App\Http\Controllers\Dak;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Department;
use App\Employee;
use Validator;
use Session;
use View;

class reportController extends Controller
{
    
    public function getDairyRange()
    {
      return view('dak/diary-range-view');
    }


    public function getDairyReport(Request $request)
  	{
      $todate = explode('/', $request->to_date);
      $final_to_date=$todate[2].'-'.$todate[1].'-'.$todate[0];

      $fromdate = explode('/', $request->from_date);
      $final_from_date=$fromdate[2].'-'.$fromdate[1].'-'.$fromdate[0];

  		$data['receipt_details']=DB::table('dak_receipt_details')
      ->where('diary_date','>=',$final_to_date)
      ->where('diary_date','<=',$final_from_date)
      ->get();
      //echo "<pre>"; print_r($data['receipt_details']); exit;
      $data['to_date']=$request->to_date;
      $data['from_date']=$request->from_date;
  		return view('dak/diary-register-report', $data);
  	}


    public function getForwordRange()
    {
      
      return view('dak/forward-range-view');
    }

    public function getForwardReport(Request $request)
    {

      $todate = explode('/', $request->to_date);
      $final_to_date=$todate[2].'-'.$todate[1].'-'.$todate[0];

      $fromdate = explode('/', $request->from_date);
      $final_from_date=$fromdate[2].'-'.$fromdate[1].'-'.$fromdate[0];

      $data['forward_details']=DB::table('dak_receipt_details')
      ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
      ->join('employee', 'dak_forward_details.emp_id', '=', 'employee.emp_code')
      ->select('dak_receipt_details.*', 'dak_forward_details.dak_status', 'dak_forward_details.created_at as forwarddate', 'dak_forward_details.dak_forward_no', 'dak_forward_details.id as forward_id' , 'dak_forward_details.deptment_id', 'dak_forward_details.emp_id','employee.emp_fname','employee.emp_mname','employee.emp_lname')
      ->whereDate('dak_forward_details.created_at', '>=', $final_to_date)
      ->whereDate('dak_forward_details.created_at', '<=', $final_from_date)
      //->where('dak_forward_details.created_at','>=',$final_to_date)
      //->where('dak_forward_details.created_at','<=',$final_from_date)
      ->get();
      // echo "<pre>"; print_r($data['forward_details']); exit;
      $data['to_date']=$request->to_date;
      $data['from_date']=$request->from_date;
      return view('dak/forwarded-report', $data);
    } 
	
	public function getDakHistoryReport()
    {
        $dak_receipts = DB::table('dak_receipt_details')->get();
        return view('dak/view-dak-history', compact('dak_receipts'));
    }

    public function viewDakHistoryReport(Request $request)
    {

        $dak_details = DB::table('dak_receipt_details')
                ->leftJoin('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
                ->leftJoin('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
                ->leftJoin('employee', 'dak_forward_details.emp_id', '=', 'employee.emp_code')
                ->select('dak_receipt_details.*', 'dak_forward_details.dak_status', 'dak_forward_details.created_at as forwarddate', 'dak_forward_details.dak_forward_no', 'dak_forward_details.id as forward_id' , 'dak_forward_details.deptment_id', 'dak_forward_details.emp_id','employee.emp_fname','employee.emp_mname','employee.emp_lname', 'dak_final_details.dak_forward_no as finaldakno', 'dak_final_details.closing_date as closing_date', 'dak_final_details.closing_remarks as closing_remarks')
                ->where('dak_receipt_details.id', $request->indent_no)
                ->first();

                // dd($dak_details);

        return view('dak/dak-history-report', compact('dak_details'));
    }
	
	public function viewDakSearchHistory()
    {
        $dak_details = DB::table('dak_receipt_details')
                ->leftJoin('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
                ->leftJoin('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
                ->leftJoin('employee', 'dak_forward_details.emp_id', '=', 'employee.emp_code')
                ->select('dak_receipt_details.*', 'dak_forward_details.dak_status', 'dak_forward_details.created_at as forwarddate', 'dak_forward_details.dak_forward_no', 'dak_forward_details.id as forward_id' , 'dak_forward_details.deptment_id', 'dak_forward_details.emp_id','employee.emp_fname','employee.emp_mname','employee.emp_lname', 'dak_final_details.dak_forward_no as finaldakno', 'dak_final_details.closing_date as closing_date', 'dak_final_details.closing_remarks as closing_remarks')
                ->get();

        return view('dak/dak-search-report', compact('dak_details'));
    }
}


