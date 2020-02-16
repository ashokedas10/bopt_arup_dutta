<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobRequisitionModel extends Model
{
    //
	protected $table = 'job_requisition';
	protected $primarykey = 'id';
	protected $fillable = ['id','company_id','department_id', 'job_title', 'location', 'no_of_vacancy', 'date', 'vacancy_status', 'updated_at', 'created_at'];
}
