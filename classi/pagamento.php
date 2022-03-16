<?php

class Pagamento{

    protected $numeroCarta;
    protected $dataScadenza;
    protected $nome;
    protected $cognome;
    protected $cifreValidazione;
    public $dataOggi = "16-03-2022"; 

    public function __construct($numeroCarta, $dataScadenza, $nomeCognome, $cifreValidazione)
    {
        $this->numeroCarta = $numeroCarta;
        $this->dataScadenza = $dataScadenza;
        $this->nomeCognome = $nomeCognome;
        $this->cifreValidazione = $cifreValidazione;
    }

    public function setNumeroCarta($numeroCarta){

        if(preg_match('^[0-9]{16}+$', $numeroCarta) == 1){ //regex per validare il numero di telefono (^ indica l'inizio del pattern mentre $ indica la fine del pattern, + indica che il pattern dev'essere ripetuto almeno una volta, {16} indica che devono esserci 16 caratteri, [0-9] indica che ogni carattere deve essere entro questo range numerico)
                                                           //preg_match ritorna 1 in caso positivo di match tra la regex e il parametro

            $this->numeroCarta = $numeroCarta;
            return true;

        } else {
            return false;
        }
    }

    public function setData($data){ //spiegazione regex qua: https://www.regextester.com/99555 
                                    //ho aggiunto una modifica rendendo possibile passare il separatore - oltre al separatore / (il formato rimane quello europeo, ovvero dd-mm-yyyy)

        if(preg_match('^([0-2][0-9]|(3)[0-1])(\-||\/)(((0)[0-9])|((1)[0-2]))(\-||\/)\d{4}$', $data)){

            $this->dataScadenza = $data; //assegno la data di scadenza correttamente

            $expire = strtotime($this->dataScadenza); //tramite la funzione strtotime converto la data in un valore numerico 
            $today = strtotime($this->dataOggi);      //se è più grande significa che è oltre la data di oggi

            if($expire < $today){ //li confronto

                return true;

            } else {

                return false;
            }

        } else {
            return false;
        }
    }

    public function setNomeCognome($nome, $cognome){ //il nome e il cognome non devono essere numerici più corti di 2 caratteri

        if (!is_numeric($nome) && strlen($nome) > 1 && !is_numeric($cognome) && strlen($cognome) > 1){ 

            $this->nome = $nome;
            $this->cognome = $cognome;
            return true;

        } else {
            return false;
        }
    }

    public function setValidazione($numeroPin){ //l'utente deve inserire solo 3 numeri del retro della carta

        if(preg_match('^[0-9]{3}+$', $numeroPin) == 1){ 

            $this->cifreValidazione = $numeroPin;
            return true;

        } else {
            return false;
        }
    }

}