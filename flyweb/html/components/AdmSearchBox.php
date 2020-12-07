<?php

namespace html\components;

use html\components\baseComponent;
use controllers\RouteController;

class AdmSearchBox extends baseComponent {

    const _templateName = 'adm_search_box';
    private $values = [
        'search_by_option' => '',
        'search_key' => '',
        'search_start_date' => '',
        'search_end_date' => '',
        'search_start_price' => '',
        'search_end_price' => '',
        'search_order_by' => '',
        'search_order_by_mode' => ''
    ];

    public function __construct() {
        // Call BaseComponent constructor
        parent::__construct(self::_templateName);
        $this->render();
    }

    public function render(): string {

        $this->replaceValue('BASE', RouteController::BASE_ROUTE);
        $this->replaceValue('BASE_ADMIN', RouteController::ADMIN_BASE_ROUTE);
        
        foreach ($this->values as $key => $value) {
            $values[$key] = $_GET[$key] ? $_GET[$key] : '';
        }

        $this->replaceValues($values);
        return $this;
    }
        
}