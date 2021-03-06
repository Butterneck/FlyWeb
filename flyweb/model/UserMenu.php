<?php
    namespace model;

    class UserMenu extends Menu{
        
        function __construct() {
            $this->MenuItem= array (
                "home"  => new MenuItem("./index.php","Home",array("NotLoggedUser", "LoggedAdmin","LoggedUser"),"en"),
                "aboutUs" => new MenuItem("./aboutUs.php","About",array("NotLoggedUser", "LoggedAdmin","LoggedUser"),"en"),
                "profilo"   => new MenuItem("./datipersonali.php","Profilo",array("LoggedAdmin","LoggedUser")),
                "carrello" => new MenuItem("./carrello.php","Carrello",array("LoggedUser")),
                "ordini" => new MenuItem("./ordiniProfilo.php","Ordini",array("LoggedUser")),
                "recensioni" => new MenuItem("./recensioniProfilo.php","Recensioni",array("LoggedUser")),
                "login" => new MenuItem("./login.php","Accedi",array("NotLoggedUser")),
                "logOut" => new MenuItem("./logout.php","Esci",array("LoggedAdmin","LoggedUser")),
                "signUp" => new MenuItem("./signup.php","Registrati",array("NotLoggedUser")),
            );    
        }
    }