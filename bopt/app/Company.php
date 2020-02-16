<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
	protected $table='company';
	protected $primarykey='id';
	//protected $timestapms='false';
	
	protected $fillable=['id', 'company_name', 'company_address', 'company_pan','company_phone','company_fax', 'company_web', 'company_mail', 'company_cin', 'company_gstin', 'company_cgst','company_sgst', 'company_igst', 'company_logo','updated_at', 'created_at','company_status'];
	
}
