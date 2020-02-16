<?php

namespace App\Model\Indent;

use Illuminate\Database\Eloquent\Model;

class IndentItem extends Model
{
    //
	protected $table="indent_item";
	protected $primaryKey="id";
	protected $fillable=['id','indent_no', 'item_id','item_type', 'unit_id', 'required_qty', 'approved_qty', 'rejected_qty', 'institute_name', 'department_name', 'indent_made_by', 'indent_date', 'required_date', 'status', 'updated_at', 'created_at'];
}
