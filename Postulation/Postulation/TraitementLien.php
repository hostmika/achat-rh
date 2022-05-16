<?php
    try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=gestion_rh;charset=utf8', 'root', '');
    }
    catch(Exception $e){
            die('Erreur : '.$e->getMessage());
    }

    function allPost($mysqlClient){
        $sqlQuery = 'SELECT * FROM Postulation';
        $recipesStatement = $mysqlClient->prepare($sqlQuery);
        $recipesStatement->execute();
        $recipes = $recipesStatement->fetchAll();
        return $recipes;
    }
    
    $zavatra = allPost($mysqlClient);

    $lalana = null;
    $end = 0;
    // $_GET['CV'] = NULL;
    // $_GET['Lettre'] = NULL;

    if($_GET['CV'] != NULL){
        $_GET['Lettre'] = NULL;
        $end = explode("/", $_GET['CV']);
        $id = $end[0];
        $lalana = "uploadFiles/".$zavatra[$id-1]['idPostulation']."/"."CV/".$zavatra[$id-1]['cv'];
        echo $lalana;
    }
    else{
        $_GET['CV'] = NULL;
        $end = explode("/", $_GET['Lettre']);
        $id = $end[0];
        $lalana = "uploadFiles/".$zavatra[$id-1]['idPostulation']."/"."Motivation/".$zavatra[$id-1]['lettreDeMotivation'];
        echo $lalana;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Postuler</title>
</head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">CV/Lettre de Motivation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($zavatra as $zavatraBe) {?>
                            <tr>
                                
                                    <th scope="row"><?php echo $zavatraBe['idPostulation'];?></th>
                                    <td> <?php echo $zavatraBe['nom']; ?></td>
                                    <td> <?php echo $zavatraBe['prenom']; ?></td>
                                    <td> 
                                        <form action="TraitementBtn.php" method="post">
                                            <input type="hidden" name="id" value=<?php echo $zavatraBe['idPostulation'];?>/>
                                            <input type="submit" class="btn btn-primary" name="bouton" value="CV"/>
                                        </form>
                                        <form action="TraitementBtn.php" method="post">
                                            <input type="hidden" name="id" value=<?php echo $zavatraBe['idPostulation'];?>/>    
                                            <input type="submit" class="btn btn-success" name="bouton" value="Motivation"/>
                                        </form>
                                    </td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>         
            <div class="col-md-6">
                <?php if($end != 0) {?>
                    <embed src=<?php echo $lalana;?> width="500" height="375" type="application/pdf">
                    
                <?php } ?>
            </div>
        </div>
    </div>
        
    </body>
</html>