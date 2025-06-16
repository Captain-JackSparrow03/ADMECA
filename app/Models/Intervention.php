<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    public function vehicule() {
        return $this->belongsTo(Vehicule::class);
    }
    public function details() {
        return $this->hasMany(DetailsIntervention::class);
    }
    public function produits() {
        return $this->hasMany(UtilisationProduit::class);
    }
    public function facture() {
        return $this->hasOne(Facture::class);
    }
}
