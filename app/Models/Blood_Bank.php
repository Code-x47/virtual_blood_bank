<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blood_Bank extends Model
{
    protected $table = "blood_banks";
    public function inventory() {
        return $this->hasMany(Blood_Inventory::class);
    }
}

