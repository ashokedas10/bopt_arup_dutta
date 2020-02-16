<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveAllocation extends Model
{
    //
	protected  $table='leave_allocation';
	protected $primaryKey='id';
	protected $fillable=[  'id', 'leave_type_id', 'leave_rule_id', 'max_no', 'opening_bal', 'leave_in_hand','month_yr', 'employee_code', 'updated_at', 'created_at', 'leave_allocation_status' ];
}
