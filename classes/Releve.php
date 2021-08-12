<?php


class Releve extends Generique
{

    protected $id_releve;
    protected $id_eleve;
    protected $matieres;
    protected $note;

    public function __construct($data = [])
    {
        parent::__construct($data);
    }

    /**
     * @return mixed
     */
    public function getId_releve()
    {
        return $this->id_releve;
    }

    /**
     * @param mixed $id
     */
    public function setId_releve($id_releve)
    {
        $this->id_releve = $id_releve;
    }

    /**
     * @return mixed
     */
    public function getId_eleve()
    {
        return $this->id_eleve;
    }

    /**
     * @param mixed $nom
     */
    public function setId_eleve($id_eleve)
    {
        $this->id_eleve = $id_eleve;
    }

    /**
     * @return mixed
     */
    public function getMatieres()
    {
        return $this->matieres;
    }

    /**
     * @param mixed $matieres
     */
    public function setMatieres($matieres)
    {
        $this->matieres = $matieres;
    }

    /**
     * @return mixed
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param mixed $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }



}