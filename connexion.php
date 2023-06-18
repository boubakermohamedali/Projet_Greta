<?php

// Connection à la base de données et renvoie l'objet PDO
function connect() {
    // hôte
    $hostname = 'localhost';

    // nom de la base de données
    $dbname = 'bateau_pirate';

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

// Récupération d'une liste de tous les categories existant en BDD
function getMembre() {
    try {
        // Récupération de l'objet PDO
        $db = connect();

        // Requête pour récupérer tous les categories
        $membreQuery=$db->query('SELECT * FROM categories');
        $membreQuery=$db->query('SELECT * FROM annonces');
        $membreQuery=$db->query('SELECT * FROM membres');
        $membreQuery=$db->query('SELECT * FROM utilisateurs');

        // Renvoie tous les lignes
        return $membreQuery->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        // En cas d'erreur afficher le message
        echo $e->getMessage();
    }
}
// Récupération d'une liste de tous les categories existant en BDD
function getCategorie() {
  try {
      // Récupération de l'objet PDO
      $db = connect();

      // Requête pour récupérer tous les categories
      $categorieQuery=$db->query('SELECT * FROM categories');
      $categorieQuery=$db->query('SELECT * FROM annonces');
      $categorieQuery=$db->query('SELECT * FROM membres');
      $categorieQuery=$db->query('SELECT * FROM utilisateurs');

      // Renvoie tous les lignes
      return $categorieQuery->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
      // En cas d'erreur afficher le message
      echo $e->getMessage();
  }
}
// Récupération d'une liste de tous les annonces existant en BDD
function getAnnonces() {
  try {
      // Récupération de l'objet PDO
      $db = connect();

      // Requête pour récupérer tous les annoncesZ
      
      $annonceQuery=$db->query('SELECT * FROM annonces');
      
      

      // Renvoie tous les lignes
      return $annonceQuery->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
      // En cas d'erreur afficher le message
      echo $e->getMessage();
  }
}
// Récupération d'une liste de tous les utilisateurs existant en BDD
function getUtilisateur() {
  try {
      // Récupération de l'objet PDO
      $db = connect();

      // Requête pour récupérer tous les utilisateurs
      $utilisateurQuery=$db->query('SELECT * FROM categories');
      $utilisateurQuery=$db->query('SELECT * FROM annonces');
      $utilisateurQuery=$db->query('SELECT * FROM membres');
      $utilisateurQuery=$db->query('SELECT * FROM utilisateurs');

      // Renvoie tous les lignes
      return $utilisateurQuery->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $e) {
      // En cas d'erreur afficher le message
      echo $e->getMessage();
  }
}