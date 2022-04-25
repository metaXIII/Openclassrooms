import "../styles/Banner.css"
import logo from "../assets/logo.png"

const Banner = () => {
    const text = "La maison jungle";
    return <div>
        <img src={logo} alt="la maison jungle" className="lmj-logo"/>
        <h1 className="lmj-title">{text}</h1>
    </div>
}

export default Banner