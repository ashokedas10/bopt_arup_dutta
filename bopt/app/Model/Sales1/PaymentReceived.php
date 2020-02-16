<?php

namespace App\Model\Sales;

use Illuminate\Database\Eloquent\Model;

class PaymentReceived extends Model
{
    // 
	protected $table="payment_received";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'bill_no', 'deduction', 'payable_amt', 'payable_received', 'due_amt', 'payment_date', 'payment_received_mode', 'cheque_no', 'cheque_date', 'credit_account', 'created_at', 'updated_at'];
}
