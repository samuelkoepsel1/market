import React from 'react'

export default function CartItemRow({ cart, handleCartAmount }) {
  function handleItemCartAmount(newQuantity) {
    handleCartAmount(cart.id, newQuantity)
  }
  function handleAdd() {
    handleItemCartAmount(cart.amount + 1)
  }
  function handleRemove() {
    handleItemCartAmount(cart.amount - 1)
  }
  function handleRemoveItem() {
    handleCartAmount(0)
  }
  return (
    <div className="saleListItem">
      <div className="info">
        <label className="name">{cart.product}</label>
      </div>
      <div>
        <button onClick={handleRemove}>-</button>
        <label>{cart.amount}</label>
        <button onClick={handleAdd}>+</button>
      </div>
      <div className="total">
        <label>R$ {(cart.value/100 * cart.amount).toFixed(2).replace('.', ',')}</label>
        <label>R$ {(cart.tax/100 * cart.amount).toFixed(2).replace('.', ',')}</label>
        <button onClick={handleRemoveItem}>X</button>
      </div>
    </div>
  )
}