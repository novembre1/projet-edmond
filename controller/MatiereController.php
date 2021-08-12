
<?php


class MatiereController {

    private $modele_m;

    public function __construct()
    {
        $this->modele_m = new MatiereModele();
    }


    public function addMatiere(){
        if(!empty($_POST['matiere'])){
            $this->modele_m->addMatiere($_POST);
        }
    }
    
    public function getMatiere(){
        return $this->modele_m->getMatiere();
    }
}