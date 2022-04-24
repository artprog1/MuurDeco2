// FE Validation de Provedores
const empresa = document.getElementById('empresa')
const telef = document.getElementById('telef')
const insumo = document.getElementById('insumo')

const errorElement = document.getElementById('errorProvedor')
const form = document.getElementById('signupformProvedor')

form.addEventListener('submit', (e) => {
  let messages = []

  if (empresa.value === '' || empresa.value == null) {
      messages.push('Empresa')
  }
  if (insumo.value === '' || insumo.value == null) {
      messages.push(' Insumo')
  }
  if (telef.value === '' || telef.value == null) {
      messages.push(' Telefono')
  }
  if (messages.length > 0 ) {
      e.preventDefault()
      messages.join(', ')
      errorElement.innerText = 'Favor de llenar: ' + messages
  }



})
