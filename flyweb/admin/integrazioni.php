<?php

    use controllers\IntegrazioneController;
    use model\Paginator;
    use controllers\RouteController;
    use html\components\AdmDashBoard;
    use html\components\Head;
    use html\Template;

    require_once('../autoload.php');

    RouteController::protectedRoute();

    // Load request's data
    extract($_GET, EXTR_SKIP);

    // Set pagination to page 1 if not specified differently
    $page = isset($page) ? $page : 1;

    $integrazioneContorller = (new IntegrazioneController());
    $integrazioni = $integrazioneContorller->getAllIntegrazioni();

    // Paginate travels result
    $paginatedIntegrazioni = Paginator::paginate($integrazioni, $page);

    // Loading search result template
    $page= new Template('board');

    $page->replaceTag('HEAD', (new Head));

    $page->replaceTag('ADM-MENU', (new AdmDashboard("gestisci_integrazioni")));

    
        
    // Set search result travels 
    //DOPO aggiunta d'integrazioni (VEDERE LISTA VIAGGI)
    //$page->replaceTag('ADM-CONTENUTO', (new \html\components\AdmContainerList($paginatedIntegrazioni,"LISTA INTEGRAZIONI")));
    $page->replaceTag('ADM-CONTENUTO', '<h1 class="adm-titolo">CERCA INTEGRAZIONI DA MODIFICARE O ELIMINARE</h1>');

    echo $page;