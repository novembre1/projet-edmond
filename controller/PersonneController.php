<?php

class PersonneController {

    private $modele_perso;

    public function __construct()
    {
        $this->modele_perso = new PersonneModele();
    }


    public function inscription(){

        if(!empty($_POST['nom'])){
            $personne = new Personne($_POST);

            $this->modele_perso->inscription($personne);
        }
    }

    public function connexion(){
        if( !empty($_POST['login']) && !empty($_POST['mdp']) ){
            $this->modele_perso->connexion($_POST['login'], $_POST['mdp']);
        }
    }

    public function getEleve(){
        return $this->modele_perso->getEleve();
    }

    
}