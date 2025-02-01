<?php
namespace App\Models\Shared;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public function getConnectionName()
    {
        return request()->is('central/*') ? 'central' : 'district';
    }
}