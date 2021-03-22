<?php


namespace MahbodHastam\Linstaller\Http\Middlewares;

use Illuminate\Http\Request;

class CheckAlreadyInstalled {
    public function handle(Request $request, \Closure $next) {
        if (file_exists(storage_path('linstaller-installed'))) {
            abort(404);
        }

        return $next($request);
    }
}
