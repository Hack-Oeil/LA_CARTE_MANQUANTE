<?php if(sizeof($_POST)){$output=[];$file=__DIR__.'/tests/_tmp_generic.code';file_put_contents($file,$_POST["code"]);switch($_POST["language"]){case "js": if(file_exists('./tests/js/try.js'))exec('node ./tests/js/try.js "'.$file.'"',$output);break;case "php": if(file_exists('./tests/php/try.php'))exec('php -c ./tests/php/php.ini ./tests/php/try.php "'.$file.'"',$output);break;case "py":if(file_exists('./tests/python/try.py'))exec('python ./tests/python/try.py "'.$file.'"',$output);break;}foreach($output as $line){if(preg_match('/[0-9a-f]{40}/',$line,$out))$line=base64_decode('QmllbiBqb3XDqSwgbGUgZmxhZyBlc3QgOiA=').sha1(md5($out[0].'secret'));echo $line."\n";}if(file_exists($file))unlink($file);exit();}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La carte manquante</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Nunito:wght@300&family=Poppins&family=Roboto:wght@300&display=swap"
		rel="stylesheet">
</head>
<body>

<div class="grid-container">
    <div class="left-column" id="info_challenge">
        <h1>Programmation</h1>

        <h3>[♠] [<span style="color:red;">♥</span>] &nbsp; La carte manquante &nbsp; [<span style="color:red;">♦</span>] [♣]</h3>
        <p>
            Dans ce challenge de programmation vous devez trouver la carte manquante.<br /><br />
            Vous recevrez les <b>51 cartes</b> sous forme de tableau depuis la fonction <b>stdin()</b><br />
             et vous devez trouver la carte manquante qui est absente du tableau. .<br />
            
            Vous recevez les cartes  sous forme VALEUR+COULEUR (tous les caractères alpha sont en MAJUSCULE) <br />
            
            Les valeurs peuvent être : 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, V, D, R (V= Valet, D = Dame, R = Roi) <br />
            Les couleurs peuvent être : P,C,T,K (P = Pique, C = Coeur, T = Trèfle, K = Carreau)<br /><br />

            <strong>Exemples : </strong>
            1P représente l'As de Pique, VK représente le Valet de Carreau, <br />
            RT représente le Roi de Trèfle, 7K représente le 7 de Carreau, etc<br />
            <br />
            <hr>
            <br />
            Le retour de votre fonction <b>main</b> doit être une chaine du type <b>VALEUR+COULEUR</b> et <br />
            doit correspondre à la carte manquante.<br />
            <br />
            <hr>
            <br />
            Si votre code est fonctionnel vous recevrez en sortie le FLAG du challenge.
        </p>
    </div>
    <div class="right-column">
        <div class="right-column-1" id="api_detail">
            <h4>Ecrire votre code en :                  
                <select id="language_choice">
                    <option value="js">Javascript</option>
                    <option value="php">PHP</option>
                    <option value="py">Python</option>
                </select>
            </h4>
            <form>                
                <div id="editor"></div>
                <button id="btn_submit" type="button">Executer mon code</button>
            </form>
        </div>
        <div class="right-column-2" id="api_response">
            <h4>Résultat :</h4>
            <pre id="result_test"></pre>
        </div>
        <div style="display:none;">

<textarea id="default_js">
function main() {
    let card = null;
    const cards = stdin();
    // votre code ici

    return card;
}</textarea>
<textarea id="default_php">
&lt;?php

function main() {
    $card = null;
    $cards = stdin();
    // votre code ici
    
    
    return $card;
}</textarea>
<textarea id="default_py">
def main():
    card = None
    cards = stdin()
    # votre code ici
    
    
    return card
</textarea>

        </div>
    </div>
</div>
<script src="src/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="src/mode-javascript.js" type="text/javascript" charset="utf-8"></script>
<script src="src/mode-php.js" type="text/javascript" charset="utf-8"></script>
<script src="src/mode-python.js" type="text/javascript" charset="utf-8"></script>
<script src="src/theme-twilight.js" type="text/javascript" charset="utf-8"></script>
<script src="src/ho-challenge.js" type="text/javascript" charset="utf-8"></script>
</body>
</html>