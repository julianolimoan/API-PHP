<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $adresse = isset($_POST["adresse"]) ? $_POST["adresse"] : "";
    $id = isset($_POST["id"]) ? $_POST["id"] : ""; 

    // Fonction pour effectuer une requête PUT à l'API
    function makePutRequest($url, $data) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT"); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); 
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    // Update le magasin en utilisant l'API
    $result = makePutRequest("http://localhost/api/magasins?action=updateMagasin", [
        "id" => $id,
        "name" => $name,
        "adresse" => $adresse
    ]);
    
    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["Error" => "Erreur lors de l'update du magasin."]);
    }
} else {
    header("Location: index.php");
    exit;
}
?>