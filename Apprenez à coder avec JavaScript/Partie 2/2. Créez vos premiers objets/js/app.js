class Obj {
    id;
    nom;
    valeur;
 
    Obj() {
    }
 
    setId(id) {
        this.id = id;
    }
    
    setNom(nom) {
        this.nom = nom;
    }
 
    setValeur(valeur) {
        this.valeur = valeur;
    }
 
}
 
 
function create() {
    let o = new Obj();
    o.setId(1)
    o.setNom("Nouvel objet")
    o.setValeur("Nouvelle valeur")
    return o
}
 
console.log(create())