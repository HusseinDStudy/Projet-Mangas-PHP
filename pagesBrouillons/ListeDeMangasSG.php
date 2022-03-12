<?php include_once "../persistance/DialogueBD.php";
//include_once "SuppressionGenreScenariste.php";
try{
    $requete = new DialogueBD();
    //$listemanga = $requete->getMangaParIDS($poster);
} catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">Site Mangas HD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="MesMangas.php">Mes Mangas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ListesMangas.php">Lister</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="MangasParGenre.php">Manga par Genre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="AjoutManga.php">Ajout un Manga</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="AjoutScenariste.php">Ajout un Scenariste</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="AjoutGenre.php">Ajout un Genre</a>
            </li>
        </ul>
    </div>
</nav>
<h1 class="text-center">Modif Scenariste de Manga</h1>

    <?php
    if (!isset($_POST['scenaristeChanger'])) {
        echo "<table class=\"table table-bordered table-striped \">";
        $nbmanga = 0;
        echo "<tr><th>id_manga</th> <th>Titre</th> <th>Genre</th>
    <th>id_dessinateur</th><th>id_scenariste</th><th>Prix</th><th>Couverture</th></tr>";
        foreach ($listemanga as $indice => $ligne) {
            $id_manga = $ligne['id_manga'];
            $titre = $ligne['titre'];
            $lib_genre = $ligne['lib_genre'];
            $id_dessinateur = $ligne['id_dessinateur'];
            $id_scenariste = $ligne['id_scenariste'];
            $prix = $ligne['prix'];
            $couverture = $ligne['couverture'];
            echo "<tr><td>$id_manga</td> <td>$titre</td> <td>$lib_genre</td>";
            $objetdessinateur = null;
            $objetdessinateur = $requete->getDessinateur($id_dessinateur);
            echo "<td>$objetdessinateur->nom_dessinateur</td>";
            $objetscenariste = null;
            $objetscenariste = $requete->getScenariste($id_scenariste);
            echo "<td>$objetscenariste->nom_scenariste</td>";
            echo "<td>$prix</td>";
            $nbmanga++;
            echo "<td>
<input type='image' style='height: 30px;' class='img-fluid' src=\"../images/$couverture\"readonly>
<input type='text' name='imageCouverture'value='$couverture' hidden>
</td>";
            echo "readonly>
<input type='text' name='imageModif'value='$id_manga' hidden>
<!--<input type='submit'   readonly>
<a href='ModificationManga.php'><img   /></a>-->
</form>
</td></tr>";
        }

            echo "</table>";
            echo "<form action=\"ListeDeMangasSG.php\" method=\"post\" class=\"text-center\"><label for='ScenaristeChanger'>IDScenaristeChanger: </label> <input type='number' id='ScenaristeChanger' name='scenaristeChanger'/><br>
                    <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
                    <button type=\"reset\" class=\"btn btn-primary\">Annuler</button><br></form>";
       }
    else{
            $modifieIDSM = ModifIDScenaristeManga($codeScenarist, $_POST['scenaristeChanger']);
            //$ListeDeMangaDeScenariste =

    }
    ?>

