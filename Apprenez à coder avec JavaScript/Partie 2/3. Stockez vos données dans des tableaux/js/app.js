//Déclaration d'un tableua
let tab = ["element 1", "element 2", "element 3"]
 
console.log(tab[0]) //should print element 1
console.log("parcours d'un tableau avec for : ")
for (let i = 0; i < tab.length; i++) {
    console.log(tab[i])
}
 
console.log("Parcours avec une boucle for of")
for (let el of tab) {
    console.log(el)
}
 
console.log("Parcours avec une boucle foreach")
tab.forEach(el => {
    console.log(el)
})
 
tab.push("element 4")
tab.unshift("element 0")
 
tab.forEach(el => {
    console.log(el)
})
 
console.log("pop")
tab.pop()
 
tab.forEach(el => {
    console.log(el)
})
 
//indice, nombre à supprimer, "insertion de la nouvelle valeur"
tab.splice(0, 1, "element 0 bis")
 
tab.forEach(el => {
    console.log(el)
})