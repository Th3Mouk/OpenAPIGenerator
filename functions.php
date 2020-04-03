<?php

declare(strict_types=1);

if (!function_exists('getRootPath')) {
    function getRootPath(): string
    {
        $dir = __DIR__;
        while (!file_exists($dir . '/composer.lock')) {
            $dir = dirname($dir);
        }

        return $dir;
    }
}
