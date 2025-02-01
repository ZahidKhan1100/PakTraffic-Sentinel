<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Model;

class SyncLog extends Model
{
    //
    protected $connection = 'central'; 
    
    protected $fillable = ['district_code', 'last_sync', 'records_synced', 'sync_type', 'status'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }
}
