<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FestasLayouts extends Model {
    protected $dates = ['deleted_at'];

	protected $fillable = ['nome'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
