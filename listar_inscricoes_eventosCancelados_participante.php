<?php
  require_once('conexao.php');


  $navegador='';
  $browser_version='';
  $tipoDispositivoMovel='';

  $useragent = $_SERVER['HTTP_USER_AGENT'];
 
  	if (preg_match('|Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)|',$useragent,$matched)) {
    	$browser_version=$matched[1];
    	$browser = 'Internet Explorer';
  	} elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
    	$browser_version=$matched[1];
    	$browser = 'Opera';
  	} else if(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
    	$browser_version=$matched[1];
    	$browser = 'Mozilla Firefox';
  	} else if(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
    	$browser_version=$matched[1];
    	$browser = 'Google Chrome';
  	} else if(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
    	$browser_version=$matched[1];
    	$browser = 'Safari';
  	}  
  	if (strpos($_SERVER['HTTP_USER_AGENT'], 'CriOS') !== FALSE) {
    	$browser = 'Google Chrome for iOS.';
	} 
  	if (strpos($_SERVER['HTTP_USER_AGENT'], 'GSA') !== FALSE) {
    	$browser = 'Google for iOS.';
	} 
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'EdgiOS') !== FALSE) {
    	$browser = 'Microsoft Edge for iOS.';
	} 
  	if (strpos($_SERVER['HTTP_USER_AGENT'], 'FxiOS') !== FALSE) {
    	$browser = 'Firefox for iOS';
	}  
  	if (strpos($_SERVER['HTTP_USER_AGENT'], 'OPiOS') !== FALSE) {
    	$browser = 'Ópera for iOS.';
	}  
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE ||
    	strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) {
		$browser = 'Internet Explorer';	
	}
  
  if (($browser == "Mozilla Firefox") || ($browser == "Firefox for iOS")){ 
  echo "<span style='color:#F00'><center>O sistema de eventos da EMERJ n&atilde;o &eacute; compat&iacute;vel com o navegador Mozilla Firefox.<br>N&atilde;o utilize o navegador Mozilla Firefox, pois poder&atilde;o surgir erros no cadastro e inscri&ccedil;&atilde;o.<br>Recomendamos que acesse atrav&eacute;s do navegador <strong>Internet Explorer</strong> ou <strong>Google Chrome</strong>.</center></span>";
  } else {
  	echo "";
  }


  $useragent = $_SERVER['HTTP_USER_AGENT'];
 
  if (preg_match('|Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Internet Explorer';
  $navegador=$browser;
  $versao=$browser_version;
  } elseif (preg_match('|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = utf8_decode('Ópera');
  $navegador=$browser;
  $versao=$browser_version;
  } else if(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Mozilla Firefox';
  $navegador=$browser;
  $versao=$browser_version;
  } else if(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Google Chrome';
  $navegador=$browser;
  $versao=$browser_version;
  } else if(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Safari';
  $navegador=$browser;
  $versao=$browser_version;
  }  
  if (strpos($_SERVER['HTTP_USER_AGENT'], 'CriOS') !== FALSE) {
    $browser = 'Google Chrome for iOS';
  $navegador=$browser;
  $versao=$browser_version;
} 
  if (strpos($_SERVER['HTTP_USER_AGENT'], 'GSA') !== FALSE) {
    $browser = 'Google for iOS';
  $navegador=$browser;
  $versao=$browser_version;
} 
if (strpos($_SERVER['HTTP_USER_AGENT'], 'EdgiOS') !== FALSE) {
    $browser = 'Microsoft Edge for iOS';
  $navegador=$browser;
  $versao=$browser_version;
} 
  if (strpos($_SERVER['HTTP_USER_AGENT'], 'FxiOS') !== FALSE) {
    $browser = 'Firefox for iOS';
  $navegador=$browser;
  $versao=$browser_version;
}  
  if (strpos($_SERVER['HTTP_USER_AGENT'], 'OPiOS') !== FALSE) {
    $browser = utf8_decode('Ópera for iOS');
  $navegador=$browser;
  $versao=$browser_version;
}  
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE ||
    strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) {
  $browser = 'Internet Explorer';	
  $navegador=$browser;
  $versao=$browser_version;
}
  
    $navegador=$browser;
  $versao=$browser_version;

/**/

preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);

if(count($matches)<2){
preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
}

