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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../index.php">Site Mangas HD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="../presentation/MesMangas.php">Mes Mangas <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../presentation/ListesMangas.php">Lister</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../presentation/MangasParGenre.php">Manga par Genre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../presentation/AjoutManga.php">Ajout un Manga</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../presentation/AjoutScenariste.php">Ajout un Scenariste</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../presentation/AjoutGenre.php">Ajout un Genre</a>
            </li>
        </ul>
    </div>
</nav>
<h1 class="text-center">Modif d'un Scenariste</h1>

<form action="../presentation/ModifScenariste.php" method="post" class="text-center">

    <select id="Scenariste" name="scenariste" class="w-25">
        <?php
        try {
            $mesScenaristes = $requete->getTousLesScenaristes();
        } catch (Exception $e) {
            $erreur = $e->getMessage();
        }
        foreach ($mesScenaristes as $ligne) {
            $code = $ligne['id_scenariste'];
            $nom = $ligne['nom_scenariste'];
            $prenom = $ligne['prenom_scenariste'];
            echo "<option value=$code";
            if(isset($_POST['scenariste']))if($code==$_POST['scenariste'])echo" selected=\"selected\"";
            echo">$nom $prenom</option>";
        }

        ?>
    </select><br>
    <button type="submit" class="btn btn-primary">Valider</button>
    <button type="reset" class="btn btn-primary">Annuler</button><br>
    <?php if(isset($_POST['scenariste'])) {
        $idS=$_POST['scenariste'];
        echo "<label class=\"font-weight-bold\" for=\"Scenariste\">Scenariste: </label>
    <input type='text' id='Scenariste' value='$idS' readonly><br>
    <label class=\"font-weight-bold\" for=\"NomScenariste\">Nom Scenariste: </label>
    <input id=\"NomScenariste\" name=\"nomscenariste\" type=\"text\" placeholder=\"Entrer le Nom Scenariste\" size=\"50\" required><br>
    <label class=\"font-weight-bold\" for=\"PrenomScenariste\">Preom Scenariste: </label>
    <input id=\"PrenomScenariste\" name=\"prenomscenariste\" type=\"text\" placeholder=\"Entrer le Prenom Scenariste\" size=\"50\" required><br>  
    <button type=\"submit\" class=\"btn btn-primary\">Valider</button>
    <button type=\"reset\" class=\"btn btn-primary\">Annuler</button><br>";
    }
    ?>
</form>
<?php
if(isset($_POST['nomscenariste'])){
    $modifScenariste = $requete->modifScenariste($_POST['nomscenariste'],$_POST['prenomscenariste'],$_POST['scenariste']);
    echo"<h1>Requete Valide</h1>";
}
?>

</body>
</html>
