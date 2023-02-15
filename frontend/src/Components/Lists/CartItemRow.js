import React from 'react'

export default function CartItemRow({ cart, handleCartAmount }) {
  function handleItemCartAmount(amount) {
    handleCartAmount(cart.id, amount)
  }
  function handleAdd() {
    handleItemCartAmount(cart.amount + 1)
  }
  function handleRemove() {
    handleItemCartAmount(cart.amount - 1)
  }
  function handleRemoveItem() {
    handleItemCartAmount(0)
  }
  return (
    <div className="cart-item">
      <div className="info">
        <label className="name">{cart.product}</label>
      </div>
      <div>
        <button onClick={handleRemove}>-</button>
        <label>{cart.amount}</label>
        <button onClick={handleAdd}>+</button>
      </div>
      <div className="total">
        <label>Impostos: R$ {(cart.tax/100 * cart.amount).toFixed(2).replace('.', ',')}</label>
        <label>Valor: R$ {(cart.value/100 * cart.amount).toFixed(2).replace('.', ',')}</label>
        <button onClick={handleRemoveItem}>X</button>
      </div>
    </div>
  )
}