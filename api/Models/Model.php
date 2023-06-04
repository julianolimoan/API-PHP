<?php

namespace Models;

use PDO;
use Exception;
use Services\ConnexionService;

abstract class Model{

    protected $connexion;

    public function __construct(){
        $connexion = new ConnexionService;
        $this->connexion = $connexion;
    }

}