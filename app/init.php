<?php
    //Cargamos las librerias
    require_once 'config/config.php';
    require_once 'helpers/url_helper.php';
    require_once "Mail.php";
    require_once "Mail/mail.php";
   
    //Autoload
    spl_autoload_register(function($nombreClase)
    {
        require_once 'libs/' .$nombreClase .'.php';
    })

?>
