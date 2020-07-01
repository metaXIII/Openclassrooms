alert("Lis le fichier app")

/**
 * Les conditions sont le coeur de la programmation.
 * Elle permette d'affecter un traitement en fonction de vos attentes
 */

let age = 29
if (age > 30) {
    console.log("Vous êtes vieux")
}
else {
    console.log("Vous êtes jeune")
}

/**
 * Les opérateurs >, <, ===, !== permettent de vérifier une égalité
 */

let agestr = "29"

if (age == agestr)
    console.log("L'age est le même") //Je rentre dans cette condition car il existe une différence entre 29 et "29" mais pas stricte
if (age !== agestr)
    console.log("ça marche plus") //Je rentre dans cette condition car 29 et un number et "29" un string, attention aux types

//On peut enchaine les instructions : 
if (age < 18)
    console.log("Vous êtes mineur") //Si l'instuction est sur une ligne, je peux ne pas mettre d'accolade
else if (age === 18)
    console.log("Vous êtes juste")
else
    console.log("Vous êtes majeur")

// Autrement avec un switch

switch (age) {
    case 10:
        console.log("Vous avez 10 ans")
        break;
    case 18:
        console.log("Vous avez 18 ans")
        break;
    default:
        console.log("Vous n'avez pas 10 ou 18 ans")
        break;
}

/**
 * Enchainement des conditions 
 */

let nom = "metaxiii"
if (age === 29 && nom === "metaxiii")
    console.log("Vous êtes super")
else if (age === 30 || nom === "batman")
    console.log("Vous êtes aussi super mais moins")
else
    console.log("vous n'avez pas assez joué avec la console.")