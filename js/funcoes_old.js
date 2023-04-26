var validarForm = () => {

  var senha = document.getElementById('senha').value;
  var confirm_senha = document.getElementById('confir_senha').value;

  var email = document.getElementById('email').value;
  var confirm_email = document.getElementById('confir_email').value;

  if(confirm_senha != senha){
      document.getElementById('message').innerHTML = "senha diferente";
      return false;
  }

  else if(email != confirm_email){
      document.getElementById('message2').innerHTML = "email diferente";
      return false;
  }
}

;
