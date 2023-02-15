/* eslint-disable no-use-before-define */
const apiAdress = 'http://localhost:8080/'
export { apiAdress }
export { getProductType, postProductType, deleteProductType, getTax, postTax, getProduct, postProduct, deleteProduct, deleteTax, getCart, postCart, patchCart, deleteCart, postSale }

const getProductType = (callBack) => {
	fetch(apiAdress + 'product-type')
		.then(res => res.json())
		.then((result) => {
			callBack(result['data'])
		})
}

const postProductType = (body, callBack) => {
	const requestOptions = {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'product-type', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}

const deleteProductType = (body, callBack) => {
	const requestOptions = {
		method: 'DELETE',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'product-type', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}

const getTax = (callBack) => {
	fetch(apiAdress + 'tax')
		.then(res => res.json())
		.then((result) => {
			callBack(result['data'])
		})
}

const postTax = (body, callBack) => {
	const requestOptions = {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'tax', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}

const deleteTax = (body, callBack) => {
	const requestOptions = {
		method: 'DELETE',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'tax', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}

const getProduct = (callBack) => {
	fetch(apiAdress + 'product')
		.then(res => res.json())
		.then((result) => {
			callBack(result['data'])
		})
}

const postProduct = (body, callBack) => {
	const requestOptions = {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'product', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}

const deleteProduct = (body, callBack) => {
	const requestOptions = {
		method: 'DELETE',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'product', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}

const getCart = (callBack) => {
	fetch(apiAdress + 'cart')
		.then(res => res.json())
		.then((result) => {
			callBack(result['data']);
		})
}

const postCart = (body, callBack) => {
	const requestOptions = {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'cart', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}

const patchCart = (body, callBack) => {
	const requestOptions = {
		method: 'PATCH',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'cart', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}

const deleteCart = (body, callBack) => {
	const requestOptions = {
		method: 'DELETE',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'cart', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}

const postSale = (body, callBack) => {
	const requestOptions = {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify(body),
		credentials: 'include'
	}

	fetch(apiAdress + 'sale', requestOptions)
		.then(res => res.json())
		.then((result) => {
			callBack()
		})
}
