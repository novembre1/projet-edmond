<?php



class ReleveModele extends ModeleGenerique {

	
	public function addReleve($releve){

		$releve = new Releve($releve);
            var_dump($releve); //die;

		$query= "INSERT INTO releve VALUES (NULL, :id_eleve, :matieres, :note)";
        
		$stmt= $this->pdo->prepare($query);

		$stmt->execute([
				"id_eleve"=> $releve->getId_eleve(),
				"matieres"=>$releve->getMatieres(),
				"note"=>$releve->getNote()
		]);
	}
	public function update($releve){
        $releve = new Releve($releve);
        $query = "UPDATE releve SET id_eleve = ?, matieres = ? , note= ? WHERE id = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$releve->getId_eleve(), $releve->getMatieres(), $releve->getNote()]);
    }

    public function getAllreleve(){
        $stmt = $this->connect()->query("SELECT * FROM releve");
        $stmt->execute();
      
        $tab = [];

        while ($releve = $stmt->fetch()) {
            $releve = new Releve($releve);
            $tab[] = $releve;
        }
        return $tab;
    }
}