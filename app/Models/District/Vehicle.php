<?php

namespace App\Models\District;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $connection = 'district'; 
    
    protected $fillable = ['registration_number', 'owner_cnic', 'vehicle_type', 'make', 'model', 'registration_expiry'];

    public function owner()

    {

        return $this->belongsTo(Driver::class, 'owner_cnic', 'cnic');
    }

    public function tickets()

    {

        return $this->hasMany(Ticket::class, 'vehicle_registration', 'registration_number');
    }
}
