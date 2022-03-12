<?php
require_once 'Connexion.php';
//Pour le modif des scenariste
class DialogueBD
{
    /*GET TOUS*/
    public function getTous()
    {

        try {
            $conn = Connexion::getConnexion();//id_manga,titre,genre.lib_genre,id_dessinateur,id_scenariste, prix
            $sql = "SELECT * from manga join genre
            on genre.id_genre = manga.id_genre";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listemanga = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listemanga;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public  function getTousLesGenres(){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * from genre ";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listegenre = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listegenre;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public  function getTousLesDessinateurs(){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * from dessinateur";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listedessinateur = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listedessinateur;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public  function getTousLesScenaristes(){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * from scenariste";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listescenarister = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listescenarister;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    /*GET NOM PRENOM OU LIBELLE*/
    public function getDessinateur($code)/*A AMELIORER*/
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT nom_dessinateur from dessinateur where id_dessinateur=$code";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $dessinateur = $sth->fetchObject();
            return $dessinateur;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getGenre($code)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT lib_genre from genre where id_genre=$code";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $genre = $sth->fetchObject();
            return $genre;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getScenariste($code)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT nom_scenariste,prenom_scenariste from scenariste where id_scenariste=$code";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $scenariste = $sth->fetchObject();
            return $scenariste;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    /*LES AJOUT*/
    public function ajoutManga($id_des,$id_sce,$prix,$titre,$couverture,$id_genre)
    {
        try {
            $conn = Connexion::getConnexion();//$id_des,$id_sce,$prix,'$titre','$couverture',$id_genre
            $id_des=intval($id_des);
            $id_sce=intval($id_sce);
            $id_genre=intval($id_genre);
            $prix=intval($prix);
            $sql = "INSERT INTO manga(id_dessinateur,id_scenariste,prix,titre,couverture,id_genre) VALUES (?,?,?,?,?,?);" ;
            //var_dump($sql);
            $sthnouveauManga = $conn->prepare($sql) ;
            $sthnouveauManga-> execute(array($id_des,$id_sce,$prix,$titre,$couverture,$id_genre));
        } catch (Exception $e ) {
            $msgErreur = $e->getMessage().' ( '
                .$e->getFile().' , ligne '.$e-> getLine().' ) ';
            echo"<h1>$msgErreur</h1>";
        }
        //var_dump(array($id_des,$id_sce,$prix,$titre,$couverture,$id_genre));
    }
    public function ajoutScenariste($nom_sce,$prenom_sce){
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO scenariste(nom_scenariste,prenom_scenariste) VALUES (?,?);" ;
            $sthnouveauScenariste = $conn->prepare($sql) ;
            $sthnouveauScenariste-> execute(array($nom_sce,$prenom_sce));
        }  catch (Exception $e ) {
            $msgErreur = $e->getMessage().' ( '
                .$e->getFile().' , ligne '.$e-> getLine().' ) ';
            echo"<h1>$msgErreur</h1>";
        }
    }
    public function ajoutGenre($genre){
        try {
            $conn = Connexion::getConnexion();
            $sql = "INSERT INTO genre(lib_genre) VALUES (?);" ;
            $sthnouveauGenre = $conn->prepare($sql) ;
            $sthnouveauGenre-> execute(array($genre));
        }  catch (Exception $e ) {
            $msgErreur = $e->getMessage().' ( '
                .$e->getFile().' , ligne '.$e-> getLine().' ) ';
            echo"<h1>$msgErreur</h1>";
        }
    }
    /*LES GET PAR ID*/
    public function getMangaParGenre($code){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * from manga where id_genre=$code";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listemanga = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listemanga;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getUnMangaParID($code){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * from manga where id_manga=$code";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listemanga = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listemanga;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getMangaParIDS($code){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * from manga where id_scenariste=$code";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listemanga = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listemanga;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    public function getMangaParIDG($code){
        try {
            $conn = Connexion::getConnexion();
            $sql = "SELECT * from manga where id_genre=$code";
            $sth = $conn->prepare($sql);
            $sth->execute();
            $listemanga = $sth->fetchAll(PDO::FETCH_ASSOC);
            return $listemanga;
        } catch (PDOException $e) {
            $erreur = $e->getMessage();
        }
    }
    /*Les MODIFS*/
    public function modifManga($id_des,$id_sce,$prix,$titre,$couverture,$id_genre,$id)
    {
        try {
            $conn = Connexion::getConnexion();//$id_des,$id_sce,$prix,'$titre','$couverture',$id_genre
            $id_des=intval($id_des);
            $id_sce=intval($id_sce);
            $id_genre=intval($id_genre);
            $prix=intval($prix);
            $sql = "UPDATE manga
            SET id_dessinateur = ?,
                id_scenariste = ?,
                prix = ?,
                titre = ?,
                couverture=?,
                id_genre=?
            WHERE id_manga = ?" ;
            //var_dump($sql);
            $sthnouveauManga = $conn->prepare($sql) ;
            $sthnouveauManga-> execute(array($id_des,$id_sce,$prix,$titre,$couverture,$id_genre,$id));
        } catch (Exception $e ) {
            $msgErreur = $e->getMessage().' ( '
                .$e->getFile().' , ligne '.$e-> getLine().' ) ';
            echo"<h1>$msgErreur</h1>";
        }
        //var_dump(array($id_des,$id_sce,$prix,$titre,$couverture,$id_genre));
    }
    public function modifGenre($nomgenre,$id_genre)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "UPDATE genre SET lib_genre = ? WHERE id_genre = ?";
            $sthModifManga = $conn->prepare($sql);
            $sthModifManga->execute(array($nomgenre,$id_genre));
        } catch (Exception $e) {
            $msgErreur = $e->getMessage() . ' ( '
                . $e->getFile() . ' , ligne ' . $e->getLine() . ' ) ';
            echo "<h1>$msgErreur</h1>";
        }
    }
    public function modifScenariste($nomscenariste,$prenom_scenariste,$id_scenariste)
    {
        try {
            $conn = Connexion::getConnexion();
            $sql = "UPDATE scenariste SET nom_scenariste=?, prenom_scenariste = ? WHERE id_scenariste = ?";
            $sthModifManga = $conn->prepare($sql);
            $sthModifManga->execute(array($nomscenariste,$prenom_scenariste,$id_scenariste));
        } catch (Exception $e) {
            $msgErreur = $e->getMessage() . ' ( '
                . $e->getFile() . ' , ligne ' . $e->getLine() . ' ) ';
            echo "<h1>$msgErreur</h1>";
        }
    }
    /*LES SUPPRESSION*/
    public function SupprimerLeScenarist($codeScenarist){
        try {
            $conn = Connexion::getConnexion();
            $sql = "DELETE FROM scenariste WHERE id_scenariste = ?";
            $sthModifManga = $conn->prepare($sql);
            $sthModifManga->execute(array($codeScenarist));
        } catch (Exception $e) {
            $msgErreur = $e->getMessage();
            //echo "<h1>$msgErreur</h1>";
            echo 'Change les scenariste des mangas utilisant le scenariste a supprimer SVP >>>Scenariste a Sup: '.$codeScenarist;
            require_once '../presentation/MangasParScenariste.php';
        }
    }

    public function SupprimerLeGenre($codeGenre){
        try {
            $conn = Connexion::getConnexion();
            $sql = "DELETE FROM genre WHERE id_genre = ?";
            $sthModifManga = $conn->prepare($sql);
            $sthModifManga->execute(array($codeGenre));
        } catch (Exception $e) {
            $msgErreur = $e->getMessage();
            //echo "<h1>$msgErreur</h1>";
            echo 'Change les genres des mangas utilisant le genre a supprimer SVP >>>Genre a Sup: '.$codeGenre;
            require_once '../presentation/MangasParGenre.php';
        }
    }
    public function SupprimerLeManga($idmanga){
        try {
            $conn = Connexion::getConnexion();
            $sql = "DELETE FROM manga WHERE id_manga = ?";
            $sthModifManga = $conn->prepare($sql);
            $sthModifManga->execute(array($idmanga));
        } catch (Exception $e) {
            $msgErreur = $e->getMessage();
            //echo "<h1>$msgErreur</h1>";
        }
    }

    /*public function ModifIDScenaristeManga($codeID,$codeChanger){
        try {
            $conn = Connexion::getConnexion();
            $sql = "UPDATE manga SET id_scenariste=? WHERE id_scenariste=? ";
            $sthModifManga = $conn->prepare($sql);
            $sthModifManga->execute(array($codeID,$codeChanger));
        } catch (Exception $e) {
            $msgErreur = $e->getMessage();
            echo "<h1>$msgErreur</h1>";
        }
    }*/
}