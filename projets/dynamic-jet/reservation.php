<?php
require_once('reservation_traitement.php');
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
  <title>Réservations</title>
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
          <li class="nav-item active">
            <a class="nav-link" href="reservation.php">Réservations</a>
          </li>
          <li class="nav-item">
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
   <!-----Tableau------>
    <div>
      <a href="reservation_form.php"><button type='button' class="btn btn-secondary btn-lg">Ajouter une nouvelle réservation</button></a>
    </div>

    <div>
      <table class="table table-striped table-hover">

        <thead>

          <td>N° de réservation</td>
          <td>Date de début</td>
          <td>Heure de début</td>
          <td>Date de fin</td>
          <td>Heure de fin</td>
          <td>Nombre moniteurs</td>
          <td>Activité</td>
          <td>Cout global</td>
          <td>Cout unitaire</td>
          <td>Nom client</td>
          <td>Nom employé</td>
          <td>Nom de l'équipement</td>


        </thead>
        <tbody>
           <!-----Récupération infos réservation------>
          <?php

          while ($data = $table_reservation->fetch()) {

            echo '<tr>';

            echo '<td>' . $data['num_resa'] . '</td>';
            echo '<td>' . $data['date_debut'] . '</td>';
            echo '<td>' . $data['heure_debut'] . '</td>';
            echo '<td>' . $data['date_fin'] . '</td>';
            echo '<td>' . $data['heure_fin'] . '</td>';
            echo '<td>' . $data['nbr_moniteurs'] . '</td>';
            echo '<td>' . $data['activite'] . '</td>';
            echo '<td>' . $data['cout_global'] . '</td>';
            echo '<td>' . $data['cout_unitaire'] . '</td>';
            echo '<td>' . get_nomclient($data['id_client']) . '</td>';
            echo '<td>' . get_nomemploye($data['nom_employe']) . '</td>';
            echo '<td>' . get_nomequipement($data['id_equip']). '</td>';

            // echo "<td><a href='' class='text-decoration-none print'><i class='fa fa-print'></i></a></td>";
            echo "<td><a href='reservation_visu.php?id=" . $data['num_resa'] . "' class='text-decoration-none eye'><i class='fa fa-eye'></i></a></td>";
            echo "<td><a href='reservation_edit.php?id=" . $data['num_resa'] . "' class='text-decoration-none pencil'><i class='fa fa-pencil'></i></a></td>";
            echo "<td><a href='?supprimer_reservation=" . $data['num_resa'] . "' class='text-decoration-none trash'><i class='fa fa-trash'></i></a></td>";



            echo '</tr>';
          }
          ?>

        </tbody>


      </table>
    </div>
  </main>

</body>

</html>