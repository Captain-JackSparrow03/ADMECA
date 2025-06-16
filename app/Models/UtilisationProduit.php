<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UtilisationProduit extends Model
{
    public function intervention() {
        return $this->belongsTo(Intervention::class);
    }
    public function produit() {
        return $this->belongsTo(Stock::class, 'produit_id');
    }
}
