import React, { useEffect, useState } from "react";
import { deleteCart, getCart, patchCart, postSale } from '../../Routes';
import CartItemList from './CartItemList';

export default function CartList() {
  const [carts, setCarts] = useState([])

  useEffect(() => {
    getCart(setCarts);
  }, [])

  function handleCartAmount(cart_id, amount) {
    if (amount > 0) {
      patchCart({ amount: amount, id: cart_id }, reloadCarts)
    } else {
      deleteCart({ id: cart_id }, reloadCarts)
    }
  }

  const sumTotalPrice = arr => arr.reduce((sum, { value, amount }) => sum + value/100 * amount, 0)
  const sumTotalTaxes = arr => arr.reduce((sum, { tax, amount }) => sum + tax/100 * amount, 0)

  function handleFinishSale() {
    postSale({ total: sumTotalPrice(carts) * 100 }, reloadCarts);
  }

  function reloadCarts() {
    getCart(setCarts);
  }

  return (
    <div className="cart">
      {carts !== 'undefined' && carts.length === 0 ? <label>O carrinho está vazio</label> :
        <>
          <CartItemList carts={carts} handleCartAmount={handleCartAmount}></CartItemList>
          <div className="panel">
            <div className="info">
              <label>Total de Impostos: R$ {(sumTotalTaxes(carts)).toFixed(2).replace('.', ',')}</label>
              <label>Total: R$ {(sumTotalPrice(carts)).toFixed(2).replace('.', ',')}</label>
            </div>
            <div className="finish">
              <button onClick={handleFinishSale}>Finalizar compra</button>
            </div>
          </div>
        </>
      }
    </div>
  )
}