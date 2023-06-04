<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $adresse = isset($_POST["adresse"]) ? $_POST["adresse"] : "";

    // Fonction pour effectuer une requête GET à l'API
    function makeGetRequest($url, $params = array()) {
        // Construction de l'URL complète avec les paramètres
        $query = http_build_query($params);
        $url = $url . '?' . $query;
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    
        return json_decode($response, true);
    }

    // Rechercher le(s) magasin(s) en utilisant l'API
    $result = makeGetRequest("http://localhost/api/magasins", [
        "name" => $name,
        "adresse" => $adresse
    ]);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["Error" => "Erreur lors de la recherche."]);
    }
} else {
    header("Location: index.php");
    exit;
}
?>