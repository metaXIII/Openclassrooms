/**
 * Les variables
 * Une variables est une information stockée pour être utilisé par la suite
 */

//Déclaration d'une variable, le mot clé let précise la portée de ma variable.
let a;
//le mot clé var définit une variable, comme let.
var b;
//Le mot clé const définit une constante, c'est à dire une variable qui ne doit pas être modifié en principe
const c;

//Affecter une valeur à ma variable 
let nom = "metaxiii"

let age = 29

//J'incrémente, c'est à dire que je fais l'opération age = age + 1, on peut directement mettre ++ ou écrire +=1
age++

console.log("Dans un an, j'aurais " + age)

/**
 * La portée
 */

console.log("mon nom est " + nom)

//Je crée un nouveau scope
function nameMe() {
    let nom = "batman"
}

nameMe()
console.log("mon nom est " + nom)
//Mon nom, malgré l'appel à la fonction n'a pas été modifié car déclaré en dehors du bon scope

/**
 * Les instructions prompt et alert :
 */

alert("Lis d'abord le fichier app.js")
prompt("es tu sur d'avoir tout lu ?")

// Dans l'ensemble, le dernier conseil a donner est de respecter des noms de variables correct 
//(allez débugger un code avec 200 variables a, b, c, d etc... si vous vous en sentez le courage mais vous ne serez pas embauché longtemps..)