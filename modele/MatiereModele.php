<?php



class MatiereModele extends ModeleGenerique {

	
	public function addMatiere($matiere){

		$matiere = new Matiere($matiere);

		$query= "INSERT INTO matiere VALUES (NULL,:matieres)";
        
		$stmt= $this->pdo->prepare($query);

		$stmt->execute([
				"matieres"=>$matiere->getMatiere(),
		]);

        if($stmt){
            header("location:?action=deposer");
            exit();
    }	}


    public function getMatiere(){
        $stmt = $this->pdo->prepare("SELECT * FROM matiere");

        $stmt->execute();
        $tab = [];

        while ($matiere = $stmt->fetch()) {
            $matiere = new Matiere($matiere);
            $tab[] = $matiere;
        }

        return $tab;
    }
}