<?php

namespace App\Model\Indent;

use Illuminate\Database\Eloquent\Model;

class IndentComponent extends Model
{
    //
	protected $table="indent_component";
	protected $primaryKey="id";
	protected $fillable=['id','indent_no', 'component_id','component_type', 'unit_id', 'required_qty', 'institute_name', 'department_name', 'indent_made_by', 'indent_date','status', 'updated_at', 'created_at'];
}
