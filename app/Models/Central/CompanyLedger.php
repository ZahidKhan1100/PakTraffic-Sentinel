<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Model;

class CompanyLedger extends Model
{
    //
    protected $connection = 'central'; 
    
    protected $fillable = ['district_code', 'transaction_date', 'service_fee', 'transaction_id'];

    public function district()

    {

        return $this->belongsTo(District::class, 'district_code', 'code');
    }
}
