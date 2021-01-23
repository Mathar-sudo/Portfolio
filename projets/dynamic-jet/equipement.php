<?php 
require_once('equipement_traitement.php');
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
    <title>Equipements</title>
</head>
<body>
    <header>
          <!-----Navigation------>
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
 <!------Tableau----->
        <div>
            <a href="equipement_form.html"><button type='button' class="btn btn-secondary btn-lg">Ajouter un nouvel équipement</button></a>
        </div>
        <div>
             <table class="table table-striped table-hover">
            
                <thead>

                    <td>ID</td>
                    <td>Nom</td>
                    <td>Puissance</td>
                    <td>Description</td>
                    <td>Etat</td>
                    <td>Prix HT/Heure</td>
                    <td>Prix TTC/Heure</td>
                  
                </thead>
                <tbody>
                   <!-----Récupération infos équipements------>
                  <?php
                  while($data = $table_equipement->fetch()){

                    echo '<tr>';

                      echo '<td>'.$data['id_equip'].'</td>';
                      echo '<td>'.$data['nom_equip'].'</td>';
                      echo '<td>'.$data['desc_equip'].'</td>';
                      echo '<td>'.$data['puissance'].'</td>';
                      echo '<td>'.$data['etat_equip'].'</td>';
                      echo '<td>'.$data['cout_ht'].'</td>';
                      echo '<td>'.$data['cout_ttc'].'</td>';

                      echo "<td><a href='equipement_visu.php?id=" . $data['id_equip'] . "' class='text-decoration-none eye'><i class='fa fa-eye'></i></a></td>";
                      echo "<td><a href='equipement_edit.php?id=".$data['id_equip']."'class='text-decoration-none pencil'><i class='fa fa-pencil'></i></a></td>";
                      echo "<td><a href='?supprimer_equipement=".$data['id_equip']."'class='text-decoration-none trash'><i class='fa fa-trash'></i></a></td>";
                    echo '</tr>';
                  }
                   ?>
                </tbody>

            
            </table>
        </div>
    </main>
    

</body>
</html>