import React from 'react'
import ProductTypeRow from './ProductTypeRow'

export default function ProductTypeTable({ productsTypes, handleDeleteProductType }) {
  return (
    <div className="tableWrapper products-types">
      <table>
        <thead>
          <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          {
            productsTypes.map(productType => {
              return <ProductTypeRow
                key={productType.id}
                productType={productType}
                handleDeleteProductType={handleDeleteProductType}>
              </ProductTypeRow>
            })
          }
        </tbody>
      </table>
    </div>
  )
}