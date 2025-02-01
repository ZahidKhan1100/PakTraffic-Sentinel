<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $connection = 'central'; 

    protected $primaryKey = 'code';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['code', 'name', 'province', 'bank_account', 'contact_email', 'active_since'];

    public function governmentLedgers()

    {

        return $this->hasMany(GovernmentLedger::class, 'district_code', 'code');
    }

    public function companyLedgers()

    {

        return $this->hasMany(CompanyLedger::class, 'district_code', 'code');
    }

    public function syncLogs()

    {

        return $this->hasMany(SyncLog::class, 'district_code', 'code');
    }
}
