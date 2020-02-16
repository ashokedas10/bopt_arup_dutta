<?php

namespace App\Model\Purchase;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    //
	protected $table="purchase_item";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'requisition_no', 'purchase_order_no', 'item_code', 'qty','receive_qty','balance_qty', 'unit_id', 'price', 'offer_price', 'sgst', 'cgst', 'igst', 'total_without_tax', 'total_with_tax', 'supplier_name', 'department_name', 'requisition_made_by', 'shipping_name', 'shipping_company', 'shipping_address', 'shipping_city', 'shipping_state', 'shipping_pin', 'delivery_date', 'terms_n_condition', 'quotation_date', 'quotation_no', 'shipping_charges', 'other_charges', 'purchase_order_date', 'status', 'updated_at', 'created_at'];
}
