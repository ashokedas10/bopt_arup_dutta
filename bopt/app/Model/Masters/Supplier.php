<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
	protected $table="supplier";
	protected $primaryKey="id";
	public $timestamps = true;
	protected $fillable=[ 'id', 'supplier_business_name', 'supplier_gstin', 'pan_no','type_of_supplier','supplier_code', 'contact_person_name','contactperson_designation', 'supplier_mobile', 'supplier_alt_no','supplier_email','supplier_created_date','contact_person_address', 'supplier_state', 'supplier_district', 'supplier_country', 'supplier_status', 'updated_at', 'created_at'];

	// public function states() 
	// {
	// 	return $this->belongsTo(State::class);
	// }

	// public function districts() 
	// {
	// 	return $this->belongsTo(District::class);
	// }
}