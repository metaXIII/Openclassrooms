import {plantList} from "../datas/PlantList"
import "../styles/ShoppingList.css"

function ShoppingList() {
    const categories = plantList.reduce(
        (acc, plant) =>
            acc.includes(plant.category) ? acc : acc.concat(plant.category), []
    )

    return (
        <div>
            <ul>
                {categories.map(categorie => (
                    <li key={categorie}>{categorie}</li>
                ))}
            </ul>
            <ul className={lmj-plant-list}>
                {plantList.map(plant => (
                    <li key={plant.id} className="lmj-plant-item">
                        {plant.name}
                        {plant.isSpecialOffer && <div className="lmj-sales">Soldes</div>}
                    </li>
                ))}
            </ul>
        </div>
    )
}

export default ShoppingList