<?php

namespace MahbodHastam\Linstaller\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use MahbodHastam\Linstaller\Helpers\ManageEnvironment;

class EnvironmentController extends Controller {
    protected $manageEnvironment;

    public function __construct(ManageEnvironment $manageEnvironment) {
        $this->manageEnvironment = $manageEnvironment;
    }

    public function environmentSelect() {
        return view('linstaller::step3_environment_select');
    }

    public function textEditorShow() {
        $envContent = $this->manageEnvironment->getEnvContent();

        return view('linstaller::step3_environment_text-editor', compact('envContent'));
    }

    public function textEditorPost(Request $request) {
        $envData = $this->manageEnvironment->saveFileTextEditor($request);
        $runSeeds = $request->exists('runSeeds');

        if (!$envData['status'])
            return back()->with('error', $envData['message']);

        if (!$this->manageEnvironment->migrate())
            return back()->with('error', 'Database Error!');

        if ($runSeeds && !$this->manageEnvironment->seed())
            return back()->with('error', 'Error while seeding the database!');

        $this->finish();

        return redirect('/');
        /*return redirect()->route('linstaller.finish')->with([
            'message' => $envData['message'],
            'status' => $envData['status'],
        ]);*/
    }

    public function wizardShow() {
        $envVars = get_env_variables([
            'APP_NAME', 'APP_URL', 'LOG_LEVEL', 'DB_CONNECTION', 'DB_HOST', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD', 'MAIL_HOST', 'MAIL_PORT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'SESSION_DRIVER',
        ]);

        return view('linstaller::step3_environment_wizard', compact('envVars'));
    }

    public function wizardPost(Request $request) {
        $envNewContent = '';
        $runSeeds = $request->exists('runSeeds');

        foreach ($request->variable as $key => $value) {
            $envNewContent .= $key . "=" . $value . "\r\n";
        }

        $this->manageEnvironment->saveFileWizard($envNewContent);

        if (!$this->manageEnvironment->migrate())
            return back()->with('error', 'Database Error!');

        if ($runSeeds && !$this->manageEnvironment->seed())
            return back()->with('error', 'Error while seeding the database!');

        $this->finish();

        return redirect('/');
        /*return redirect()->route('linstaller.finish')->with([
            'message' => 'You can use your website now!',
            'status' => true,
        ]);*/
    }

    protected function finish() {
        if (!file_exists(storage_path('linstaller-installed')))
            touch(storage_path('linstaller-installed'));
        Artisan::call('key:generate', ['--force' => true]);
    }
}

