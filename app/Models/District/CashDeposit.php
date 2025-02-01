<?php

namespace App\Models\District;

use Illuminate\Database\Eloquent\Model;

class CashDeposit extends Model
{
    //
    protected $connection = 'district'; 
    
    protected $fillable = ['officer_id', 'amount', 'deposit_date', 'slip_number', 'verified', 'verification_date', 'verified_by'];

    public function officer()

    {

        return $this->belongsTo(Officer::class);
    }

    public function verifier()

    {

        return $this->belongsTo(User::class, 'verified_by');
    }
}
