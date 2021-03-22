<?php

namespace MahbodHastam\Linstaller\Http\Controllers;

use MahbodHastam\Linstaller\Helpers\CheckPermissions;

class PermissionsController extends Controller {
    protected $permissions;

    public function __construct(CheckPermissions $permissions) {
        $this->permissions = $permissions;
    }

    public function permissions() {
        $permissions = $this->permissions->check(config('linstaller.permissions'));
        /* $permissions['permissions'][1]['isSet'] = false;
        $permissions['errors'] = true; */
        return view('linstaller::step2_permissions', compact('permissions'));
    }
}
