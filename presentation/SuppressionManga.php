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
<!-- PARTIE DONNE --------------------------------------------------- -->
<?php
if(!isset($_POST['manga'])) {
    //var_dump($_POST['scenariste']);
    try {
        $listemanga = $requete->getTous();/*
        $mesMangas = $requete->getTousLesScenaristes();
        $SupScenariste = $requete->SupprimerLeScenarist($_POST['scenariste']);*/
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}

if(isset($_POST['manga'])){
    try {
        $SupMangae = $requete->SupprimerLeManga($_POST['manga']);
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }

}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------- -->

<form action="SuppressionManga.php" method="post" class="text-center">
    <?php
        if(!isset($_POST['manga'])) {
            echo"<h1 class=\"text-center\">Supprimer une Manga</h1>";
                echo"<select id=\"Manga\" name=\"manga\" class=\"w-25\">";
                foreach ($listemanga as $indice => $ligne) {
                    $id_manga = $ligne['id_manga'];
                    $titre = $ligne['titre'];
                    echo "<option value=$id_manga";
                    //if(isset($_POST['scenaristeCode']))if($code==$_POST['scenaristeCode'])echo" selected=\"selected\"";else echo" ";
                    echo">$id_manga $titre</option>";
                }
                echo "</select><br>
                <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
                <button type=\"reset\" class=\"btn btn-primary\">Annuler</button><br>";
        }
    if(isset($_POST['manga'])) {
        echo "<h2>Suppression Valide</h2>";
    }
    ?>
</form>
