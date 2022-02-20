const form = document.getElementById('signupform');
const username = document.getElementById('primernombre');
const paterno = document.getElementById('paterno');
const materno = document.getElementById('materno');
const email = document.getElementById('email');
const uid = document.getElementById('idusuario');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

let validity = 1;

form.addEventListener('submit', e => {

	checkInputs();
	// exitValidation();
	if (validity) {
		e.preventDefault();
	}

});


function exitValidation()
{
	// document.getElementById("signupform").submit();
}


function checkInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
  const paternoValue = paterno.value.trim()
  const maternoValue = materno.value.trim()
  const uidValue = uid.value.trim()
  const emailValue = email.value.trim();
  const passwordValue = password.value.trim();
	const password2Value = password2.value .trim();


	if(usernameValue === '') {
		setErrorFor(username, 'Primer nombre debe llenarse');

	} else {
		setSuccessFor(username);
	}

  if(paternoValue === '') {
		setErrorFor(paterno, 'Apellido paterno debe llenarse');
	} else {
		setSuccessFor(paterno);
	}

  if(maternoValue === '') {
		setErrorFor(materno, 'Apellido materno debe llenarse');
	} else {
		setSuccessFor(materno);
	}

  if(uidValue === '') {
    setErrorFor(uid, 'ID de usuario debe llenarse');
  } else {
    setSuccessFor(uid);
  }

	if(emailValue === '') {
		setErrorFor(email, 'Falta correo electronico');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'No es un correo valido');
	} else {
		setSuccessFor(email);
	}

	if(passwordValue === '') {
		setErrorFor(password, 'Contraseña no puede estar en blanco');
	} else {
		setSuccessFor(password);
	}

	if(password2Value === '') {
		setErrorFor(password2, 'No puede estar en blanco');
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Contraseñas no coinciden');
	} else{
		setSuccessFor(password2);
	}


}



function setErrorFor(input, message) {
	validity = 1;
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	validity = 0;
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
