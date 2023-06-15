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
<a href='categorie.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>
<a href='members.php' class='btn btn-secondary m-2 active' role='button'>Membres</a>
<a href='annonces.php' class='btn btn-secondary m-2 active' role='button'>Annonces</a>
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
    <h1 class='col-md-12 text-center border border-dark text-white bg-primary'>utilisateurs</h1>
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
        <a class='btn btn-success' href='utilisateur-form.php' role='button'>Ajouter utilisateurs</a>
    </div>
</div>
<?php
    session_start();  //commencement de la session
    
    if(isset($_SESSION['id_membre'])){                                                          //si on detect une co redirection vers la page home
        header('index.php');
        exit;
    } 
    $bdd = new PDO('mysql:host=localhost;dbname=bateau_pirate;charset=utf8;', 'root','');         //co a la bdd
    if(isset($_POST['envoi'])){                                                             //boucle si j'envoie
                                                                                            // Pour encoder, sécurise pour eviter l'insertion de code          
            $email = htmlspecialchars($_POST['email']);             
                                                                                            // crypt le mdp
            $mdp = sha1($_POST['nom']);  

        if(!empty($_POST['email']) AND !empty($_POST['nom'])){                              //check si les input ne sont pas vide 
                            
                                                                                                // reqt Récupérer les utilisateurs:
            $recupUser= $bdd->prepare('SELECT * FROM membres WHERE email = ? AND nom = ?');
            $recupUser->execute(array($email, $nom));                                       // execute 

            $userexist = $recupUser->rowCount();                                            //renvoie le nombre de lignes qui correspondent à un critère spécifié.
            if($userexist == 1){
                $userinfo = $recupUser->fetch();                                            // rechercher ses informations puis les mettres dans des variables de sessions
                $_SESSION['id_membre'] = $userinfo['id_membre'];                                    // fetch() fait une recherche precise 
                $_SESSION['identifiant'] = $userinfo['identifiant'];
                $_SESSION['email'] = $userinfo['email'];
                
                header("Location: profil.php?id_membre=".$_SESSION['id_membre']);
        
            }else{
                    $msg1 =  "<p class='erreur'>Votre mot de passe ou adresse est incorrect</p>";
                }

        }else{
                $msg1 = "<p class='erreur items-center'>Veuillez compléter tous les champs</p>";
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <title>Connexion | petit annonce</title>

    <link id="codyframe" rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link href="style.css" rel="stylesheet">

  
</head>
<body>


       
                       
        
        <form action="" method="post" class="sign-up-form width-100% items-center form" >
                    <div class="text-component text-center margin-bottom-sm">
                        <h1>Connexion</h1> 
                    </div>

                    <?php if(isset($msg1)){ echo $msg1;}?>
                    


                <div class="margin-sm">
                    <label class="form-label margin-bottom-xxxs" for="email">Email</label><br>
                    <input class="form-control width-100%" type="email" name="email" id="email" placeholder=""  autocomplete="off">
                </div>

                <div class="margin-sm">
                    <label class="form-label margin-bottom-xxxs" for="mdp">Mot de passe</label>
                    <input class="form-control width-100%" type="password" name="mdp" id="mdp" placeholder=""  autocomplete="off">
                    <p id="crea">Pas encore de compte? <a href="creation_compte.php">Ici</a></p>
                    <p id="forget">Mot de passe oublié? <a href="#">Ici</a></p>
                </div>

                <div class="margin-sm">
                    <!-- <button class="btn btn--primary btn--md width-100%" name="envoi">Join</button> -->
                    <input type="submit" name="envoi" class="btn btn--primary btn--md width-100%">
                    
                </div>

                <div class="margin-sm">
                    <a href="index.php"><img src="https://img.icons8.com/material-outlined/24/000000/long-arrow-left.png"></a>
                </div>
        </form>


        

        <form action="landing.php" method="post" class="sign-up-form width-20% items-center form2" >
                    <div class="text-component text-center margin-bottom-sm">
                        <h1>Recuperation</h1> 
                    </div>

             

                <div class="margin-sm">
                    <label class="form-label margin-bottom-xxxs" for="">Mail</label><br>
                    <input class="form-control width-100%" type="email" name="email" id="email" placeholder="">
                </div>

                
                <div class="margin-sm">
                    <button class="btn btn--primary btn--md width-100%">Join</button>
                    
                </div>

                <div class="margin-sm">
                    <a href="connexion.php"><img src="https://img.icons8.com/material-outlined/24/000000/long-arrow-left.png"></a>
                </div>
        </form>


    
 
<?php require_once 'footer.php' ?>