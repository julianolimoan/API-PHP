<?php

namespace Views;

use Views\View;

// Classe permettant l'affichage des vues en fonctions des méthodes
class MagasinView extends View{

    public function __construct(){
        parent::__construct();
    }


    public function showList($list_magasin){

        $this->page = $list_magasin;
        $this->displayPage();

    }


    public function showAddMagasinResponse($magasin_id){
        
        if($magasin_id){
            $this->page = ["Success" => "Le nouveau magasin à bien été enresitré avec l'identifiant ".$magasin_id];
        }
        else{
            $this->page = ["Error" => "Une erreur est survenue lors de l'ajout du magasin"];
        }

        $this->displayPage();

    }

    public function showUpdateMagasinResponse($magasin_id, $reponse){
        
        if($reponse){
            $this->page = ["Success" => "Le  magasin a bien ete mis a jour  avec l'identifiant ".$magasin_id];
        }
        else{
            $this->page = ["Error" => "Une erreur est survenue lors de l'update du magasin"];
        }

        $this->displayPage();

    }

    public function showDeleteMagasinResponse($magasin_id, $reponse){
        
        if($reponse){
            $this->page = ["Success" => "Le  magasin a bien supprimer  avec l'identifiant ".$magasin_id];
        }
        else{
            $this->page = ["Error" => "Une erreur est survenue lors de la suppression du magasin"];
        }

        $this->displayPage();

    }

}