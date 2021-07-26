<?php 
require "db.php";
$sql = "SELECT * FROM joueur WHERE id = :id";
$id = $_GET["id"];
$statement = $connection->prepare($sql);
$statement->execute([":id" => $id]);
$joueur = $statement->fetch(PDO::FETCH_OBJ);
?>



<?php include ('./header.php') ?>
<div class="container">

    <div class="row">
        <div class="col my-5">
            <h1>Modifier un joueur</h1>
        </div>
    </div>

    <?php if(!empty($message)): ?>
        <div class="alert alert-success" role="alert">
            <?= $message;?>        
        </div>
    <?php endif; ?>
   
    <div class="row">
        <div class="col my-5">
            <form method="post">
                <div class="form-group">
                    <label >Nom</label>
                    <input type="text" value="<?= $joueur->nom ?>" class="form-control" name="nom">
                </div>
                <div class="form-group">
                    <label >Numero</label>
                    <input type="number" value="<?= $joueur->nom ?>" class="form-control" name="numero">
                </div>
                <div class="form-group">
                    <label >Position</label>
                    <input type="text" value="<?= $joueur->nom ?>" class="form-control" name="position">
                </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>



</div>



<?php include ('./footer.php') ?>


