<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class IssueItem extends Model
{
    //
	protected $table="issue_item";
	protected $primaryKey="id";
	protected $fillable=['id', 'issue_no', 'indent_no', 'item_code', 'unit_id', 'opening_stock', 'indent_required_qty', 'issue_qty', 'issue_date', 'created_at', 'updated_at'];
}
