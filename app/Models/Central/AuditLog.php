<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    //
    protected $connection = 'central'; 
    
    protected $fillable = ['user_id', 'action', 'target_table', 'old_values', 'new_values'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
