<?php



class ReleveController {

    private $modele_r;

    public function __construct()
    {
        $this->modele_r = new ReleveModele();
    }


    public function addReleve(){

        if(!empty($_POST['id_eleve'])){
            $this->modele_r->addReleve($_POST);
        }
    }

    public function getAllreleve(){
        return $this->modele_r->getAllreleve();
    }

    public function update(){
        if( !empty($_POST['releve']) ){
            $this->modele_r->update($_POST);
        }
    }
}