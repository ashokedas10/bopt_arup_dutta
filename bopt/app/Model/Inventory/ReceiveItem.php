<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class ReceiveItem extends Model
{
    //
	protected $table="receive_item";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'grn_no', 'receive_no', 'item_code', 'unit_id', 'opening_stock', 'receive_stock', 'closing_stock','rcv_date', 'created_at', 'updated_at'];
}
