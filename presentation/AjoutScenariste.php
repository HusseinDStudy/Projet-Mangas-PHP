<?php include_once "../persistance/DialogueBD.php";
// on crée un objet référant la classe DialogueBD
$requete = new DialogueBD();?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste Mangas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php require_once 'header.php'?>
<h1 class="text-center">Ajouter un Scenarist</h1>
<form action="AjoutScenariste.php" method="post" class="text-center">
    <label class="font-weight-bold" for="NomS">Nom Scenariste: </label>
    <input id="NomS" name="nomS" type="text" placeholder="Entrer le nom" size="50" required><br>
    <label class="font-weight-bold" for="PrenomS">Nom Scenariste: </label>
    <input id="PrenomS" name="prenomS" type="text" placeholder="Entrer le prenom" size="50" required><br>
    <button type="submit" class="btn btn-primary">Valider</button>
    <button type="reset" class="btn btn-primary">Annuler</button>
</form>
<?php
if(isset($_POST['nomS'])&&isset($_POST['prenomS'])){
    $ajoutScenariste = $requete->ajoutScenariste($_POST['nomS'],$_POST['prenomS']);
    echo"<h1>Requete Valide</h1>";
}
?>
</body>
</html>
