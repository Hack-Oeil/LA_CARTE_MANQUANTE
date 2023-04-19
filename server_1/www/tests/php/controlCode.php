<?php
$da1;
// fonction obligatoire
function stdin() {    
    global $da1;
    $a1=[];$a3=explode('-','P,C,T,K-1,2,3,4,5,6,7,8,9,10,V,D,R');
    $a2=explode(',',$a3[0]);$s2=explode(',',$a3[1]);
    foreach((array)$a2 as $s1){foreach((array)$s2 as $s3){$a1[]=$s3.$s1;}}
    $nr=rand(0,count($a1)-1);
    $da1=$a1[$nr];
    unset($a1[$nr]);
    shuffle($a1);

    return $a1;
}

// fonction obligatoire
function hoTryCode() {
    global $a1, $da1;
    if (function_exists('main')) {
        try {
            $returnCard = main();
            if ($returnCard === $da1) {
                return true;
            } else {
                return "Votre code a retourné $returnCard, la carte manquante était $da1";
            }
        } catch (Exception $e) {
            return "Il y a une erreur dans votre code : " . $e->getMessage();
        }
    } else {
        return 'Error function main not found';
    }
}