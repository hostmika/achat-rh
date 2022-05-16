<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <title>Postuler</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                </div>         
                <div class="col-md-6">
                    <div>
                        <!-- <embed src="CV/test.pdf" width="500" height="375" type="application/pdf"> -->
                        <a href="TraitementLien.php">Lien</a>
                        <form action="Traitement.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nom:</label>
                                <input type="texte" class="form-control" name="nom" id="nom" aria-describedby="emailHelp">                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Prenom:</label>
                                <input type="texte" class="form-control" name="prenom" id="prenom" aria-describedby="emailHelp">                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Téléphone:</label>
                                <input type="texte" class="form-control" name="tel" id="tel" aria-describedby="emailHelp">                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email:</label>
                                <input type="email" class="form-control" name="email" id="mail" aria-describedby="emailHelp">                
                            </div>
                            <div class="form-group" style="margin-top: 1%">
                                <label for="exampleInputEmail1">CV:</label>
                                <input type="file" name="cv" id="cv">                
                            </div>
                            <div class="form-group" style="margin-top: 1%">
                                <label for="exampleInputEmail1">Lettre de motivation:</label>
                                <input type="file" name="lettre" id="lettre">                
                            </div>
                            <input type="submit" class="btn btn-primary" style="margin-top:1%; margin-left:90%" value="Postuler" />
                        </form>
                    </div>
                </div> 
                <div class="col-md-3">

                </div>
            </div>
        </div>
        
    </body>
</html>