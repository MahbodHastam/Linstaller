<?php

namespace MahbodHastam\Linstaller\Helpers;

class CheckPermissions {
    protected $results;

    public function __construct() {
        $this->results['permissions'] = [];
        $this->results['errors'] = null;
    }

    /**
     * Check the server permissions
     *
     * @param array $directories
     * @return array
     */
    public function check(array $directories) {
        foreach ($directories as $dir => $permission) {
            if (!($this->getDirPermission($dir)) >= $permission) {
                $this->addDirToList($dir, $permission, false);
                $this->results['errors'] = true;
            } else {
                $this->addDirToList($dir, $permission, true);
            }
        }
        return $this->results;
    }

    /**
     * Get directory's permission
     *
     * @param string $path
     * @return string
     */
    protected function getDirPermission($path) {
        return substr(sprintf('%o', fileperms(base_path($path))), -3);
    }

    /**
     * Add directory to the list of results
     *
     * @param string $dir
     * @param int $permission
     * @param bool $isSet
     * @return void
     */
    protected function addDirToList($dir, $permission, $isSet) {
        array_push($this->results['permissions'], [
            'directory' => $dir,
            'permission' => $permission,
            'isSet' => $isSet,
        ]);
    }
}
