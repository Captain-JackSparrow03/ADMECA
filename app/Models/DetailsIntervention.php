<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsIntervention extends Model
{
    public function intervention() {
        return $this->belongsTo(Intervention::class);
    }
    public function service() {
        return $this->belongsTo(Service::class);
    }
}
