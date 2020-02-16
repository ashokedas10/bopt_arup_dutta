<?php

namespace App\Model\Inventory;

use Illuminate\Database\Eloquent\Model;

class IssueComponent extends Model
{
    //
	protected $table="issue_component";
	protected $primaryKey="id";
	protected $fillable=['id', 'issue_no', 'indent_no', 'component_id', 'unit_id', 'opening_stock', 'indent_required_qty', 'issue_qty', 'issue_date', 'created_at', 'updated_at'];
}
