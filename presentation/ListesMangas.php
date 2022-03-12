<?php include_once "../persistance/DialogueBD.php";
try{
    $requete = new DialogueBD();
    $listemanga = $requete->getTous();
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
<?php require_once 'header.php'?>
<h1 class="text-center">Liste de mes Mangas</h1>
<table class="table table-bordered table-striped ">
    <?php
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
        $couverture=$ligne['couverture'];
        echo "<tr><td>$id_manga</td> <td>$titre</td> <td>$lib_genre</td>";
        $objetdessinateur=null;
        $objetdessinateur=$requete->getDessinateur($id_dessinateur);
        echo"<td>$objetdessinateur->nom_dessinateur</td>";
        $objetscenariste=null;
        $objetscenariste=$requete->getScenariste($id_scenariste);
        echo"<td>$objetscenariste->nom_scenariste</td>";
        echo"<td>$prix</td>";
        $nbmanga++;
        echo"<td>
<input type='image' style='height: 30px;' class='img-fluid' src=\"../images/$couverture\"readonly>
<input type='text' name='imageCouverture'value='$couverture' hidden>
</td>";
        echo"<td><form method=\"POST\" action=\"ModifieManga.php\">
<input type='image' id='imageModif$id_manga'    style='height: 30px;' class='img-fluid' src=\"../images/modification.jpg\"readonly>
<input type='text' name='manga'value='$id_manga' hidden>
<!--<input type='submit'   readonly>
<a href='ModificationManga.php'><img   /></a>-->
</form>
</td></tr>";

    }
    ?>
</table>
<!--
try {
    $undlg = new DialogueBD();
    $condition=true;
    $LesinformationMangas = $undlg->getTousLesMangas();
    echo"<table class='table-bordered'>";
    foreach ($LesinformationMangas as $rang=>$ligne){
        echo "<tr>";
        foreach ($ligne as $id=>$valeur ){
            if($condition){
                echo"<th>$id</th>";
            }
            else echo "<td>$valeur</td>";

        }$condition=false;
        echo "</tr>";
    }
    echo "</table>";
    print_r($LesinformationMangas);
} catch (Exception $e) {
    $erreur = $e->getMessage();
    $rep=$erreur;
}
-->
</body>
</html>


