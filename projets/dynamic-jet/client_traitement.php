<?php

try {
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
    
} catch (Exception $e) {
    die($e->getMessage());}


/*******Création client ********/
    if (isset ($_POST['creer_client'])){

        if(!empty ($_POST['nom_client']) && !empty ($_POST['prenom_client']) && !empty ($_POST['adresse_client']) && !empty ($_POST['num_tel_client']) && !empty ($_POST['datenaiss_client']) && !empty ($_POST['num_permis_cotier'])){

            
            $nom_client = $_POST['nom_client'];
            $prenom_client = $_POST['prenom_client'];
            $adresse_client = $_POST['adresse_client'];
            $num_tel_client = $_POST['num_tel_client'];
            $datenaiss_client = $_POST['datenaiss_client']; 
            if(!empty ($_POST['num_permis_cotier'])) {
                $num_permis_cotier = $_POST['num_permis_cotier'];
            } 
            else {
                $num_permis_cotier = null;
            }
            $sql = 'INSERT INTO client(nom_client,prenom_client,adresse_client,num_tel_client,datenaiss_client,num_permis_cotier) VALUES (?,?,?,?,?,?)';
            $requete = $bdd->prepare($sql);
            $requete->execute(array($nom_client,$prenom_client,$adresse_client,$num_tel_client,$datenaiss_client,$num_permis_cotier));


            header('Location: client.php');
        }
    }
   

    /*******Modifier client ********/
    if (isset ($_POST['modifier_client'])){

        if(!empty ($_POST['nom_client']) && !empty ($_POST['prenom_client']) && !empty ($_POST['adresse_client']) && !empty ($_POST['num_tel_client']) && !empty ($_POST['datenaiss_client']) && !empty ($_POST['num_permis_cotier'])){

            $id_client = $_POST['id_client'];
            $nom_client = $_POST['nom_client'];
            $prenom_client = $_POST['prenom_client'];
            $adresse_client = $_POST['adresse_client'];
            $num_tel_client = $_POST['num_tel_client'];
            $datenaiss_client = $_POST['datenaiss_client']; 
            if(!empty ($_POST['num_permis_cotier'])) {
                $num_permis_cotier = $_POST['num_permis_cotier'];
            } 
            else {
                $num_permis_cotier = null;
            }

            $sql = "UPDATE client set nom_client=?, prenom_client=?, adresse_client=?, num_tel_client=?, datenaiss_client=?, num_permis_cotier=? WHERE num_unique= $id_client"; 
            $requete = $bdd->prepare($sql);
            $requete->execute(array($nom_client,$prenom_client,$adresse_client,$num_tel_client,$datenaiss_client,$num_permis_cotier));

            header('Location: client.php');
        }
    }


    /*******Supprimer client ********/
    if (isset ($_GET['supprimer_client'])){

        $id_client = $_GET['supprimer_client'];

        $sql = 'DELETE FROM client WHERE num_unique='.$id_client.'';
        $bdd->query($sql);
    }

    $requete = "SELECT * FROM client";
    $table_client =$bdd->query($requete);

 ?>   