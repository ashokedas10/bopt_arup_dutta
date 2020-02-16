<?php

namespace App\Model\Admission;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    // 
	protected $table="batch";
	protected $primaryKey="id";
	protected $fillable=['id', 'institute_name', 'batch_id', 'batch_name', 'status', 'updated_at', 'created_at'];
}
