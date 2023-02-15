import React, { useEffect, useRef, useState } from "react";
import { deleteTax, getProductType, getTax, postTax } from "../../Routes";
import TaxTable from "./TaxTable";

export default function TaxTab() {
  const [taxes, setTaxes] = useState([])
  const [productsTypes, setProductsTypes] = useState([])

  useEffect(() => {
    getTax(setTaxes)
  }, [])

  useEffect(() => {
    getProductType(setProductsTypes)
  }, [])

  const prodNameRef = useRef()
  const prodValueRef = useRef()
  const prodProductTypeIdRef = useRef()

  function handleAddTax(e) {
    const prodName = prodNameRef.current.value;
    const prodValue = parseFloat(prodValueRef.current.value).toFixed(2) * 100;
    const prodProductTypeId = prodProductTypeIdRef.current.value;

    if (prodName === '' || prodValue === '' || prodProductTypeId === '') return

    postTax({ name: prodName, value: prodValue, product_type_id: prodProductTypeId }, () => {
      getTax(setTaxes);
    })
  }

  function handleDeleteTax(id) {
    deleteTax({ id: id }, () => {
      getTax(setTaxes);
    })
  }

  return (
    <div className="userTab">
      <div className="editAdd">
        <label>Adicionar imposto</label>
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
          <button onClick={handleAddTax}>Adicionar</button>
        </div>
      </div>

      <TaxTable
        taxes={taxes}
        handleDeleteTax={handleDeleteTax}>
      </TaxTable>
    </div>
  )
}