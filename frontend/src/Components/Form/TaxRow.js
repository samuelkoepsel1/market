import React from 'react'

export default function TaxRow({ tax, handleDeleteTax }) {
  function internalhandleDeleteTax() {
    handleDeleteTax(tax.id)
  }
  
  return (
    <>
      <tr>
        <td>{tax.id}</td>
        <td>{tax.name}</td>
        <td>{tax.type}</td>
        <td>{(parseFloat(tax.value)/100).toFixed(2)}%</td>
        <td>
          <button onClick={internalhandleDeleteTax}>Excluir</button>
        </td>
      </tr>
    </>
  )
}