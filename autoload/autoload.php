<?php
spl_autoload_register(function ($className) {
    $classFileName = "{$className}.php";
    require_once $classFileName;
}, true, true);