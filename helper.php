<?php


function controller($name)
{
    if (empty($name))
    {
        $name = 'index';
    }

    $file = "controllers/$name.ctl.php";

    if (file_exists($file))
    {
        require $file;
    }
    else
    {
        header("HTTP/1.0 404 Not Found");
        exit("Pagina no encontrada");
    }
}