<?php 
require_once('recursos/conexao.php'); 
///require_once('recursos/enviaMail.php');

//header("Content-Type: text/html; charset=ISO-8859-1", true);
header("Content-Type: text/html; charset=UTF-8", true);
?>	

<link href="css/default_eventos_new.css" rel="stylesheet" type="text/css" />
<link href="css/estilomenuvertical.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="recursos/validador.js"></script>

<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/controledeeventos.dwt" codeOutsideHTMLIsLocked="false" -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>.: ESCOLA DA MAGISTRATURA DO ESTADO DO RIO DE JANEIRO - EMERJ :.</title>


<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="layout/styles/print.css" media="print" />
<link href="css/default_eventos.css" rel="stylesheet" type="text/css" />
<link href="css/novolayout_responsivo.css" rel="stylesheet" type="text/css" media="all">
<link href="css/header_responsivo.css" rel="stylesheet" type="text/css" media="all">

<!--[if lt IE 9]>
<link href="layout/styles/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
<script src="layout/scripts/ie/css3-mediaqueries.min.js"></script>
<script src="layout/scripts/ie/html5shiv.min.js"></script>
<![endif]-->

<!--[if IE]><link rel="shortcut icon" href="img/favicon.ico"><![endif]-->
<link rel="icon" href="favicon.ico" />
<style type="text/css">
@font-face {
     font-family:"Titillium Web";
     src:url(fonte/TitilliumWeb-Regular.ttf);
	 font-weight:normal;
	 font-style:normal;
}

