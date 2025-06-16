<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function utilisations() {
        return $this->hasMany(UtilisationProduit::class);
    }
}
