<?php include_once '../persistance/DialogueBD.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes scenariste</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>



<!-- PARTIE DONNE --------------------------------------------------- -->
<?php
    if(!isset($_POST['scenariste'])){
        try {
            // on crée un objet référant la classe DialogueBD
            $undlg = new DialogueBD();
            $mesScenaristes = $undlg->getTousLesScenaristes();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
?>
    <!-- PARTIE AFFICHAGE --------------------------------------------------- -->
<?php

    echo"<form class=\"formulaire\" action=\"MangasParScenariste.php\" method=\"post\">
    <ul><!--Liste déroulante des services-->
        <li>
            <label for=\"champScenariste\">Scenariste :</label>
            <select name=\"scenariste\" id=\"champScenariste\">";

    foreach ($mesScenaristes as $ligne) {
        $code = $ligne['id_scenariste'];
        $nom = $ligne['nom_scenariste'];
        $prenom = $ligne['prenom_scenariste'];

        echo "<option value=$code>$code $nom $prenom</option>";
    }

    echo"</select></li><li><input type=\"submit\" value=\"Afficher les employés\"></li></ul></form>";
}
?>
<!-- PARTIE DONNE --------------------------------------------------- -->
<?php
if(isset($_POST['scenariste'])){
    try {
        // on crée un objet référant la classe DialogueBD
        $requete = new DialogueBD();
        $codeScenariste=$_POST['scenariste'];
        $tabMangaParScenariste = $requete->getMangaParIDS($codeScenariste);
        //$tabNomService = $undlg->getNomDeService($codeService);
        $Scenariste = $requete->getScenariste($codeScenariste);
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
    ?>
    <!-- PARTIE AFFICHAGE --------------------------------------------------- -->
    <?php
    //var_dump($Scenariste);

    echo "<div class=\"container\"><section class=\"row\"><div class=\"col-sm-12\">
<h1>Liste des mangas du scenariste $Scenariste->nom_scenariste $Scenariste->prenom_scenariste</h1> 
<table class=\"table table-bordered table-striped \">";
    $nbmangas= 0;
    foreach ($tabMangaParScenariste as $id=>$ligne) {
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
        echo"<td><form method=\"POST\" action=\"ModificationManga.php\">
<input type='image' id='imageModif$id_manga'    style='height: 30px;' class='img-fluid' src=\"../images/modification.jpg\"readonly>
<input type='text' name='imageModif'value='$id_manga' hidden>

</form>
</td></tr>";

    }
    echo"</table>";
    echo "Total : $nbmangas manga(s)";
    echo "</div></section></div>";
}
?>

</body>
</html>