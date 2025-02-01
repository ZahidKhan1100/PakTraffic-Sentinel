<?php

namespace App\Models\District;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $connection = 'district'; 
    
    protected $fillable = ['ticket_number', 'officer_id', 'driver_cnic', 'vehicle_registration', 'violation_code', 'issue_date', 'due_date', 'status', 'payment_method', 'amount', 'lat', 'lng', 'evidence_photos'];



    public function officer()
    {
        return $this->belongsTo(Officer::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_cnic', 'cnic');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_registration', 'registration_number');
    }

    public function violation()
    {
        return $this->belongsTo(Violation::class, 'violation_code', 'code');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    protected $casts = [
        'evidence_photos' => 'array',
        'issue_date' => 'datetime',
        'due_date' => 'date'
    ];
}
