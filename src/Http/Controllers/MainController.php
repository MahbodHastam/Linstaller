<?php

namespace MahbodHastam\Linstaller\Http\Controllers;

class MainController extends Controller {

    public function index() {
        return view('linstaller::welcome');
    }

    public function finish() {
        return view('linstaller::finish');
    }
}
