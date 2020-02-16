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
use Auth;
class FinalController extends Controller
{
	 
	public function viewFinalDashboard()
  {
    $user_type = Auth::user()->user_type;

    if($user_type=='admin')
    {
      $final_details = $data['final_details']=DB::table('dak_receipt_details')
        // ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
        ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
        ->select('dak_receipt_details.*', 'dak_forward_details.dak_status', 'dak_forward_details.created_at as forwarddate', 'dak_forward_details.dak_forward_no', 'dak_forward_details.id as forward_id' , 'dak_forward_details.deptment_id', 'dak_forward_details.emp_id')
        ->where('dak_receipt_details.doc_status', '=', 'forward')
        ->orderBy('created_at', 'desc')
        ->get();
      return view('dak/finaldashboard', compact('final_details'));
    }
    else
    {
      $emp_code = Auth::user()->employee_id;
        // dd($user_id);
        $final_details=DB::table('dak_receipt_details')
        // ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
        ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
        ->select('dak_receipt_details.*', 'dak_forward_details.dak_status', 'dak_forward_details.created_at as forwarddate', 'dak_forward_details.dak_forward_no', 'dak_forward_details.id as forward_id' , 'dak_forward_details.deptment_id', 'dak_forward_details.emp_id')
        ->where('emp_id','=', $emp_code)
        ->where('dak_forward_details.dak_status', '=', 'forward')
        ->get();
     // echo "<pre>"; print_r($final_details); exit;
      return view('dak/finaldashboard', compact('final_details'));
    }
    
  }

  public function index() {
		$data['receipt_details_code']=DB::table('dak_receipt_details')
                                      ->where('doc_status','=','forward')
                                      ->get();

    return view('dak/add-final',$data);
  }


  public function viewFinalDetails()
	{

    $user_type = Auth::user()->user_type;
		/*$data['final_details']=DB::table('dak_receipt_details')
      ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
      ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
      ->select('dak_receipt_details.*', 'dak_final_details.status', 'dak_final_details.created_at as finaldate', 'dak_final_details.id as final_id', 'dak_forward_details.emp_id as emp_id')
      ->get();*/

      if($user_type=='admin'){

        $data['final_details']=DB::table('dak_receipt_details')
        ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
        ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
        ->select('dak_receipt_details.*', 'dak_final_details.status', 'dak_final_details.created_at as finaldate', 'dak_final_details.id as final_id', 'dak_forward_details.emp_id as emp_id')
        ->where(function($result) {
         $result->where('dak_receipt_details.doc_status', 'accept')
           ->orWhere('dak_receipt_details.doc_status', 'open');
        })
        ->where('dak_receipt_details.receipt_type', '!=', 'Bill(Establishment)')
        ->where('dak_receipt_details.receipt_type', '!=', 'Bill(Stipend)')
        ->get();

      }else{
        $emp_code = Auth::user()->employee_id;
        // dd($user_id);
        $data['final_details']=DB::table('dak_receipt_details')
        ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
        ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
        ->select('dak_receipt_details.*', 'dak_final_details.status', 'dak_final_details.created_at as finaldate', 'dak_final_details.id as final_id')
        ->where('dak_forward_details.emp_id','=', $emp_code)
        // ->where('dak_receipt_details.doc_status', '=', 'accept')
        // ->orWhere('dak_receipt_details.doc_status', '=', 'open')
        ->where(function($result) {
         $result->where('dak_receipt_details.doc_status', 'accept')
           ->orWhere('dak_receipt_details.doc_status', 'open');
        })
        ->where('dak_receipt_details.receipt_type', '!=', 'Bill(Establishment)')
        ->where('dak_receipt_details.receipt_type', '!=', 'Bill(Stipend)')
        ->orderBy('created_at', 'ASC')
        ->get();
        // echo "<pre>"; print_r($data['final_details']); exit;
      }
     
		return view('dak/dak-final', $data);
	}

