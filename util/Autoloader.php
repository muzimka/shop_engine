<?php
namespace util;

class Autoloader
{
    public function autoLoadClass($className)
    {
        $file = ROOT_DIR . "{$className}.php";
        if (file_exists($file)) {
            include $file;
            return;
        }
    }
}