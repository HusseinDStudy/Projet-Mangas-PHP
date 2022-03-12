<?php include_once '../persistance/DialogueBD.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes Mangas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>

<?php require_once 'header.php'?>
<!-- PARTIE DONNE +AFFICHAGE --------------------------------------------------- -->
<?php
if(!isset($_POST['genre'])){
    try {
        // on crée un objet référant la classe DialogueBD
        $undlg = new DialogueBD();
        $mesGenres = $undlg->getTousLesGenres();
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
    ?>
    <!-- PARTIE AFFICHAGE --------------------------------------------------- -->
    <?php
    echo"<form class=\"formulaire\" action=\"MangasParGenreMenu.php\" method=\"post\">
    <ul><!--Liste déroulante des services-->
        <li>
            <label for=\"champGenre\">Genre :</label>
            <select name=\"genre\" id=\"champGenre\">";

    foreach ($mesGenres as $ligne) {
        $code = $ligne['id_genre'];
        $designation = $ligne['lib_genre'];
        echo "<option value=$code>$code $designation</option>";
    }

    echo"</select></li><li><input type=\"submit\" value=\"Afficher les employés\"></li></ul></form>";
}?>
<!-- PARTIE DONNE +AFFICHAGE --------------------------------------------------- -->
    <?php
    if(isset($_POST['genre'])){
        try {
            // on crée un objet référant la classe DialogueBD
            $requete = new DialogueBD();
            $codeGenre=$_POST['genre'];
            $tabMangaParGenre = $requete->getMangaParGenre($codeGenre);
            //$tabNomService = $undlg->getNomDeService($codeService);
            $nomGenre = $requete->getGenre($codeGenre);
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }

echo "<h1>Liste des mangas du genre ";if(isset($_POST['genre'])) echo $nomGenre->lib_genre;
echo":</h1><div class=\"container\"><section class=\"row\"><div class=\"col-sm-12\">
<table class=\"table table-bordered table-striped \">";
$nbmangas= 0;
foreach ($tabMangaParGenre as $id=>$ligne) {
    $id_manga = $ligne['id_manga'];
    $titre = $ligne['titre'];
    $id_genre = $ligne['id_genre'];
    $id_dessinateur = $ligne['id_dessinateur'];
    $id_scenariste = $ligne['id_scenariste'];
    $prix = $ligne['prix'];
    $lib_genre=$requete->getGenre($id_genre);
    echo "<tr><td>$id_manga</td> <td>$titre</td> <td>$lib_genre->lib_genre</td>";
    $objetdessinateur=null;
    $objetdessinateur=$requete->getDessinateur($id_dessinateur);
    echo"<td>$objetdessinateur->nom_dessinateur</td>";
    $objetscenariste=null;
    $objetscenariste=$requete->getScenariste($id_scenariste);
    echo"<td>$objetscenariste->nom_scenariste</td>";
    echo"<td>$prix</td>";
    $nbmangas++;
    $couverture=$ligne['couverture'];
    echo"<td>
<input type='image' style='height: 30px;' class='img-fluid' src=\"../images/$couverture\"readonly>
<input type='text' name='imageCouverture'value='$couverture' hidden>
</td>";
    echo"<td><form method=\"POST\" action=\"ModifieManga.php\">
<input type='image' id='imageModif$id_manga'    style='height: 30px;' class='img-fluid' src=\"../images/modification.jpg\"readonly>
<input type='text' name='manga'value='$id_manga' hidden>

</form>
</td></tr>";

}
echo"</table>";
echo "Total : $nbmangas manga(s)";
echo "</div></section></div>";
}
?>
