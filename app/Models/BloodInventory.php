<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodInventory extends Model
{
    protected $table = "blood_inventories";

    public function bloodbank() {
       return $this->belongsTo(Blood_Bank::class,"blood_bank_id");
    }

    public function order() {
        return $this->hasMany(Order::class,'blood_inventory_id');
    }

    public function user_bloodInventory() {
        return $this->belongsTo(User::class);
    }
    
}
