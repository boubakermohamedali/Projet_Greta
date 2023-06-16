<?php

require_once 'connexion.php';

// Création d'un bloc try/catch pour gérer les exceptions de la BDD
try {
    // Connection à la BDD
    $db = connect();

    // Création de $membersQuery. On utilise inner join pour récupérer les titres d'abo
    $membersQuery = $db->query('SELECT * FROM membres');
    // Récupération de tous les membres et assignation à $members
    $members = $membersQuery->fetchAll(PDO::FETCH_ASSOC);;

} catch (Exception $e) {
    // Affiche le message en cas d'exception
    echo $e->getMessage();
}
var_dump($members);
// Fermeture de la connexion à la BDD
$db=null;
?>

<?php require_once 'header.php' ?>

<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='annonces.php' class='btn btn-secondary m-2 active' role='button'>Annonces</a>
<a href='categorie.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>
<a href='members.php' class='btn btn-secondary m-2 active' role='button'>Membres</a>
<a href='utilisateurs.php' class='btn btn-secondary m-2 active' role='button'>Utilisateurs</a>
<a href='contact.php' class='btn btn-secondary m-2 active' role='button'>Contact</a>

<?php if (!empty($_GET['type']) && ($_GET['type'] === 'success')) : ?>
    <div class='row'>
        <div class='alert alert-success'>
            Succès! <?= $_GET['message'] ?>
        </div>
    </div>
<?php elseif (!empty($_GET['type']) && ($_GET['type'] === 'error')) : ?>
    <div class='row'>
        <div class='alert alert-danger'>
            Erreur! <?= $_GET['message'] ?>
        </div>
    </div>
<?php endif; ?>
<div class='row'>
    <h1 class='col-md-12 text-center border border-dark text-white bg-primary'>Membres</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Prénom</th>
                <th scope='col'>Nom</th>
                <th scope='col'>Adresse_postal</th>
                <th scope='col'>Telephone</th>
                <th scope='col'>Ville</th>
                <th scope='col'>Code_postal</th>
                <th scope='col'>email</th>
                <th scope='col'>user_name</th>
                <th scope='col'>Hash</th>
                <th scope='col'>Token</th>
                <th scope='col'>Solde_cagnotte</th>
                <th scope='col'>Date_description</th>
                <th scope='col'>Date_validation_token</th>
                <th scope='col'>Url_Photo_profil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member) : ?>
                <tr>
                    <td><?= $member['id_membre'] ?></td>
                    <td><?= htmlentities($member['prenom']) ?></td>
                    <td><?= htmlentities($member['nom']) ?></td>
                    <td><?= htmlentities($member['adresse_postale']) ?></td>
                    <td><?= htmlentities($member['code_postal']) ?></td>
                    <td><?= htmlentities($member['telephone']) ?></td>
                    <td><?= htmlentities($member['user_name']) ?></td>
                    <td><?= htmlentities($member['ville']) ?></td>
                    <td><?= htmlentities($member['token']) ?></td>
                    <td><?= htmlentities($member['email']) ?></td>
                    <td><?= htmlentities($member['hash']) ?></td>
                    <td><?= htmlentities($member['solde_cagnotte']) ?></td>
                    <td><?= htmlentities($member['url_photo_profil']) ?></td>
                    <td><?= htmlentities($member['date_description']) ?></td>
                    <td><?= htmlentities($member['date_validation_token']) ?></td>
                    <td>
                        <a class='btn btn-primary' href='member-form.php?id=<?= $member['id_membre'] ?>' role='button'>Modifier</a>
                        <a class='btn btn-danger' href='delete-member.php?id=<?= $member['id_membre'] ?>' role='button'>Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <a class='btn btn-success' href='member-form.php' role='button'>Ajouter membre</a>
    </div>
</div>

<?php require_once 'footer.php' ?>
