<?php

namespace App\Model\Fees;

use Illuminate\Database\Eloquent\Model;

class FeesHead extends Model
{
    // 
	protected $table="fees_head";
	protected $primaryKey="id";
	protected $fillable=['id', 'fees_head_code', 'fees_head_name', 'fees_head_status', 'updated_at', 'created_at'];
}
