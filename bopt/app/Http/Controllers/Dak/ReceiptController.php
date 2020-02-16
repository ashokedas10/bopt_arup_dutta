<?php
namespace App;
namespace App\Http\Controllers\Dak;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Department;
use Validator;
use Session;
use View;

class ReceiptController extends Controller
{
	 public function viewReceiptDetails()
	 {
		
		$recept_details=DB::Table('dak_receipt_details')
		->select('*')->where('doc_status','=','receipt')->orWhere('doc_status','=','reject')->get();
		return view('dak/dak-receipt', compact('recept_details'));
	 }

	public function index() {
      return view('dak/add-receipt');
    }

    public function getReceiptById($id) {
      $data['receipt_det'] = DB::table('dak_receipt_details')->where('id', $id)->first();
      $data['department']=Department::where('department_status','=','active')->get();
      
      return view('dak/add-receipt',$data);
    }

  
    public function saveReceipt(Request $request) {
     	$updateTime = new \DateTime();
        $updated_at = $updateTime->format("Y-m-d H:i:s");
    
     	$curTime = new \DateTime();
        $created_at = $curTime->format("Y-m-d");

        if($request->rec_lan=='Other'){

			$selected_other = $request->other_lan;

        }else{
        	
			$selected_other = "";

        }
     
	    $request->validate([
	        'd_year'=>'required',
	        'd_date'=>'required',
	        'receipt_type'=>'required',
	        'receipt_categoty'=>'required',
	        'ref_no'=> 'required',
	        'ref_date'=>'required',
	        'sender_name'=>'required'
	    ]);

        if(empty($request->id)){
		    $data=array(
		    'diary_year'=>$request->d_year,
		    'diary_date'=>$request->d_date,
		    'receipt_type'=>$request->receipt_type,
		    'receipt_category'=>$request->receipt_categoty,
		    'reference_no'=>$request->ref_no,
			'reference_date'=>$request->ref_date,
		    'sender_name'=>$request->sender_name,
		    'address'=>$request->address,
		    'state'=>$request->state,
		    'subject'=>$request->re_subject,
			'remarks'=>$request->remarks,
		    'dealing_head'=>$request->dealing_head,
		    'enclosure_details'=>$request->enclosure_details,
			'rec_lan'=>$request->rec_lan,
			'other_lan'=>$selected_other,
	        'dairy_no'=>"BOPT/DAK-".date("H:i:s")."-".$created_at,
		    'created_at'=>$request->created_at
		    );

		}else{
		
			$data2=array(
		    'diary_year'=>$request->d_year,
		    'diary_date'=>$request->d_date,
		    'receipt_type'=>$request->receipt_type,
		    'receipt_category'=>$request->receipt_categoty,
		    'reference_no'=>$request->ref_no,
			'reference_date'=>$request->ref_date,
		    'sender_name'=>$request->sender_name,
		    'address'=>$request->address,
		    'state'=>$request->state,
		    'subject'=>$request->re_subject,
			'remarks'=>$request->remarks,
		    'dealing_head'=>$request->dealing_head,
		    'enclosure_details'=>$request->enclosure_details,
			'rec_lan'=>$request->rec_lan,
			'other_lan'=>$selected_other,
		    'updated_at'=>$updated_at
		    );
	    }
 
     if(empty($request->id)){
		 DB::table('dak_receipt_details')->insert($data);
	   }else{
        DB::table('dak_receipt_details')
        ->where('id', $request->id)
        ->update($data2);
	   }
	   Session::flash('message','Receipt sucessfully created');
      // back()->with('success','Details inserted successfully ');
      //return view('dak/add-receipt', $data);
      return redirect('dak/dak-receipt');
      }

   
      public function delete_receipt() 
      {
        $id = Input::get('pid');
       // echo $id; exit;
       $pid= urldecode(base64_decode($id));
       DB::table('dak_receipt_details')->where('id',$pid)->delete();
       return back()->with('delete','Item successfully deleted');
      }
	

}
