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
<h1 class="text-center">Modif d'un Genre</h1>
<?php
if(isset($_POST['nomgenre'])){
    $modifGenre = $requete->modifGenre($_POST['nomgenre'],$_POST['genreCode']);
    //echo"<h1>Requete Valide</h1>";
}
?>
<form action="ModifGenre.php" method="post" class="text-center">
    <?php
    if(!isset($_POST['genre'])){
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

    if(isset($_POST['genre'])&& !isset($_POST['nomgenre'])) {
        echo "<label class=\"font-weight-bold\" for=\"Genre\">Genre: </label>
    <input type='text' id='Genre' name='genreCode' value='".$_POST['genre']."' readonly><br>
    <label class=\"font-weight-bold\" for=\"NomGenre\">Nom Genre: </label>
    <input id=\"NomGenre\" name=\"nomgenre\" type=\"text\" placeholder=\"Entrer le genre\" size=\"50\" required><br>
    <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
    <button type=\"reset\" class=\"btn btn-primary\">Annuler</button><br>";
    }else echo "";
    ?>
</form>
<?php
if(isset($_POST['nomgenre'])){
    //$modifGenre = $requete->modifGenre($_POST['nomgenre'],$_POST['genre']);
    echo"<h1>Requete Valide</h1>";
}
?>

</body>
</html>