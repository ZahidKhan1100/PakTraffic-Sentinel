<?php
namespace App\Models\Shared;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public function getConnectionName()
    {
        return request()->is('central/*') ? 'central' : 'district';
    }
}