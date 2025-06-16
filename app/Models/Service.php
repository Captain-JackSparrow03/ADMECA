<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function details() {
        return $this->hasMany(DetailsIntervention::class);
    }
}
