import React, { useEffect, useRef, useState } from "react";
import { deleteProductType, getProductType, postProductType } from "../../Routes";
import ProductTypeTable from "./ProductTypeTable";

export default function ProductTab() {
  const [productsTypes, setProductsTypes] = useState([])

  useEffect(() => {
    getProductType(setProductsTypes)
  }, [])

  const prodNameRef = useRef()

  function handleAddProduct(e) {
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
    <div className="userTab">
      <div className="editAdd">
        <label>Adicionar tipo de produto</label>
        <div className="inputs">
          <input placeholder="Nome" ref={prodNameRef} type="text"></input>
        </div>

        <div className="actions">
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