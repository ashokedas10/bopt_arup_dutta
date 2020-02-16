<?php

namespace App\Model\Masters;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    //
	protected $table="stream";
	protected $primaryKey="id";
	protected $fillable=['id', 'stream_code', 'stream_name', 'stream_status', 'created_at', 'updated_at'];
}
