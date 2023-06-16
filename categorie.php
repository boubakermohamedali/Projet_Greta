<?php

// Import des fonctions
require_once 'connexion.php';

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier un abo. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer l'abo avec l'id spécifié. 
if (isset($_GET['id_categorie'])) {
    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id_categorie', FILTER_SANITIZE_NUMBER_INT);

    // Charger les informations de l'abo depuis la BDD pour remplir le formulaire
    try {
        // Se connecter à la BDD avec la fonction connect() définie dans functions.php
        $db = connect();

        // Préparer $aboQuery pour récupérer les informations de l'abo
        $aboQuery = $db->prepare('SELECT * FROM categories WHERE id_categorie= id_categorie');
        // Exécuter la requête
        $aboQuery->execute(['id_categorie' => $id_categorie]);
        // Récupérer les données et les assigner à $abo
        $abo = $aboQuery->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // Afficher le message s'il y a une exception
        echo $e->getMessage();
    }

    // Fermer la connection à la BDD
    $aboQuery=null;
    $db=null;
}

// Récupérer les categorie 
$categorie = getCategorie();

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='categorie.php' class='btn btn-secondary m-2 active' role='button'>categories</a>
<a href='annonces.php' class='btn btn-secondary m-2 active' role='button'>Annonces</a>
<a href='members.php' class='btn btn-secondary m-2 active' role='button'>Membres</a>
<a href='utilisateurs.php' class='btn btn-secondary m-2 active' role='button'>Utilisateurs</a>
<a href='contact.php' class='btn btn-secondary m-2 active' role='button'>Contact</a>

<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>categorie</h1>
</div>
<div class='row'>
    <form method='post' action='categories.php'>
        <!--  Ajouter un champs cacher avec l'ID (s'il existe) pour qu'il soit envoyé avec le formulaire -->
        <input type='hidden' name='id_categorie' value='<?= $categorie['id_categorie'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='firstName'>nom_categorie</label>
            <input type='text' name='nom_categorie' class='form-control' id='nom_categorie' placeholder='Enter nom_categorie' required autofocus value='<?= isset($abo['nom_categorie']) ? htmlentities($abo['nom_categorie']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='description_categorie'>description_categorie</label>
            <input type='number' name='description_categorie' class='form-control' id='description_categorie' placeholder='Enter description_categorie' required value='<?= isset($abo['description_categorie']) ? htmlentities($abo['description_categorie'])  : '' ?>'>
        </div>
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

<?php require_once 'footer.php' ?>
