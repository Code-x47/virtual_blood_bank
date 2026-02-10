<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
   protected $fillable = ['status'];

   public function blood_inventory() {
        return $this->belongsTo(BloodInventory::class,'blood_inventory_id');
    }



    public function payment() {
        return $this->hasMany(Payment::class);
    }

    


}
