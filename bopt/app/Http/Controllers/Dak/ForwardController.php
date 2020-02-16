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

class ForwardController extends Controller
{
	 
	public function index() {
		$data['receipt_details_code']=DB::table('dak_receipt_details')->where('doc_status','=','receipt')->orWhere('doc_status','=','reject')->orderBy('created_at', 'desc')->get();
		$data['departments']=Department::where('department_status','=','active')->get();
    $data['employees']=Employee::where('status','=','active')->get();
    return view('dak/add-forward',$data);
  }


  public function viewForwardDetails()
	{
		$data['forward_details']=DB::table('dak_receipt_details')
      ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
      ->join('employee', 'dak_forward_details.emp_id', '=', 'employee.emp_code')
      ->select('dak_receipt_details.*', 'dak_forward_details.dak_status', 'dak_forward_details.created_at as forwarddate', 'dak_forward_details.dak_forward_no', 'dak_forward_details.id as forward_id' , 'dak_forward_details.deptment_id', 'dak_forward_details.emp_id', 'employee.emp_fname', 'employee.emp_mname', 'employee.emp_lname')
      ->where('dak_forward_details.dak_status','=','forward')
      ->orderBy('created_at', 'desc')
      ->get();
		return view('dak/dak-forward', $data);
	}


    public function getForwardById($id) {

      $data['forward_detail']=DB::table('dak_receipt_details')
            ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
            ->select('dak_receipt_details.*', 'dak_forward_details.id as forward_id', 'dak_forward_details.deptment_id as forwarddept', 'dak_forward_details.emp_id as forwardemp')
            ->where('dak_forward_details.id','=', $id)
            ->first();
      
      $data['receipt_details_code']=DB::table('dak_receipt_details')->where('doc_status','=','receipt')->get();
      $data['departments']=Department::where('department_status','=','active')->get();
      $data['employees']=Employee::where('status','=','active')->get();
      return view('dak/add-forward',$data);
    }


    public function getForwarddtl($id) {
      $data['forward_detail']=DB::table('dak_receipt_details')
           ->where('dak_receipt_details.id','=', $id)
            ->first();
      return $data;
    }

  
    public function saveForward(Request $request) {

      //print_r($request->enclosure_details); exit;
        $currentdatetime = date("Y-m-d H:i:s");
  	    $request->validate([
  	        'department_id'=>'required',
  	        'empployee_id'=>'required'
  	    ]);

        if(empty($request->forward_id)){
    	    $data=array(
    	    'emp_id'=>$request->empployee_id,
          'dak_receipt_detail_id'=> $request->dak_receipt_detail_id,
    	    'deptment_id'=>$request->department_id,
          'dak_forward_no'=>"BOPT/DAK/FORWARD/-".time(),
          'dak_status'=>'forward',
    	    'created_at'=>$currentdatetime
  	    );

          //print_r($data); exit;
	       DB::table('dak_forward_details')->insert($data);
         DB::table('dak_receipt_details')
         ->where('id', $request->dak_receipt_detail_id)
         ->update(['doc_status' => 'forward']);
    		}else{
    			$data2=array(
    		    'emp_id'=>$request->empployee_id,
    		    'deptment_id'=>$request->department_id,
    		    'updated_at'=>$currentdatetime
    		    );
    		    DB::table('dak_forward_details')
    	        ->where('id', $request->forward_id)
    	        ->update($data2);
            DB::table('dak_receipt_details')
              ->where('id', $request->dak_receipt_detail_id)
              ->update(['doc_status' => 'forward']);
    		}
          back()->with('success','Details inserted successfully ');
          return redirect('dak/dak-forward');
    }

}
