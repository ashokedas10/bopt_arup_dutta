<?php

namespace App\Model\Indent;

use Illuminate\Database\Eloquent\Model;

class RequisitionItem extends Model
{
    //
	protected $table="requisition_item";
	protected $primaryKey="id";
	protected $fillable=['id','requisition_no', 'item_code', 'item_type', 'unit_id', 'price', 'quantity', 'total', 'institute_name', 'department_name', 'requisition_made_by', 'status','requisition_date', 'required_date', 'updated_at', 'created_at'];
}
