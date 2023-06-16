<?php

// Import des connexions
require_once 'connexion.php';

// Pour éviter de dupliquer le code, ce formulaire sera utiliser pour créer ou modifier un membre. Si l'url est appelée avec id= alors nous l'utiliserons pour éditer le membre avec l'id spécifié. 
if (isset($_GET['id'])) {
    // récupérer $id dans les paramètres d'URL
    $id_membre = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // Charger les informations du membre depuis la BDD pour remplir le formulaire
    try {
        // Se connecter à la BDD avec la connexion connect() définie dans connexion.php
        $db = connect();

        // Préparer $memberQuery pour récupérer les informations du membre
        $memberQuery = $db->prepare('SELECT*FROM membres WHERE id_membre = id_membre');
        // Exécuter la requête
        $memberQuery->execute(['id_membre' => $id_membre]);
        // Récupérer les données et les assigner à $member
        $member = $memberQuery->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // Afficher le message s'il y a une exception
        echo $e->getMessage();
    }
    // Fermer la connection à la BDD
    $memberQuery=null;
    $db=null;
}
//var_dump($member);
// Récupérer les members 
//$members = getMembers();

?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='categorie.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>
<a href='members.php' class='btn btn-secondary m-2 active' role='button'>Membres</a>
<a href='utilisateur.php' class='btn btn-secondary m-2 active' role='button'>Utilisateurs</a>
<a href='contact.php' class='btn btn-secondary m-2 active' role='button'>Contact</a>

<div class='row'>
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Member Form</h1>
</div>
<div class='row'>
    <form method='post' action='add-edit-member.php'>
        <!--  Ajouter the ID to the form if it exists but make the field hidden -->
        <input type='hidden' name='id' value='<?= $member['id_membre'] ?? '' ?>'>
        <div class='form-group my-3'>
            <label for='firstName'>Prénom</label>
            <input type='text' name='prenom' class='form-control' id='firstName' placeholder='Enter prénom' required autofocus value='<?= isset($member['prenom']) ? htmlentities($member['prenom']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='lastName'>Nom</label>
            <input type='text' name='nom' class='form-control' id='lastName' placeholder='Enter nom' required value='<?= isset($member['nom']) ? htmlentities($member['nom'])  : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='adresse_postale'>Adresse_Postale</label>
            <input type='text' name='adresse_postale' class='form-control' id='adresse_postale' placeholder='Enter adresse_postale' required value='<?= isset($member['adresse_postale']) ? htmlentities($member['adresse_postale']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='code_postal'>code_postal</label>
            <input type='text' name='code_postal' class='form-control' id='code_postal' placeholder='Enter code_postal' required value='<?= isset($member['code_postal']) ? htmlentities($member['code_postal']) : '' ?>'>
        </div> 
        <div class='form-group my-3'>
            <label for='telephone'>telephone</label>
            <input type='text' name='telephone' class='form-control' id='telephone' placeholder='Enter code_postal' required value='<?= isset($member['telephone']) ? htmlentities($member['telephone']) : '' ?>'>
        </div> 
        <div class='form-group my-3'>
            <label for='url_photo_profil'>url_photo_profil</label>
            <input type='text' name='url_photo_profil' class='form-control' id='url_photo_profil' placeholder='Enter url_photo_profil' required value='<?= isset($member['url_photo_profil']) ? htmlentities($member['url_photo_profil']) : '' ?>'>
        </div> 
        <div class='form-group my-3'>
            <label for='email'>email</label>
            <input type='text' name='email' class='form-control' id='email' placeholder='Enter email' required value='<?= isset($member['email']) ? htmlentities($member['email']) : '' ?>'>
        </div>
        <div class='form-group my-3'>
            <label for='user_name'>user_name</label>
            <input type='text' name='user_name' class='form-control' id='user_name' placeholder='Enter user_name' required value='<?= isset($member['user_name']) ? htmlentities($member['email']) : '' ?>'>
        </div> 
        <div class='form-group my-3'>
            <label for='token'>token</label>
            <input type='text' name='token' class='form-control' id='token' placeholder='Enter token' required value='<?= isset($member['token']) ? htmlentities($member['token']) : '' ?>'>
        </div> 
        <div class='form-group my-3'>
            <label for='hash'>hash</label>
            <input type='text' name='hash' class='form-control' id='hash' placeholder='Enter hash' required value='<?= isset($member['hash']) ? htmlentities($member['hash']) : '' ?>'>
        </div> 
        <div class='form-group my-3'>
            <label for='date_validation_token'>date_validation_token</label>
            <input type='text' name='date_validation_token' class='form-control' id='date_validation_token' placeholder='Enter date_validation_token' required value='<?= isset($member['date_validation_token']) ? htmlentities($member['date_validation_token']) : '' ?>'>
        </div> 
        <div class='form-group my-3'>
            <label for='solde_cagnotte'>solde_cagnotte</label>
            <input type='text' name='solde_cagnotte' class='form-control' id='solde_cagnotte' placeholder='Enter solde_cagnotte' required value='<?= isset($member['solde_cagnotte']) ? htmlentities($member['solde_cagnotte']) : '' ?>'>
        </div> 
        <div class='form-group my-3'>
            <label for='ville'>ville</label>
            <input type='text' name='ville' class='form-control' id='ville' placeholder='Enter ville' required value='<?= isset($member['ville']) ? htmlentities($member['ville']) : '' ?>'>
        </div> 
        <div class='form-group my-3'>
            <label for='date_description'>date_description</label>
            <input type='text' name='date_description' class='form-control' id='solde_cagnotte' placeholder='Enter solde_cagnotte' required value='<?= isset($member['solde_cagnotte']) ? htmlentities($member['date_description']) : '' ?>'>
        </div> 
       <button type='submit' class='btn btn-primary my-3' name='submit'>Submit</button>
    </form>
</div>

<?php require_once 'footer.php' ?>
