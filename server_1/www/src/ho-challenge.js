let currentLanguage;
let editor = ace.edit("editor");
editor.setTheme("ace/theme/twilight");

// Définir les modes de syntaxe en fonction de l'extension du fichier
function setEditorMode() {
    // avant le changement on suvegarde le contenu
    if(currentLanguage != null) {
        document.getElementById(`default_${currentLanguage}`).dataset.save = editor.getValue()
    }
    currentLanguage = document.getElementById("language_choice").value || "js";
    editor.getSession().setMode(`ace/mode/${getMode(currentLanguage)}`);

    // assigner une nouvelle valeur à l'éditeur
    if(document.getElementById(`default_${currentLanguage}`).dataset.save != null)
        editor.setValue(document.getElementById(`default_${currentLanguage}`).dataset.save);
    else editor.setValue(document.getElementById(`default_${currentLanguage}`).textContent);

    // retirer la sélection
    editor.clearSelection();
}

// Détermine le mode de syntaxe en fonction de l'extension du fichier
function getMode(fileExtension) {
    switch (fileExtension) {
        case "js":  return "javascript";
        case "php": return "php";
        case "py":  return "python";
        default:    return "text";
    }
}

function tryCode() {
    if(currentLanguage != null) {
        let form = new FormData();
        form.append('language', currentLanguage);
        form.append('code', editor.getValue());
        fetch(`/index.php`, {  method: "POST", body: form })
            .then((response) => {
                if(!response.ok) {
                    document.getElementById('result_test').innerText = 'Erreur de communication avec le système de test.';
                    return;
                }
                return response.text()
            })
            .then((response) => {
                document.getElementById('result_test').innerText = response;
            })
            .catch(function(error) {
                document.getElementById('result_test').innerText = 'Erreur de communication avec le système de test.';
            });
       
    } else {
        alert(`Une erreur est surveue !`);
    }
}

// Défini le langage par défaut
setEditorMode();
document.getElementById("language_choice").addEventListener('change', setEditorMode)
document.getElementById("btn_submit").addEventListener('click', tryCode)