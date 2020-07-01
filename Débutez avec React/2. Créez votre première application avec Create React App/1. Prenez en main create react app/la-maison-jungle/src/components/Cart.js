import "../styles/Cart.css"

const Cart = () => {
    const prixMonsterra = 8
    const prixLierre = 10
    const prixBouquetFleurs = 15
    return (
        <div className="lmj-cart">
            <h2>Panier</h2>
            <ul>
                <li>Monsterra : {prixMonsterra}</li>
                <li>Lierre : {prixLierre}</li>
                <li>Bouquet de fleurs : {prixBouquetFleurs}</li>
            </ul>
            <p>Le prix total du panier est : {prixMonsterra + prixLierre + prixBouquetFleurs}€</p>
        </div>
    )
}

export default Cart