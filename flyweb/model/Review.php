<?php

namespace model;

class Review {
    public $id_recensione;
    public $titolo;
    public $valuatzione;
    public $descrizione;
    public $id_utente;
    public $mod;
    public $data;
    public $lingua;

    /**
     * Workaround to have multiple constructors
     */
    public function __construct()
    {
        $arguments = func_get_args();
        $numberOfArguments = func_num_args();

        if (method_exists($this, $function = '__construct'.$numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }

    /**
     * Maps values from array (used to convert db associative arrays into Review objects)
     */
    public function __construct1(array $review) {

        
        $timestamp = strtotime($review['Data']);
        $data_recensione = date("d/m/Y", $timestamp);

        $this->id_recensione = $review['ID_Recensione'];
        $this->titolo = $review['Titolo'];
        $this->valutazione = $review['Valutazione'];
        $this->descrizione = $review['Descrizione'];
        $this->mod = $review['Mod'];
        $this->id_utente = $review['ID_Utente'];
        $this->mod= $review['Mod'];
        $this->data=$data_recensione;
        $this->lingua=$review['Lingua'];
    }

    /**
     * Constructor with minimal informations to create a new Review
     *
     * @param string $titolo
     * @param integer $valutazione
     * @param string $descrizione
     * @param int %id_utente
     * @param boolean %mod
     * @param string %data
     * @return void
     */
    public function __construct7(string $titolo, int $valutazione, string $descrizione, int $id_utente, bool $mod, string $data, string $lingua) {
        $this->titolo = $titolo;
        $this->valutazione = $valutazione;
        $this->descrizione = $descrizione;
        $this->id_utente = $id_utente;
        $this->mod= $mod;
        $this->data=$data;
        $this->lingua=$lingua;
    }

    /**
     * Constructor with minimal informations to create a new Review (used with form information)
     */
    public function __construct5(string $titolo, int $valutazione, string $descrizione, int $id_utente, string $lingua) {
        $this->titolo = $titolo;
        $this->valutazione = $valutazione;
        $this->descrizione = $descrizione;
        $this->id_utente = $id_utente;
        $this->mod= 0;
        $this->lingua=$lingua;
    }
}