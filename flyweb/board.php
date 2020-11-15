<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . 'autoload.php');

    $page = new \html\template('board');


    $page->replaceTag('HEAD', (new \html\components\head));

    $page->replaceTag('ADM-DASHBOARD', (new \html\components\AdmDashBoard));

    $page->replaceTag('ADM-SUCCESSO', '');

    echo $page;