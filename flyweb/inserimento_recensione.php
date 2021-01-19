<?php

    use \model\BreadcrumbItem;
    use \controllers\reviewController;
    use \model\Review;
    use \controllers\UserController;
    use html\components\Breadcrumb;
    use html\components\Footer;
    use html\components\Head;
    use html\components\PrincipalMenu;
    use html\components\ResponseMessage;
    use html\components\FormInsertReview;
    use html\Template;

    require_once('./autoload.php');

    $userController= new UserController();

    if($_SESSION['logged_in'] == false){
        header('location:./index.php');
        exit();
    }

    // Load request's data
    extract($_GET, EXTR_SKIP);
    extract($_POST, EXTR_SKIP);
    $error=array();

    //print_r($_GET);

    $_page = new Template('inserimento_recensione');

    $_page->replaceTag('HEAD', (new Head));

    $_page->replaceTag('NAV-MENU', (new PrincipalMenu));

    $breadcrumb=array(
        new BreadcrumbItem("./datipersonali.php","Profilo"),
        new BreadcrumbItem("./ordiniprofilo.php","Ordini effettuati"),
        new BreadcrumbItem("#", "Inserire recensione"),
    );

    $_page->replaceTag('BREADCRUMB', (new Breadcrumb($breadcrumb)));

    

    if(!$_POST['btn_approva']){

        $review = new Review($_POST['titolo'],(int)$_POST['valutazione'],$_POST['descrizione'],(int)$userController->user->id_utente,$_POST['lingua']);

        //check param like js
        if(!preg_match("/^[\w\s\.]*$/",$review->titolo)){
            array_push ( $error , "Campo Titolo: Permessi i caratteri da A-Z, a-z, 0-9, _ e il carattere spazio");
        }

        if(preg_match("/^(\.|_|\s)*$/",$review->titolo)){
            array_push ( $error , "Campo Titolo: deve contenere almeno delle lettere o numeri");
        }

        if(!preg_match("/^[\w\s\.]*$/",$review->descrizione)){
            array_push ( $error , "Campo Descrizione: Permessi i caratteri da A-Z, a-z, 0-9, _ e il carattere spazio");
        }

        if(preg_match("/^(\.|_|\s)*$/",$review->descrizione)){
            array_push ( $error , "Campo Descrizione: deve contenere almeno delle lettere o numeri");
        }

        if($review->valutazione<0 || $review->valutazione>5){
            array_push ( $error , "Campo Valutazione: deve essere compresa fra 0 e 5");
        }


        if(empty($error)){
            (new ReviewController())->insertReview($review,$_POST['id_viaggio']);
            $_page->replaceTag('FORM_RECENSIONE', (new ResponseMessage("Recensione inserita con successo, grazie!")));
        }
        else{
            $_page->replaceTag('FORM_RECENSIONE', new FormInsertReview($error,(int)$_POST['id_viaggio']));
        }
        
    }
    else{
        $_page->replaceTag('FORM_RECENSIONE', new FormInsertReview($error,(int)$_POST['id_viaggio']));
    }
    

    $_page->replaceTag('FOOTER', (new Footer));

    echo $_page;