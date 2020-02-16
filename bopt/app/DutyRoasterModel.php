<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DutyRoasterModel extends Model
{
    //
	protected $table = 'duty_roaster_gradewise';
	protected $primarykey = 'id';
	protected $fillable = [ 'id', 'company_id', 'grade_id', 'shift_id', 'created_at', 'updated_at' ];
}
