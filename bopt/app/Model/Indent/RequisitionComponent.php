<?php

namespace App\Model\Indent;

use Illuminate\Database\Eloquent\Model;

class RequisitionComponent extends Model
{
    //
	protected $table="requisition_component";
	protected $primaryKey="id";
	protected $fillable=['id','requisition_no', 'component_id', 'component_type', 'unit_id', 'price', 'quantity', 'total', 'institute_name', 'department_name', 'requisition_made_by', 'status','requisition_date', 'updated_at', 'created_at'];
}
