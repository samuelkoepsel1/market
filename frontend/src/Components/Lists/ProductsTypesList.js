import React from 'react'
import Productlist from './ProductsList'

export default function ProductTypeList({ type, products, handleAddProduct }) {
  return (
    <div className="product-type-list">
      <p className="title">Tipo: {type.name}</p>
      <div className="product-type-list-container">
        {
          products.map(product => {
            return <Productlist key={product.id} product={product} handleAddProduct={handleAddProduct}></Productlist>
          })
        }
      </div>
    </div>
  )
}