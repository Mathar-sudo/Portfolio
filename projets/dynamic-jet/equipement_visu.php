<?php
require_once('equipement_traitement.php');
try {
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
    
} catch (Exception $e) {
    die($e->getMessage());}


    if (isset ($_GET['id'])){

        $id_equipement = $_GET['id'];

        $requete = "SELECT * FROM equipement WHERE id_equip=$id_equipement";
        $table_equipement =$bdd->query($requete);
        
        while($data = $table_equipement->fetch()){
        
?>
<!DOCTYPE html>

<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <!---------Bootstrap------->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-------CSS------->
  <link href="style.css" rel="stylesheet">
  <!------Icones------>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
  <title>Fiche équipement</title>
</head>

  <body>
     <!------Navigation----->
  <header>
        <div>
            <a href="reservation.php" class="text-decoration-none" title="Accueil" rel="home">
                <h1>Dynamic Jet</h1>
            </a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="reservation.php">Réservations</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="equipement.php">Equipements</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="client.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employe.php">Employés</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <main>
       <!------Formulaire----->
    <div class="container" style="margin-top:5%">
      <h4 class="text-center">Fiche Equipement</h4><hr/>

      <form method="POST" action="equipement_traitement.php">

        <div class="form-group div-form ">
            <label for="id_equipement">id client</label>
            <input type="text" class="form-control" name="id_equipement" value="<?= $data['id_equip'] ?>" readonly>
        </div>
   

        <div class="form-group div-form">
            <label for="nom_equip">Nom</label>
            <input type="text" class="form-control" name="nom_equip" value="<?= $data['nom_equip'] ?>" required="">
        </div>

        <div class="form-group div-form">
          <label for="desc_equip">Descriptif</label>
          <input type="text" class="form-control" name="desc_equip" value="<?= $data['desc_equip'] ?>" required="">
        </div>

        <div class="form-group div-form">
          <label for="puissance">Puissance</label>
          <input type="text" class="form-control" name="puissance" value="<?= $data['puissance'] ?>" required="">
        </div>

       
            
        <div class="form-group div-form">
        
            <label for="nom">Etat de services</label>
            <select name="etat_equip">
    <!-----Récupération état------>
            <?php
            if($data['etat_equip'] == "tb"){
            ?>
                <option value="tb">Très bon</option>
                <option value="b">Bon</option>
                <option value="r">Réparation</option>
            <?php
            }
            ?>
            <?php
            if($data['etat_equip'] == "b"){
            ?>
                <option value="b" >Bon</option>
                <option value="tb">Très bon</option>
                <option value="r">Réparation</option>
            <?php
            }
            ?>
            <?php
            if($data['etat_equip'] == "r"){
            ?>
                <option value="r">Réparation</option>
                <option value="tb">Très bon</option>
                <option value="b">Bon</option>
            <?php
            }
            ?>
            
          </select>
        
        </div>
        
        <div class="form-group div-form">
          <label for="nom">Coût HT</label>
          <input type="text" class="form-control" name="cout_ht" value="<?= $data['cout_ht'] ?>" required="">
        </div>

        <div class="form-group div-form">
          <label for="nom">Coût ttc</label>
          <input type="text" class="form-control" name="cout_ttc" value="<?= $data['cout_ttc'] ?>" required="">
        </div>
            
        <div class = "text-center">
          <a href="equipement.php" class="btn btn-secondary submit">Retour aux équipements</a>
          <a href="equipement_edit.php?id=<?= $data['id_equip'] ?>" class="btn btn-success submit">Modifier équipement</a>
          <a href="?supprimer_equipement=<?= $data['id_equip'] ?>" class="btn btn-danger submit">Supprimer équipement</a>
        </div>
      </form>

    </div>

  </body>
</main>
</html>

<?php
        }
    }
?>