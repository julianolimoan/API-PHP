<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $adresse = isset($_POST["adresse"]) ? $_POST["adresse"] : "";

    // Fonction pour effectuer une requête POST à l'API
    function makePostRequest($url, $data) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    // Ajouter le magasin en utilisant l'API
    $result = makePostRequest("http://localhost/api/magasins?action=addMagasin", [
        "name" => $name,
        "adresse" => $adresse
    ]);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["Error" => "Erreur lors de l'ajout du magasin."]);
    }
} else {
    header("Location: index.php");
    exit;
}
?>