body {
	font-family: "Titillium Web";
	font-weight: normal;
	font-style: normal;
}
</style>
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
      <!--<li class="active"><a href="index.html" title="Principal">Homepage</a></li>-->
      <li><a class="drop" href="#" title="A ESCOLA">A ESCOLA</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/historia.html" title="Hist&oacute;ria">Hist&oacute;ria</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/diretoria.html" title="Diretoria">Diretoria</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/localizacao.html" title="Localiza&ccedil;&atilde;o">Localiza&ccedil;&atilde;o</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/nucleos/nucleos.htm" title="N&uacute;cleos de Representa&ccedil;&atilde;o">N&uacute;cleos de Representa&ccedil;&atilde;o</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/espacoemerj/espacoemerj.htm" title="Espa&ccedil;os EMERJ">Espa&ccedil;os EMERJ</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/copedem/copedem.html" title="COPEDEM">COPEDEM</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/contatos/contatos.htm" title="Contatos">Contatos</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="CURSOS">CURSOS</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/curso_especializacao/cursoespecializacaoemdireito.html" title="Curso de Especializa&ccedil;&atilde;o em </br> Direito P&uacute;blico e Privado">Curso de Especializa&ccedil;&atilde;o em </br> Direito P&uacute;blico e Privado<br></a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/curso_especializacao/cursodeespecializacaointro.html" title="Curso de Especializa&ccedil;&atilde;o nas </br> &Aacute;eas do Direito </br> P&oacute;s-Gradua&ccedil;&atilde;o <i>Lato Sensu</i>">Curso de Especializa&ccedil;&atilde;o nas </br> &Aacute;rea do Direito </br> P&oacute;s-Gradua&ccedil;&atilde;o <i>Lato Sensu</i></a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/premerj/premerj.html" title="PREMERJ">PREMERJ</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/cursodeextensao/cursodeextensaoemerj.html" title="Cursos de Extens&atilde;o">Cursos de Extens&atilde;o</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/magistrados/magistrados.html" title="Cursos Oficiais para Magistrados">Cursos Oficiais para<br>Magistrados</a></li>
        <li><a href="http://www.emerj.tjrj.jus.br/cursos_livres/direito_eletronico/curso_livre_emerj.html" title="Cursos Livres" target="_blank">Cursos Livres</a></li>
        <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/curso_mediadoresjudiciais/2017/curso_mediadoresjudiciais.html" title="Curso Forma&ccedil;&atilde;o de Mediadores Judiciais">Curso de Forma&ccedil;&atilde;o de<br>Mediadores Judiciais</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="BIBLIOTECA">BIBLIOTECA</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/principal_biblioteca.html" title="Biblioteca e Videoteca">Biblioteca e Videoteca</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/normasbiblioteca.htm" title="Normas de Atendimento">Normas de Atendimento</a></li>
          <li><a href="http://emerj.bnweb.org/scripts/bnportal/bnportal.exe/index#acao=geral&uv=vbibltip1:tipos:descricao;vbibluni0:unidades:nome_unidade;vbiblidi0:idiomas:nome;vbiblaco0:areas:nome&alias=geral&xsl=consulta" title="Consulta on-line ao acervo" target="_blank">Consulta on-line ao acervo</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/monografiadosalunos.htm" title="Monografias dos Alunos">Monografias dos Alunos</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/portaldomagistrado/paginas/pesquisas-para-magistrados/pesquisas-para-magistrados.html" title="Pesquisas para Magistrados" target="_blank">Pesquisas para Magistrados</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="CONCURSO">CONCURSO</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/concursos/concursosprovas_magistratura.htm" title="Para Ingresso na EMERJ">Para Ingresso na EMERJ</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="Licita&Ccedil;&Otilde;ES">Licita&ccedil;&otilde;ES</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacao_comunicado.html" title="Comunicado">Comunicado</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesnovas.htm" title="Novas">Licita&ccedil;&otilde;es Novas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoeshomologadas_ano.html" title="Homologadas">Licita&ccedil;&otilde;es Homologadas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesdesertas.htm" title="Desertas">Licita&ccedil;&otilde;es Desertas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesrevogadas.htm" title="Revogadas">Licita&ccedil;&otilde;es Revogadas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesfracassadas.htm" title="Fracassadas">Licita&ccedil;&otilde;es Fracassadas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacaoespenalidades.html" title="Penalidades">Penalidades</a></li>
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
        <h2 align="left">Eventos EMERJ</h2>
        <div align="left">
        <nav>
          <ul>          
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/eventos_emerj_new.html">P&aacute;gina Principal</a></li>
            <li><a href="http://emerj.com.br/ParticipanteNovo/ParticipanteBrasileiroEstrangeiro.php">Cadastro de Participantes</a></li>
            <li><a href="http://emerj.com.br/ParticipanteNovo/alterarCadastroParticipante.php">Altera&ccedil;&atilde;o de Cadastro</a></li>
            <li><a href="http://emerj.com.br/ParticipanteNovo/esqueceusenha.php">Esqueceu sua Senha?</a></li>
            <li><a href="http://emerj.com.br/ParticipanteNovo/index_cancela_inscricao.php.php">Cancelamento de Inscri&ccedil;&atilde;o</a></li>
            <li><a href="http://emerj.com.br/ParticipanteNovo/index_imprime_inscricao.php">2&ordf; via de Inscri&ccedil;&atilde;o</a></li>
            <li><a href="http://emerj.com.br/ParticipanteNovo/certificado/certificado.php">Certificado On-Line</a></li>
            <li><a href="http://emerj.com.br/ParticipanteNovo/comprovacaodehoras/index_comprovacao_horas.php">Comprova&ccedil;&atilde;o de Horas</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/regras_inscricoesonline.html">Regras e Inscri&ccedil;&otilde;es On-Line</a></li>
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
        <p class="row5"><strong><span style="font-size:18px">COMPROVAÇÃO DE HORAS</span></strong></p>	
            <br>		
<?php

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
?>
        <div class="story">
           
<form method="post" name="indexcanc" action="buscar_inscricoes_eventos_participante.php">

		<h2 align="left">
		  
		<p align="center" style="font-size:15px; font-family:'Titillium Web'">Leia mais: <span style="font-size:15px; font-family:'Titillium Web'"><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/regras_inscricoesonline.html" target="_blank" style="font-size:14px; font-family:'Titillium Web'">Regras e Inscri&ccedil;&otilde;es On-Line</a> e <a href="http://www.emerj.tjrj.jus.br/paginas/eventos/duvidaseperguntas.html" target="_blank" style="font-size:15px; font-family:'Titillium Web'">D&uacute;vidas e Perguntas Frequentes</a></span>.</p>
		<br>
		<table align="center" class="tabelanew_eventos">  


  <tr valign="baseline">
      <td colspan="3" align="center"><div align="center">Somente estar&atilde;o dispon&iacute;veis eventos presencial/webinar em que o participante tiver obtido presen&ccedil;a m&iacute;nima registrada igual ou superior a 75% da carga hor&aacute;ria total prevista, a partir dos hor&aacute;rios divulgados na programa&ccedil;&atilde;o, salvo quando o evento terminar antes do hor&aacute;rio previsto.<br />
