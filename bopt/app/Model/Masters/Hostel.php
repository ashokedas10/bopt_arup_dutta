<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    //
	protected $table="hostel";
	protected $primaryKey="id";
	protected $fillable=['id', 'hostel_code', 'hostel_name', 'no_of_rooms', 'hostel_capacity', 'hostel_status','updated_at','created_at'];
}
