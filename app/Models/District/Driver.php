<?php

namespace App\Models\District;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $connection = 'district'; 
    
    protected $fillable = ['cnic', 'license_number', 'full_name', 'address', 'mobile', 'total_fines', 'license_status'];
    
    protected $primaryKey = 'cnic';
    public $incrementing = false;

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'owner_cnic');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'driver_cnic');
    }
}
