const {VM} = require('vm2');
const fs = require('fs');
const path = require('path');


// Si le fichier n'existe pas on quitte
if(! fs.existsSync(process.argv[2])) {
    process.exit();
}

const controlCode = fs.readFileSync(path.join(__dirname, 'controlCode.js'), 'utf-8');
const userCode = fs.readFileSync(process.argv[2], 'utf-8');

// Définir le code à exécuter
const code = `${controlCode}${userCode} hoTryCode() `;
let nbTests = 10;
let badResponse = false;
let returnData = [];

try {
    // Exécuter le code dans la VM
    for(let i = 0; i < nbTests; i++) {
        // Créer une instance de VM
        const vm = new VM();
        returnData[i] = vm.run(`let iHoNumberTry=${i+1}; ${code}`);

        if(returnData[i] !== true) {
            returnData[i] = `Test ${i+1} `+returnData[i] ;
            badResponse = true;
        } else {
            returnData[i] = `Test ${i+1} `+returnData[i] ;
        }
    }
    // si il n'y a pas de mauvaise réponse on peut donner le flag
    if(badResponse !== true) {
        console.log(`5fa19b13a6314a3cc18bb49b213873df88f07bc6`)
    } else {
        console.log(returnData)
    }
} catch(error) {
    console.log("Il y a une erreur dans votre code\n");
}