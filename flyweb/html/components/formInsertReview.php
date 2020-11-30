<?php

namespace html\components;

use \html\components\baseComponent;

use \controllers\TravelController;

class FormInsertReview extends baseComponent {

    const _templateName = 'form_insert_review';
    private $id_viaggio;
    private $id_utente;

    public function __construct(int $id_viaggio,int $id_utente) {
        // Call BaseComponent constructor
        parent::__construct(self::_templateName);
        $this->id_viaggio=$id_viaggio;
        $this->id_utente=$id_utente;
        $this->render();
    }

    public function render(): string{
        $this->replaceValue("TITOLO_VIAGGIO",(new TravelController($this->id_viaggio))->getTitle($this->id_viaggio));
        $this->replaceValue("TYPE","inserimentoRecensioneUser");
        $this->replaceValue("ID_UTENTE",$this->id_utente);
        $this->replaceValue("ID_VIAGGIO",$this->id_viaggio);

        return $this;
    }
}