<br />
A frequ&ecirc;ncia no evento estar&aacute; dispon&iacute;vel para download da Comprova&ccedil;&atilde;o de Horas a partir de <strong>5(cinco) dias &uacute;teis</strong> ap&oacute;s a data do evento presencial/webinar.<br />
<br />
O prazo para emiss&atilde;o da Comprova&ccedil;&atilde;o de Horas &eacute; de 1 (um) ano ap&oacute;s a data do evento presencial/webinar.<br />
<br />
Em caso de d&uacute;vidas, entre em contato atrav&eacute;s do e-mail <a href="mailto:emerjsite@tjrj.jus.br">emerjsite@tjrj.jus.br</a>.<br />
<br />
Para mais informa&ccedil;&otilde;es, acesse <a href="http://www.emerj.tjrj.jus.br/paginas/eventos/regras_inscricoesonline.html">Regras e Inscri&ccedil;&otilde;es On-Line</a> e <a href="http://www.emerj.tjrj.jus.br/paginas/eventos/regras_inscricoesonline_webinar.html">Regras e Inscri&ccedil;&otilde;es On-Line - Webinar</a>
</div><br /></td>
    </tr>



		
			<tr valign="baseline">
			  <td colspan="3" align="center"><div align="center">Digite seu EMAIL e senha. Em seguida, clique em &quot;Buscar&quot;.</div></td>
			</tr>    
			<tr valign="baseline">
			  <td colspan="3">&nbsp;</td>
			</tr>
			<tr valign="baseline">
			  <td align="right">EMAIL:</td>
			  <td><input name="email" type="email" required class="textoNormal" placeholder="Digite seu email" size="31" maxlength="140"/></td>
			  <td>&nbsp;</td>
			</tr>
			<tr valign="baseline">
			  <td align="right" nowrap="nowrap" class="textoT&iacute;tulo">&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			</tr>
			<tr valign="baseline">
			  <td align="right" nowrap="nowrap" class="textoT&iacute;tulo">Senha:</td>
			  <td><input name="txtSenha" required type="password" class="textoNormal" id="txtSenha" size="31" maxlength="50" /></td>
			  <td>&nbsp;</td>
			</tr>
			<tr valign="baseline">
			  <td align="right" nowrap="nowrap" class="textoT&iacute;tulo">&nbsp;</td>
			  <td>&nbsp;</td>
			  <td>&nbsp;</td>
			</tr>
			<tr valign="baseline">
			  <td align="right" nowrap="nowrap" class="textoT&iacute;tulo">&nbsp;</td>
			  <td><div align="center">
			      <span class="style1">
			         <input name="btBuscar" type="submit" class="button_eventos" id="btBuscar"  value="Buscar" />
			      </span>
				  </div>
			  </td>
			  <td>&nbsp;</td>
			</tr>
			<tr valign="baseline">
			  <td colspan="3" align="right" nowrap="nowrap" class="textoT&iacute;tulo">&nbsp;</td>
			</tr>
			<tr valign="baseline">
			  <td colspan="3" align="right" nowrap="nowrap" class="textoT&iacute;tulo">&nbsp;</td>
			</tr>
		  </table>
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
    <div class="redessociais">
        <a href="https://twitter.com/emerjoficial" target="_blank"><img src="images/redes_sociais/twitter.fw.png" /></a>
        <a href="https://www.youtube.com/user/EMERJeventos?feature=mhee" target="_blank"><img src="images/redes_sociais/youtube.fw.png" /></a>
        <a href="https://www.facebook.com/emerjoficial" target="_blank"><img src="images/redes_sociais/facebook.fw.png" /></a>
        <a href="https://www.instagram.com/emerjoficial/" target="_blank"><img src="images/redes_sociais/instagram.fw.png" /></a>
    </div>
  </div>
</div>
<!-- Footer -->
<div class="wrapper row4">
  <div id="copyright" class="clear">
    <p class="fl_right"><strong>Rua Dom Manuel, n&ordm; 25 - Centro - CEP 20010-090<br>
      (21) 3133-3369 / (21) 3133-3380</strong></p>
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