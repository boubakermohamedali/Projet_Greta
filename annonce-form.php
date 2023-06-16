<?php

// Import des fonctions
require_once 'connexion.php';

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier un abo. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer l'abo avec l'id spécifié. 
if (isset($_GET['id_annonce'])) {
    // récupérer $id dans les paramètres d'URL
    $id = filter_input(INPUT_GET, 'id_annonce', FILTER_SANITIZE_NUMBER_INT);

    // Charger les informations de l'abo depuis la BDD pour remplir le formulaire
    try {
        // Se connecter à la BDD avec la fonction connect() définie dans functions.php
        $db = connect();

        // Préparer $aboQuery pour récupérer les informations de l'abo
        $aboQuery = $db->prepare('SELECT * FROM annonces WHERE id_annonce= id_annonce');
        // Exécuter la requête
        $aboQuery->execute(['id_annonce' => $id_annonce]);
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

// Récupérer les abos 
$annonces = getAnnonces();

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='annonces.php' class='btn btn-secondary m-2 active' role='button'>Annonces</a>
<a href='categorie.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>
<a href='members.php' class='btn btn-secondary m-2 active' role='button'>Membres</a>
<a href='utilisateurs.php' class='btn btn-secondary m-2 active' role='button'>Utilisateurs</a>
<a href='contact.php' class='btn btn-secondary m-2 active' role='button'>Contact</a>
<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Annonce-Form</h1>
</div>
<div class='row'>
    <form method='post' action='ajoute_annonce.php'>
        <!--  Ajouter un champs cacher avec l'ID (s'il existe) pour qu'il soit envoyé avec le formulaire -->
        <input type='hidden' name='id' value='<?= $abo['id_annonce'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='Titre'>Titre</label>
            <input type='text' name='Titre' class='form-control' id='Titre' placeholder='Enter Titre' required autofocus value='<?= isset($abo['Titre']) ? htmlentities($abo['Titre']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='Prix_vente'>Prix_vente</label>
            <input type='text' name='Prix_vente' class='form-control' id='Prix_vente' placeholder='Enter Prix_vente' required value='<?= isset($abo['Prix_vente']) ? htmlentities($abo['Prix_vente'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='date_vente'>date_vente</label>
            <input type='text' name='date_vente' class='form-control' id='date_vente' placeholder='Enter date_vente' required value='<?= isset($abo['date_vente']) ? htmlentities($abo['date_vente']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='Date_validation'>Date_validation</label>
            <input type='text' name='Date_validation' class='form-control' id='Date_validattion' placeholder='Enter Date_validation' required value='<?= isset($abo['Date_validation']) ? htmlentities($abo['Date_validation']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='date_fin_validation'>date_fin_validation</label>
            <input type='text' name='date_fin_validation' class='form-control' id='date_fin_validattion' placeholder='Enter date_fin_validation' required value='<?= isset($abo['date_fin_validation']) ? htmlentities($abo['date_fin_validation']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='cont_annonce'>cont_annonce</label>
            <input type='text' name='cont_annonce' class='form-control' id='cont_annonce' placeholder='Enter cont_annonce' required value='<?= isset($abo['cont_annonce']) ? htmlentities($abo['cont_annonce']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='description_annonces'>description_annonces</label>
            <input type='text' name='description_annonces' class='form-control' id='description_annonces' placeholder='Enter description_annonces' required value='<?= isset($abo['description_annonces']) ? htmlentities($abo['description_annonces']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='duree_publication'>duree_publication</label>
            <input type='text' name='duree_publication' class='form-control' id='duree_publication' placeholder='Enter date_creation' required value='<?= isset($abo['duree_publication']) ? htmlentities($abo['duree_publication']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='id_etat'>id_etat</label>
            <input type='text' name='id_etat' class='form-control' id='id_etat' placeholder='Enter id_etat' required value='<?= isset($abo['id_etat']) ? htmlentities($abo['id_etat']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='id_membre_1'>id_membre</label>
            <input type='text' name='id_membre' class='form-control' id='id_membre' placeholder='Enter id_membre' required value='<?= isset($abo['id_membre']) ? htmlentities($abo['id_membre']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='id_membre_1'>id_membre_1</label>
            <input type='text' name='id_membre_1' class='form-control' id='id_membre_1' placeholder='Enter id_membre_1' required value='<?= isset($abo['id_membre_1']) ? htmlentities($abo['id_membre_1']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='date_creation'>description_annonces</label>
            <input type='text' name='date_creation' class='form-control' id='date_creation' placeholder='Enter date_creation' required value='<?= isset($abo['date_creation']) ? htmlentities($abo['date_creation']) : '' ?>'>
        </div>
        <button type='submit' class='btn btn-primary my-3' name='submit'>Envoyer</button>
    </form>
</div>

<?php require_once 'footer.php' ?>
