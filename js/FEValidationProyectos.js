const titul1o = document.getElementById('titul1o')
const descriptionProy = document.getElementById('description')
const comentarioProy = document.getElementById('comentario')

const errorElement2 = document.getElementById('errorProyecto')
const formProy = document.getElementById('proyectform')

formProy.addEventListener('submit', (e) => {
  let messages2 = []

  if (titul1o.value === '' || titul1o.value == null) {
      messages2.push('Titulo')
  }
  if (descriptionProy.value === '' || descriptionProy.value == null) {
      messages2.push('Descripción')
  }
  if (comentarioProy.value === '' || comentarioProy.value == null) {
      messages2.push(' Comentarios')
  }
  if (messages.length > 0 ) {
      e.preventDefault()
      messages2.join(', ')
      errorElement2.innerText = 'Favor de llenar: ' + messages2
  }



})
