<?php  
require_once('./autoload.php');

/*
     script php che restituisce la lista di tag sottoforma di <option> che vanno inseriti dentro <datalist>
*/


     $autocompleteController = new AdmController();


     $result = $autocompleteController->getTags();

     foreach($result as $id=>$nome) { 
          //echo $id . " => " . $nome . "\n";
          $output .= ' <option id='.$nome['Nome'].'>'.$nome['Nome'].'</option> ';
     }

      $output .= '';
      echo $output;
 ?> 