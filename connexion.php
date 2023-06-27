<?php

// Connection à la base de données et renvoie l'objet PDO
function connect() {
    // hôte
    $hostname = 'localhost';

    // nom de la base de données
    $dbname = 'bateaux_pirates';

    // identifiant et mot de passe de connexion à la BDD
    $username = 'root';
    $password = '';
    
    // Création du DSN (data source name) en combinant le type de BDD, l'hôte et le nom de la BDD
    $dsn = "mysql:host=$hostname;dbname=$dbname";

    // Tentative de connexion avec levée d'une exception en cas de problème
    try{
      return new PDO($dsn, $username, $password);
    } catch (Exception $e){
      echo $e->getMessage();
    }
}

<<<<<<< HEAD
// Récupération d'une liste de tous les annonces existant en BDD
function getAnnonce() {
=======
// Récupération d'une liste de tous les categories existant en BDD
function getMembre() {
>>>>>>> 991bccced84c2ffc7e65fb706e1dd1903d4f7c2a
    try {
        // Récupération de l'objet PDO
        $db = connect();

<<<<<<< HEAD
        // Requête pour récupérer tous les annonces
        $annonceQuery=$db->query('SELECT * FROM categories');
        $annonceQuery=$db->query('SELECT * FROM annonces');
        $annonceQuery=$db->query('SELECT * FROM membres');

        // Renvoie tous les lignes
        return $annonceQuery->fetchAll(PDO::FETCH_ASSOC);
=======
        // Requête pour récupérer tous les categories
        $membreQuery=$db->query('SELECT * FROM categories');
        $membreQuery=$db->query('SELECT * FROM annonces');
        $membreQuery=$db->query('SELECT * FROM membres');
        $membreQuery=$db->query('SELECT * FROM utilisateurs');

        // Renvoie tous les lignes
        return $membreQuery->fetchAll(PDO::FETCH_ASSOC);
>>>>>>> 991bccced84c2ffc7e65fb706e1dd1903d4f7c2a
    } catch (Exception $e) {
        // En cas d'erreur afficher le message
        echo $e->getMessage();
    }
}
<<<<<<< HEAD
// Récupération d'une liste de tous les membres existant en BDD
function getMembre () {
=======
// Récupération d'une liste de tous les categories existant en BDD
function getCategorie() {
>>>>>>> 991bccced84c2ffc7e65fb706e1dd1903d4f7c2a
  try {
      // Récupération de l'objet PDO
      $db = connect();

<<<<<<< HEAD
      // Requête pour récupérer tous les membres
      $membreQuery=$db->query('SELECT * FROM categories');
      $membreQuery=$db->query('SELECT * FROM annonces');
      $membreQuery=$db->query('SELECT * FROM membres');
=======
      // Requête pour récupérer tous les categories
      $categorieQuery=$db->query('SELECT * FROM categories');
      $categorieQuery=$db->query('SELECT * FROM annonces');
      $categorieQuery=$db->query('SELECT * FROM membres');
      $categorieQuery=$db->query('SELECT * FROM utilisateurs');
>>>>>>> 991bccced84c2ffc7e65fb706e1dd1903d4f7c2a

      // Renvoie tous les lignes
      return $membreQuery->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
      // En cas d'erreur afficher le message
      echo $e->getMessage();
  }
}
<<<<<<< HEAD
// Récupération d'une liste de tous les membres existant en BDD
=======
// Récupération d'une liste de tous les annonces existant en BDD
>>>>>>> 991bccced84c2ffc7e65fb706e1dd1903d4f7c2a
function getAnnonces() {
  try {
      // Récupération de l'objet PDO
      $db = connect();

<<<<<<< HEAD
      // Requête pour récupérer tous les annonces
=======
      // Requête pour récupérer tous les annoncesZ
>>>>>>> 991bccced84c2ffc7e65fb706e1dd1903d4f7c2a
      
      $annonceQuery=$db->query('SELECT * FROM annonces');
      
      

      // Renvoie tous les lignes
      return $annonceQuery->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
      // En cas d'erreur afficher le message
      echo $e->getMessage();
  }
}
<<<<<<< HEAD
// Récupération d'une liste de tous les categories existant en BDD
function getCategorie() {
=======
// Récupération d'une liste de tous les utilisateurs existant en BDD
function getUtilisateur() {
>>>>>>> 991bccced84c2ffc7e65fb706e1dd1903d4f7c2a
  try {
      // Récupération de l'objet PDO
      $db = connect();

<<<<<<< HEAD
      // Requête pour récupérer tous les categories
      $categorieQuery=$db->query('SELECT * FROM categories');

  
=======
      // Requête pour récupérer tous les utilisateurs
      $utilisateurQuery=$db->query('SELECT * FROM categories');
      $utilisateurQuery=$db->query('SELECT * FROM annonces');
      $utilisateurQuery=$db->query('SELECT * FROM membres');
      $utilisateurQuery=$db->query('SELECT * FROM utilisateurs');
>>>>>>> 991bccced84c2ffc7e65fb706e1dd1903d4f7c2a

      // Renvoie tous les lignes
      return $utilisateurQuery->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
      // En cas d'erreur afficher le message
      echo $e->getMessage();
  }
}