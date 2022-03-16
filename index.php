<?php

require_once __DIR__ . '/classi/prodotti/cibi.php';
require_once __DIR__ . '/classi/prodotti/antipulci.php';
require_once __DIR__ . '/classi/utente/registrato.php';
require_once __DIR__ . '/classi/pagamento.php';

/* UTENTE */

$utente1 = new Registrato("Nome non valido", "Cognome non valido", "E-mail non valida", "Indirizzo non valido", "brazorf13");

//Controllo se tutti i valori ritornano TRUE, in caso di FALSE mostro un errore

if($utente1->setNameSurname("Ajeje", "Brazorf")){
    echo "Nome e cognome corretti <br>";
} else {
    echo "Nome o cognome non validi <br>";
}

if($utente1->setEmail("ajeje@gmail.com")){
    echo "Email corretta <br>";
} else {
    echo "Email non valida <br>";
}

if($utente1->setAddress("Piazza Ajeje 16")){
    echo "Indirizzo corretto <br>";
} else {
    echo "Indirizzo non valido <br>";
}

if($utente1->setTelephone("3554089011")){
    echo "Numero di telefono valido <br>";
} else {
    echo "Numero di telefono non valido <br>";
}

// Se l'utente è loggato allora ha diritto ha uno sconto del 20%
if($utente1->loggato) {

    $utente1->sconto = 20;
    echo "Hai uno sconto del 20%!";
}

var_dump($utente1);


/* PAGAMENTO */

$pagamentoUtente1 = new Pagamento();

if ( //Se tutti i valori ritornano TRUE allora il pagamento è andato a buon fine
    $pagamentoUtente1->setNumeroCarta("0112642347399321") && 
    $pagamentoUtente1->setData("03-12-2023") &&
    $pagamentoUtente1->setNomeCognome("Ajeje", "Brazorf") &&
    $pagamentoUtente1->setValidazione("534")
){

    echo "Pagamento andato a buon fine";

} else {

    echo "Pagamento rifiutato";
}

/* ANTIPULCI */

$acquistoAntipulci = new Antipulci("maggio");

if ($acquistoAntipulci->disponibile){
    echo "<br><br> Prodotto disponibile";
} else {
    echo "<br><br> Prodotto non disponibile";
}