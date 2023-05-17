<?php
    session_start();
	require_once('conexao.php');
     /* RECEBENDO AS VARIAVEIS PELO METODO POST*/



    if (!empty($_POST['email']) && !empty($_POST['senha'])){
		$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
		$senha = md5($senha);
		$email = mysqli_escape_string($conexao, $_POST['email']);
	
		/*VALIDAÇÃO DO EMAIL CASO SEJA VALIDO FAZ A ANALISE DOS DADOS DO PARTICIPANTE*/	
		$sql_consulta = "SELECT email FROM participante_novo WHERE '$email' = email"; 
		$sql_result_consulta = mysqli_query($conexao, $sql_consulta) or die(mysqli_error($conexao));
		$sql_num_rows_consulta = mysqli_num_rows($sql_result_consulta);

		if($sql_num_rows_consulta >0){

			 // $_SESSION['cpf'] = $cpf;
           // header('location: cadastroParticipante.php');
		   
		   $sql = "SELECT * FROM participante_novo WHERE '$email' = email AND '$senha' = senha"; 
		   $sql_result = mysqli_query($conexao, $sql);
		   
		   if(mysqli_num_rows($sql_result) == 1){
			$dados = mysqli_fetch_array($sql_result);
			$_SESSION['logado'] = true;
			$_SESSION['id_usuario'] = $dados['id'];
			
				if(($dados['cpf'] == NULL) && !empty($dados['documento_estrangeiro'])){
					$_SESSION['nome'] = $dados['nome'];
					$_SESSION['documento_estrangeiro'] = $dados['documento_estrangeiro'];
					$_SESSION['pais'] = $dados['pais'];
					$_SESSION['sexo'] = $dados['sexo'];
					$_SESSION['celular'] = $dados['celular'];
					$_SESSION['email'] = $dados['email'];
					$_SESSION['autorizacao'] = $dados['autorizacao'];
					//$_SESSION['senha'] = $dados['senha'];
					header('location: alteracaoParticipanteEstrangeiro.php');
				}else{
					echo "<script>alert('Usuário inexistete'); location='alterarCadastroParticipante.php'; </script>";
				}
				
		   }

		}else{
			echo "<script>alert('Usuário e senha não conferem'); location='alterarCadastroParticipante.php'; </script>";
		}





	}else if(!empty($_POST['cpf']) && !empty($_POST['senha'])){
		$senha = mysqli_real_escape_string($conexao, $_POST['senha']);
		$senha = md5($senha);
		$cpf = mysqli_escape_string($conexao, str_replace(array('.', '-'), '', $_POST['cpf']));
		echo $cpf;
	
		/*VALIDAÇÃO DO cpf CASO SEJA VALIDO FAZ A ANALISE DOS DADOS DO PARTICIPANTE*/	
		$sql_consulta = "SELECT cpf FROM participante_novo WHERE '$cpf' = cpf"; 
		$sql_result_consulta = mysqli_query($conexao, $sql_consulta) or die(mysqli_error($conexao));
		$sql_num_rows_consulta = mysqli_num_rows($sql_result_consulta);

		if($sql_num_rows_consulta >0){

			 // $_SESSION['cpf'] = $cpf;
           // header('location: cadastroParticipante.php');
		   
		   $sql = "SELECT * FROM participante_novo WHERE '$cpf' = cpf AND '$senha' = senha"; 
		   $sql_result = mysqli_query($conexao, $sql);
		   
		   if(mysqli_num_rows($sql_result) == 1){
			$dados = mysqli_fetch_array($sql_result);
			$_SESSION['logado'] = true;
			$_SESSION['id_usuario'] = $dados['id'];
				if(!empty($dados['cpf']) && is_null($dados['documento_estrangeiro'])){
					$_SESSION['cpf'] = $dados['cpf'];
					$_SESSION['nome'] = $dados['nome'];
					$_SESSION['celular'] = $dados['celular'];
					$_SESSION['profissao'] = $dados['profissao'];
					$_SESSION['email'] = $dados['email'];
					$_SESSION['sexo'] = $dados['sexo'];
					$_SESSION['senha'] = $dados['senha'];
					$_SESSION['pais'] = $dados['pais'];
					$_SESSION['estado'] = $dados['estado'];
					$_SESSION['matricula_emerj'] = $dados['matricula_emerj'];
					$_SESSION['matricula_tj'] = $dados['matricula_tj'];
					$_SESSION['autorizacao'] = $dados['autorizacao'];
					header('location: alteracaoParticipante.php');
				}else{
					echo "<script>alert('Usuário inexistete'); location='alterarCadastroParticipante.php'; </script>";
				}
				
		   }

		}else{
			echo "<script>alert('Usuário e senha não conferem'); location='alterarCadastroParticipante.php'; </script>";
		}
	}else{
		echo "<script>alert('Usuário inexistete'); location='alterarCadastroParticipante.php'; </script>";
	}


	 
?>