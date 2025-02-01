<?php

namespace App\Models\District;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    //
    protected $connection = 'district'; 
    
    protected $fillable = ['badge_number', 'current_balance', 'is_active', 'district_code', 'password_hash', 'last_login'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function cashDeposits()
    {
        return $this->hasMany(CashDeposit::class);
    }
}
