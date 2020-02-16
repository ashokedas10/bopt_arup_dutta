<?php

namespace App\Model\Exam;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    // 
	protected $table="exam_type";
	protected $primaryKey="id";
	protected $fillable=['id', 'exam_type_code', 'exam_type_name', 'exam_type_status', 'updated_at', 'created_at'];
}
