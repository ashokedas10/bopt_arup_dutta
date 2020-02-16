<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    //
	protected $table="component";
	protected $primaryKey="id";
	protected $fillable=['id', 'component_name','component_type', 'unit_id', 'rate', 'min_stock_level','hsn_code','sac_code', 'details', 'component_status', 'updated_at', 'created_at'];
}
