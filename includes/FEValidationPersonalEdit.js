const primernombre = document.getElementById('primernombre2')
const paterno = document.getElementById('paterno2')
const materno = document.getElementById('materno2')
const correo = document.getElementById('correo2')
const uid = document.getElementById('uid2')
const telefono = document.getElementById('telefono2')



const errorElement = document.getElementById('errorPersonal2')
const form = document.getElementById('formPersonal2')

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
