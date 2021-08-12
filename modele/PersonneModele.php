<?php

include "modele/ModeleGenerique.php";

class PersonneModele extends ModeleGenerique
{

    public function inscription(Personne $personne){
  
        $query = "INSERT INTO personne VALUES(NULL, :nom, 'eleve', :login, :mdp, :mail)";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            "nom"   =>htmlentities($personne->getNom()),
            "mail"  => htmlentities($personne->getMail()),
            "login" => htmlentities($personne->getLogin()),
            "mdp"   => password_hash($personne->getMdp(), PASSWORD_DEFAULT)
        ]);

        if ($stmt){
            header("location: ?action=connexion");
            exit();
        }
    }

    public function connexion($login, $mdp){
        $query = "SELECT * FROM personne WHERE login = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$login]);

        if($stmt->rowCount() != 0){
            $personne = new Personne( $stmt->fetch() );

            if(password_verify($mdp, $personne->getMdp())){
                $_SESSION['personne'] = serialize($personne);
                header("location: .");
                exit();
            }else{
                $_SESSION['message'] = "Mot de passe incorrect";
            }
        }else{
            $_SESSION['message'] = "Login/Mot de passe incorrect";
        }

    }

    public function update($personne){
        $query = "UPDATE personne SET nom = :nom, mail = :email, login = :log WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            "nom"   => $personne->getNom(),
            "email" => $personne->getMail(),
            "log"   => $personne->getLogin(),
            "id"    => $personne->getId()
        ]);
        if($stmt){
            header("location: ?action=connexion");
            exit();
        }
    }

    public function getEleve(){
        $stmt = $this->pdo->prepare("SELECT * FROM personne WHERE statut = 'eleve'");

        $stmt->execute();
        $tab = [];

        while ($eleve = $stmt->fetch()) {
            $personne = new Personne($eleve);
            $tab[] = $personne;
        }

        return $tab;
    }
    
    

}