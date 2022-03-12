<?php
require_once '../persistance/DialogueBD.php';
try {
    $undlg = new DialogueBD();
    if (isset($_GET['idnomPays']))
    {  $nompays = $_GET['idnomPays'];
        $LesinformationParPays = $undlg->getToutesLesinfosParPays($nompays);
        foreach ($LesinformationParPays as $ligne){
            $Capitale = $ligne['NOM_CAPITALE'];
            $nombreHab = $ligne['NB_HABITANTS'];
            $nomContinent= $ligne['NOM_CONTINENT'];
        }
        $rep = "<h1>Information du pays</h1>";
        $rep = $rep . "<ul>";
        $rep = $rep . "<table border='1'>";
        $rep = $rep ."<tr>";
        $rep = $rep ."<td>Nom Pays</td>";
        $rep = $rep ."<td>Nom Capitale</td>";
        $rep = $rep ."<td>Nom Continent</td>";
        $rep =$rep ."<td>Nombre d'habitants</td>";
        $rep =$rep ."</tr>";
        $rep =$rep ."<tr><td>$nompays</td><td>$Capitale</td> <td>$nomContinent</td><td>$nombreHab</td></tr>";
    }

    else
        $rep= "erreur";

} catch (Exception $e) {
    $erreur = $e->getMessage();
    $rep=$erreur;
}

echo $rep;

