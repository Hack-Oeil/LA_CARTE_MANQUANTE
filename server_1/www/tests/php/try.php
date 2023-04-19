<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'controlCode.php';
try{
    $nbTests = 10;
    $badResponse = false;
    $returnData= [];
    
    if(file_exists($argv[1])) {
        require_once $argv[1];
    }

    // Exécuter le code dans la VM
    for($i = 0; $i < $nbTests; $i++) {       
        $returnData[$i] = hoTryCode();
        if($returnData[$i] !== true) {
            $badResponse = true;
        }
        $returnData[$i] = 'Test '.($i+1).' '.$returnData[$i];
    }
    
    // si il n'y a pas de mauvaise réponse on peut donner le flag
    if($badResponse !== true) {
        echo '5fa19b13a6314a3cc18bb49b213873df88f07bc6';
    } else {
        echo print_r($returnData, true);
    }
}
catch(Error $error) { echo "Il y a une erreur dans votre code\n"; }