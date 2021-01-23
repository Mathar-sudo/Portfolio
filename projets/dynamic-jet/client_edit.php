<?php

try {
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
    
} catch (Exception $e) {
    die($e->getMessage());}

    /******récupération id client****/
    if (isset ($_GET['id'])){

        $id_client = $_GET['id'];

        $requete = "SELECT * FROM client WHERE num_unique=$id_client";
        $table_client =$bdd->query($requete);
        
        while($data = $table_client->fetch()){

            
        
    
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
  <title>Modifier les clients</title>
</head>

  <body>

  <!-----Navigation------>
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
                <li class="nav-item ">
                  <a class="nav-link" href="equipement.php">Equipements</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="client.php">Clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="employe.php">Employés</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>

    <!------Formulaire----->
    <main>
    <div class="container" style="margin-top:5%">
      <h4 class="text-center">Modifier Client</h4><hr/>

      <form method="POST" action="client_traitement.php">

        <div class="form-group div-form">
            <label for="id_client">id client</label>
            <input type="text" class="form-control" name="id_client" value="<?= $data['num_unique'] ?>" readonly>
        </div>

        <div class="form-group div-form">
            <label for="nom_client">Nom</label>
            <input type="text" class="form-control" name="nom_client" value="<?= $data['nom_client'] ?>" required="">
        </div>

        <div class="form-group div-form">
          <label for="prenom_client">Prénom</label>
          <input type="text" class="form-control" name="prenom_client" value="<?= $data['prenom_client'] ?>" required="">
        </div>

        <div class="form-group div-form">
          <label for="adresse_client">Adresse</label>
          <input type="text" class="form-control" name="adresse_client" value="<?= $data['adresse_client'] ?>" required="">
        </div>

        <div class="form-group div-form">
          <label for="num_tel_client">Numéro de télèphone</label>
          <input type="text" class="form-control" name="num_tel_client" value="<?= $data['num_tel_client'] ?>" required="">
        </div>

        <div class="form-group div-form">
          <label for="datenaiss_client">Date de naissance</label>
          <input type="date" class="form-control" name="datenaiss_client" value="<?= $data['datenaiss_client'] ?>" required="">
        </div>

        <div class="form-group div-form">
          <label for="num_permis_cotier">Numéro permis cotier</label>
          <input type="text" class="form-control" name="num_permis_cotier" value="<?= $data['num_permis_cotier'] ?>" required="">
        </div>

       
        <button type="submit" class="btn btn-secondary submit" name="modifier_client">Modifier client</button> 
        
      </form>

    </div>
</main>
  </body>

</html>
<?php
        }
    }
?>


