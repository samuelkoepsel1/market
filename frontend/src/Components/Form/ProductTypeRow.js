import React from 'react'

export default function ProductTypeRow({ productType, handleDeleteProductType }) {
  function internalhandleDeleteProductType() {
    handleDeleteProductType(productType.id)
  }
  
  return (
    <>
      <tr>
        <td>{productType.id}</td>
        <td>{productType.name}</td>
        <td>
          <button onClick={internalhandleDeleteProductType}>Excluir</button>
        </td>
      </tr>
    </>
  )
}