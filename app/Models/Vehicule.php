<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    public function client() {
        return $this->belongsTo(Client::class);
    }
    public function interventions() {
        return $this->hasMany(Intervention::class);
    }
}
