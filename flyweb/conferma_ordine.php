<?php
use model\BreadcrumbItem;

require_once($_SERVER['DOCUMENT_ROOT'] . 'autoload.php');

    // Load request's data
    extract($_GET, EXTR_SKIP);

    $userController=new \controllers\UserController();

    $items = $userController->getViaggiCarrello(); 

    $risultato=$userController->getSubtotale();

    $_page= new \html\template('riepilogo_ordine');

    $_page->replaceTag('HEAD', (new \html\components\head));

    $_page->replaceTag('NAV-MENU', (new \html\components\PrincipalMenu));

    // Set breadcrumb
    $breadcrumb=array(
      new model\BreadcrumbItem("/carrello.php","Carrello"),
      new model\BreadcrumbItem("/metodopagamento.php","Metodo di pagamento"),
      new model\BreadcrumbItem("/landing_metodo_pagamento.php", "Inserisci dati di pagamento"),
      new model\BreadcrumbItem("/dati_fatturazione.php","Inserisci dati di fatturazione"),
      new model\BreadcrumbItem("/landing_riepilogo.php", "Riepilogo ordine"),
      new model\BreadcrumbItem("#", "Ordine confermato")
    );

    $_page->replaceTag('BREADCRUMB', (new \html\components\Breadcrumb($breadcrumb)));

    $_page->replaceTag('PROFILOMENU', (new \html\components\ProfiloMenu));

    extract($_POST, EXTR_SKIP);

    $prova=$userController->estraiDatiOrdineTemporaneo();
    print_r($prova);

    $prova2=$userController->addOrder($prova);
    $userController->eliminaOrdineTemporaneo();
    $userController->eliminaCarrello();

  //  $prova= $userController->addOrder($fatturazione);

    $_page->replaceTag('DATI-INSERITI', '');

    $_page->replaceTag('VIAGGI', '');

    $_page->replaceTag('TOTALE', '');

    $_page->replaceTag('SUCCESSO', "Bravo");

    $_page->replaceTag('FOOTER', (new \html\components\footer));







    echo $_page;