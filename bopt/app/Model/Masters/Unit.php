<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
	protected $table="unit";
	protected $primaryKey="id";
	protected $fillable=['id', 'unit_name', 'unit_status', 'updated_at', 'created_at'];
}
