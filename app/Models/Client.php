<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['nom', 'prenom', 'telephone', 'email', 'adresse'];
    public function vehicules() {
        return $this->hasMany(Vehicule::class);
    }
    public function factures() {
        return $this->hasMany(Facture::class);
    }
}
