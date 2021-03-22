<?php

namespace MahbodHastam\Linstaller\Http\Controllers;

use MahbodHastam\Linstaller\Helpers\CheckRequirements;

class RequirementsController extends Controller {
    protected $requirements;

    public function __construct(CheckRequirements $requirements) {
        $this->requirements = $requirements;
    }

    public function requirements() {
        $requirements = $this->requirements->check(config('linstaller.requirements'));
        /*$requirements['requirements']['php']['cURL'] = false;
        $requirements['requirements']['php']['pdo'] = false;
        $requirements['errors'] = true;*/
        return view('linstaller::step1_requirements', compact('requirements'));
    }
}
