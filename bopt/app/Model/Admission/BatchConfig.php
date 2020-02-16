<?php

namespace App\Model\Admission;

use Illuminate\Database\Eloquent\Model;

class BatchConfig extends Model
{
    // 
	protected $table="batch_configuration";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_name', 'batch_id', 'batch_start', 'batch_end', 'no_of_seat','seat_allocation', 'batch_config_status', 'updated_at', 'created_at'];
}
