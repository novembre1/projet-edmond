<?php

session_start();

//include "controller/PersonneController.php";
include "classes/Personne.php";
include "classes/Releve.php";
include "classes/Matiere.php";

include "modele/PersonneModele.php";
include "controller/PersonneController.php";

include "modele/MatiereModele.php";
include "controller/MatiereController.php";

include "controller/ReleveController.php";
include "modele/ReleveModele.php";

$ctrPersonne = new PersonneController();
$ctrReleve = new ReleveController();
$ctrMatiere = new MatiereController();

// if(isset($_POST)){
//     $ctrPersonne->inscription();
//     var_dump($_POST); die;
// }

if ( isset($_GET['action']) ){

	$action = $_GET['action'];

	if ($action == "inscription"){
		include "views/inscription.phtml";
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ctrPersonne->inscription();
        }		
	}else if($action=="connexion"){
		include "views/connexion.phtml";
        $ctrPersonne->connexion();
			
    }else if($action=="accueil"){
    	include "views/accueil.phtml";

    }else if($action=="deposer"){
        $eleves = $ctrPersonne->getEleve();
        $matieres = $ctrMatiere->getMatiere(); 
    	include "views/deposer.phtml";
        
        $ctrReleve->addReleve();
    }else if($action=="consulter"){ 
        $releves=$ctrReleve->getAllreleve();
        include "views/consulter.phtml"; 
    }else if($action=="reglement"){
    	include "views/reglement.phtml";

    }else if($action=="photo"){
    	include "views/photo.phtml";

    }else if($action=="telecharger"){
    	include "views/telecharger.phtml";

    }else if($action=="deconnexion"){
        session_destroy();
        header("location: .");
    }else if($action=="ajouter"){
        $ctrMatiere->addMatiere();  
        include "views/ajouter.phtml";				
    }
}else{

	include "views/accueil.phtml";	
}                
