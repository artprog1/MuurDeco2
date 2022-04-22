const primernombre = document.getElementById('primernombre1')
const paterno = document.getElementById('paterno1')
const materno = document.getElementById('materno1')
const correo = document.getElementById('correo1')
const uid = document.getElementById('uid1')
const telefono = document.getElementById('telefono1')
const password = document.getElementById('password')
const password2 = document.getElementById('password2')


const errorElement = document.getElementById('errorPersonal')
const form = document.getElementById('formPersonal')

form.addEventListener('submit', (e) => {
  let messages = []

  if (allLetter(primernombre) || allLetter(paterno) || allLetter(materno)) {
    messages.push('Solo se acepta caracteres alfabeticos en los campos de nombre')
  } else {



  if (primernombre.value === '' || primernombre.value == null) {
      messages.push('Nombre')
  }
  if (paterno.value === '' || paterno.value == null) {
      messages.push(' Apellido Paterno')
  }
  if (materno.value === '' || materno.value == null) {
      messages.push(' Apellido Materno')
  }
  if (correo.value === '' || correo.value == null) {
      messages.push(' Correo')
  }
  if (uid.value === '' || uid.value == null) {
      messages.push(' User Id')
  }
  if (telefono.value === '' || telefono.value == null) {
      messages.push(' Telefono')
  }
  if (telefono.length > 10) {
      messages.push('Numbero debe ser 10 digitos')
  }


  if (password.value != password2.value) {
      messages.push(' Contraseñas no coinciden')
  } else {
    if (password.value === '' || password.value == null) {
        messages.push(' Contraseña')
    }
    if (password2.value === '' || password2.value == null) {
        messages.push(' Segunda Contraseña')
    }
  }

  }

  if (messages.length > 0 ) {
      e.preventDefault()
      messages.join(', ')
      errorElement.innerText = 'Favor de llenar: ' + messages
  }



})


function allLetter(inputtxt)
  {
   var letters = /^[A-Za-z]+$/;
   if(inputtxt.value.match(letters))
     {
      return false;
     }
   else
     {
     // alert("message");
     return true;
     }
  }
