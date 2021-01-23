<?php 

try {     
    $bdd = new PDO('mysql:host=localhost; dbname=dynamic_jet', 'root', '');
        
    } catch(Exception $e){
        die($e->getMessage());
    }      
/*******Création employé ********/
if (isset ($_POST['creer_employe'])){

        if(!empty ($_POST['nom_emp']) && !empty ($_POST['num_secu']) && !empty ($_POST['date_emb']) && !empty ($_POST['visite_med']) && !empty ($_POST['statut']) && !empty ($_POST['activ']) && !empty ($_POST['bees'])){

            $nom_emp = $_POST['nom_emp'];      
            $num_secu = $_POST['num_secu'];
            $date_emb = $_POST['date_emb'];
            $visite_med = $_POST['visite_med'];     
            $statut = $_POST['statut'];
                if(!empty($_POST['num_permis'])){
                $num_permis = $_POST['num_permis'];
                }
                else {
                    $num_permis = null;
                }
            $activ = $_POST['activ']; 
            $bees = $_POST['bees'];   
        

    $sql = 'INSERT INTO employe(nom_emp,num_secu, date_emb, visite_med, statut, num_permis, activ, bees) VALUES (?,?,?,?,?,?,?,?)';
    $requete = $bdd->prepare($sql);
    $requete -> execute(array($nom_emp, $num_secu, $date_emb, $visite_med, $statut, $num_permis, $activ, $bees));

    header('Location: employe.php');

    }
}
                
    /*******Modifier employé ********/
    if (isset ($_POST['modifier_employe'])){

        if(!empty ($_POST['nom_emp']) && !empty ($_POST['num_secu']) && !empty ($_POST['date_emb']) && !empty ($_POST['visite_med']) && !empty ($_POST['statut']) && !empty ($_POST['num_permis']) && !empty ($_POST['activ']) && !empty ($_POST['bees'])){

            
            $nom_emp = $_POST['nom_emp'];      
            $num_secu = $_POST['num_secu'];
            $date_emb = $_POST['date_emb'];
            $visite_med = $_POST['visite_med'];     
            $statut = $_POST['statut'];
            if(!empty($_POST['num_permis'])){
                $num_permis = $_POST['num_permis'];
            }
            else {
                $num_permis = null;
            }
            $activ = $_POST['activ']; 
            $bees = $_POST['bees'];

            $sql = "UPDATE employe set nom_emp=?, date_emb=?, visite_med=?, statut=?, num_permis=?, activ=?, bees=? WHERE num_secu=$num_secu";
            $requete= $bdd->prepare($sql);
            $requete->execute(array($nom_emp,$date_emb,$visite_med,$statut,$num_permis,$activ,$bees));

            header('Location: employe.php');
        }
    }   
    
     /*******Supprimer employé ********/
    if (isset ($_GET['supprimer_employe'])){

        $num_secu = $_GET['supprimer_employe'];

        $sql = "DELETE FROM employe WHERE num_secu like ($num_secu)";
        $bdd->query($sql);

        header('Location: employe.php');
    }

    $requete = 'SELECT * FROM employe';
    $table_employe =$bdd->query($requete);

  
?>      