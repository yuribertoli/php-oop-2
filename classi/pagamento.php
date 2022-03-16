<?php

class Pagamento{

    protected $numeroCarta;
    protected $dataScadenza;
    protected $nomeCognome;
    protected $cifreValidazione;
    public $startdate = "16-03-2022"; //data di oggi

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

            $this->data = $data;
            return true;

        } else {
            return false;
        }
    }

}