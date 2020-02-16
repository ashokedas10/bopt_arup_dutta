<?php

namespace App\Model\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseComponent extends Model
{
    //
	protected $table="purchase_component";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'requisition_no', 'purchase_order_no', 'component_id', 'qty','receive_qty','balance_qty', 'unit_id', 'price', 'offer_price', 'tax', 'total_without_tax', 'total_with_tax', 'institute_name', 'department_name', 'requisition_made_by', 'shipping_name', 'shipping_company', 'shipping_address', 'shipping_city', 'shipping_state', 'shipping_pin', 'delivery_date', 'shipping_charges', 'other_charges', 'purchase_order_date', 'updated_at', 'created_at'];
}
