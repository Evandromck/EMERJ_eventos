/*
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

*/
function validar(){
			/*
			var email01 = document.getElementById('email').value;
			var conf_email01 = document.getElementById('confirm_email').value;
			var senha01 = document.getElementById('senha').value;
			var conf_senha01 = document.getElementById('confir_senha').value;
			*/
	
			var email01 = form.email.value;
			var conf_email01 = form.confir_email.value;
			var senha01 = form.senha.value;
			var conf_senha01 = form.confir_senha.value;
			
			if(email01 != confir_email01){
				alert('Emails diferentes');
				form.email.focus();
				return false;
			}else{
				return true;
			}
			
			if(senha01 != confir_senha01){
				alert('Senhas diferentes');
				form.senha.focus();
				return false;
			}else{
				return true;
			}
		};
