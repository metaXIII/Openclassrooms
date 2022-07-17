<?php
    define('WWW_ROOT', realpath(dirname(dirname(__FILE__))));

    $directory = basename(WWW_ROOT);

    $url = explode($directory, urldecode($_SERVER['REQUEST_URI']));
    if (count($url) == 1) {
        define('WEBROOT', '/');
    } else {
        define('WEBROOT', $url[0] . $directory . "/");
    }

    function chargerClass($name)
    {
        require str_replace('\\', '/', $name) . ".php";
    }

    spl_autoload_register("chargerClass");
