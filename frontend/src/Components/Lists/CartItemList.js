import React from 'react'
import CartItemRow from './CartItemRow'

export default function CartItemList({ carts, handleCartAmount }) {
  return (
    <div className="saleList">
      {
        carts.map(cart => {
          return <CartItemRow key={cart.id} cart={cart} handleCartAmount={handleCartAmount}></CartItemRow>
        })
      }
    </div>
  )
}