if (count($matches)>1){
$version = $matches[1];

switch(true){
case ($version <= 8):
break;

case ($version == 9 || $version == 10):
break;

case ($version == 11):
break;
}
}

$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");

if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){ /*Se este dispositivo for portátil, escreva o seguinte */
$tipoInterface = "Dispositivo móvel";
}
else { /* Caso contrário, escreva o seguinte */ 
$tipoInterface = "Computador desktop.";
}

$mobile = FALSE;

$user_agents = array("iPhone","iPad","Android","webOS","BlackBerry","iPod","Symbian","IsGeneric");

$user_agentsComp = array("Windows","iOS","Linux","Mac");

foreach($user_agents as $user_agent){

  if (strpos($_SERVER['HTTP_USER_AGENT'], $user_agent) !== FALSE) {
      $mobile = TRUE;

      $modelo = $user_agent;

      break;
  } 
}

if ($mobile){

$tipoDispositivo = utf8_decode("dispositivo móvel");	
  

$tipoDispositivoMovel = strtolower($modelo);

}else {

$tipoDispositivo = "computador desktop";
}


	$codEvent = $_POST['codEvento'];
	$senha = '8A5D66280D2DEE3BCC38CE9C404C603C'; //$_POST['txtSenha'];
	
  $codigoEventoPartcipante = explode("****", $codEvent);//Posição 0 Codigo do evento. Posição 1 é Codigo Participante
  $codigoEvento = $codigoEventoPartcipante[0];
  $codigoParticipante = $codigoEventoPartcipante[1];
  
  $sqlDeletaInscricao = "DELETE FROM inscricoes 
                         WHERE codEvento = '$codigoEvento' AND 
                               codParticipante = '$codigoParticipante' ";

  $sqlUpdateInscricao = "UPDATE evento 
                         SET vagas = vagas+1 
                         WHERE codigo = '$codigoEvento' ";
  
  $sqlInsertCancelamento = "INSERT INTO cancelamento (codEvento, codParticipante, navegador, versao, 
                                                     interface, tipoDispositivoMovel, dataHora) 
                           VALUES ('$codigoEvento', '$codigoParticipante', '$browser', '$browser_version', 
                                   '$tipoInterface', '$tipoDispositivo', NOW())";

  $sqlResultDelete = mysqli_query($conexao, $sqlDeletaInscricao) or die(mysqli_error($conexao));
  $sqlResultUpdate = mysqli_query($conexao, $sqlUpdateInscricao) or die(mysqli_error($conexao));
  $sqlResultInsert = mysqli_query($conexao, $sqlInsertCancelamento) or die(mysqli_error($conexao));
  
  /*
  $totalLinhas = mysqli_num_rows($sqlResultInsert);
  if($totalLinhas >0 ):
    echo "<script>alert('Cancelamento do evento concluido, clique no OK para verificar seus cancelamentos no periodo de um ano');</script>";
  endif;
*/
?>



<?php 
require_once('conexao.php'); 
///require_once('recursos/enviaMail.php');

//header("Content-Type: text/html; charset=ISO-8859-1", true);
header("Content-Type: text/html; charset=UTF-8", true);
?>	

<link href="css/default_eventos_new.css" rel="stylesheet" type="text/css" />
<link href="css/estilomenuvertical.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="recursos/validador.js"></script>

<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/controledeeventos.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<title>.: ESCOLA DA MAGISTRATURA DO ESTADO DO RIO DE JANEIRO - EMERJ :.</title>

<meta charset="utf-8">
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<link href="css/novolayout_responsivo.css" rel="stylesheet" type="text/css" media="all">
<link href="css/header_responsivo.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="layout/styles/print.css" media="print" />


<link rel="icon" href="favicon.ico" />

