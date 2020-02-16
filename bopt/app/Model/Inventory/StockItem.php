<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    //
	protected $table="stock_masters";
	protected $primaryKey="id";
	protected $fillable=['id', 'item_id', 'item_name', 'item_type', 'item_unique_code', 'opening_balance', 'receive_balance', 'issue_balance', 'closing_balance', 'rcv_date', 'issue_date', 'updated_at', 'created_at'];
}
