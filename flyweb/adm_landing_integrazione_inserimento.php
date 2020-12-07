<?php
    use controllers\RouteController;

    require_once($_SERVER['DOCUMENT_ROOT'] . 'autoload.php');

    RouteController::protectedRoute();

    $page = new \html\template('board');

    $form = new \html\components\AdmFormIntegrazione();
    $integrazione = $form->estraiDatiIntegrazione();
    //print_r($integrazione);
    $integrazioneController = new \controllers\IntegrazioneController();

    $str=" ";


    if(($integrazione['id_integrazione'] == '')){        //se non c'è parametro id allora viaggio dev'essere inserito ex novo
        $str= "inserimento";
        //echo "sksk";
        $integrazioneController->inserisciIntegrazione($integrazione);
    }else{
        $str= "aggiornamento";
        $integrazioneController->aggiornaIntegrazione($integrazione);
    }

    $t = $integrazione['nome'];

    $page->replaceTag('HEAD', (new \html\components\head));

    $page->replaceTag('ADM-MENU', (new \html\components\AdmDashboard("generale")));

    $page->replaceTag('ADM-CONTENUTO', (new \html\components\AdmSuccesso($t,$str)));

    $page->replaceTag('ADM-LIST','');

    $page->replaceTag('FOOTER', (new \html\components\footer));

    echo $page;