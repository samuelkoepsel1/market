import React, { useEffect, useState } from "react";
import { getProduct, getProductType, postCart } from "../../Routes";
import ProductTypeList from "./ProductsTypesList";

export default function Market({ handleCart }) {
  const [products, setProducts] = useState([])
  const [produtcsTypes, setProdutcsTypes] = useState([])

  useEffect(() => {
    getProductType(setProdutcsTypes);
    getProduct(setProducts);
  }, [])

  function handleAddProduct(productId) {
    postCart({product_id: productId}, handleCart());
  }

  return (
    <div className="market-list">
      {produtcsTypes.map(productType => {
        const isType = product => product.product_type_id === productType.id
        const productsFiltred = products.filter(isType)
          return <ProductTypeList key={productType.id} type={productType} products={productsFiltred} handleAddProduct={handleAddProduct} ></ProductTypeList>
      })}
    </div>
  )
}