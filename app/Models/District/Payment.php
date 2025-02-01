<?php

namespace App\Models\District;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $connection = 'district'; 
    
    protected $fillable = ['ticket_id', 'amount', 'transaction_id', 'payment_date', 'method', 'bank_reference'];

    public function ticket()

    {

        return $this->belongsTo(Ticket::class);
    }
}
