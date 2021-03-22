<?php

namespace MahbodHastam\Linstaller\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Output\BufferedOutput;

class ManageEnvironment {
    protected $envPath;
    protected $envExamplePath;

    public function __construct() {
        $this->envPath = base_path('.env');
        $this->envExamplePath = base_path('.env.example');
    }

    /**
     * Env path getter
     *
     * @return string
     */
    public function envPathGetter() {
        return $this->envPath;
    }

    /**
     * Env.example path getter
     *
     * @return string
     */
    public function envExamplePathGetter() {
        return $this->envExamplePath;
    }

    /**
     * Get the content of env
     *
     * @return false|string
     */
    public function getEnvContent() {
        if (!file_exists($this->envPath)) {
            if (file_exists($this->envExamplePath)) {
                copy($this->envExamplePath, $this->envPath);
            } else touch($this->envPath);
        }

        return file_get_contents($this->envPath);
    }

    /**
     * Filter env content
     *
     * @param Collection $collection
     * @param array $allowed
     * @return Collection
     */
    protected function filterEnvContentForConvertingToCollection(Collection $collection, array $allowed = []) {
        $notAllowedCollection = $collection->filter(function ($item) use ($allowed) {
            if (empty($allowed))
                return !empty(trim($item[0]));
            return !empty(trim($item[0])) && !in_array(trim($item[0]), $allowed);
        });
        $allowedCollection = $collection->filter(function ($item) use ($allowed) {
            if (empty($allowed))
                return !empty(trim($item[0]));
            return !empty(trim($item[0])) && in_array(trim($item[0]), $allowed);
        });
        return collect([
            'notAllowed' => $notAllowedCollection,
            'allowed' => $allowedCollection,
        ]);
    }

    /**
     * Convert env content to Collection
     *
     * @param array $allowed
     * @return Collection
     */
    public function convertEnvContentToCollection(array $allowed = []) {
        $envContent = trim($this->getEnvContent());
        $envContent = preg_replace("/\\r\\n/", '|', $envContent);
        $envContent = preg_replace("/\\n/", '|', $envContent);
        $envContent = collect(explode('|', $envContent));
        $envContent = $envContent->map(function ($item) {
            return explode('=', $item);
        });
        return $this->filterEnvContentForConvertingToCollection($envContent, $allowed);
    }

    /**
     * Run migrations
     *
     * @return array|bool
     */
    public function migrate() {
        $output = new BufferedOutput;

        return $this->doMigrate($output);
    }

    /**
     * Run migrations
     *
     * @param BufferedOutput $output
     * @return array|bool
     */
    protected function doMigrate(BufferedOutput $output) {
        try {
            Artisan::call('migrate', ['--force' => true]);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * Run seeds
     *
     * @return array|bool
     */
    public function seed() {
        $output = new BufferedOutput;

        return $this->doSeed($output);
    }

    /**
     * Run seeds
     *
     * @param BufferedOutput $output
     * @return array|bool
     */
    protected function doSeed(BufferedOutput $output) {
        try {
            Artisan::call('db:seed', ['--force' => true]);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /*protected function response($message, $status, BufferedOutput $output) {
        return [
            'message' => $message,
            'status' => $status,
            'output' => $output->fetch(),
        ];
    }*/

    /**
     * Save env file using text-editor method
     *
     * @param Request $request
     * @return array
     */
    public function saveFileTextEditor(Request $request) {
        $data = [
            'message' => 'You can use your website now!',
            'status' => true,
        ];
        try {
            file_put_contents($this->envPathGetter(), $request->envContent);
            Artisan::call('config:clear');
        } catch (\Exception $e) {
            $data['message'] = 'Something went wrong. error: ' . $e->getMessage();
            // return back()->with('error', 'Something went wrong!');
        }
        return $data;
    }

    /**
     * Save env file using wizard method
     *
     * @param string $string
     * @return array
     */
    public function saveFileWizard($string) {
        $data['message'] = 'You can use your website now!';
        $data['status'] = true;
        try {
            file_put_contents($this->envPathGetter(), $string);
            Artisan::call('config:clear');
        } catch (\Exception $e) {
            $data['message'] = 'Something went wrong. error: ' . $e->getMessage();
            $data['status'] = false;
        }

        return $data;
    }
}