</head>
<body class="">
<div class="wrapper row1">
    <div class="artdirection" title="Escola da Magistratura do Estado do Rio de Janeiro" align="center" id="centro">
    <a href="http://www.emerj.tjrj.jus.br/index.html"><div align="center"><span style="position: relative; margin-right: 55%; top: 45px;"><img src="images/logo_emerj_branco.png"></span></div></a>
  <header id="header" class="full_width clear">
    <div id="hgroup">
    </div>
  </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      <li><a class="drop" href="#" title="A ESCOLA">A ESCOLA</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/historia.html" title="Hist&oacute;ria">Hist&oacute;ria</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/visao-missao-valores.html" title="Miss&atilde;o, Vis&atilde;o e Valores">Miss&atilde;o, Vis&atilde;o e Valores</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/programa-de-integridade-da-EMERJ/programa-de-integridade-da-EMERJ.html" title="Programa de Integridade da EMERJ">Programa de Integridade </br> da EMERJ</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/diretoria.html" title="Diretoria">Diretoria</a></li>
           <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/comissoes.html" title="Comiss&otilde;es">Comiss&otilde;es</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/administracao.html" title="Administra&ccedil;&atilde;o">Administra&ccedil;&atilde;o</a></li>
           <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/nucleos/nucleos.htm" title="N&uacute;cleos de Representa&ccedil;&atilde;o">N&uacute;cleos de Representa&ccedil;&atilde;o</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/espacoemerj/espacoemerj.htm" title="Espa&ccedil;os EMERJ">Espa&ccedil;os EMERJ</a></li>
         <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/regimento/Regimento_Interno_Publicacao_210817.pdf" target="_blank" title="Regimento Interno">Regimento Interno</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/iso9001/iso.htm" title="Certifica&ccedil;&atilde;o NBR ISO 9001:2015">Certifica&ccedil;&atilde;o NBR ISO 9001:2015</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/localizacao.html" title="Localiza&ccedil;&atilde;o">Localiza&ccedil;&atilde;o</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/contatos/contatos.htm" title="Contatos">Contatos</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="CURSOS">CURSOS</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/curso_especializacao/cursoespecializacaoemdireito.html" title="Curso de Especializa&ccedil;&atilde;o em Direito P&uacute;blico e Privado">Curso de Especializa&ccedil;&atilde;o em </br> Direito P&uacute;blico e Privado<br></a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/curso_especializacao/cursodeespecializacaointro.html" title="Curso de Especializa&ccedil;&atilde;o nas &Aacute;eas do Direito P&oacute;s-Gradua&ccedil;&atilde;o <i>Lato Sensu</i>">Curso de Especializa&ccedil;&atilde;o nas </br> &Aacute;reas do Direito </br> P&oacute;s-Gradua&ccedil;&atilde;o <i>Lato Sensu</i></a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/premerj/premerj.html" title="PREMERJ">PREMERJ</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/cursodeextensao/cursodeextensaoemerj.html" title="Cursos de Extens&atilde;o">Cursos de Extens&atilde;o</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/magistrados/magistrados.html" title="Cursos Oficiais para Magistrados">Cursos Oficiais para<br>Magistrados</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/cursos_livres/direito_eletronico/curso_livre_emerj.html" title="Cursos Livres" target="_blank">Cursos Livres</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="BIBLIOTECA">BIBLIOTECA</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/principal_biblioteca.html" title="Biblioteca e Videoteca">Biblioteca e Videoteca</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/historico.html" title="Hist&oacute;rico">Hist&oacute;rico</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/normasbiblioteca.htm" title="Normas de Atendimento">Normas de Atendimento</a></li>
          <li><a class="submenuseta" href="#" title="Consulta on-line aos acervos">Consulta on-line aos acervos</a>
          	<ul>
          		<li><a href="http://emerj.bnweb.org/scripts/bnportal/bnportal.exe/index#acao=geral&uv=vbibltip1:tipos:descricao;vbibluni0:unidades:nome_unidade;vbiblidi0:idiomas:nome;vbiblaco0:areas:nome&alias=geral&xsl=consulta" title="Consulta on-line ao acervo BNWEB" target="_blank">Consulta on-line ao <br> acervo BNWEB</a></li>
          		<li><a href="http://www4.tjrj.jus.br/biblioteca/index.html" title="Consulta on-line ao acervo Sophia" target="_blank">Consulta on-line ao <br> acervo Sophia</a></li>
          	</ul>
          </li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/autenticacaodedocumentos.html" title="Autentica&ccedil;&atilde;o de Documentos">Autentica&ccedil;&atilde;o de Documentos</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/monografiadosalunos.htm" title="Monografias dos Alunos">Monografias dos Alunos</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/magistrados/paginas/pesquisasparamagistrados/pesquisas-para-magistrados.html" title="Pesquisas para Magistrados">Pesquisas para Magistrados</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="CONCURSO">CONCURSO</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/concursos/concursos_provasparaingresso.htm" title="Para Ingresso na EMERJ">Para Ingresso na EMERJ</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="Licita&ccedil;&otilde;es">LICITA&Ccedil;&Otilde;ES</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacao_comunicado.html" title="Comunicado">Comunicado</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesnovas.htm" title="Licita&ccedil;&otilde;es Novas">Licita&ccedil;&otilde;es Novas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoeshomologadas_ano.html" title="Licita&ccedil;&otilde;es Homologadas">Licita&ccedil;&otilde;es Homologadas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesdesertas.htm" title="Licita&ccedil;&otilde;es Desertas">Licita&ccedil;&otilde;es Desertas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesrevogadas.htm" title="Licita&ccedil;&otilde;es Revogadas">Licita&ccedil;&otilde;es Revogadas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesfracassadas.htm" title="Licita&ccedil;&otilde;es Fracassadas">Licita&ccedil;&otilde;es Fracassadas</a></li>
		  <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/contratos_convenios_termosemgeral/contratos_convenios_termosemgeral.htm">Contratos, Conv&ecirc;nios e <br>Termos em Geral</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacaoespenalidades.html" title="Penalidades">Penalidades</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/registroPreco.htm">Registro de Pre&ccedil;o</a></li> 
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/atestados/atestados.html">Atestados</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/dispensa/dispensa.htm">Dispensa</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="F&Oacute;RUM PERMANENTE">F&Oacute;RUM PERMANENTE</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/forunspermanentes/forunspermanentes.htm" title="Objetivo">Objetivo</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/forunspermanentes/areasdodireito.htm" title="&Aacute;reas do Direito">&Aacute;reas do Direito</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/forunspermanentes/regulamentacaoforumpermanente.htm" title="Regulamenta&ccedil;&atilde;o">Regulamenta&ccedil;&atilde;o</a></li>
        </ul>
      </li>
      <li><a href="http://www.emerj.tjrj.jus.br/faleconosco.html" title="FALE CONOSCO">FALE CONOSCO</a></li>
      
      <li><a href="http://www.emerj.tjrj.jus.br/paginas/perguntas_frequentes/perguntas-frequentes.html" title="PERGUNTAS FREQUENTES">PERGUNTAS FREQUENTES</a></li>
    </ul>
  </nav>
