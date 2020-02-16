<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
	protected $table="bank";
	protected $primaryKey='id';
	protected $fillable=['id', 'bank_name', 'branch_name', 'ifsc_code', 'swift_code', 'updated_at', 'created_at','bank_status'];


	public static function getMastersBank(){
       $bankMasters=DB::table('bank_masters')->get();
      // print_r($bankMasters); exit;
        if($bankMasters){
        	return $bankMasters;
        }

    }


    public static function getMasterAndBank(){
    $bankMasters=DB::table('bank')
    			->select('bank_masters.master_bank_name','bank.*')
                 ->join('bank_masters','bank.bank_name','=','bank_masters.id')
                 ->get();

               //  print_r($bankMasters);die;

       return $bankMasters;
    }
	
}
