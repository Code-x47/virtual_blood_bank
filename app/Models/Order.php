<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function blood_inventory() {
        return $this->belongsTo(Blood_Inventory::class,'blood_inventory_id');
    }

    public function payment() {
        return $this->hasMany(Payment::class);
    }
}
