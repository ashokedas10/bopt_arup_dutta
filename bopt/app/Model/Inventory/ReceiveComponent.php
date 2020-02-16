<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class ReceiveComponent extends Model
{
    //
	protected $table="receive_component";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'grn_no', 'receive_no', 'component_id', 'unit_id', 'opening_stock', 'receive_stock', 'closing_stock','rcv_date', 'created_at', 'updated_at'];
}
