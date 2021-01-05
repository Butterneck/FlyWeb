<?php

namespace html\components;

use \html\components\BaseComponent;

class FooterSiteMapItem extends BaseComponent {

    const _templateName="footer_site_map_item";

    private $itemMenu;

    public function __construct($itemMenu) {
        // Call BaseComponent constructor
        parent::__construct(self::_templateName);
        $this->itemMenu=$itemMenu;
        $this->render();
    }

    public function render(): string {

        if($this->itemMenu->get_lang()!="it")
            $this->replaceValue('LANG', "lang=\"".$this->itemMenu->get_lang()."\"");
        else
            $this->replaceValue('LANG', "");
        
        
        $this->replaceValue('PAGE', $this->itemMenu->get_name());

        //controllare variabile di sessione per disattivare il link della pagina in cui ci si trova

        if(true)
            $this->replaceValue('LINK',"href=\"".$this->itemMenu->get_path()."\"");
        else
            $this->replaceValue('LINK',"");
        

        return $this;
    }
}