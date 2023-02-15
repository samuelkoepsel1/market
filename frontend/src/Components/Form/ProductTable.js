import React from 'react'
import ProductRow from './ProductRow'

export default function ProductTable({ products, handleDeleteProduct }) {
  return (
    <div className="tableWrapper products">
      <table>
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          {
            products.map(product => {
              return <ProductRow
                key={product.id}
                product={product}
                handleDeleteProduct={handleDeleteProduct}>
              </ProductRow>
            })
          }
        </tbody>
      </table>
    </div>
  )
}