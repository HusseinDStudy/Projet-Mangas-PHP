<!-- PARTIE DONNE --------------------------------------------------- -->
<?php
include_once '../persistance/DialogueBD.php';
if(!isset($_GET['genre'])){
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
    echo"<form id='formulaireGenre' class=\"formulaire\" action=\"MangasParGenre.php\" method=\"get\">
    <ul><!--Liste déroulante des services-->
        <li>
            <label for=\"champGenre\">Genre :</label>
            <select name=\"genre\" id=\"champGenre\" >";//onchange=\"if (this.selectedIndex) tableUpgrade();\"

    foreach ($mesGenres as $ligne) {
        $code = $ligne['id_genre'];
        $designation = $ligne['lib_genre'];
        echo "<option value=$code>$code $designation</option>";
    }

    echo"</select></li><!--<li><input type=\"submit\" value=\"Afficher les employés\"></li>--></ul></form>";
}
?>
