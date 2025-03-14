<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blood_Inventory extends Model
{
    protected $table = "blood_inventories";

    public function bloodbank() {
       return $this->belongsTo(Blood_Bank::class,"blood_bank_id");
    }
}
