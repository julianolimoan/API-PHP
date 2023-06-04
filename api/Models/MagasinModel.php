<?php

namespace Models;

use Models\Model;

class MagasinModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    // Requête qui va chercher un magasin en fonction de son nom et adresse
    public function getList($name, $adresse){

        $request = 
        "SELECT * FROM `magasin` WHERE `nom` LIKE :magasin_name AND `adresse` LIKE :magasin_adresse";

        $params = [
            ":magasin_name" => "%".$name."%",
            ":magasin_adresse" => "%".$adresse."%",
        ];

        $magasins = $this->connexion->executeRequest($request, $params, "GET_MAGASIN_LIST");

        return $magasins;

    }

    // Requête qui va insérer un magasin avec un id
    public function addMagasin($name, $adresse){

        $request = 
        "INSERT INTO `magasin` (id, nom, adresse) VALUE (NULL, :magasin_name, :magasin_adresse)";

        $params = [
            ":magasin_name" => $name,
            ":magasin_adresse" => $adresse,
        ];

        return $this->connexion->executeRequestInsert($request, $params, "INSERT_NEW_MAGASIN");

    }

    // Requête qui va modifier un magasin en modifiant  son nom  ou et adresse
    public function updateMagasin($name, $adresse, $id){

        $request = 
        " UPDATE  `magasin` SET `nom` = :magasin_name, `adresse` = :magasin_adresse WHERE id = :id ";

        $params = [
            ":id" => $id,
            ":magasin_name" => $name,
            ":magasin_adresse" => $adresse,
        ];

        return $this->connexion->executeRequestUpdate($request, $params, "UPDATE_MAGASIN");

    }

    // Requête qui va supprimer un magasin en fonction de son id
    public function deleteMagasin($id){

        $request = 
        " DELETE FROM `magasin` WHERE id = :id ";

        $params = [
            ":id" => $id,
        ];

        return $this->connexion->executeRequestUpdate($request, $params, "DELETE_MAGASIN");

    }

}