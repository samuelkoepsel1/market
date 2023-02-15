import React from 'react'
import TaxRow from './TaxRow'

export default function TaxTable({ taxes, handleDeleteTax }) {
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
            taxes.map(tax => {
              return <TaxRow
                key={tax.id}
                tax={tax}
                handleDeleteTax={handleDeleteTax}>
              </TaxRow>
            })
          }
        </tbody>
      </table>
    </div>
  )
}