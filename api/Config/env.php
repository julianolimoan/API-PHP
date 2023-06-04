<?php

//Autoloader pour les classes PHP
spl_autoload_register(function($className){
    $className = str_replace("\\", "/", $className);
    $className=$className.".php";
    if(file_exists($className)){
        require_once $className;
    }
});



// configuration de la connexion PDO à la base de données
define('DATABASE_HOST' ,"localhost");
define('DATABASE_NAME' ,"_wshop_test");
define('DATABASE_USER' ,"root");
define('DATABASE_PASSWORD' ,"");


//Inclusion des controllers, models et vues
include "Views/View.php";
include "Views/MagasinView.php";

include "Models/Model.php";
include "Models/MagasinModel.php";

include "Controllers/Controller.php";
include "Controllers/MagasinController.php";

?>