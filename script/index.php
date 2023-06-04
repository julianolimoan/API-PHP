<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.4.1.min.js"></script>
    <script src="script.js"></script>
    <title>Test API REST</title>
</head>

<body>

    <div>

        <h1>Test de l'API REST sur les magasins</h1>

        <br><br>

        <h2>Rechercher un magasin</h2>

        <form action="search_magasin.php" method="POST" id="get_magasin_form">
            <label for="name">Rechercher par nom</label>
            <input type="text" name="name" id="name">
            <label for="adresse">Rechercher par adresse</label>
            <input type="text" name="adresse" id="adresse">
            <button type="submit">Rechercher</button>
        </form>

        <br><br>

        <h2>Ajout d'un magasin</h2>
        
        <form action="add_magasin.php" method="POST" id="add_magasin_form">
            <label for="name">Saisisssez un nom</label>
            <input type="text" name="name" id="name">
            <label for="adresse">Saisisssez une adresse</label>
            <input type="text" name="adresse" id="adresse">
            <button type="submit">Ajouter</button>
        </form>

        <br></br>

        <h2>Update d'un magasin</h2>
        
        <form action="update_magasin.php" method="POST" id="update_magasin_form">
            <label for="id">Saisisssez un id</label>
            <input type="number" name="id" id="id">
            <label for="name">Saisisssez un nom</label>
            <input type="text" name="name" id="name">
            <label for="adresse">Saisisssez une adresse</label>
            <input type="text" name="adresse" id="adresse">
            <button type="submit">Modifier</button>
        </form>

        <br></br>
        
        <h2>Supression d'un magasin</h2>
        
        <form action="delete_magasin.php" method="POST" id="delete_magasin_form">
            <label for="id">Saisisssez un id</label>
            <input type="number" name="id" id="id">
            <button type="submit">Supprimer</button>
        </form>

    </div>

</body>

</html>