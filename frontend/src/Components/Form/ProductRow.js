import React from 'react'

export default function ProductRow({ product, handleDeleteProduct }) {
  function internalhandleDeleteProduct() {
    handleDeleteProduct(product.id)
  }
  
  return (
    <>
      <tr>
        <td>{product.id}</td>
        <td>{product.name}</td>
        <td>{product.type}</td>
        <td>R$ {(parseFloat(product.value)/100).toFixed(2)}</td>
        <td>
          <button onClick={internalhandleDeleteProduct}>Excluir</button>
        </td>
      </tr>
    </>
  )
}