  public function viewFinalDetailsForBills() {
      $user_type = Auth::user()->user_type;

      if($user_type=='admin'){

        $data['final_details']=DB::table('dak_receipt_details')
        ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
        ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
        ->select('dak_receipt_details.*', 'dak_final_details.status', 'dak_final_details.created_at as finaldate', 'dak_final_details.id as final_id', 'dak_forward_details.emp_id as emp_id')
        ->where(function($result) {
         $result->where('dak_receipt_details.doc_status', '=', 'accept')
           ->orWhere('dak_receipt_details.doc_status', '=', 'open');
        })
        ->where(function($result) {
         $result->where('dak_receipt_details.receipt_type', 'Bill(Establishment)')
           ->orWhere('dak_receipt_details.receipt_type', 'Bill(Stipend)');
        })
        ->get();

      }else{
        $emp_code = Auth::user()->employee_id;
        // dd($user_id);
        $data['final_details']=DB::table('dak_receipt_details')
        ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
        ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
        ->select('dak_receipt_details.*', 'dak_final_details.status', 'dak_final_details.created_at as finaldate', 'dak_final_details.id as final_id','dak_forward_details.emp_id')
        ->where('dak_forward_details.emp_id','=', $emp_code)
         ->where(function($result) {
         $result->where('dak_receipt_details.doc_status', '=', 'accept')
           ->orWhere('dak_receipt_details.doc_status', '=', 'open');
        })
        // ->where('dak_receipt_details.doc_status', '=', 'accept')
        // ->orWhere('dak_receipt_details.doc_status', '=', 'open')
        //->where('dak_receipt_details.receipt_type', '=', 'Bill(Establishment)')
        //->orWhere('dak_receipt_details.receipt_type', '=', 'Bill(Stipend)')
         ->where(function($result) {
         $result->where('dak_receipt_details.receipt_type', 'Bill(Establishment)')
           ->orWhere('dak_receipt_details.receipt_type', 'Bill(Stipend)');
        })
        ->orderBy('created_at', 'ASC')
        ->get();
          // print_r($data['final_details']); exit;
      }

      return view('dak/dak-final-bill', $data);
  }

  public function viewFinalDetailsForClosed()
  {
    $user_type = Auth::user()->user_type;

      if($user_type=='admin'){

        $data['final_details']=DB::table('dak_receipt_details')
        ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
        ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
        ->select('dak_receipt_details.*', 'dak_final_details.status', 'dak_final_details.created_at as finaldate', 'dak_final_details.id as final_id', 'dak_forward_details.emp_id as emp_id')
        ->where('dak_receipt_details.doc_status', '=', 'closed')
        ->get();

      }else{
        $emp_code = Auth::user()->employee_id;
        // dd($user_id);
        $data['final_details']=DB::table('dak_receipt_details')
        ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
        ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
        ->select('dak_receipt_details.*', 'dak_final_details.status', 'dak_final_details.created_at as finaldate', 'dak_final_details.id as final_id','dak_forward_details.emp_id')
        ->where('dak_forward_details.emp_id','=', $emp_code)
        ->where('dak_receipt_details.doc_status', '=', 'closed')
        // ->orWhere('dak_receipt_details.doc_status', '=', 'open')
        //->where('dak_receipt_details.receipt_type', '=', 'Bill(Establishment)')
        //->orWhere('dak_receipt_details.receipt_type', '=', 'Bill(Stipend)')
        //  ->where(function($result) {
        //  $result->where('dak_receipt_details.receipt_type', 'Bill(Establishment)')
        //    ->orWhere('dak_receipt_details.receipt_type', 'Bill(Stipend)');
        // })
        ->orderBy('created_at', 'DESC')
        ->get();
         // echo "<pre>"; print_r($data['final_details']); exit;
      }

      return view('dak/dak-final-closed', $data);
  }


