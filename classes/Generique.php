<?php


class Generique
{

    public function __construct($data = []){
        foreach ($data as $key => $value){
            $methode = "set" . ucfirst($key);

            if(method_exists($this, $methode)){
                $this->$methode($value);
            }
        }
    }

}