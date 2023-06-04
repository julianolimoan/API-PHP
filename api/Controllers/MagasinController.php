<?php


use Views\MagasinView;
use Models\MagasinModel;
//Inclusion de la vue et du model

/**
 * Création d'une class HomeController, fille de la class Controller
 * 
 * Contient les méthodes d'appel de la vue et du model 
 */
class MagasinController extends Controller{


    /**
    * Appel de la méthode mère de construction de la class Controller
    *
    * On passe en paramètres une nouvelle class vue et model de l'entité
    */
    public function __construct(){
        parent::__construct(new MagasinView(), new MagasinModel());
    }


    
    /**
     * listAction
     * 
     * Récupère et affiche la liste des magasins filtrés par nom et adresse
     * 
     * URL : api/magasin
     * Méthode : GET
     *
     * @return void
     */
    public function listAction(){

        $filter_name = isset($_GET["name"]) ? $_GET["name"] : "";
        $filter_adresse = isset($_GET["adresse"]) ? $_GET["adresse"] : "";

        $list_magasin = $this->model->getList($filter_name, $filter_adresse);

        $this->view->showList($list_magasin);

    }



    /**
     * addMagasinAction
     * 
     * Insère un nouveau magasin
     * 
     * URL : api/magasin
     * Méthode : POST
     *
     * @return void
     */
    public function addMagasinAction(){

        $magasin_name = isset($_POST["name"]) ? $_POST["name"] : null;
        $magasin_adresse = isset($_POST["adresse"]) ? $_POST["adresse"] : null;

        if(!$magasin_name || !$magasin_adresse){
            echo json_encode(["Error" => "Vous devez renseigner un nom et une adresse"]);
            exit();
        }

        $magasin_id = $this->model->addMagasin($magasin_name, $magasin_adresse);

        $this->view->showAddMagasinResponse($magasin_id);

    }


    /**
     * updateMagasinAction
     * 
     * Permet de modifier un magasin déjà existant 
     * 
     * URL : api/magasin
     * Méthode : PUT
     *
     * @return void
     */
    public function updateMagasinAction(){
        parse_str(file_get_contents("php://input"), $_PUT);
        $magasin_name = isset($_PUT["name"]) ? $_PUT["name"] : null;
        $magasin_adresse = isset($_PUT["adresse"]) ? $_PUT["adresse"] : null;
        $magasin_id = isset($_PUT["id"]) ? $_PUT["id"] : null;

        if(!$magasin_id){
            echo json_encode(["Error" => "Vous devez renseigner un id"]);
            exit();
        }
        
        if(!$magasin_name || !$magasin_adresse){
            echo json_encode(["Error" => "Vous devez renseigner un nom et une adresse"]);
            exit();
        }

        $reponse = $this->model->updateMagasin($magasin_name , $magasin_adresse, $magasin_id);


        $this->view->showUpdateMagasinResponse($magasin_id, $reponse);

    }


    /**
     * deleteMagasinAction
     * 
     * Permet de supprimer un magasin par son id
     * 
     * URL : api/magasin
     * Méthode : DELETE
     *
     * @return void
     */
    public function deleteMagasinAction(){
        parse_str(file_get_contents("php://input"), $_DELETE);
        $magasin_id = isset($_DELETE["id"]) ? $_DELETE["id"] : null;

        if(!$magasin_id){
            echo json_encode(["Error" => "Vous devez renseigner un id"]);
            exit();
        }
        

        $reponse = $this->model->deleteMagasin($magasin_id);


        $this->view->showDeleteMagasinResponse($magasin_id, $reponse);

    }

}