    public function getFinalById($id) {

      $data['final_detail']=DB::table('dak_receipt_details')
      // ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
      ->select('dak_receipt_details.*')
      ->where('dak_receipt_details.id','=', $id)
      ->first();
      // echo "<pre>"; print_r($data['final_detail']); exit;
      $data['receipt_details_code']=DB::table('dak_receipt_details')->where('doc_status','=','forward')->get();
      $data['departments']=Department::where('department_status','=','active')->get();
      $data['employees']=Employee::where('status','=','active')->get();
      return view('dak/add-final',$data);
    }

    public function getFinalDetailById($id) {

      $data['final_detail']=DB::table('dak_receipt_details')
      ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
      ->select('dak_receipt_details.*', 'dak_final_details.status', 'dak_final_details.created_at as finaldate', 'dak_final_details.id as final_id','dak_final_details.dak_receipt_detail_id')
      ->where('dak_final_details.id','=', $id)
      ->first();

      return view('dak/edit-final',$data);
    }

    public function getFinaldtl($id) {
      $data['final_detail']=DB::table('dak_receipt_details')
          ->where('dak_receipt_details.id','=', $id)
          ->first();
      return $data;
    }

  
    public function saveFinal(Request $request) {
      // dd($request);
        // echo "<pre>"; print_r($request->all()); exit;
        $currentdatetime = date("Y-m-d H:i:s");
  	    $request->validate([
  	        'status'=>'required'
  	    ]);

        if(empty($request['final_id']))
        {
          if($request['status'] == 'accept'){
          $data=array(
            'dak_receipt_detail_id'=> $request['receipt_id'],
            'dak_forward_no'=>"BOPT/DAK/FINAL/-".$currentdatetime,
            'status'=>$request['status'],
            'created_at'=>$currentdatetime,
            'reason'=>$request['reason'],
          );
            DB::table('dak_final_details')->insert($data);
              DB::table('dak_receipt_details')
            ->where('id', $request['receipt_id'])
            ->update(['doc_status' => $request['status']]);
            
              DB::table('dak_forward_details')
              ->where('dak_receipt_detail_id', $request['receipt_id'])
              ->update(['dak_status' => $request['status']]);
            
            
      } else{
          $data2=array(
            'dak_receipt_detail_id'=> $request['receipt_id'],
            'dak_forward_no'=>"BOPT/DAK/FINAL/-".$currentdatetime,
            'status'=>$request['status'],
            'created_at'=>$currentdatetime,
            'reason'=>$request['reason'],
            );
            // DB::table('dak_final_details')->insert($data2);
              DB::table('dak_receipt_details')
              ->where('id', $request['receipt_id'])
              ->update(['doc_status' => $request['status']]);
              if($request['status'] == 'forward'){
                DB::table('dak_forward_details')
              ->where('dak_receipt_detail_id', $request['receipt_id'])
              ->update(['emp_id' => $request['empployee_id'], 'deptment_id' => $request['department_id'], 'dak_status' => $request['status']]);
              } else {
                DB::table('dak_forward_details')
              ->where('dak_receipt_detail_id', $request['receipt_id'])
              ->update(['dak_status' => $request['status']]);
              }
              
          }
        } else {
          $data3=array(
            'dak_receipt_detail_id'=>$request['receipt_id'],
            'status'=>$request['status'],
            'closing_remarks'=>$request['closing_remarks'],
            'closing_date'=>$request['closing_date'],
            'updated_at'=>$currentdatetime
            );
            DB::table('dak_final_details')
              ->where('id', $request->final_id)
              ->update($data3);
             DB::table('dak_receipt_details')
              ->where('id', $request['receipt_id'])
              ->update(['doc_status' => $request['status']]);
               DB::table('dak_forward_details')
              ->where('dak_receipt_detail_id', $request['receipt_id'])
              ->update(['dak_status' => $request['status']]);
        }
        
          back()->with('success','Details inserted successfully ');
          return redirect('dak/fin/dashboard');
    }

