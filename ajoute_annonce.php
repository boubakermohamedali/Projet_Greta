<?php 
require_once 'fonctions.php';

if (!empty($_POST)) {
    $id_annonce = $_POST['id_annonce'] ?? '';
    $date_vente = $_POST['date_vente'] ?? '';
    $cont_annonce= $_POST['cont_annonce'] ?? '';
    $Titre= $_POST['Titre'] ?? '';
    $Date_validation= $_POST['Date_validation'] ?? '';
    $description_annonces= $_POST['description_annonces'] ?? '';
    $date_creation= $_POST['date_creation'] ?? '';
    $duree_publication= $_POST['duree_publication'] ?? '';
    $date_fin_publication= $_POST['date_fin_publication'] ?? '';
    $id_membre= $_POST['id_membre'] ?? '';
    $id_etat= $_POST['id_etat'] ?? '';
    $id_membre_1= $_POST['id_membre_1'] ?? '';
    $annonce_id = filter_input(INPUT_POST, 'annonce_id', FILTER_SANITIZE_NUMBER_INT);
    // Connection à la BDD avec la fonction connect() dans functions.php
    $db = connect();

    // Un membre n'a un ID que si ses infos sont déjà enregistrées en BDD, donc on vérifie s'il  le membre a un ID.
    if (empty($_POST['id'])) {
         // S'il n'y a pas d'ID, le membre n'existe pas dans la BDD donc on l'ajoute.
         try {
            // Préparation de la requête d'insertion.
            $createMemStmt = $db->prepare('INSERT INTO annonces (id_annonce, date_vente, cont_annonce, Titre, Date_validation ,description_annonces, date_creation, duree_publication, date_fin_publication, id_membre, id_etat, id_membre_1) VALUES( :annonce, :date_vente, :cont_annonce, :Titre, :Date_validation , :description_annonces, :date_creation, :duree_publication, :date_fin_publication, :id_membre, :id_etat, :id_membre_1)');
            // Exécution de la requête
            $createMemberStmt->execute(['annonce,'=>$annonce, 'date_vente'=>$date_vente, 'cont_annonce'=>$cont_annonce, 'Titre'=>$Titre,'Date_validation'=>$Date_validation, 'description_annonces'=>$description_annonces, 'date_creation'=>$date_creation,'duree_publication'=>$duree_publication,  'date_fin_publication'=>$date_fin_publication,'id_membre,'=>$id_membre, 'id_etat'=>$id_etat, 'id_membre_1'=>$id_membre_1,]);
            // Vérification qu'une ligne a bien été impactée avec rowCount(). Si oui, on estime que la requête a bien été passée, sinon, elle a sûrement échoué.
            if ($createMemberStmt->rowCount()) {
                // Une ligne a été insérée => message de succès
                $type = 'success';
                $message = 'Membre ajouté';
            } else {
                // Aucune ligne n'a été insérée => message d'erreur
                $type = 'error';
                $message = 'Membre non ajouté';
            }
        } catch (Exception $e) {
            // Le membre n'a pas été ajouté, récupération du message de l'exception
            $type = 'error';
            $message = 'Membre non ajouté: ' . $e->getMessage();
        }
    } else {
        // Le membre existe, on met à jour ses informations

        // Récupération de l'ID du membre
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

        // Mise à jour des informations du membre
        try {
            // Préparation de la requête de mis à jour
            $updateMemberStmt = $db->prepare('UPDATE annonces SET id_annonce= id_annonce,date_vente = date_vente, cont_annonce= cont_annonce, Titre= Titre, Date_validation= Date_validation , description_annonces =:description_annonces, date_creation= date_creation, duree_publication= duree_publication , date_fin_publication= date_fin_publication, id_nembre= id_membre, id_etat= id_etat, id_membre_1= id_membre_1  WHERE id= id');
            // Exécution de la requête
           $updateMemberStmt->execute(['id_annonce'=>$id_annonce, 'date_vente'=>$date_vente, 'cont_annonce'=>$cont_annonce, 'Titre'=>$Titre, 'Date_validation'=>$Date_validation, 'description_annonces'=>$description_annonces, 'date_creation'=>$date_creation,'duree_publication'=>$duree_publication, 'date_fin_publication'=>$date_fin_publication,'id_membre,'=>$id_membre, 'id_etat'=>$id_etat, 'id_membre_1'=>$id_membre_1, 'id'=>$id]);
            // Vérification qu'une ligne a bien été impactée avec rowCount(). Si oui, on estime que la requête a bien été passée, sinon, elle a sûrement échoué.
            if ($updateMemberStmt->rowCount()) {
                // Une ligne a été mise à jour => message de succès
                $type = 'success';
                $message = 'Membre mis à jour';
            } else {
                // Aucune ligne n'a été mise à jour => message d'erreur
                $type = 'error';
                $message = 'Membre non mis à jour';
            }
        } catch (Exception $e) {
            // Une exception a été lancée, récupération du message de l'exception
            $type = 'error';
            $message = 'Membre non mis à jour: ' . $e->getMessage();
        }
    }

    // Fermeture des connexions à la BDD
    $createMemberStmt = null;
    $updateMemberStmt = null;
    $db = null;

    // Redirection vers la page principale des membres en passant le message et son type en variables GET
    header('location:' . 'annoncess.php?type=' . $type . '&message=' . $message);
}

?>