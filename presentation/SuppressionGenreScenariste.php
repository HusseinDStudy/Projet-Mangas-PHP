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
if(isset($_POST['scenariste'])) {
    //var_dump($_POST['scenariste']);
    try {
        $SupScenariste = $requete->SupprimerLeScenarist($_POST['scenariste']);
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
}
if(isset($_POST['genre'])){
    //var_dump($_POST['genre']);
    try {
        $SupGenres = $requete->SupprimerLeGenre($_POST['genre']);
    } catch (Exception $e) {
        $erreur = $e->getMessage();
        //echo $erreur;

        //require_once 'MangasParGenre.php';
    }
}
if(isset($_POST['choix'])){
    $choix=$_POST['choix'];
    if($choix=='S'){
        try {
            $mesScenaristes = $requete->getTousLesScenaristes();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            echo $erreur;
        }
    }
    if($choix=='G'){
        try {
            $mesGenres = $requete->getTousLesGenres();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            echo $erreur;
        }
    }
}
?>
<!-- PARTIE AFFICHAGE --------------------------------------------------- -->

<form action="SuppressionGenreScenariste.php" method="post" class="text-center">
    <?php
        if(!isset($_POST['choix'])&&!isset($_POST['genre'])&&!isset($_POST['scenariste'])) {
            echo"<h1 class=\"text-center\">Supprimer un Genre/Scenariste</h1>";
            echo "<select id=\"Choix\" name=\"choix\" class=\"w-25\">
                <option value='S'>Scenariste</option>
                <option value='G'>Genre</option></select><br>
                <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
                <button type=\"reset\" class=\"btn btn-primary\">Annuler</button><br>";
        }
        if(isset($_POST['choix'])){
            $choix=$_POST['choix'];
            echo"<h1 class=\"text-center\">Supprimer un Genre/Scenariste</h1>";
            if($choix=='S'){
                echo"<select id=\"Scenariste\" name=\"scenariste\" class=\"w-25\">";
                foreach ($mesScenaristes as $ligne) {
                    $code = $ligne['id_scenariste'];
                    $nom = $ligne['nom_scenariste'];
                    $prenom = $ligne['prenom_scenariste'];
                    echo "<option value=$code";
                    //if(isset($_POST['scenaristeCode']))if($code==$_POST['scenaristeCode'])echo" selected=\"selected\"";else echo" ";
                    echo">$code $nom $prenom</option>";
                }
                echo "</select><br>
                <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
                <button type=\"reset\" class=\"btn btn-primary\">Annuler</button><br>";
            }
            if($choix=='G'){
                echo "<select id=\"Genre\" name=\"genre\" class=\"w-25\">";
                foreach ($mesGenres as $ligne) {
                    $code = $ligne['id_genre'];
                    $designation = $ligne['lib_genre'];
                    echo "<option value=$code";
                    //if(isset($_POST['genre']))if($code==$_POST['genreCode'])echo" selected=\"selected\"";else echo" ";
                    echo ">$code $designation</option>";
                }
                echo "</select><br>
                <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
                <button type=\"reset\" class=\"btn btn-primary\">Annuler</button><br>";
            }

        }

    /*if(!isset($_POST['genre'])){
        echo "<select id=\"Genre\" name=\"genre\" class=\"w-25\">";
        try {
            $mesGenres = $requete->getTousLesGenres();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        foreach ($mesGenres as $ligne) {
            $code = $ligne['id_genre'];
            $designation = $ligne['lib_genre'];
            echo "<option value=$code";
            if(isset($_POST['genre']))if($code==$_POST['genreCode'])echo" selected=\"selected\"";else echo" ";
            echo ">$designation</option>";
        }
        echo "</select><br>
            <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
            <button type=\"reset\" class=\"btn btn-primary\">Annuler</button><br>";
    }else echo "";
*/
    ?>
</form>
