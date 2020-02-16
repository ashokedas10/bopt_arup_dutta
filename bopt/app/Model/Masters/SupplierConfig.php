<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class SupplierConfig extends Model
{
    //
	protected $table="supplier_config";
	protected $primaryKey="id";
	protected $fillable=[ 'id', 'supplier_code', 'cost_centre_code', 'updated_at', 'created_at'];
}
