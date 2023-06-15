<?php

// Import de functions.php
require_once("connexion.php");
try {
    // Récupération des abos avec la fonction getAbos() définie dans connexion.php
 $annonces=getAnnonces();
} catch (Exception $e) {
    // Afficher le message en cas d'envoi d'exception
    echo $e->getMessage();
}

?>

<?php require_once 'header.php' ?>
<a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
<a href='annonces.php' class='btn btn-secondary m-2 active' role='button'>Annonces</a>
<a href='categorie.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>
<a href='members.php' class='btn btn-secondary m-2 active' role='button'>Membres</a>
<a href='utilisateurs.php' class='btn btn-secondary m-2 active' role='button'>Utilisateurs</a>



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
    <h1 class='col-md-12 text-center border border-dark bg-primary text-white'>Annonces</h1>
</div>
<div class='row'>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Titre</th>
                <th scope='col'>date_vente</th>
                <th scope='col'>Prix_vente</th>
                <th scope='col'>cont_annonce</th>
                <th scope='col'>Date_validation</th>
                <th scope='col'>description_annonces</th>
                <th scope='col'>date_creation</th>
                <th scope='col'>duree_publication</th>
                <th scope='col'>date_fin_publication</th>
                <th scope='col'>id_membre </th>
                <th scope='col'>id_etat</th>
                <th scope='col'>d_membre_1</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($annonces as $abo) : ?>
                <tr>
                    <td><?= $abo['id_annonce'] ?></td>
                    <td><?= htmlentities($abo['Titre']) ?></td>
                    <td><?= $abo['Prix_vente'] ?></td>
                    <td><?= $abo['Date_vente'] ?></td>
                    <td><?= $abo['cont_annonce'] ?></td>
                    <td><?= $abo['Date_validation'] ?></td>
                    <td><?= $abo['description_annonces'] ?></td>
                    <td><?= $abo['date_creation'] ?></td>
                    <td><?= $abo['description_annonces'] ?></td>
                    <td><?= $abo['duree_publication'] ?></td>
                    <td><?= $abo['date_fin_publication'] ?></td>
                    <td><?= $abo['id_membre'] ?></td>
                    <td><?= $abo['id_etat'] ?></td>
                    <td><?= $abo['id_membre_1'] ?></td>
                    <td><?= $abo['date_creation'] ?></td>
                    <td>
                        <a class='btn btn-primary' href='annonce-form.php?id=<?= $abo['id_annonce'] ?>' role='button'>Modifier</a>
                        <a class='btn btn-danger' href='delete-annonce.php?id=<?= $abo['id_annonce'] ?>' role='button'>Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class='row'>
    <div class='col'>
        <br>
        <a class='btn btn-success' href='annonce-form.php' role='button'>Ajouter annonces</a>
    </div>
</div>

<?php require_once 'footer.php' ?>