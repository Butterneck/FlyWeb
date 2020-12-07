<?php

namespace html\components;

use \html\components\BaseComponent;
use controllers\RouteController;

abstract class NavMenu extends BaseComponent {

    const _templateName = "navmenu";

    protected $user;
    protected $menuItem;
    protected $typeMenu;

    public function __construct($type){

        parent::__construct(self::_templateName);

        $this->typeMenu=$type;

        $this->user =$this->detectUserType();
        
        $this->menuItem=$this->BuildMenuItem();

        $this->render();
    }

    abstract public function BuildMenuItem();

    abstract public function TemplateMenuItem(): string;

    public function render(): string{

        $this->replaceValue('BASE', RouteController::BASE_ROUTE);
        $this->replaceValue('BASE_ADMIN', RouteController::ADMIN_BASE_ROUTE);

        $li=$this->TemplateMenuItem();

        $this->replaceValue("CLASS",$this->typeMenu);

        $this->replaceTag('NAVMENUITEM', $li);

        return $this;

    }

    protected function detectUserType(): string {
        $userType = '';
        if ($_SESSION['logged_in']) {
            $userType = 'LoggedUser';
        }
        
        if ($_SESSION['admin']) {
            $userType = 'LoggedAdmin';
        }
        
        if ($userType == '') {
            $userType = 'NotLoggedUser';
        }

        return $userType;
    }
}
