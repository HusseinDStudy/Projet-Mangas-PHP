<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/mesStyles.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="js/ajaxConnexion.js" type="text/javascript"></script>
</head>
<body>

<div class="container">
    <div  class="col-md-6 col-md-offset-2">
        <h1>Information sur un Pays</h1>
        <form>
            <BR><BR>
            <div class="form-group">
                <label class="col-md-3 control-label" id="pays" for="Pays">Pays</label>
                <div class="col-md-9">
                    <select class="form-control" id ="nomPays">
                        <option value="Allemagne">Allemagne</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Canada">Canada</option>
                        <option value="Colombie">Colombie</option>
                        <option value="Danemark">Danemark</option>
                        <option value="Espagne">Espagne</option>
                        <option value="France">France</option>
                    </select>

                </div>
            </div>
            <BR><BR>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <input type="submit" id="submit" value="Afficher les informations sur ce pays" >
                </div>
            </div>
        </form>
    </div>

    <!--   Ligne blanche -->
    <div class="row" >
        <div class="ligneblanche" >
            <div class="col-md-12" >
            </div>
        </div>
    </div>

    <div class="row" >
       <div class="col-md-6 col-md-offset-3">
          <div id="resultat">
            <!-- Nous allons afficher un retour en jQuery  -->
          </div>
       </div>
    </div>

    <!--   Ligne blanche -->
    <div class="row" >
        <div class="ligneblanche" >
            <div class="col-md-12" >
            </div>
        </div>
    </div>

    <div class="row">
       <div class="col-md-6  col-md-offset-4">
         <p><H2><a href="../index.php">Retour au menu</a></H2></p>
       </div>
    </div>
</div> <!-- /container -->
</body>
</html>