</div>
<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="sidebar_1" class="sidebar one_quarter first" align="left">
      <aside>
        <!-- ########################################################################################## -->
        <h2 align="left">Eventos EMERJ Gratuitos</h2>
        <div align="left">
        <nav>
          <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/eventos_emerj_gratuitos.html">P&aacute;gina Principal</a></li>
            <li><a href="http://emerj.com.br/evento/cadastro.php">Cadastro de Participantes</a></li>
            <li><a href="http://emerj.com.br/evento/alteracadastro.php">Altera&ccedil;&atilde;o de Cadastro</a></li>
            <li><a href="http://emerj.com.br/evento/esqueceusenha.php">Esqueceu sua Senha?</a></li>
            <li><a href="http://emerj.com.br/evento/cancelainscricao.php">Cancelamento de Inscri&ccedil;&atilde;o - Evento Presencial</a></li>
            <li><a href="http://emerj.com.br/evento/reimpressaoinscricao.php">2&ordf; via de Inscri&ccedil;&atilde;o</a></li>
            <li><a href="http://emerj.com.br/evento/certificado/certificado.php">Certificado On-line</a></li>
            <li><a href="http://emerj.com.br/evento/comprovacaodehoras/comprovacaodehoras.php">Comprova&ccedil;&atilde;o de Horas</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/regras_inscricoesonline.html">Regras e Inscri&ccedil;&otilde;es On-Line - Presencial</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/regras_inscricoesonline_webinar.html">Regras e Inscri&ccedil;&otilde;es On-Line - Webinar</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/duvidaseperguntas.html">D&uacute;vidas e Perguntas Frequentes</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/politicaprivacidade.html">Pol&iacute;tica de Privacidade</a></li>
          </ul>
        </nav>
        </div>
        <!-- /nav -->
       <section>
          <h2 align="left">Participantes</h2>
          <div align="justify">
            <address>
            <p align="justify">Recomendamos que utilize o navegador <strong>Internet Explorer</strong> ou <strong>Google Chrome</strong>. N&atilde;o utilize dispositivos m&oacute;veis e os navegadores Mozilla Firefox e Safari, pois poder&atilde;o surgir erros nas etapas de cadastro, inscri&ccedil;&atilde;o e cancelamento de inscri&ccedil;&atilde;o.</p>
            <br>
            <p align="justify">Programa&ccedil;&atilde;o dos eventos dispon&iacute;veis para as&nbsp;<strong>inscri&ccedil;&otilde;es&nbsp;<em>on-line</em></strong>; as inscri&ccedil;&otilde;es ser&atilde;o encerradas &agrave;s 0h:00min do dia do evento.</p>
            <br>
            <p align="justify">Na primeira inscri&ccedil;&atilde;o, ser&aacute; necess&aacute;rio preencher o&nbsp;<strong>Cadastro de Participante</strong>, com dados do usu&aacute;rio, senha e um e-mail v&aacute;lido, para o qual ser&aacute; enviada uma mensagem para&nbsp;<strong>ativa&ccedil;&atilde;o e valida&ccedil;&atilde;o do cadastro</strong>.</p>
            <br>
            <p align="justify">Somente ap&oacute;s a&nbsp;<strong>valida&ccedil;&atilde;o do cadastro</strong>&nbsp;o participante poder&aacute; realizar&nbsp;<strong>inscri&ccedil;&otilde;es&nbsp;<em>on-line</em></strong>&nbsp;nos eventos da Escola.</p>
            <br>
            <p align="justify">Para realizar inscri&ccedil;&otilde;es, o participante deve clicar no &iacute;cone do evento selecionado e, em seguida, no &iacute;cone&nbsp;"<strong>Inscreva-se</strong>"&nbsp;e digitar os dados solicitados.</p>
            <br>
            <p align="justify">Ap&oacute;s a efetiva&ccedil;&atilde;o da inscri&ccedil;&atilde;o, ser&aacute; emitido o&nbsp;<strong>Comprovante de Inscri&ccedil;&atilde;o</strong>, com c&oacute;digo de barras, que dever&aacute; ser impresso pelo participante e apresentado no evento.</p>
            </address>
          </div>
        </section>
         <section>
          <h2 align="left">Contato</h2>
          <div align="justify">
            <address>
              Qualquer problema, sugest&atilde;o ou dificuldade na realiza&ccedil;&atilde;o da inscri&ccedil;&atilde;o, enviar&nbsp;<em>e-mail</em>&nbsp;para <a href="mailto:emerjsite@tjrj.jus.br" target="_blank">emerjsite@tjrj.jus.br</a>, nos dias &uacute;teis, das 10 &agrave;s 18 hs, relatando o problema e informando seu nome completo e CPF.
            </address>
          </div>
        </section>
        <!-- /section -->
        <!-- /section -->
        <!-- ########################################################################################## -->
      </aside>
    </div>
    <!-- ################################################################################################ -->
    <div id="portfolio" class="three_quarter"><!-- InstanceBeginEditable name="conteudo_eventos" -->

