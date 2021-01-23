<?php 
require_once('employe_traitement.php');
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
    <title>Employés</title>
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
                <li class="nav-item ">
                  <a class="nav-link" href="client.php">Clients</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="employe.php">Employés</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <main>
 <!------Formulaire----->
        <div>
            <a href="employe_form.html"><button type='button' class="btn btn-secondary btn-lg">Ajouter une nouvel employé</button></a>
        </div>
        <div>
             <table class="table table-striped table-hover">
            
                <thead>
                    <td>Nom employé</td>
                    <td>Numéro de Sécurité Sociale</td>
                    <td>Date d'embauche</td>
                    <td>Date dernière visite médicale</td>
                    <td>Type de contrat de travail</td>
                    <td>Numéro de permis cotier</td>
                    <td>Statut d'activité</td>
                    <td>Bees</td>

                  
                </thead>
                <tbody>
                  <!-----Récupération infos employés------>
                  <?php
                  while($data = $table_employe->fetch()){

                    echo '<tr>';

                      echo '<td>'.$data['nom_emp'].'</td>';
                      echo '<td>'.$data['num_secu'].'</td>';
                      echo '<td>'.$data['date_emb'].'</td>';
                      echo '<td>'.$data['visite_med'].'</td>';
                      echo '<td>'.$data['statut'].'</td>';
                      echo '<td>'.$data['num_permis'].'</td>';
                      echo '<td>'.$data['activ'].'</td>';
                      echo '<td>'.$data['bees'].'</td>';

                   
                    
                      echo "<td><a href='employe_visu.php?id=" . $data['num_secu'] . "' class='text-decoration-none eye'><i class='fa fa-eye'></i></a></td>";  
                      echo "<td><a href='employe_edit.php?id=".$data['num_secu']."'class='text-decoration-none pencil'><i class='fa fa-pencil'></i></a></td>";
                      echo "<td><a href='?supprimer_employe=".$data['num_secu']."'class='text-decoration-none trash'><i class='fa fa-trash'></i></a></td>";
                    echo '</tr>';
                  }
                  ?>
                  
                </tbody>

            
            </table>
        </div>
    </main>
  

</body>
</html>