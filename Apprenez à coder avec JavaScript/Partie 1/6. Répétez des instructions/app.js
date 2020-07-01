//Si je dis que les boucles sont le coeur de la programmation, je vais me répéter, ça tombe bien :) 

//Une boucle for (pour)
var i
for (i = 0; i < 10; i++) {
    //Pöur i = 0; i < 10; i que j'augmente de 1 tous les tours, donc 10 tours
    console.log(i)
}

//Une boucle while (tant que)
while (i > 0) {
    console.log(i)
    i-- //ne surtout pas oublier ça sinon c'est une boucle infinie
}

/**
 * Attention, j'insiste une denière fois sur ce point, la boucle while est vraiment très dangereuse à utiliser, vous pouvez perdre un écran ! 
 * (bon j'abuse mais l'idée est que c'est vraiment une boucle infinie, donc faites le une fois pour vous amusez, par la suite, faites attention à votre matos)
 * De manière générale, quand vous utilisez les boucles, assurez vous de sortir un moment de la condition.
 */