<div id="content">
	<!-- end #sidebar -->
	<div id="main">
<div id="welcome" class="post">
        <p class="row5"><strong><span style="font-size:18px">CANCELAMENTO DE INSCRI&Ccedil;&Atilde;O EM EVENTO PRESENCIAL</span></strong></p>	
            <br>		

        <div class="story">
           
<form method="post" name="indexcanc" action="listar_inscricoes_eventosCancelados_participante.php">

 	<div align='left'><strong>Marque o(s) evento(s) presencial(is) que deseja cancelar sua inscri&ccedil;&atilde;o <br>(s&atilde;o exibidos apenas eventos que ir&atilde;o ocorrer, conforme <a href='http://www.emerj.tjrj.jus.br/paginas/eventos/regras_inscricoesonline.html' target='_blank'>Regras e Inscri&ccedil;&otilde;es On-Line</a>):</strong></div><br>
	<table border='0' align='center' class='tabelanew_eventos' style='border:#999 1px solid;'>
	<tr style='border:#999 1px solid;'>
	<td width='20' align='center'><strong>Data Evento</strong></td>
	<td width='250' align='center'><strong>Nome do evento</strong></td>
  <td width='20' align='center'><strong>Data/Hora Cancelamento</strong></td>
	
		
		
		   <?php
		     $sqlSelectCancelamento = "SELECT * FROM cancelamento can, evento ev, porta po
                                   WHERE can.codEvento = '$codigoEvento' and
                                         ev.codigo  = '$codigoEvento' and 
                                         po.codEvento = '$codigoEvento' and
                                         can.codParticipante = '$codigoParticipante' 
                                   GROUP BY ev.nome";
                                         //and
                                         //can.dataHora"; 
                                   //BETWEEN current_date()-365 and current_date()";
         $sqlResultSelectCancelamento = mysqli_query($conexao, $sqlSelectCancelamento) or die(mysqli_error($conexao));
        
         while ($cancelamentos = mysqli_fetch_array($sqlResultSelectCancelamento)):
          
          $dia = substr($cancelamentos['data'], 8, 2);
          $mes = substr($cancelamentos['data'], 5, 2);
          $ano = substr($cancelamentos['data'], 0, 4);
          $dataCompleto = $dia . "/" . $mes . "/" . $ano;

          $diaCanc = substr($cancelamentos['dataHora'], 8, 2);
          $mesCanc = substr($cancelamentos['dataHora'], 5, 2);
          $anoCanc = substr($cancelamentos['dataHora'], 0, 4);
          $dataCompletoCanc = $diaCanc . "/" . $mesCanc . "/" . $anoCanc;
					echo "<tr style='border:#999 1px solid;'>";
					  echo "<td width='20' align='center'>" . $dataCompleto . "</td>";
						echo "<td width='250' align='center'>"  . $cancelamentos['nome'] . "</td>";
						echo "<td width='20' align='center'>" . $dataCompletoCanc . "</td>";	
						//echo "<td width='20'><input name='ckCancela[]' type='checkbox' value='$row_rsBusca[4]' /></td>";
					echo "</tr>";
				endwhile;
				
            ?>			
	 	
		
		
		
		</table>
		<br/>
		<p align='center'><a href="index_cancela_inscricao.php">VOLTAR</a></p>
		

