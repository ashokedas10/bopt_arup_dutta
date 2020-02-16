<?php

namespace App\Model\Purchase;

use Illuminate\Database\Eloquent\Model;

class GrnItem extends Model
{
    //
	protected $table="grn_item";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'requisition_no', 'purchase_order_no', 'grn_no', 'item_code', 'unit_id', 'qty', 'balance_qty', 'receive_qty', 'price', 'tax', 'total_without_tax', 'total_with_tax', 'receive_date', 'institute_name', 'department_name', 'requisition_made_by','vendor_name','supplier_address','supplier_phone','supplier_gstin', 'updated_at', 'created_at'];
}