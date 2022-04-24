const producto = document.getElementById('producto')
const costo = document.getElementById('costo')
const tipoProducto = document.getElementById('tipoProducto')

const errorElement = document.getElementById('errorProducto')
const form = document.getElementById('signupformProducto')

form.addEventListener('submit', (e) => {
  let messages = []

  if (producto.value === '' || producto.value == null) {
      messages.push('Producto')
  }
  if (costo.value === '' || costo.value == null) {
      messages.push(' Costo')
  }
  if (tipoProducto.value === '' || tipoProducto.value == null) {
      messages.push(' Tipo de Producto')
  }
  if (messages.length > 0 ) {
      e.preventDefault()
      messages.join(', ')
      errorElement.innerText = 'Favor de llenar: ' + messages
  }



})
