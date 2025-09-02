
let expressionLambda = a => a + 1;

let fonctionLambda = (a) => { return a + 1; };

let fonctionNormale = function (a) { 
    
    return a + 1;
}

function fonctionNormale2(a) {
    return a + 1;
}

let result1 = expressionLambda(2); // retourne 3
let result2 = fonctionLambda(2); // retourne 3
let result3 = fonctionNormale(2); // retourne 3
let result4 = fonctionNormale2(2); // retourne 3

console.log(result1, result2, result3, result4);

class Toto 
{
    constructor() {
        this.id = 'Olivier was here !';
    }

    afficherId() {
        
        // Utilisation du mot clé "function" = la fonction dispose de son propre contexte ("this")
        function test_function() { 
            this.name = "Mike";
            console.log(this.name); // name existe bien dans le contexte local de la fonction 
            console.log(this.id);  // id n'existe pas = erreur
        }

        // Syntaxe fléchée = la fonction ne dispose pas de son propre contexte 
        // (le "this" fait référence au contexte supérieur soit la classe Toto dans cet exemple)
        let test_fleche = () => {
            console.log(this.id); // id existe (c'est celui de la classe Toto qui est utilisé)
        }

        test_fleche(); // Affiche 'Olivier was here !' dans la console
        test_function(); // Affiche 'Mike' dans la console puis soulève une erreur car id n'existe pas dans le contexte de la fonction
    }
}

let toto = new Toto();

toto.afficherId();