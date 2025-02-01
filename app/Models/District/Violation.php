<?php

namespace App\Models\District;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    //
    protected $connection = 'district'; 
    
    protected $fillable = ['code', 'description', 'fine_amount', 'penalty_points', 'effective_date'];


    public function tickets()

    {

        return $this->hasMany(Ticket::class, 'violation_code', 'code');
    }
}
