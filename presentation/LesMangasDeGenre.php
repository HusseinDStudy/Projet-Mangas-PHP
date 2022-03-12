<!-- PARTIE DONNE --------------------------------------------------- -->
<?php
include_once '../persistance/DialogueBD.php';
if(isset($_GET['genre'])){
    $codeGenre=$_GET['genre'];
}else $codeGenre=1;

    try {
        // on crée un objet référant la classe DialogueBD
        $requete = new DialogueBD();
        $tabMangaParGenre = $requete->getMangaParIDG($codeGenre);
        //$tabNomService = $undlg->getNomDeService($codeService);
        $Genre = $requete->getGenre($codeGenre);
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
    ?>
    <!-- PARTIE AFFICHAGE --------------------------------------------------- -->
    <?php
    //var_dump($Scenariste);

    echo "<div class=\"container\"><section class=\"row\"><div class=\"col-sm-12\">
<h1>Liste des mangas du genre $Genre->lib_genre:</h1> 
<table class=\"table table-bordered table-striped \" id=\"TableManga\">";
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

?>
