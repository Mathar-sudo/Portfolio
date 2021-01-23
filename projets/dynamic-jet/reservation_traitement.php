<?php
try {
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
} catch (Exception $e) {
    die($e->getMessage());
}
/*******Création réservation********/

if (isset($_POST['creer_reservation'])) {

    if (!empty($_POST['date_debut']) && !empty($_POST['heure_debut']) && !empty($_POST['date_fin']) && !empty($_POST['heure_fin']) && !empty($_POST['nbr_moniteurs']) && !empty($_POST['activite']) && !empty($_POST['cout_global']) && !empty($_POST['cout_unitaire']) && !empty($_POST['id_client'])) {

        $date_debut = $_POST['date_debut'];
        $heure_debut = $_POST['heure_debut'];
        $date_fin = $_POST['date_fin'];
        $heure_fin = $_POST['heure_fin'];
        $nbr_moniteurs = $_POST['nbr_moniteurs'];
        $activite = $_POST['activite'];
        $cout_global = $_POST['cout_global'];
        $cout_unitaire = $_POST['cout_unitaire'];
        $client = $_POST['id_client'];
        $employe = $_POST['num_secu'];
        $equipement = $_POST['id_equip'];
        
      
        $sql = 'INSERT INTO reservation(date_debut,heure_debut, date_fin, heure_fin, nbr_moniteurs, activite, cout_global, cout_unitaire, id_client, nom_employe,id_equip) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
        $requete = $bdd->prepare($sql);
        $requete->execute(array($date_debut,$heure_debut, $date_fin,$heure_fin, $nbr_moniteurs, $activite, $cout_global, $cout_unitaire,$client,$employe,$equipement));


        header('Location: reservation.php');
    }
}

/*******Appel des tables******/
$requete = "SELECT * FROM client";
$table_client = $bdd->query($requete);

$requete = "SELECT * FROM employe";
$table_employe = $bdd->query($requete);

$requete = "SELECT * FROM equipement";
$table_equipement = $bdd->query($requete);

$requete = " SELECT * FROM reservation";
$table_reservation = $bdd->query($requete);

/*******Récupération id pour nom********/
function get_nomclient($id_client)
{

    try {
        $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $requete="SELECT * FROM client WHERE num_unique=$id_client";
    $resultat = $bdd->query($requete);
    while($data = $resultat->fetch()){
        return $data['nom_client'];
    }
}

function get_nomemploye($id_employe)
{

    try {
        $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $requete="SELECT * FROM employe WHERE num_secu=$id_employe";
    $resultat = $bdd->query($requete);
    while($data = $resultat->fetch()){
        return $data['nom_emp'];
    }
}

function get_nomequipement($id_equipement)
{

    try {
        $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $requete="SELECT * FROM equipement WHERE id_equip=$id_equipement";
    $resultat = $bdd->query($requete);
    while($data = $resultat->fetch()){
        return $data['nom_equip'];
    }
}

/*******Modifier réservation********/
if (isset ($_POST['modifier_reservation'])){

    if (!empty($_POST['date_debut']) && !empty($_POST['date_fin']) && !empty($_POST['nbr_moniteurs']) && !empty($_POST['activite']) && !empty($_POST['cout_global']) && !empty($_POST['cout_unitaire']) && !empty($_POST['id_client'])) {

        $id_reservation = $_POST['num_resa'];
        $date_debut = $_POST['date_debut'];
        $heure_debut = $_POST['heure_debut'];
        $date_fin = $_POST['date_fin'];
        $heure_fin = $_POST['heure_fin'];
        $nbr_moniteurs = $_POST['nbr_moniteurs'];
        $activite = $_POST['activite'];
        $cout_global = $_POST['cout_global'];
        $cout_unitaire = $_POST['cout_unitaire'];
        $client = $_POST['id_client'];
        $employe = $_POST['num_secu'];
        $equipement = $_POST['id_equip'];

        
        $sql = "UPDATE reservation set date_debut=?,heure_debut=?, date_fin=?, heure_fin=?, nbr_moniteurs=?, activite=?, cout_global=?, cout_unitaire=?, id_client=?, nom_employe=?, id_equip=?  WHERE num_resa=$id_reservation";
        $requete = $bdd->prepare($sql);
        $requete->execute(array($date_debut,$heure_debut, $date_fin,$heure_fin, $nbr_moniteurs, $activite, $cout_global, $cout_unitaire,$client,$employe,$equipement));

        header('Location: reservation.php');
        
    }
}
/*******Supprimer réservation********/
    if (isset ($_GET['supprimer_reservation'])){

        $id_reservation = $_GET['supprimer_reservation'];

        $sql = 'DELETE FROM reservation WHERE num_resa='.$id_reservation.'';
        $bdd->query($sql);

        header('Location: reservation.php');

    }

    $requete = "SELECT * FROM reservation";
    $table_reservation =$bdd->query($requete);

   



?>
