import React, { useEffect, useRef, useState } from "react";
import { deleteProductType, getProductType, postProductType } from "../../Routes";
import ProductTypeTable from "./ProductTypeTable";

export default function ProductTypeForm() {
  const [productsTypes, setProductsTypes] = useState([])

  useEffect(() => {
    getProductType(setProductsTypes)
  }, [])

  const prodNameRef = useRef()

  function handleAddProduct() {
    const prodName = prodNameRef.current.value;

    if (prodName === '') return

    postProductType({ name: prodName }, () => {
      getProductType(setProductsTypes);
    })
  }

  function handleDeleteProductType(id) {
    deleteProductType({ id: id }, () => {
      getProductType(setProductsTypes);
    })
  }

  return (
    <div className="product-type-form">
      <div className="form">
        <label>Adicionar tipo de produto</label>
        <div className="input">
          <input placeholder="Nome" ref={prodNameRef} type="text"></input>
        </div>

        <div className="action">
          <button onClick={handleAddProduct}>Adicionar</button>
        </div>
      </div>

      <ProductTypeTable
        productsTypes={productsTypes}
        handleDeleteProductType={handleDeleteProductType}>
      </ProductTypeTable>
    </div>
  )
}