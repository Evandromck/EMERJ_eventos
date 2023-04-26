<?php 
require_once('conexao.php');

require_once("dompdf_config.inc.php");
include('qrlib.php');

session_start();
$dataTemp = NULL;

header("Content-Type: text/html; charset=ISO-8859-1", true);

date_default_timezone_set('America/Sao_Paulo');

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
		
	$codInscricao = sprintf("%06d%08d", $codEvento, $codParticipante);

	$selectSQL = sprintf("SELECT    participante.nome as nomeParticipante, " .
									"participante.cpf, " . 
									"evento.nome as nomeEvento, " .
									"evento.local as localEvento " .
						"FROM        evento, participante, inscricoes " .
						"WHERE       ((inscricoes.codEvento = %s) AND " .
						            "(inscricoes.codParticipante = %s) AND " .
						            "(inscricoes.codParticipante = participante.codigo) AND " .
						            "(inscricoes.codEvento = evento.codigo))",
					$codEvento,
					$codParticipante);
		//mysqli_select_db($database_evento, $evento);
	$Result1 = mysqli_query($conexao, $selectSQL) or die(mysqli_error($conexao));
	$row_rsInscricao = mysqli_fetch_assoc($Result1);
	$totalRows_rsInscricao = mysqli_num_rows($Result1);

	$cpfcompletoParticipante = substr($row_rsInscricao["cpf"], 0,3) . "." . substr($row_rsInscricao["cpf"], 3,3) . "." . substr($row_rsInscricao["cpf"], 6,3) . "-". substr($row_rsInscricao["cpf"], 9,2);

	/**/

	$selectSQL = "SELECT DISTINCT data 
						 FROM    porta
						 WHERE   codEvento = '$codEvento'";

	//mysql_select_db($database_evento, $evento);
	$Result2 = mysqli_query($conexao, $selectSQL) or die(mysqli_error($conexao));
	$row_rsPortas = mysqli_fetch_assoc($Result2);
	$totalRows_rsPortas = mysqli_num_rows($Result2);
	
	/**/
	
	$selectSQLCargaHoraria = "SELECT SEC_TO_TIME( SUM( TIME_TO_SEC( cargaHorariaOAB ) ) ) FROM frequencia2 WHERE codEvento = '$codEvento' and codParticipante = '$codParticipante' ";
	//mysql_select_db($database_evento, $evento);
	$ResultCargaHoraria = mysqli_query($conexao, $selectSQLCargaHoraria) or die(mysqli_error($conexao));

	/**/

	$selectSQLhorarioInicioFim = "SELECT horaInicio, horaFim
						  FROM    porta
						  WHERE   codEvento = '$codEvento' ";

	///mysql_select_db($database_evento, $evento);
	$ResulthorarioInicioFim = mysqli_query($conexao, $selectSQLhorarioInicioFim) or die(mysqli_error($conexao));
	//$row_horarioInicioFim = mysql_fetch_assoc($ResulthorarioInicioFim);
	$totalRows_horarioInicioFim = mysqli_num_rows($ResulthorarioInicioFim);

	/**/
	
	$selecthorasOAB = "SELECT hora_oab
						 FROM    porta
						 WHERE   codEvento = '$codEvento'" ;

	//mysql_select_db($database_evento, $evento);
	$ResulthorasOAB = mysqli_query($conexao, $selecthorasOAB) or die(mysqli_error($conexao));
	$row_horasOAB = mysqli_fetch_assoc($ResulthorasOAB);

	/**/
	$selectDataAtribuida = "SELECT dataAtribuida
						 FROM    frequencia2
						 WHERE   codEvento = '$codEvento' and codParticipante = '$codParticipante' ORDER BY dataAtribuida DESC LIMIT 1";

	//mysql_select_db($database_evento, $evento);
	$ResultDataAtribuida = mysqli_query($conexao, $selectDataAtribuida) or die(mysqli_error($conexao));
	$row_DataAtribuida = mysqli_fetch_assoc($ResultDataAtribuida);
	/**/

	
	/* ****************************************************** */
	$rowComprovacaoHorasSoma = mysqli_fetch_assoc($ResultCargaHoraria);
	$cargahorariacomprovacaodehorasSoma = explode(":",$rowComprovacaoHorasSoma['SEC_TO_TIME( SUM( TIME_TO_SEC( cargaHorariaOAB ) ) )']);

	/**/
	if($cargahorariacomprovacaodehorasSoma[0] == '01'){
		$totalCargaHorariaOAB = $cargahorariacomprovacaodehorasSoma[0] . ':' . $cargahorariacomprovacaodehorasSoma[1] . ' hora'; 
	} else if ($cargahorariacomprovacaodehorasSoma[0] != '01'){
		$totalCargaHorariaOAB = $cargahorariacomprovacaodehorasSoma[0] . ':' . $cargahorariacomprovacaodehorasSoma[1] . ' horas';
	}
	/**/

	/**/
	if($row_horasOAB["hora_oab"] == 0){
		$tipoHorasOAB = ''; 
	} else if ($row_horasOAB["hora_oab"] == 1){
			if ($cargahorariacomprovacaodehorasSoma[0] == '01'){
				$concedeHorasOAB = '* Foi concedida ' . $cargahorariacomprovacaodehorasSoma[0] . ':' . $cargahorariacomprovacaodehorasSoma[1] . ' hora de est&aacute;gio junto &agrave; OAB.';
			}else if ($cargahorariacomprovacaodehorasSoma[0] != '01'){
				$concedeHorasOAB = '* Foram concedidas ' . $cargahorariacomprovacaodehorasSoma[0] . ':' . $cargahorariacomprovacaodehorasSoma[1] . ' horas de est&aacute;gio junto &agrave; OAB.';
			} 
	}
	/* ****************************************************** */

	/* ****************************************************** */
	if ((isset($totalRows_rsPortas)) && ($totalRows_rsPortas > 0)) {
	$contadorDatasDoEvento = 1;
	do {  
		$data = explode('-', $row_rsPortas["data"]);
		if ($contadorDatasDoEvento < $totalRows_rsPortas){
			$dataDoEvento = ($data[2] . "/" . $data[1] . "/" . $data[0]) . " e ";
		} else if ($contadorDatasDoEvento == $totalRows_rsPortas){
			$dataDoEvento = ($data[2] . "/" . $data[1] . "/" . $data[0]);
		}
		if (strcmp(($data[2] . "/" . $data[1] . "/" . $data[0]), substr($dataTemp, strlen($dataTemp) - 10, 10)) == true) {
			if ($dataTemp == NULL) {
				$dataTemp = $dataTemp . $data[2] . "/" . $data[1] . "/" . $data[0];
			} else {
				$dataTemp = $dataTemp . " - " . $data[2] . "/" . $data[1] . "/" . $data[0];
			}
		}
		$imprimeDataDoEvento .= $dataDoEvento;
		$contadorDatasDoEvento++;
	} while ($row_rsPortas = mysqli_fetch_assoc($Result2));
		$rows = mysqli_num_rows($Result2);
		if($rows > 0) {
			mysqli_data_seek($Result2, 0);
			$row_rsPortas = mysqli_fetch_assoc($Result2);
		}
	}
	/* ****************************************************** */

	/* ****************************************************** */
	$contador = 0;

	while ($row_horarioInicioFim = mysqli_fetch_assoc($ResulthorarioInicioFim)) {

		$contador++;    
		$horaInicio = explode(':', $row_horarioInicioFim["horaInicio"]);
		$horaFim = explode(':', $row_horarioInicioFim["horaFim"]);

		if ($contador < $totalRows_horarioInicioFim){
			$varHorarioDoEvento = $horaInicio[0] . ":" . $horaInicio[1] . " &agrave;s " . $horaFim[0] . ":" . $horaFim[1] . " e de ";
		} else if ($contador == $totalRows_horarioInicioFim){
			$varHorarioDoEvento = $horaInicio[0] . ":" . $horaInicio[1] . " &agrave;s " . $horaFim[0] . ":" . $horaFim[1];
		}

		$imprimeHorarioDoEvento .= $varHorarioDoEvento;
	}
	/* ****************************************************** */

	$documento_gerado_em_data = date("d/m/Y");
	$documento_gerado_em_horario = date('H:i:s');	

	/* ****************************************************** */
	//$dataAtual = date("d/m/Y");
	
	$partesDataAtribuida = explode(" ", $row_DataAtribuida["dataAtribuida"]);
	$DataAtribuidaFormatada = explode("-", $partesDataAtribuida[0]);

	$diaDataAtribuida = $DataAtribuidaFormatada[2];
	$mesDataAtribuida = $DataAtribuidaFormatada[1];
	$anoDataAtribuida = $DataAtribuidaFormatada[0];

	if ($mesDataAtribuida == 1) {
		$mesDataAtribuidaFormatada = utf8_encode('janeiro');
	} else if ($mesDataAtribuida == 2) {
		$mesDataAtribuidaFormatada = utf8_encode('fevereiro');
	} else if ($mesDataAtribuida == 3) {
		$mesDataAtribuidaFormatada = utf8_encode('mar&ccedil;o');
	} else if ($mesDataAtribuida == 4) {
		$mesDataAtribuidaFormatada = utf8_encode('abril');
	} else if ($mesDataAtribuida == 5) {
		$mesDataAtribuidaFormatada = utf8_encode('maio');
	} else if ($mesDataAtribuida == 6) {
		$mesDataAtribuidaFormatada = utf8_encode('junho');
	} else if ($mesDataAtribuida == 7) {
		$mesDataAtribuidaFormatada = utf8_encode('julho');
	} else if ($mesDataAtribuida == 8) {
		$mesDataAtribuidaFormatada = utf8_encode('agosto');
	} else if ($mesDataAtribuida == 9) {
		$mesDataAtribuidaFormatada = utf8_encode('setembro');
	} else if ($mesDataAtribuida == 10) {
		$mesDataAtribuidaFormatada = utf8_encode('outubro');
	} else if ($mesDataAtribuida == 11) {
		$mesDataAtribuidaFormatada = utf8_encode('novembro');
	} else if ($mesDataAtribuida == 12) {
		$mesDataAtribuidaFormatada = utf8_encode('dezembro');
	}
	/* ****************************************************** */
}

