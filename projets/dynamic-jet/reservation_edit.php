<?php
require_once('reservation_traitement.php');

try {
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
    
} catch (Exception $e) {
    die($e->getMessage());}


    if (isset ($_GET['id'])){

        $id_client = $_GET['id'];

        $requete = "SELECT * FROM reservation WHERE num_resa=$id_client";
        $table_client =$bdd->query($requete);
        
        while($data = $table_client->fetch()){

            
        
    
?>
<!DOCTYPE html>

<html lang="fr">

  <head>

    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!---------Bootstrap------->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-------CSS------->
  <link href="style.css" rel="stylesheet">

  <!------Icones------>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
  <title>Modifier réservation</title>
  </head>

  <body>
  <header>
       <!------Navigation----->
        <div>
        <a href="reservation.php" class="text-decoration-none" title="Accueil" rel="home">
        <h1>Dynamic Jet</h1>
        </a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="reservation.php">Réservations</a>
                </li>
                <li class="nav-item ">
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
        <h4 class="text-center">Modifier réservation</h4><hr/>
        <form method="POST" action="reservation_traitement.php">

            <div class="form-group div-form">
                <label for="num_resa">Numéro de réservation</label>
                <input type="text" name="num_resa" value="<?= $data['num_resa'] ?>" readonly >
            </div>
            <div class="form-group div-form">
                <label for="date_de_debut" class="date">Date de début</label>
                <input type="date" class=""name="date_de_debut" value="<?= $data['date_debut'] ?>" min="" >
            
            
                <label for="heure_de_debut" class="espace">Heure de début</label>
                <input type="time" name="heure_de_debut" value="<?= $data['heure_debut'] ?>" min="" >
            </div>
            <div class="form-group div-form">
                <label for="date_de_fin" class="date">Date de fin</label>
                <input type="date" name="date_de_fin" value="<?= $data['date_fin'] ?>" min="" >
          
                <label for="heure_de_fin" class="espace">Heure de fin</label>
                <input type="time" name="heure_de_fin" value="<?= $data['heure_fin'] ?>" min="" >
            </div>
 <!------Récupération moniteur----->
            <p>Moniteur</p>
                <?php
            if($data['nbr_moniteurs'] == "oui") {
            ?>
            <div class="form-group div-form">
                <input type="radio" name="nbr_moniteurs" onchange="showDiv()" value='oui' checked>
                <label for="oui">oui</label>
                <input type="radio" name="nbr_moniteurs" onchange="hideDiv()" value='non' >
                <label for="non">non</label>
            </div>
            <div class="form-group div-form">
            <label for="num_secu">Nom moniteur</label>
                <select name="num_secu" class="form-control" required="">
                <option selected value = "<?= $data['nom_employe'] ?>" ><?= get_nomemploye($data['nom_employe']) ?></option>
                    <?php

                        while($data_emp = $table_employe->fetch()){

                            if($data['nom_employe'] != $data_emp['num_secu']){

                            echo "<option value=".$data_emp['num_secu'].">".$data_emp['nom_emp']."</option>";
                            }
                        }

                    ?>
                    </select>
                    </div>
            <?php
            }
            else {

            ?>
            <div class="form-group div-form">
                <input type="radio" name="nbr_moniteurs" onchange="showDiv()" value='oui' >
                <label for="oui">oui</label>
                <input type="radio" name="nbr_moniteurs" onchange="hideDiv()" value='non' checked>
                <label for="non">non</label>
            </div>
            <?php
            }
            ?>
        

           
        <div class="form-group div-form">
        
            <label for="en_activite">Activité</label>
            <select name="activite">
                <option value="scooter">Scooter</option>
                <option value="ski">Ski nautique</option>
                <option value="wakeboard">Wakeboard</option>
                <option value="bouee">Bouée</option>
                <option value="bateau">Bateau</option>
          </select>
          
        </div>
        <div class="form-group div-form">
                <label for="id_equip">Equipement</label>
                <select name="id_equip" class="form-control" required="">
                     <!------Récupération équipement----->
                <option selected value = "<?= $data['id_equip'] ?>"><?= get_nomequipement($data['id_equip']) ?></option>
                    <?php

                        while($data_equip = $table_equipement->fetch()){

                            if($data['id_equip'] != $data_equip['id_equip']){

                            echo "<option value=".$data_equip['id_equip'].">".$data_equip['nom_equip']."</option>";
                        }
                    }
                    ?>
                    </select>
                    </div>

            <div class="form-group div-form">
                <label for="cout_global">Coût global</label>
                <input type="text" class="form-control" name="cout_global" value="<?= $data['cout_global'] ?>" required="">
            </div>
            <div class="form-group div-form">
                <label for="cout_unitaire">Coût unitaire</label>
                <input type="text" class="form-control" name="cout_unitaire" value="<?= $data['cout_unitaire'] ?>" required="">
            </div>

            <div class="form-group div-form">
                <label for="id_client">Client</label>
                <select name="id_client" class="form-control" required="">
                     <!------Récupération client----->
                <option selected value = "<?= $data['id_client'] ?>"><?= get_nomclient($data['id_client']) ?></option>
                    <?php

                        while($data_cli = $table_client->fetch()){ 

                            if($data['id_client'] != $data_cli['num_unique']){

                            echo "<option value=".$data_cli['num_unique'].">".$data_cli['nom_client']."</option>";
                        }
                    }
                    ?>

                </select>
            </div>



            
            
            <button type="submit" class="btn btn-secondary submit" name="modifier_reservation">Modifier réservation</button>
           
        </form>
    </div>
    <script>
        function hideDiv() {
            document.getElementById("employe").style.display="none";
        }	
        function showDiv() {
            document.getElementById("employe").style.display="block";
        }	
  
    </script>
    </main>
  </body>
</html>
<?php
        }
    }
?>