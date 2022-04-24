const name = document.getElementById('primernombre')
const paterno = document.getElementById('paterno')
const materno = document.getElementById('materno')
const calle = document.getElementById('calle')
const ciudad = document.getElementById('ciudad')
const estado = document.getElementById('estado')
const postal = document.getElementById('postal')
const telefono = document.getElementById('telefono')


const errorElement = document.getElementById('error')
const form = document.getElementById('signupformCliente')

form.addEventListener('submit', (e) => {
  let messages = []

  if (name.value === '' || name.value == null) {
      messages.push('Nombre')
  }
  if (paterno.value === '' || paterno.value == null) {
      messages.push(' Apellido Paterno')
  }
  if (materno.value === '' || materno.value == null) {
      messages.push(' Apellido Materno')
  }
  if (calle.value === '' || calle.value == null) {
      messages.push(' Calle')
  }
  if (ciudad.value === '' || ciudad.value == null) {
      messages.push(' Ciudad')
  }
  if (estado.value === '' || estado.value == null) {
      messages.push(' Estado')
  }
  if (postal.value === '' || postal.value == null) {
      messages.push(' Codigo Postal')
  }
  if (telefono.value === '' || telefono.value == null) {
      messages.push(' Telefono')
  }
  if (telefono.length > 10) {
      messages.push('Numbero debe ser 10 digitos')
  }
  if (messages.length > 0 ) {
      e.preventDefault()
      messages.join(', ')
      errorElement.innerText = 'Favor de llenar: ' + messages
  }



})
