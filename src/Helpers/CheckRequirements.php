<?php

namespace MahbodHastam\Linstaller\Helpers;

class CheckRequirements {

    /**
     * Check the Server requirements
     *
     * @param array $requirements
     * @return array
     */
    public function check(array $requirements) {
        $results = [];

        foreach ($requirements as $key => $requirement) {
            switch ($key) {
                case 'php':
                    foreach ($requirements[$key] as $requirement) {
                        $results['requirements'][$key][$requirement] = true;

                        if (!extension_loaded($requirement)) {
                            $results['requirements'][$key][$requirement] = false;
                            $results['errors'] = true;
                        }
                    }
                    break;
                case 'apache':
                    foreach ($requirements[$key] as $requirement) {
                        if (function_exists('apache_get_modules')) {
                            $results['requirements'][$key][$requirement] = true;

                            if (!in_array($requirement, apache_get_modules())) {
                                $results['requirements'][$key][$requirement] = false;
                                $results['errors'] = true;
                            }
                        }
                    }
                    break;
            }

            return $results;
        }
    }
}
