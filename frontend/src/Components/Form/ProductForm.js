import React, { useEffect, useRef, useState } from "react";
import { deleteProduct, getProduct, getProductType, postProduct } from "../../Routes";
import ProductTable from "./ProductTable";

export default function ProductTab() {
  const [products, setProducts] = useState([])
  const [productsTypes, setProductsTypes] = useState([])

  useEffect(() => {
    getProduct(setProducts)
  }, [])

  useEffect(() => {
    getProductType(setProductsTypes)
  }, [])

  const prodNameRef = useRef()
  const prodValueRef = useRef()
  const prodProductTypeIdRef = useRef()

  function handleAddProduct(e) {
    const prodName = prodNameRef.current.value;
    const prodValue = parseFloat(prodValueRef.current.value).toFixed(2) * 100;
    const prodProductTypeId = prodProductTypeIdRef.current.value;

    if (prodName === '' || prodValue === '' || prodProductTypeId === '') return

    postProduct({ name: prodName, value: prodValue, product_type_id: prodProductTypeId }, () => {
      getProduct(setProducts);
    })
  }

  function handleDeleteProduct(id) {
    deleteProduct({ id: id }, () => {
      getProduct(setProducts);
    })
  }

  return (
    <div className="userTab">
      <div className="editAdd">
        <label>Adicionar produto</label>
        <div className="inputs">
          <input placeholder="Nome" ref={prodNameRef} type="text"></input>
        </div>
        <select ref={prodProductTypeIdRef}>
            {productsTypes.map(productType => {
              return <option key={productType.id} value={productType.id}>{productType.name}</option>
            })}
          </select>
        <div className="inputs">
          <input placeholder="Preço" ref={prodValueRef} type="number" min="0"></input>
        </div>

        <div className="actions">
          <button onClick={handleAddProduct}>Adicionar</button>
        </div>
      </div>

      <ProductTable
        products={products}
        handleDeleteProduct={handleDeleteProduct}>
      </ProductTable>
    </div>
  )
}