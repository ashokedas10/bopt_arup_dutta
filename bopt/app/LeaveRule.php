<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveRule extends Model
{
   
	protected $table='leave_rule';
	protected $primaryKey='id';
	protected $fillable=['id','leave_type_id', 'max_no', 'entitled_from_month', 'max_balance_enjoy', 'carry_forward_type', 'effective_from', 'effective_to', 'updated_at', 'created_at', 'leave_rule_status'];
}
