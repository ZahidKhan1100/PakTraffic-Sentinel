<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Model;

class GovernmentLedger extends Model
{
    //
    protected $connection = 'central'; 
    
    protected $fillable = ['district_code', 'transaction_date', 'amount', 'transaction_type', 'reference'];

    public function district()

    {

        return $this->belongsTo(District::class, 'district_code', 'code');
    }
}
