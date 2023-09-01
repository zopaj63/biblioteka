<?php

    spl_autoload_register(function($className)
    {
        include $className.".php"; //include "Folder/$klasa .".php"
    });


?>