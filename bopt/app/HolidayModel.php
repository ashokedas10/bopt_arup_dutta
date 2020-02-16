<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HolidayModel extends Model
{
    //
	protected $table = 'holiday';
	protected $primarykey = 'id';
	protected $fillable = [  'id', 'years','from_date', 'to_date', 'month', 'day', 'weekname', 'holiday_descripion', 'holiday_type', 'updated_at', 'created_at' ];
}
