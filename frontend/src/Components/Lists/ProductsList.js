import React from 'react'

export default function ProductList({ product, handleAddProduct }) {
  function internalHandleAddProduct() {
    handleAddProduct(product.id)
  }
  return (
    <div className="product-list">
      <div className="fields">
        <p className="title">{product.name}</p>
        <div className="price">
          <label>R$ {(product.value/100).toFixed(2)}</label>
          <button onClick={internalHandleAddProduct}>Comprar</button>
        </div>
      </div>
    </div>
  )
}