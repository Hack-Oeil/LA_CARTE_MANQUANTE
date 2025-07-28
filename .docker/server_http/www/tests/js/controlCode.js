let da1;let a1=[];let a3='P,C,T,K-1,2,3,4,5,6,7,8,9,10,V,D,R'.split('-');let globalBuffer={};let currentBuffer='';
for(let i=0,j=0;i<(a3[1].split(',').length*4);i++){a1[i]=a3[1].split(',')[i%13]+a3[0].split(',')[j];if(i%13==12)j++;}
function shuffle(array){for(let i=array.length-1;i>0;i--){const j=Math.floor(Math.random()*(i+1));[array[i],array[j]]=[array[j],array[i]];}}

// fonction obligatoire
function stdin() {    
    // On melange le paque de cartes
    shuffle(a1);a4=a1;
    // on retire une carte dans le paquet
    let nr=Math.floor(Math.random())*a1.length;
    da1=a1[nr];a1.splice(nr, 1);

    return a1;
}

function stdout(data) { currentBuffer += data; }

// fonction obligatoire
function hoTryCode() {
    if(typeof main === 'function') {
        try {
            let returnCard = main();
            if(returnCard === da1) {  
                return true;          
            } else {            
                return `Votre code a retourné ${returnCard}, la carte manquante était ${da1}`;
            }
        } catch(error) {
            return `Il y a une erreur dans votre code`;
        }
    } else {
        return `Error function main not found`
    }
}