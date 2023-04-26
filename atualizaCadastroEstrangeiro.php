<?php

	session_start();

	require_once('conexao.php');
     /* RECEBENDO AS VARIAVEIS PELO METODO POST*/
	$nome         = $_POST['name'];
	$docEstrangeiro = $_SESSION['documento_estrangeiro'];
	$sexo         = $_POST['sexo'];
	$paises       = $_POST['paises'];
	$email        = $_POST['email'];
	session_destroy();
	$tel          = preg_replace('/[^0-9]/',"",$_POST['tel']);
	//$senha        = password_hash($_POST['senha'], PASSWORD_DEFAULT);
	$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
	$senha = md5($senha);
	if(empty($_POST['terms'])):
		$autorizacao = 0;
	else:
		$autorizacao = ($_POST['terms']);
	endif;
	


	/*VALIDAÇÃO DO CPF CASO SEJA VALIDO FAZ A ANALISE DOS DADOS DO PARTICIPANTE*/
	if (!empty($nome)){
		
		$sql_consulta = "UPDATE participante_novo 
						 SET nome = '$nome', sexo = '$sexo', pais = '$paises', email = '$email', celular = '$tel', senha = '$senha', autorizacao = '$autorizacao', data_alteracao = NOW()  
						 WHERE '$docEstrangeiro' = documento_estrangeiro"; 
		$sql_result_consulta = mysqli_query($conexao, $sql_consulta) or die(mysqli_error($conexao));
		//$sql_num_rows_consulta = mysqli_num_rows($sql_result_consulta);


		/*VERIFICA SE O DOCUMENTO JÁ ESTÁ CADASTRADO*/
		if(mysqli_affected_rows($conexao)):
			echo "<script>alert('Atualização feita com sucesso'); location='alterarCadastroParticipante.php'; </script>";
		else:
			echo "Erro ao atualizar dados";
		endif;
			
	}else{
		
		echo "<script>alert('Dados Invalido')</script>";
		
		header('location: alterarCadastroParticipante.php');
	}

		 
?>