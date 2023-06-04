<?php

/**
 * Inclusion du fichier de configuration
 */

require "config/env.php";


/**
 * Création d'une fonction d'appel de méthodes des class ciblées (en fonction des éléments reçus par $_GET)
 */
class Dispatcher{

    /**
     * Création d'une fonction d'appel de la méthode et du controller renseignés dans l'URL
     * @access public
     */
    public function dispatch(){
        
        // Si la variable GET controller existe alors la varible controller prend sa valeur sinon elle vaut  magasin
        $controller=(isset($_GET['controller']))?strtolower($_GET['controller']):'magasin';
        $controller.="Controller";
       // Si la variable GET action existe alors la varible action prend sa valeur sinon elle vaut  list
        $action=(isset($_GET['action']))?strtolower($_GET['action']):"list";
        
        $action.="Action";

        $my_controller= new $controller;
            
        $my_controller->$action();
        // if(is_callable(array($controller, $action))){

        //     $my_controller= new $controller;
            
        //     $my_controller->$action();
            
        // }
        // else{
        
        //     echo json_encode(["Error"=>"Impossible d'appeler la méthode ".$action." de la classe ".$controller." ."]);
        // }

    }
}

//Création d'une instance de la class Dispatcher puis execution de la méthode dispatch()
$dispatcher= new Dispatcher();
$dispatcher->dispatch();
