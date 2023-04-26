<?php

	session_start();

	require_once('conexao.php');
     /* RECEBENDO AS VARIAVEIS PELO METODO POST*/
	$nome         = $_POST['name'];
	$docEstrangeiro = $_POST['documentoEstrangeiro'];
	$sexo         = $_POST['sexo'];
	$paises       = $_POST['paises'];
	$email        = $_SESSION['email'];
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
		
		$sql_consulta = "SELECT documento_estrangeiro FROM participante_novo WHERE '$docEstrangeiro' = documento_estrangeiro"; 
		$sql_result_consulta = mysqli_query($conexao, $sql_consulta) or die(mysqli_error($conexao));
		$sql_num_rows_consulta = mysqli_num_rows($sql_result_consulta);

		$sql_consulta_email = "SELECT email FROM participante_novo WHERE '$email' = email"; 
		$sql_result_consulta_email = mysqli_query($conexao, $sql_consulta_email) or die(mysqli_error($conexao));
		$sql_num_rows_consulta_email = mysqli_fetch_assoc($sql_result_consulta_email);
		
		/*VERIFICA SE O CPF JÁ ESTÁ CADASTRADO*/
		if($sql_num_rows_consulta > 0 || $sql_num_rows_consulta_email>0):
			echo "<script>alert('Documento já cadastrado ou email já cadastrado'); location='cadastroParticipanteEstrangeiro.php'; </script>";
			
		    //header('location: cadastroParticipante.php');
			
		else:

			
			$sql_insert = "INSERT INTO participante_novo (nome, documento_estrangeiro, sexo,
														pais, email, celular, senha, autorizacao, data_cadastro)
						VALUE ('$nome', '$docEstrangeiro', '$sexo', 
								'$paises', '$email', '$tel', '$senha', '$autorizacao', NOW())"; 

			$sql_resul_insert = mysqli_query($conexao, $sql_insert) or die(mysqli_error($conexao));
					
			if(mysqli_insert_id($conexao)):
				//echo "Cadastrado de participante efetuado com sucesso";
				echo "<script>alert('Cadastrado de participante efetuado com sucesso'); location='https://www.emerj.tjrj.jus.br/paginas/eventos/eventos_emerj_gratuitos.html';</script>";
				
				//sleep(3);
				//header('location: cadastroParticipante.php');
			else:
				//echo "Erro ao cadastrar";
				echo "<script>alert('Erro ao cadastrar'); location='cadastroParticipanteEstrangeiro.php'; </script>";
		
				//header('location: cadastroParticipante.php');
			endif;
		endif;
		
	}else{
		//echo 'CPF Invalido';
		echo "<script>alert('Dados Invalido')</script>";
		
		header('location: cadastroParticipanteEstrangeiro.php');
	}

		 
?>