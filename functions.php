<?php

if (!function_exists('getRootPath')) {
    function getRootPath(): string
    {
        $dir = $rootDir = __DIR__;
        while (!file_exists($dir.'/composer.lock')) {
            $dir = \dirname($dir);
        }

        return $dir;
    }
}
