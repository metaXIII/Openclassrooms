//Création d'une classe avec JS
class Jeux{
    id
    nom
    console
 
    constructor(id, nom, console) {
        this.id = id
        this.nom = nom
        this.console = console
    }
 
    decrire() {
        console.log("Tu as un jeu avec l'id " + this.id + " qui s'appelle " + this.nom  + " disponible sur " + this.console)
    }
}
 
let jeux = new Jeux(1, "batman", "PS4")
jeux.decrire()