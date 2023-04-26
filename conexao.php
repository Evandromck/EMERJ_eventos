<?php

	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "participante_novo";

	try {
			//Criar a conexao
	$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);
	$conexao->set_charset("utf8");

	}catch (mysqli_sql_exception $e) { 
			die ("erro ao criar conexao:".$e->errorMessage());
	}

		//echo "Conexao realizada com sucesso";
?>