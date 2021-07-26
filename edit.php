<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM joueur WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$joueur = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['nom'])  && isset($_POST['numero']) && isset($_POST['position'])) {

  $nom = $_POST['nom'];
  $numero = $_POST['numero'];
  $position = $_POST['position'];
  $sql = 'UPDATE joueur SET nom=:nom, numero=:numero, position = :position WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':nom' => $nom, ':numero' => $numero, ':position' => $position, ':id' => $id])) {
    header("Location: /phpcrud");
  }
}
 ?>



<?php include('./header.php') ?>
<div class="container">

    <div class="row">
        <div class="col my-5">
            <h1>Modifier un joueur</h1>
        </div>
    </div>

    

    <div class="row">
        <div class="col my-5">
            <form method="post">
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="<?= $joueur->nom ?>" class="form-control" name="nom">
                </div>
                <div class="form-group">
                    <label>Numero</label>
                    <input type="number" value="<?= $joueur->numero ?>" class="form-control" name="numero">
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <input type="text" value="<?= $joueur->position ?>" class="form-control" name="position">
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>



</div>



<?php include('./footer.php') ?>