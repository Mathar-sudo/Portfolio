<?php

try {
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
    
} catch (Exception $e) {
    die($e->getMessage());}

/*******Création équipement ********/
    if (isset ($_POST['creer_equipement'])){

        if(!empty ($_POST['nom_equip']) && !empty ($_POST['desc_equip']) && !empty ($_POST['puissance']) && !empty ($_POST['etat_equip']) && !empty ($_POST['cout_ht']) && !empty ($_POST['cout_ttc'])){

    $nom_equip = $_POST['nom_equip'];
    $desc_equip = $_POST['desc_equip'];
    $puissance = $_POST['puissance'];
    $etat_equip = $_POST['etat_equip'];
    $cout_ht = $_POST['cout_ht'];
    $cout_ttc = $_POST['cout_ttc'];

    $sql = 'INSERT INTO equipement(nom_equip,desc_equip,puissance,etat_equip,cout_ht,cout_ttc) VALUES (?,?,?,?,?,?)';
    $requete = $bdd->prepare($sql);
    $requete->execute(array($nom_equip,$desc_equip,$puissance,$etat_equip,$cout_ht,$cout_ttc));

    header('Location: equipement.php');
    }
}

/*******Modifier équipement ********/
if (isset ($_POST['modifier_equipement'])){
    if(!empty ($_POST['nom_equip']) && !empty ($_POST['desc_equip']) && !empty ($_POST['puissance']) && !empty ($_POST['etat_equip']) && !empty ($_POST['cout_ht']) && !empty ($_POST['cout_ttc'])){

        $id_equipement = $_POST['id_equipement'];
        $nom_equip = $_POST['nom_equip'];
        $desc_equip = $_POST['desc_equip'];
        $puissance = $_POST['puissance'];
        $etat_equip = $_POST['etat_equip'];
        $cout_ht = $_POST['cout_ht'];
        $cout_ttc = $_POST['cout_ttc'];

        $sql= "UPDATE equipement set nom_equip=?, desc_equip=?, puissance=?, etat_equip=?, cout_ht=?, cout_ttc=? WHERE id_equip=$id_equipement";
        $requete = $bdd->prepare($sql);
        $requete->execute(array($nom_equip,$desc_equip,$puissance,$etat_equip,$cout_ht,$cout_ttc));

        header('Location: equipement.php');
    }
}

/*******Supprimer équipement ********/
    if (isset ($_GET['supprimer_equipement'])){

        $id_equip = $_GET['supprimer_equipement'];

        $sql = 'DELETE FROM equipement WHERE id_equip='.$id_equip.'';
        $bdd->query($sql);
    }

    $requete = "SELECT * FROM equipement";
    $table_equipement =$bdd->query($requete);


?>
