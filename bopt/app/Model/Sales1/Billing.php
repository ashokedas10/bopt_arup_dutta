<?php

namespace App\Model\Sales;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    // 
	protected $table="billing";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_code', 'ccr', 'bill_to', 'item_code', 'bill_no', 'item_price', 'unit_of_measurement', 'qty', 'tot_price', 'discount', 'cgst', 'sgst', 'igst', 'amt_including_tax', 'billing_dt', 'updated_at', 'created_at'];
}
