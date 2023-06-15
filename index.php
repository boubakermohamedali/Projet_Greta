<?php include 'header.php'; ?>

    <div class='row'>
        <div class='jumbotron bg-light m-2 p-2'>
            <h1 class='display-4'>Bienvenue au petit annonce!</h1>
            <p class='lead'>Ici vous pouvez gérer les abonnement pour le très exclusif petit annonce !</p>
            <hr class='my-4'>
            <p>Cliquer sur un des boutons ci-dessous pour obtenir une liste des membres ou des types categorie</p>
            <p class='lead'>
            <a href='index.php' class='btn btn-secondary m-2 active' role='button'>Accueil</a>
            <a href='annonces.php' class='btn btn-secondary m-2 active' role='button'>Annonces</a>
            <a href='categorie.php' class='btn btn-secondary m-2 active' role='button'>Categorie</a>
            <a href='members.php' class='btn btn-secondary m-2 active' role='button'>Membres</a>
            <a href='utilisateurs.php' class='btn btn-secondary m-2 active' role='button'>Utilisateurs</a>

            </p>
        </div>
    </div>

   
<?php require_once 'footer.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<div class="container">
	<div class="m-4">
		<div class="from-group">
			<from action="pdf.php" methode="POST">
				<imput type="Test" name="cafe" aria-placeholder="votre cafe" class="form-control"/><br/>
				<button type="submit" class="btn btn-primary">Envoyer</button>
			</from>
		</div>
	</div>
</div>
</body>
</html>