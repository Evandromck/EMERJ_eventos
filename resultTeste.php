<?php
   session_start();
	require_once('conexao.php');
     /* RECEBENDO AS VARIAVEIS PELO METODO POST*/
	$nome         = $_POST['name'];
	$cpf          = preg_replace('/[^0-9]/',"",$_SESSION['cpf']);
	session_destroy();
	$sexo         = $_POST['sexo'];
	// $profissao    = $_POST['profissao'];
	$matEmerj     = $_POST['matEmerj'];
	$matTj        = $_POST['matTj'];
	$paises       = $_POST['paises'];
	$uf           = $_POST['uf'];
	$email        = $_POST['email'];
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
	if (validaCPF($cpf)){
		
		$sql_consulta = "SELECT cpf FROM participante_novo WHERE '$cpf' = cpf"; 
		$sql_result_consulta = mysqli_query($conexao, $sql_consulta) or die(mysqli_error($conexao));
		$sql_num_rows_consulta = mysqli_num_rows($sql_result_consulta);

		$sql_consulta_email = "SELECT email FROM participante_novo WHERE '$email' = email"; 
		$sql_result_consulta_email = mysqli_query($conexao, $sql_consulta_email) or die(mysqli_error($conexao));
		$sql_num_rows_consulta_email = mysqli_fetch_assoc($sql_result_consulta_email);
		
		/*VERIFICA SE O CPF JÁ ESTÁ CADASTRADO*/
		if($sql_num_rows_consulta > 0 || $sql_num_rows_consulta_email>0):
			echo "<script>alert('Email já cadastrado'); location='cadastroParticipante.php'; </script>";
			
		    //header('location: cadastroParticipante.php');
			
		else:

			if(empty($matEmerj)):
				$matEmerj = null;
			endif;

			if(empty($matTj)):
				$matTj = null;
			endif;

			$sql_insert = "INSERT INTO participante_novo (nome, cpf, sexo, matricula_emerj, matricula_tj,
														pais, estado, email, celular, senha, autorizacao, data_cadastro)
						VALUE ('$nome', '$cpf', '$sexo', '$matEmerj', '$matTj', 
								'$paises', '$uf', '$email', '$tel', '$senha', '$autorizacao', NOW())"; 

			$sql_resul_insert = mysqli_query($conexao, $sql_insert) or die(mysqli_error($conexao));
					
			if(mysqli_insert_id($conexao)):
				//echo "Cadastrado de participante efetuado com sucesso";
				echo "<script>alert('Participante cadastrado com sucesso'); location='https://www.emerj.tjrj.jus.br/paginas/eventos/eventos_emerj_gratuitos.html';</script>";
				
				//sleep(3);
				//header('location: cadastroParticipante.php');
			else:
				//echo "Erro ao cadastrar";
				echo "<script>alert('Erro ao cadastrar'); location='cadastroParticipante.php'; </script>";
		
				//header('location: cadastroParticipante.php');
			endif;
		endif;
		
	}else{
		//echo 'CPF Invalido';
		echo "<script>alert('CPF Invalido')</script>";
		
		header('location: cadastroParticipante.php');
	}

	/* FUNÇÕES EM PHP */
	function validaCPF($cpf){
		//$cpf = '111.111.111-11';
		//$cpf = '073.485.097-58';
		//$cpf = preg_replace('/[^0-9]/' , '' , $cpf);
	
		$digitoA = 0;
		$digitoB = 0;
		for ($i=0, $x=10; $i<=8; $i++, $x-- ){
			
			$digitoA += $cpf[$i] * $x;	
		}
		for ($i=0, $x=11; $i<=9; $i++, $x-- ){
			
			if (str_repeat($i, 11) == $cpf){
				return false;
				///return;
			}
			$digitoB += $cpf[$i] * $x;	
		}
		$somaA = ( ($digitoA%11)<2) ? 0 : 11-($digitoA%11) ;
		$somaB = ( ($digitoB%11)<2) ? 0 : 11-($digitoB%11) ;
	
		if ($somaA != $cpf[9] or $somaB != $cpf[10]){
			return false;
		}else{
			return true;
		}
	}
	 
?>