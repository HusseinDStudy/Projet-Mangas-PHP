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
    <h1 class="text-center">Ajouter un Manga</h1>
    <form action="AjoutManga.php" method="post" class="text-center">
        <label class="font-weight-bold" for="Titre">Titre: </label>
        <input id="Titre" name="titre" type="text" placeholder="Entrer son titre" size="50" required><br>
        <label class="font-weight-bold" for="Genre">Genre: </label>
        <select id="Genre" name="genre" class="w-25">
            <?php
            try {
                $mesGenres = $requete->getTousLesGenres();
            } catch (Exception $e) {
                $erreur = $e->getMessage();
            }
            foreach ($mesGenres as $ligne) {
                $code = $ligne['id_genre'];
                $designation = $ligne['lib_genre'];
                echo "<option value=$code>$designation</option>";
            }

            ?>
        </select><br>
        <label class="font-weight-bold" for="Couverture">Couverture: </label>
        <input id="Couverture" name="couverture" type="file" required><br>
        <label class="font-weight-bold" for="Dessinateur">Dessinateur: </label>
        <select id="Dessinateur" name="dessinateur" class="w-25">
            <?php
            try {
                $mesDessinateurs = $requete->getTousLesDessinateurs();
            } catch (Exception $e) {
                $erreur = $e->getMessage();
            }
            foreach ($mesDessinateurs as $ligne) {
                $code = $ligne['id_dessinateur'];
                $nom = $ligne['nom_dessinateur'];
                $prenom = $ligne['prenom_dessinateur'];
                echo "<option value=$code>$nom $prenom</option>";
            }

            ?>
        </select><br>
        <label class="font-weight-bold" for="Scenariste">Scénariste: </label>
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
                echo "<option value=$code>$nom $prenom</option>";
            }

            ?>
        </select><br>
        <label class="font-weight-bold" for="Prix">Prix: </label>
        <input id="Prix" name="prix" type="number" placeholder="Entrer un prix" size="5" required><br>
        <button type="submit" class="btn btn-primary">Valider</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
    </form>
    <?php
    if(isset($_POST['titre'])&&isset($_POST['genre'])&&isset($_POST['couverture'])&&isset($_POST['dessinateur'])&&isset($_POST['scenariste'])&&isset($_POST['prix'])){
        $ajoutManga = $requete->ajoutManga($_POST['dessinateur'],$_POST['scenariste'],$_POST['prix'],$_POST['titre'],$_POST['couverture'],$_POST['genre']);
        echo"<h1>Requete Valide</h1>";
    }
    ?>
</body>
</html>