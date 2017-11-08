<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutosLojas extends Model {
    protected $dates = ['deleted_at'];

	protected $fillable = ['nome', 'link'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function produtos() {
        return $this->hasMany('App\Models\Produtos');
    }
}
