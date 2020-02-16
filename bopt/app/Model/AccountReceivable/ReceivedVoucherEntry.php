<?php

namespace App\Model\AccountReceivable;

use Illuminate\Database\Eloquent\Model;
use DB;

class ReceivedVoucherEntry extends Model
{
    protected $table = 'received_voucher_entry';
    public $timestamps= true;

    protected $fillable = ['voucher_no','account_head_id','sub_account_id','transaction_code','account_tool','bank_name','received_amount','gst_amt','recvbl_amt','remarks'];
}
