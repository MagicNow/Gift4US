<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bancos extends Model {
	protected $dates = ['deleted_at'];

	protected $hidden = [
		'created_at',
		'updated_at',
	];

	protected $fillable = ['nome'];
}
