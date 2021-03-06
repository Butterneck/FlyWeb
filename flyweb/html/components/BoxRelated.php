<?php

namespace html\components;

use \controllers\BoxRelatedController;
use controllers\BoxSuggerimentiController;
use \model\Travel;

class BoxRelated extends baseComponent {

    const _templateName = "box_related";
    private $id_tag;
    private $id_viaggio;
    private $img;
    private $num_sugg;
    private $controller;

    public function __construct($id_tag, $id_viaggio, int $num_sugg=4) {
        // Call BaseComponent constructor
        parent::__construct(self::_templateName);
        $this->id_tag=$id_tag;
        $this->id_viaggio=$id_viaggio;
        $this->num_sugg=$num_sugg;
        $this->controller = new BoxRelatedController($this->id_tag,$this->id_viaggio, $this->img);
        $this->addTag();

    }

    public function addTag(): void{
        $lista_sugg="";
        foreach ($this->controller->get_related() as $i){
            $continua = '<a href="./travel.php?id='.$i['ID_Viaggio'].'">...continua </a>';
            $lista_sugg.=new RelatedItem($i['ID_Viaggio'],$i['Titolo'], (substr($i['DescrizioneBreve'],0,150)." ".$continua), "./uploads/".$i['Immagine'], $i['AltImmagine']);
        }

        $this->replaceTag('SUGGERIMENTO', $lista_sugg);

    }
    
}
