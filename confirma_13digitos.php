<?php 
	session_start();
require_once('conexao.php');

include_once('recursos/barcode_13digitos.php');





$dataTemp = NULL;



//header("Content-Type: text/html; charset=ISO-8859-1", true);
header("Content-Type: text/html; charset=UTF-8", true);

$codEvent = $_POST['codEvento'];
//$senha = '8A5D66280D2DEE3BCC38CE9C404C603C'; //$_POST['txtSenha'];
	
  $codigoEventoPartcipante = explode("****", $codEvent);//Posição 0 Codigo do evento. Posição 1 é Codigo Participante
  $codigoEvento = $codigoEventoPartcipante[0];
  $codigoParticipante = $codigoEventoPartcipante[1];

if (isset($codigoEvento))

	$_SESSION["codEvento"] = $codigoEvento;

if (isset($codigoParticipante))
	
	$_SESSION["codParticipante"] = $codigoParticipante;



if ((isset($_SESSION["codEvento"])) && (isset($_SESSION["codParticipante"]))) {

	$codEvento = $_SESSION["codEvento"];

	$codParticipante = $_SESSION["codParticipante"];

		

	$codInscricao = sprintf("%06d%08d", $codEvento, $codParticipante); //LAYS .:. 11-04 .:. $codInscricao = sprintf("%06d%06d", $codEvento, $codParticipante); "%06d%07d"



	$selectSQL = "SELECT    
					participante.nome as nomeParticipante,
					participante.celular, 
					participante.cpf,
					evento.nome as nomeEvento,
					evento.local as localEvento,
					evento.endereco as enderecoEvento
				FROM   
					evento, 
					participante_novo participante, 
					inscricoes
				WHERE       
					inscricoes.codEvento = '$codEvento' AND
					inscricoes.codParticipante = '$codParticipante' AND
					inscricoes.codParticipante = participante.id AND
					inscricoes.codEvento = evento.codigo";
					
	/*sprintf("SELECT    participante.nome as nomeParticipante, " .
									"participante.dddCelular, " . 
									"participante.telCelular, " . 
									"participante.dddResidencial, " . 
									"participante.telResidencial, " .
									"participante.cpf, " . 
									"evento.nome as nomeEvento, " .
									"evento.local as localEvento, " .
									"evento.endereco as enderecoEvento " .
						"FROM        evento, participante, inscricoes " .
						"WHERE       ((inscricoes.codEvento = %s) AND " .
						            "(inscricoes.codParticipante = %s) AND " .
						            "(inscricoes.codParticipante = participante.codigo) AND " .
						            "(inscricoes.codEvento = evento.codigo))",
					$codEvento,
					$codParticipante);*/

		//mysql_select_db($database_evento, $evento);

	$Result1 = mysqli_query($conexao, $selectSQL) or die(mysqli_error());

	$row_rsInscricao = mysqli_fetch_assoc($Result1);
	$totalRows_rsInscricao = mysqli_num_rows($Result1);



	$telTemp = NULL;

	if (isset($row_rsInscricao["celular"])) {
      
		$telTemp = $row_rsInscricao["celular"];

	}

	$selectSQL = "SELECT 
				       data,
  					   horaInicio,
					   horaFim
				  FROM    
					   porta
				  WHERE   
				       codEvento = $codigoEvento";
				  
	/*sprintf("SELECT  	data, " .
		"horaInicio, " .
		"horaFim " .
		"FROM    porta " .
		"WHERE   codEvento = %s", $codEvento);*/



	//mysql_select_db($database_evento, $evento);

	$Result2 = mysqli_query($conexao, $selectSQL) or die(mysqli_error());

	$row_rsPortas = mysqli_fetch_assoc($Result2);

	$totalRows_rsPortas = mysqli_num_rows($Result2);

}

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">

<link href="css/default.css" rel="stylesheet" type="text/css">





<style type="text/css">

<!--

.style2 {font-size: 9px}

