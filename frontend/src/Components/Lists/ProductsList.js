import React from 'react'

export default function ProductList({ product, handleAddProduct }) {
  function internalHandleAddProduct() {
    handleAddProduct(product.id)
  }
  return (
    <div className="ProductList">
      <div className="fields">
        <p className="ftitle">{product.name}</p>
        <div className="fprice">
          <label>R$ {(product.value/100).toFixed(2)}</label>
          <button onClick={internalHandleAddProduct}>Comprar</button>
        </div>
      </div>
    </div>
  )
}