/* converte php em PDF */
$dompdf = new DOMPDF();

$dompdf->load_html('
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Comprova&ccedil;&atilde;o de Horas | Escola da Magistratura do Estado do Rio de Janeiro</title>

<style type="text/css">
body{font-family:Arial, Helvetica, sans-serif; color:#000;}
.cabecalho_comprovacaodehoras{font-size:16px; text-align:center;}
.titulo_comprovacaodehoras{font-size:20px; text-align:center;}
.conteudo_comprovacaodehoras{page-break-after:avoid;}
.descricao_comprovacaodehoras{font-size:16px; text-align:justify;}
.rodape_comprovacaodehoras{position:fixed; bottom:18%; text-align:center; font-size:12px;}
</style>

</head>

<body>

<div class="cabecalho_comprovacaodehoras" align="center"><img src="imagens/logo_emerj.jpg">
<br /><br />
<strong>Escola da Magistratura do Estado do Rio de Janeiro</strong></div>

<br /><br />
<br /><br />

<div class="conteudo_comprovacaodehoras">

<div class="titulo_comprovacaodehoras" align="center"><strong>COMPROVA&Ccedil;&Atilde;O DE HORAS</strong></div>

<br /><br />

<div class="descricao_comprovacaodehoras" align="justify">O(a) participante <strong>'. utf8_encode($row_rsInscricao["nomeParticipante"]) . '</strong>, CPF '. $cpfcompletoParticipante . ', com n&uacute;mero de inscri&ccedil;&atilde;o ' . $codInscricao . ', assistiu ao evento ' . utf8_encode($row_rsInscricao["nomeEvento"]) . ', realizado em ' . $imprimeDataDoEvento . ', de ' . $imprimeHorarioDoEvento . ' horas, no(a) ' . utf8_encode($row_rsInscricao["localEvento"]) . ', fazendo jus a carga hor&aacute;ria de ' . $totalCargaHorariaOAB . '.
</div>
<br /><br />
<br /><br />
<br /><br />
<div align="center">
Rio de Janeiro, ' . $diaDataAtribuida . ' de ' . $mesDataAtribuidaFormatada . ' de ' . $anoDataAtribuida . '.' .
'<br /><br />
Secretaria Acad&ecirc;mica – SEADE<br />
Departamento de Ensino – DENSE
<br /><br />
<br /><br />' .
$concedeHorasOAB .
'</div>

<br /><br />

<div class="rodape_comprovacaodehoras" align="center">
<img src="qrcode/qrcode.png" height="100px" width="100px">
<br />
Para conferir a veracidade da Comprova&ccedil;&atilde;o de Horas, utilize um leitor de QR code ou acesse o link<br /> <a href="http://emerj.com.br/evento/comprovacaodehoras/comprovacaodehoras/comprovacaodehoras'. $codInscricao . '.pdf" target="_blank">emerj.com.br/evento/comprovacaodehoras/comprovacaodehoras/comprovacaodehoras'. $codInscricao . '.pdf</a>
<br /><br />
Documento gerado em ' . $documento_gerado_em_data . ' &agrave;s ' . $documento_gerado_em_horario .
'<br />
<hr>
Rua Dom Manuel, n&ordm; 25 - Centro CEP 20010-090. Tel. (21) 3133-3369.<br />
CNPJ 35.949.858/0001-81
</div>

</div>

</body>

</html>');

/* gera QR-code */
	$salvaComprovacaoDeHoras = 'qrcode/qrcode_comprovacaodehoras_'. $row_rsInscricao["cpf"] . '_' . $codInscricao . '.png';
	QRcode::png("http://emerj.com.br/evento/comprovacaodehoras/comprovacaodehoras/comprovacaodehoras" . $codInscricao . ".pdf", $salvaComprovacaoDeHoras);
	QRcode::png("http://emerj.com.br/evento/comprovacaodehoras/comprovacaodehoras/comprovacaodehoras" . $codInscricao . ".pdf", "qrcode/qrcode.png");	

$dompdf->set_paper('A4','portrait');

$dompdf->render();

//caminho no servidor cPanel onde salva o PDF na pasta
$arquivoComprovacaodehoras = 'comprovacaodehoras/comprovacaodehoras'. $codInscricao . '.pdf';

file_put_contents($arquivoComprovacaodehoras, $dompdf->output());

//nome do arquivo ao fazer download do PDF
$dompdf->stream(
    "comprovacaodehoras"."_".$codInscricao.".pdf", 
    array(
        "Attachment" => true 
    )
);
include 'insere_solicitacao_comprovacaodehoras.php';
?>