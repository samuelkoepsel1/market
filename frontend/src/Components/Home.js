import React, { useState } from "react";
import ProductForm from "./Form/ProductForm";
import ProductTypeForm from "./Form/ProductTypeForm";
import TaxForm from "./Form/TaxForm";
import CartList from "./Lists/CartList";
import Market from "./Lists/Market";

const Home = () => {
    const [activeTab, setActiveTab] = useState("home");

    const handleHome = () => {
        setActiveTab("home");
    };
  
    const handleProductType = () => {
        setActiveTab("product-type");
    };

    const handleProduct = () => {
        setActiveTab("product");
    };

    const handleTax = () => {
        setActiveTab("tax");
    };

    const handleCart = () => {
        setActiveTab("cart");
    };

    var tabs = new Map([
        ['home', <Market handleCart={handleCart}/>],
        ['product-type', <ProductTypeForm />],
        ['tax', <TaxForm />],
        ['product', <ProductForm />],
        ['cart', <CartList />],
    ])
  
    const handleTabsState = () => {
        return tabs.get(activeTab)
    };

    return (
        <div className="Home">
            <ul className="nav">
                <li
                    className={activeTab === "home" ? "active" : ""}
                    onClick={handleHome}
                    >
                    Início
                </li>
                <li
                    className={activeTab === "product-type" ? "active" : ""}
                    onClick={handleProductType}
                    >
                    Tipos de Produtos
                </li>
                <li
                    className={activeTab === "tax" ? "active" : ""}
                    onClick={handleTax}
                    >
                    Impostos
                </li>
                <li
                    className={activeTab === "product" ? "active" : ""}
                    onClick={handleProduct}
                    >
                    Produtos
                </li>
                <li
                    className={activeTab === "cart" ? "active" : ""}
                    onClick={handleCart}
                    >
                    Carrinho
                </li>
            </ul>
            <div className="outlet">
                {handleTabsState()}
            </div>
        </div>
    );
};
export default Home;