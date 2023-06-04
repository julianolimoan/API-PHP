<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = isset($_POST["id"]) ? $_POST["id"] : "";

    // Fonction pour effectuer une requête DELETE à l'API
    function makeDeleteRequest($url, $data) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    // Supprimer le magasin en utilisant l'API
    $result = makeDeleteRequest("http://localhost/api/magasins?action=deleteMagasin", [
        "id" => $id,
    ]);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(["Error" => "Erreur lors de la supression du magasin."]);
    }
} else {
    header("Location: index.php");
    exit;
}
?> 