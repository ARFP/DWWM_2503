
let expressionLambda = a => a + 1;

let fonctionLambda = (a) => { return a + 1; };

let fonctionNormale = function (a) { 
    
    return a + 1;
}

function fonctionNormale2(a) {
    return a + 1;
}

let result1 = fonctionNormale(2);
console.log(result1);

class Toto 
{
    constructor() {
        this.id = 'Olivier was here !';
    }

    afficherId() {
        
        function test() {
            console.log(this.id);
        }

        let test2 = () => {
            console.log(this.id);
        }

        test2();
    }
}

let toto = new Toto();

toto.afficherId();