    public function updateFinal(Request $request)
    {
      // dd($request);

      $receipt_type = DB::table('dak_receipt_details')->select('receipt_type')
                        ->where('id', $request['hidden_recept_id'])->first();
      // dd($receipt_type);
      $currentdatetime = date("Y-m-d H:i:s");
        $request->validate([
            'status'=>'required'
        ]);

        
          $data2=array(
            'status'=>$request['status'],
            'closing_remarks'=>$request['closing_remarks'],
            'closing_date'=>$request['closing_date'],
            'updated_at'=>$currentdatetime
            );
            DB::table('dak_final_details')
              ->where('id', $request['final_id'])
              ->update($data2);
              DB::table('dak_receipt_details')
              ->where('id', $request['hidden_recept_id'])
              ->update(['doc_status' => $request['status']]);
              DB::table('dak_forward_details')
              ->where('dak_receipt_detail_id', $request['hidden_recept_id'])
              ->update(['dak_status' => $request['status']]);
        
          if($receipt_type->receipt_type == 'Bill(Establishment)' || $receipt_type->receipt_type == 'Bill(Stipend)')
          {
            // back()->with('success','Details inserted successfully ');
            return redirect('dak/dak-final-bill');
          }
          else
          {
            // back()->with('success','Details inserted successfully ');
            return redirect('dak/dak-final');
          }
          
    }


  public function approvedFinalDak($foward_id){
    
    $final_detail=DB::table('dak_receipt_details')
          ->where('dak_receipt_details.id','=', $foward_id)
          ->first();

          $currentdatetime = date("Y-m-d H:i:s");
           
              DB::table('dak_final_details')->insert(['dak_receipt_detail_id'=> $final_detail->id,
              'dak_forward_no'=>"BOPT/DAK/FINAL/-".$currentdatetime,'status'=>'accept','created_at'=>$currentdatetime]);

              DB::table('dak_receipt_details')
              ->where('id', $final_detail->id)
              ->update(['doc_status' => 'accept']);
          
    

        back()->with('success','Details inserted successfully ');
        return redirect('dak/fin/dashboard');
  }
  
  public function viewFinalDetailsForForward()
  {
    $user_type = Auth::user()->user_type;

    if($user_type=='admin')
    {

      $data['final_details']=DB::table('dak_receipt_details')
    //   ->join('dak_final_details', 'dak_receipt_details.id', '=', 'dak_final_details.dak_receipt_detail_id')
      ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
	  ->leftJoin('employee', 'dak_forward_details.emp_id', '=', 'employee.emp_code')
      ->select('dak_receipt_details.*', 'dak_forward_details.emp_id as emp_id', 'dak_forward_details.created_at as forwarddate', 'employee.emp_fname','employee.emp_mname','employee.emp_lname')
      ->where('dak_receipt_details.doc_status', '=', 'forward')
      ->get();

    }else{
      $emp_code = Auth::user()->employee_id;
      // dd($user_id);
      $data['final_details']=DB::table('dak_receipt_details')
      ->join('dak_forward_details', 'dak_receipt_details.id', '=', 'dak_forward_details.dak_receipt_detail_id')
      ->leftJoin('employee', 'dak_forward_details.emp_id', '=', 'employee.emp_code')
      ->select('dak_receipt_details.*', 'dak_forward_details.emp_id', 'dak_forward_details.created_at as forwarddate', 'employee.emp_fname','employee.emp_mname','employee.emp_lname')
      ->where('dak_forward_details.emp_id','=', $emp_code)
      ->where('dak_receipt_details.doc_status', '=', 'forward')
      ->orderBy('created_at', 'DESC')
      ->get();
       // echo "<pre>"; print_r($data['final_details']); exit;
    }

    return view('dak/dak-final-forward', $data);
  }

}
