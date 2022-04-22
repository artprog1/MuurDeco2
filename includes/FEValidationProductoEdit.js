const producto = document.getElementById('producto')
const costo = document.getElementById('costo')
const tipoProducto = document.getElementById('tipoProducto')

const errorElement = document.getElementById('errorProducto')
const form = document.getElementById('signupformProducto')

form.addEventListener('submit', (e) => {
  let messagesProducto = []

  if (producto.value === '' || producto.value == null) {
      messagesProducto.push('Producto')
  }
  if (costo.value === '' || costo.value == null) {
      messagesProducto.push(' Costo')
  }
  if (tipoProducto.value === '' || tipoProducto.value == null) {
      messagesProducto.push(' Tipo de Producto')
  }
  if (messagesProducto.length > 0 ) {
      e.preventDefault()
      messagesProducto.join(', ')
      errorElement.innerText = 'Favor de llenar: ' + messagesProducto
  }



})
