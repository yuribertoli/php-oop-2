<?php

class Prodotti{

    //setto delle variabili di base per tutti i prodotti
    protected $id;
    protected $name;
    public $description;
    protected $price;
    public $manufacturer;
    protected $image;

    //rendo necessari il nome ed il prezzo
    public function __construct($name, $price)
    {        
        $this->name = $name;
        $this->price = $price;
    }

    public function setID(){ //creo un ID con un numero a 6 cifre casuale a cui concateno il suo nome e il nome del produttore

        $this->id = rand(100000, 999999) . $this->name . $this->manufacturer;
    }

    public function setPrice($prezzo){ //il prezzo deve essere numerico e maggiore o uguale di 20 centesimi

        if(is_numeric($prezzo) && $prezzo >= 0.2){
            $this->price = $prezzo;
            return true;
        } else {
            return false;
        }
    }

    public function setName($nome){ //il nome non dev'essere un numero e deve essere più lungo di 2 caratteri

        if(!is_numeric($nome) && strlen($nome) > 2){
            $this->name = $nome;
            return true;
        } else {
            return false;
        }
    }

    public function setImage($url){ //l'immagine deve avere un url valido per poter essere caricata correttamente

        if(filter_var($url, FILTER_VALIDATE_URL)){
            $this->image = $url;
            return true;
        } else {
            return false;
        }
    }

}