.style4 {color: #000099}

.style33 {

	color: #990000;

	font-weight: bold;

}

.style34 {color: #000000}

.style37 {color: #990000}

.style38 {font-size: small}

.style39 {font-size: small; color: #000000; }

.style40 {color: #000000; font-weight: bold; font-size: small}

.style43 {color: #990000; font-weight: bold; font-size: 18px}

.style41 {color: #000000; font-weight: bold; font-size: 16px}

.style42 {color: #990000; font-weight: bold; font-size: 14px}



-->

</style>

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<title>Confirma&ccedil;&atilde;o de Inscri&ccedil;&atilde;o</title>

</head>

<body>

<div align="center">

  <table width="550" border="1" align="center" cellpadding="5" cellspacing="0">

    <tr>

      <td><div align="center"><span class="style34">- <strong>COMPROVANTE DE INSCRI&Ccedil;&Atilde;O</strong> -<br />

        Escola da Magistratura do Estado do Rio de Janeiro<br />

      Rua Dom Manuel n&ordm;&nbsp25 - Centro - Telefone: 3133-3369</span></div></td>

      </tr>

    <tr>

      <td>

        <table width="100%" border="0" align="left" cellpadding="10" cellspacing="0">

          <tr>

            <td width="50" rowspan="4" style="width:60px;"><div style="margin-left:10px" class="textoT&iacute;tulo"><?php if ((isset($totalRows_rsInscricao)) && ($totalRows_rsInscricao == 1)) vbarcode($codInscricao); ?></div></td>

            <td width="456"><div align="center" class="textoT&iacute;tulo style40"><br /><? if ((isset($totalRows_rsInscricao)) && ($totalRows_rsInscricao == 1)) echo($row_rsInscricao["nomeEvento"]);?><br /></div></td>

          </tr>

          <tr>

            <td>

              <table width="100%%" border="0" cellspacing="0" cellpadding="0">

                <?php

			 				if ((isset($totalRows_rsPortas)) && ($totalRows_rsPortas > 0)) {

							echo("<tr>" .

        		    			 "<td class='textoT&iacute;tulo style40'>Data</td>" .

			    		         "<td class='textoT&iacute;tulo style40'>Hor&aacute;rio de In&iacute;cio</td>" .

            					 "<td class='textoT&iacute;tulo style40'>Hor&aacute;rio de T&eacute;rmino</td>" .

						         "</tr>");

							do {  

								$data = explode('-', $row_rsPortas["data"]);

     							echo("<tr><td class='textoNormal style40'>" . $data[2] . "/" . $data[1] . "/" . $data[0] . "</td>" . 

									"<td class='textoNormal style40'>" . substr($row_rsPortas["horaInicio"],0,5) . "</td>" .

									"<td class='textoNormal style40'>" . substr($row_rsPortas["horaFim"],0,5) . "</td></tr>");

								if (strcmp(($data[2] . "/" . $data[1] . "/" . $data[0]), substr($dataTemp, strlen($dataTemp) - 10, 10)) == true) {

									if ($dataTemp == NULL) {

										$dataTemp = $dataTemp . $data[2] . "/" . $data[1] . "/" . $data[0];

									} else {

										$dataTemp = $dataTemp . " - " . $data[2] . "/" . $data[1] . "/" . $data[0];

									}

								}

							} while ($row_rsPortas = mysqli_fetch_assoc($Result2));

				  			$rows = mysqli_num_rows($Result2);

  							if($rows > 0) {

      							mysqli_data_seek($Result2, 0);

			  					$row_rsPortas = mysqli_fetch_assoc($Result2);

		  					}

							}

						  ?>

            </table>					</td>

          </tr>

          <tr>

            <td>

              <p><span class="style40">Local:</span>

                <span class="textoNormal style40">

                <?php if ((isset($totalRows_rsInscricao)) && ($totalRows_rsInscricao == 1)) echo($row_rsInscricao["localEvento"]);?>

                </span></p>

              <p><span class="style33"><span class="style34">Endere&ccedil;o:</span>

                <?php if ((isset($totalRows_rsInscricao)) && ($totalRows_rsInscricao == 1)) echo($row_rsInscricao["enderecoEvento"]);?>

                </span><br />

                Caso haja lota&ccedil;&atilde;o m&aacute;xima do audit&oacute;rio, a transmiss&atilde;o de sinal do evento ocorrer&aacute;, simultaneamente, no espa&ccedil;o indicado pela equipe da EMERJ. <br />

              </p>

              

              

              <div align="center"></div>

  <hr align="left" />

              <p><span class="style40">Nome:</span>

                <span class="textoNormal style40">

                <?php if ((isset($totalRows_rsInscricao)) && ($totalRows_rsInscricao == 1)) echo($row_rsInscricao["nomeParticipante"]);?>

              </span>		                </p>

              <p><span class="style40">CPF:</span><span class="textoNormal style40">

                <?php if ((isset($totalRows_rsInscricao)) && ($totalRows_rsInscricao == 1)) echo(substr($row_rsInscricao["cpf"], 0,3) . "." . substr($row_rsInscricao["cpf"], 3,3) . "." . substr($row_rsInscricao["cpf"], 6,3) . "-". substr($row_rsInscricao["cpf"], 9,2));?>

                <br />

              </span>	                </p></td>

          </tr>

          <tr>

            <td>

              <p align="left"><span class="style40">N&uacute;mero da Inscri&ccedil;&atilde;o: </span>

                <span class="style43"><?php if ((isset($totalRows_rsInscricao)) && ($totalRows_rsInscricao == 1)) echo($codInscricao); else echo("Inscri��o Inv�lida"); ?>

                </span>

              <hr align="left" />

              <br />

              <div align="center"><?php if ((isset($totalRows_rsInscricao)) && ($totalRows_rsInscricao == 1)) fbarcode($codInscricao); ?></div>

              </p>

            <br /></td>

          </tr>

      </table>		</td>

      </tr>

  </table>

  

  <br />

</div>

<div align="center">

  

</div>



</body>

</html>