</form>



 <!-- exibe lista de cancelamentos no período de 1 ano -->
            
          </div>
      </div>
            
      </div>
   </div>   
<!-- end #main -->
</div>
<!-- end #sidebar2 -->
<!-- end #content -->
<!-- InstanceEndEditable -->
    
    
    
      <figcaption>
        <p>&nbsp;</p>
</figcaption>
    <!-- ####################################################################################################### --></div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>

<!-- Footer -->
<div class="wrapper row2">
  <div id="footer" class="clear">
    <!--<div class="redessociais">
        <a href="https://twitter.com/emerjoficial" target="_blank"><img src="../../images/redes_sociais/twitter.fw.png" /></a>
        <a href="https://www.youtube.com/user/EMERJeventos?feature=mhee" target="_blank"><img src="../../images/redes_sociais/youtube.fw.png" /></a>
        <a href="https://www.facebook.com/emerjoficial" target="_blank"><img src="../../images/redes_sociais/facebook.fw.png" /></a>
        <a href="https://www.instagram.com/emerjoficial/" target="_blank"><img src="../../images/redes_sociais/instagram.fw.png" /></a>
    </div>-->
  </div>
</div>
<!-- Footer -->
<div class="wrapper row4">
  <div id="copyright" class="clear">
    <p class="fl_right"><strong>Rua Dom Manuel, n&ordm; 25 - Centro - CEP 20010-090<br>
      (21) 3133-3369 / (21) 3133-3380<br>
      CNPJ: 35.949.858/0001-81</strong></p>
    <p><strong>ESCOLA DA MAGISTRATURA DO ESTADO DO RIO DE JANEIRO - EMERJ<br>
    <em><strong>Este site foi desenvolvido para ser melhor visualizado em resolu&ccedil;&atilde;o de 1920x1080 no Internet Explorer ou Google Chrome</strong></em></strong></p>
  </div>
</div>
<!-- Scripts -->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="../layout/scripts/jquery-latest.min.js"><\/script>\
<script src="../layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="layout/scripts/custom.js"></script>
</body>
<!-- InstanceEnd --></html>