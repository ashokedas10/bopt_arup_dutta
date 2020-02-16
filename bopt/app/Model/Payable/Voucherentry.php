<?php

namespace App\Model\Payable;

use Illuminate\Database\Eloquent\Model;
use DB;



class Voucherentry extends Model
{
    protected $table = 'voucher_entry';
    public $timestamps= false;

	protected $fillable = ['voucher_no', 'account_head_id','sub_account_id','transaction_code','account_tool','employee_id','vendor_id','bank_name','billno','billdate','bill_booking_date','bill_amt','tds_id','tds_percentage','bill_gst_amt','deduction_amt','final_bill_amt','payable_amt','upload_bill','entry_remark','bill_status','approve_status'];
}
