<?php

use Illuminate\Support\Collection;
use MahbodHastam\Linstaller\Helpers\ManageEnvironment;

if (!function_exists('set_stepper_class')) {
    /**
     * Add done/current class for stepper-item
     *
     * @param int $elementStep
     * @param int $step
     * @return string
     */
    function set_stepper_class(int $elementStep, int $step) {
        if ($elementStep === $step)
            return 'current';

        if ($elementStep < $step)
            return 'done';

        return null;
    }
}

if (!function_exists('print_status')) {
    /**
     * Prints status
     *
     * @param bool $status
     * @return string
     */
    function print_status($status) {
        if ($status)
            return '<span class="text-success"><i class="bx bx-message-square-check"></i></span>';
        return '<span class="text-error"><i class="bx bx-message-square-x"></i></span>';
    }
}

if (!function_exists('get_env_variables')) {
    /**
     * Get all environment variables as a Laravel Collection
     *
     * @param array $allowed
     * @return Collection
     */
    function get_env_variables(array $allowed = []) {
        $environmentManager = new ManageEnvironment();
        return $environmentManager->convertEnvContentToCollection($allowed);
    }
}

if (!function_exists('string_contains')) {
    /**
     * Looking for something in string
     *
     * @param $string
     * @param $match
     * @return bool
     */
    function string_contains($string, $match) {
        return strpos($string, $match) !== false;
    }
}
