<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    //
	protected $table="accessories";
	protected $primaryKey="id";
	protected $fillable=['id', 'accessories_code', 'accessories_name', 'accessories_status', 'created_at', 'updated_at'];
}
