<?php  


namespace Services;

use PDO;
use Exception;
use PDOException;

//Classe de service gérant la connexion à la base de données et l'exécution de requêtes SQL
class ConnexionService{

    protected $connexion;
    protected $request;

    public function __construct(){

        try{
            $this->connexion = new PDO("mysql:host=".DATABASE_HOST.";dbname=".DATABASE_NAME, DATABASE_USER, DATABASE_PASSWORD, array(PDO::ATTR_PERSISTENT => true));
        }
        catch(Exception $e){
            echo json_encode(["Erreur" => $e->getMessage()]);
        }

    }


    public function executeRequest($request, $params, $errorCode){
        try{
            $this->request = $this->connexion->prepare($request);
            $this->request->execute($params);   
            $resultat = $this->request->fetchAll(PDO::FETCH_ASSOC); 
            return $resultat;
        }
        catch(PDOException $e){
            echo json_encode(["Error" => $errorCode ." -> ".$e->getMessage()]);
            exit();
        }
    }

    

    public function executeRequestInsert($request, $params, $errorCode){
        try{
            $this->request = $this->connexion->prepare($request);
            $resultat = $this->request->execute($params);  
            if(!$resultat){
                return null;
            } 
            return $this->connexion->lastInsertId();
        }
        catch(PDOException $e){
            echo json_encode(["Error" => $errorCode ." -> ".$e->getMessage()]);
            exit();
        }
    }

    public function executeRequestDelete($request, $params, $errorCode){
        try{
            $this->request = $this->connexion->prepare($request);
            $resultat = $this->request->execute($params);  
            if(!$resultat){
                return null;
            } 
            return $resultat;
        }
        catch(PDOException $e){
            echo json_encode(["Error" => $errorCode ." -> ".$e->getMessage()]);
            exit();
        }
    }
    

    public function executeRequestUpdate($request, $params, $errorCode){
        try{
            $this->request = $this->connexion->prepare($request);
            $resultat = $this->request->execute($params);  
            if(!$resultat){
                return null;
            } 
            return $resultat;
        }
        catch(PDOException $e){
            echo json_encode(["Error" => $errorCode ." -> ".$e->getMessage()]);
            exit();
        }
    }

}