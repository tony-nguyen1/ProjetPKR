<?php
    $ROOT_FOLDER = __DIR__;
    $DS = DIRECTORY_SEPARATOR;
    session_start();
    require $ROOT_FOLDER . $DS . 'lib' . $DS . 'File.php';
    require File::build_path(["controller","routeur.php"]);
?>