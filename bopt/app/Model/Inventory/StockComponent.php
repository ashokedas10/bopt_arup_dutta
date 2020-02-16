<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class StockComponent extends Model
{
    //
	protected $table="stock_of_component";
	protected $primaryKey="id";
	protected $fillable=['id', 'component_id', 'opening_balance', 'receive_balance', 'issue_balance', 'closing_balance', 'rcv_date', 'updated_at', 'created_at'];
}
