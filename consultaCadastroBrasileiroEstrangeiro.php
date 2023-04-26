<?php
    session_start();
	require_once('conexao.php');
     /* RECEBENDO AS VARIAVEIS PELO METODO POST*/
     if (!empty($_POST['cpf'])):
        $cpf    = preg_replace('/[^0-9]/',"",$_POST['cpf']);
        //$email  = "";
     endif;

     if(!empty($_POST['email'])):
        $email        = $_POST['email'];
        $cpf = 0000000000;
     endif;
	
	/*VALIDAÇÃO DO CPF CASO SEJA VALIDO FAZ A ANALISE DOS DADOS DO PARTICIPANTE*/
	if (validaCPF($cpf)):
		$sql_consulta = "SELECT cpf FROM participante_novo WHERE '$cpf' = cpf"; 
		$sql_result_consulta = mysqli_query($conexao, $sql_consulta) or die(mysqli_error($conexao));
		$sql_num_rows_consulta = mysqli_num_rows($sql_result_consulta);

		/*VERIFICA SE O CPF JÁ ESTÁ CADASTRADO*/
		if($sql_num_rows_consulta >0):
            echo "<script>alert('CPF já cadastrado'); location='ParticipanteBrasileiroEstrangeiro.php'; </script>";
        else:
            //echo "<script>alert('Tudo ok no cpf');</script>";
            $_SESSION['cpf'] = $cpf;
            header('location: cadastroParticipante.php');
        endif;
			
    elseif(!empty($email)):
            $sql_consulta = "SELECT email FROM participante_novo WHERE '$email' = email"; 
            $sql_result_consulta = mysqli_query($conexao, $sql_consulta) or die(mysqli_error($conexao));
            $sql_num_rows_consulta = mysqli_num_rows($sql_result_consulta);

            if($sql_num_rows_consulta > 0):
                echo "<script>alert('Usuário já cadastrado'); location='ParticipanteBrasileiroEstrangeiro.php'; </script>";
                //header('location: cadastroParticipante.php');
                
            else:
                $_SESSION['email'] = $email;
				header('location: cadastroParticipanteEstrangeiro.php');
			endif;
		
    else:
		echo "<script>alert('Favor verificar CPF ou email preenchido'); location='ParticipanteBrasileiroEstrangeiro.php'</script>";
		
    endif;

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