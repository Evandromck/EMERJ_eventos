<?php 
require_once('conexao.php'); 
//require_once('recursos/enviaMail.php');

$exibir = NULL;
$ocultar = NULL;
$acao = NULL;

session_start();

header("Content-Type: text/html; charset=ISO-8859-1", true);
	
$editFormAction = $_SERVER["PHP_SELF"];
if (isset($_SERVER["QUERY_STRING"]))
	$editFormAction .= "?" . htmlentities($_SERVER["QUERY_STRING"]);

// pesquisa o usuário no banco

//reimprimir
	if ((isset($_POST["hdAcao"])) && ($_POST["hdAcao"] == "reimprimir")) {
		$_SESSION["codEvento"] = $_POST["hdCodEvento"];
		$insertGoTo = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"])
								. "/confirm.php";
		header(sprintf("Location: %s", $insertGoTo));
	}

?>

<script language="javascript">
	function buscaParticipante() {
		if (validaCPF()) {
			document.form1.hdAcao.value = "buscar";
			document.form1.submit();
		} else {
			alert("O campo CPF está incorreto.");
		}
	}

	function reimprimeInscricao() {
		document.form1.hdAcao.value = "reimprimir";
		if (document.form1.rdreimpressao.length) {
		    for (i=0;i<document.form1.rdreimpressao.length;i++){ 
			    if (document.form1.rdreimpressao[i].checked) 
					document.form1.hdCodEvento.value = document.form1.rdreimpressao[i].value;
			}
		} else {
			document.form1.hdCodEvento.value = document.form1.rdreimpressao.value;	
		}	
		document.form1.submit();
	}
	
	function senhaParticipante() {
		if (validaCPF()) {
			document.form1.hdAcao.value = "enviarSenha";
			document.form1.submit();
		} else {
			alert("O campo CPF está incorreto.");
		}
	}
</script>

<link href="css/default_eventos_new.css" rel="stylesheet" type="text/css" />
<link href="css/estilomenuvertical_old.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="recursos/validador.js"></script>

<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/controledeeventos.dwt" codeOutsideHTMLIsLocked="false" -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>.: ESCOLA DA MAGISTRATURA DO ESTADO DO RIO DE JANEIRO - EMERJ :.</title>


<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<link href="css/novolayout_responsivo.css" rel="stylesheet" type="text/css" media="all">
<link href="css/header_responsivo.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="layout/styles/print.css" media="print" />

<!--[if lt IE 9]>
<link href="layout/styles/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
<script src="layout/scripts/ie/css3-mediaqueries.min.js"></script>
<script src="layout/scripts/ie/html5shiv.min.js"></script>
<![endif]-->

<!--[if IE]><link rel="shortcut icon" href="img/favicon.ico"><![endif]-->
<link rel="icon" href="favicon.ico" />

</head>
<body class="">
<div class="wrapper row1">
    <div class="artdirection" title="Escola da Magistratura do Estado do Rio de Janeiro" align="center" id="centro">
    <a href="http://www.emerj.tjrj.jus.br/index.html"><div align="center"><span style="position: relative; margin-right: 55%; top: 45px;"><img src="images/logo_emerj_branco.png"></span></div></a>
  <header id="header" class="full_width clear">
    <div id="hgroup">
    </div>
    <!--<div id="header-contact">
      <ul class="list none">
        <li><a href="paginas/contato.html"><strong>Fale Conosco</strong></a></li>
        <li><span class="icon-phone"></span><strong>(21) 3133-3369</strong></li>
      </ul>
    </div>-->
  </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      <!--<li class="active"><a href="index.html" title="Principal">Homepage</a></li>-->
      <li><a class="drop" href="#" title="A ESCOLA">A ESCOLA</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/historia.html" title="História">História</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/visao-missao-valores.html" title="Missão, Visão e Valores">Missão, Visão e Valores</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/programa-de-integridade-da-EMERJ/programa-de-integridade-da-EMERJ.html" title="Programa de Integridade da EMERJ">Programa de Integridade </br> da EMERJ</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/diretoria.html" title="Diretoria">Diretoria</a></li>
           <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/comissoes.html" title="Comissões">Comissões</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/administracao.html" title="Administração">Administração</a></li>
           <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/nucleos/nucleos.htm" title="Núcleos de Representação">Núcleos de Representação</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/espacoemerj/espacoemerj.htm" title="Espaços EMERJ">Espaços EMERJ</a></li>
         <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/regimento/Regimento_Interno_Publicacao_210817.pdf" target="_blank" title="Regimento Interno">Regimento Interno</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/iso9001/iso.htm" title="Certificação NBR ISO 9001:2015">Certificação NBR ISO 9001:2015</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/localizacao.html" title="Localização">Localização</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/aescola/contatos/contatos.htm" title="Contatos">Contatos</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="CURSOS">CURSOS</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/curso_especializacao/cursoespecializacaoemdireito.html" title="Curso de Especialização em </br> Direito Público e Privado">Curso de Especialização em </br> Direito Público e Privado<br></a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/curso_especializacao/cursodeespecializacaointro.html" title="Curso de Especialização nas </br> Áreas do Direito </br> Pós-Graduação <i>Lato Sensu</i>">Curso de Especialização nas </br> Áreas do Direito </br> Pós-Graduação <i>Lato Sensu</i></a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/premerj/premerj.html" title="PREMERJ">PREMERJ</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/cursodeextensao/cursodeextensaoemerj.html" title="Cursos de Extensão">Cursos de Extensão</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/magistrados/magistrados.html" title="Cursos Oficiais para Magistrados">Cursos Oficiais para<br>Magistrados</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/cursos_livres/cursos_livres.html" title="Cursos Livres">Cursos Livres</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="BIBLIOTECA">BIBLIOTECA</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/principal_biblioteca.html" title="Biblioteca e Videoteca">Biblioteca e Videoteca</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/historico.html" title="Histórico">Histórico</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/normasbiblioteca.htm" title="Normas de Atendimento">Normas de Atendimento</a></li>
          <li><a class="submenuseta" href="#" title="Consulta on-line aos acervos">Consulta on-line aos acervos</a>
          	<ul>
          		<li><a href="http://emerj.bnweb.org/scripts/bnportal/bnportal.exe/index#acao=geral&uv=vbibltip1:tipos:descricao;vbibluni0:unidades:nome_unidade;vbiblidi0:idiomas:nome;vbiblaco0:areas:nome&alias=geral&xsl=consulta" title="Consulta on-line ao acervo BNWEB" target="_blank">Consulta on-line ao <br> acervo BNWEB</a></li>
          		<li><a href="http://www4.tjrj.jus.br/biblioteca/index.html" title="Consulta on-line ao acervo Sophia" target="_blank">Consulta on-line ao <br> acervo Sophia</a></li>
          	</ul>
          </li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/autenticacaodedocumentos.html" title="Autenticação de Documentos">Autenticação de Documentos</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/monografiadosalunos.htm" title="Monografias dos Alunos">Monografias dos Alunos</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/magistrados/paginas/pesquisasparamagistrados/pesquisas-para-magistrados.html" title="Pesquisas para Magistrados">Pesquisas para Magistrados</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="CONCURSO">CONCURSO</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/concursos/concurso-publico-para-selecao-e-ingresso-na-emerj.html" title="Para Ingresso na EMERJ">Para Ingresso na EMERJ</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/concursos/concurso-emerj-provas-anteriores.html" title="Provas Anteriores">Provas Anteriores</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="Licitações">LICITAÇÕES</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacao_comunicado.html" title="Comunicado">Comunicado</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesnovas.htm" title="Licitações Novas">Licitações Novas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoeshomologadas_ano.html" title="Licitações Homologadas">Licitações Homologadas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesdesertas.htm" title="Licitações Desertas">Licitações Desertas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesrevogadas.htm" title="Licitações Revogadas">Licitações Revogadas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesfracassadas.htm" title="Licitações Fracassadas">Licitações Fracassadas</a></li>
		  <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/contratos_convenios_termosemgeral/contratos_convenios_termosemgeral.htm">Contratos, Convênios e <br>Termos em Geral</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacaoespenalidades.html" title="Penalidades">Penalidades</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/registroPreco.htm">Registro de Preço</a></li> 
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/atestados/atestados.html">Atestados</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/dispensa/dispensa.htm">Dispensa</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="FÓRUM PERMANENTE">FÓRUM PERMANENTE</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/forunspermanentes/forunspermanentes.htm" title="Objetivo">Objetivo</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/forunspermanentes/areasdodireito.htm" title="Áreas do Direito">Áreas do Direito</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/forunspermanentes/regulamentacaoforumpermanente.htm" title="Regulamentação">Regulamentação</a></li>
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
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/eventos_emerj_gratuitos.html">Página Principal</a></li>
            <li><a href="http://emerj.com.br/evento/cadastro.php">Cadastro de Participantes</a></li>
            <li><a href="http://emerj.com.br/evento/alteracadastro.php">Alteração de Cadastro</a></li>
            <li><a href="http://emerj.com.br/evento/esqueceusenha.php">Esqueceu sua Senha?</a></li>
            <li><a href="http://emerj.com.br/evento/cancelainscricao.php">Cancelamento de Inscrição - Evento Presencial</a></li>
            <li><a href="http://emerj.com.br/evento/reimpressaoinscricao.php">2ª via de Inscrição</a></li>
            <li><a href="http://emerj.com.br/evento/certificado/certificado.php">Certificado On-Line</a></li>
            <li><a href="http://emerj.com.br/evento/comprovacaodehoras/comprovacaodehoras.php">Comprovação de Horas</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/regras_inscricoesonline.html">Regras e Inscrições On-Line - Presencial</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/regras_inscricoesonline_webinar.html">Regras e Inscrições On-Line - Webinar</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/duvidaseperguntas.html">Dúvidas e Perguntas Frequentes - Presencial</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/politicaprivacidade.html">Política de Privacidade</a></li>
          </ul>
        </nav>
        </div>
        <!-- /nav -->
       <section>
          <h2 align="left">Participantes</h2>
          <div align="justify">
            <address>
            <p align="justify">Recomendamos que utilize o navegador <strong>Internet Explorer</strong> ou <strong>Google Chrome</strong>. Não utilize dispositivos móveis e os navegadores Mozilla Firefox e Safari, pois poderão surgir erros nas etapas de cadastro, inscrição e cancelamento de inscrição.</p>
            <br>
            <p align="justify">Programação dos eventos disponíveis para as <strong>inscrições <em>on-line</em></strong>; as inscrições serão encerradas às 0h:00min do dia do evento.</p>
            <br>
            <p align="justify">Na primeira inscrição, será necessário preencher o <strong>Cadastro de Participante</strong>, com dados do usuário, senha e um e-mail válido, para o qual será enviada uma mensagem para <strong>ativação e validação do cadastro</strong>.</p>
            <br>
            <p align="justify">Somente após a <strong>validação do cadastro</strong> o participante poderá realizar <strong>inscrições <em>on-line</em></strong> nos eventos da Escola.</p>
            <br>
            <p align="justify">Para realizar inscrições, o participante deve clicar no ícone do evento selecionado e, em seguida, no ícone "<strong>Inscreva-se</strong>" e digitar os dados solicitados.</p>
            <br>
            <p align="justify">Após a efetivação da inscrição, será emitido o <strong>Comprovante de Inscrição</strong>, com código de barras, que deverá ser impresso pelo participante e apresentado no evento.</p>
            <br>
            <hr>
            <br>
   <p align="justify"><strong><u>Webinar</u></strong></p>
   <p align="justify">As inscrições são encerradas após o início do Webinar.</p>
<p align="justify">Para se inscrever é necessário informar seu Nome, Sobrenome, E-mail e *CPF no link de inscrição na Plataforma Zoom.</p>
<p align="justify">Ao realizar a inscrição, o(a) participante está ciente que os dados informados na Plataforma Zoom estão integrados ao sistema de eventos da EMERJ para fins de solicitação de certificado e comprovação de horas.</p>
<p align="justify"><strong>*Para solicitação de certificado on-line ou comprovação de horas, é necessário informar <u>CPF válido</u>.</strong></p>
            </address>
          </div>
        </section>
         <section>
          <h2 align="left">Contato</h2>
          <div align="justify">
            <address>
              Qualquer problema, sugestão ou dificuldade na realização da inscrição, enviar <em>e-mail</em> para <a href="mailto:emerjsite@tjrj.jus.br">emerjsite@tjrj.jus.br</a>, nos dias úteis, das 10 às 18 hs, relatando o problema e informando seu nome completo e CPF.
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
    <p class="row5"><strong><span style="font-size:18px">IMPRESSÃO DA 2ª VIA DE INSCRIÇÃO</span></strong></p>
        <div class="story">
          <div align="center">
             
            <?
	  
	  if ((isset($_POST["hdAcao"])) && ($_POST["hdAcao"] == "buscar")) {
	$evento->select_db($dbname);
	$dataAtual = date('Y-m-d');
	$query_rsBusca = ("SELECT DISTINCT p.codigo AS codParticipante,"
								. "p.nome AS nome,"
								. "p.senha as senha,"
								. "p.cpf AS cpf, "
								. "e.codigo AS codEvento,"
								. "e.nome AS evento "
						. "FROM inscricoes i, "
							. "participante p, "
							. "evento e, "
							. "porta o "
						. "WHERE (i.codParticipante = p.codigo) AND "
								. "(i.codEvento = e.codigo) AND "
								. "(e.codigo = o.codEvento) AND "
								. "(i.codEvento = o.codEvento) AND "
								. "((o.data >= CURDATE()) OR " /* exibe os eventos que ainda vão ocorrer em que o participante está inscrito*/
							    . "(o.data BETWEEN CURDATE() - INTERVAL 12 MONTH AND CURDATE())) AND " /* exibe apenas os eventos inscrito há 1 ano atrás */
								. "cpf = " . str_replace("-","",(str_replace(".","",$_POST["txtMascaraCpf"])))
								. " ORDER BY o.data DESC");
	$rsBusca = $evento->query($query_rsBusca) or die($mysqli->error);
	$row_rsBusca = $rsBusca->fetch_row();
	$totalRows_rsBusca = $rsBusca->num_rows;
      
      if ($totalRows_rsBusca > 0) {
		// verifica a senha
		if  ((isset($_POST["txtSenha"])) && ($row_rsBusca[2] != strtoupper(md5($_POST["txtSenha"])))) {
			$acao = "senha";
			echo("<div align='center'><br><br>A senha está incorreta.</div><br><a href='http://emerj.com.br/evento/esqueceusenha.php'>Esqueceu sua Senha?</a><br><br><hr>");
			echo("<div align='center'><br><a href='/evento/reimpressaoinscricao.php'>voltar para a página da 2ª via de Inscrição</a><br><br><br></div>");
			$ocultar = true;
		} else {
			$_SESSION["codParticipante"] = $row_rsBusca[0];
			$exibir = true;
			$ocultar = true;
		}
	} else {
		echo("<div align='center'><br><br>Nenhuma inscrição encontrada.</div><br><br><hr>");
		$ocultar = true;
		echo("<div align='center'><br><br><a href='/evento/reimpressaoinscricao.php'>voltar</a><br><br><br></div>");
	}
}

?>

<form method="post" name="form1">
  <h2>
  <input name="hdCodParticipante" type="hidden" id="hdCodParticipante" value="<? if (isset($row_rsBusca[0])) echo ($row_rsBusca[0]); else if(isset($_POST["hdCodParticipante"])) echo($_POST['hdCodParticipante']); ?>"/>
  <input name="hdAcao" type="hidden" id="hdAcao" value="<? if (isset($_POST["hdAcao"])) echo ($_POST["hdAcao"]); ?>"/>
  <input name="hdCodEvento" type="hidden" id="hdCodEvento" value="0" />
  <?
if ($ocultar == NULL) { ?>
  </h2>
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
  echo "<span style='color:#F00'><center>O sistema de eventos da EMERJ não é compatível com o navegador Mozilla Firefox.<br>Não utilize o navegador Mozilla Firefox, pois poderão surgir erros no cadastro e inscrição.<br>Recomendamos que acesse através do navegador <strong>Internet Explorer</strong> ou <strong>Google Chrome</strong>.</center>";
  } else {
  	echo "";
  }
?><br>
  <table border="0" align="center" class="tabelanew_eventos">
    <tr valign="baseline">
      <td colspan="3" align="center"><div align="center">Digite seu CPF e senha. Em seguida, clique em "Buscar".</div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="textoTítulo"> </td>
      <td > </td>
      <td > </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="textoTítulo">CPF:</td>
      <td><input name="txtMascaraCpf" type="text" class="textoNormal" onKeyPress="mascara_cpf(event, this.value);" value="<? if (isset($_SESSION["cpf"])) echo(substr($_SESSION["cpf"], 0, 3) . "." . substr($_SESSION["cpf"], 3, 3) . "." . substr($_SESSION["cpf"], 6, 3) . "-" . substr($_SESSION["cpf"], 9, 2)); ?>" size="31" maxlength="14"/></td>
      <td> </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="textoTítulo"> </td>
      <td> </td>
      <td> </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="textoTítulo">Senha:</td>
      <td><input name="txtSenha" type="password" class="textoNormal" id="txtSenha" size="31" maxlength="50" /></td>
      <td> </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="textoTítulo"> </td>
      <td> </td>
      <td> </td>
    </tr>
    <tr valign="baseline">
      <td> </td>
      <td><div align="center">
        <input name="btBuscar" type="button"  class="button_eventos" id="btBuscar" onClick="buscaParticipante();" value="Buscar" />
      </div></td>
      <td> </td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap="nowrap" class="textoTítulo"></td>
      </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap="nowrap" class="textoTítulo"> </td>
    </tr>
  </table>

  <? } ?>
  <? 
	if ($acao == "naoEncontrado") {
		echo("<p>Usuário não encontrado. <br />
		É necessário realizar o cadastramento primeiro.</p>
		<hr><a href='participante'>voltar</a>");
	}
	if ($acao == "novaSenha") {
		echo("<p>Foi enviado um e-mail com as instruções de como definir uma nova senha. <br />
		Verifique seu e-mail dentro de alguns instantes e siga os procedimentos.<br />
		Caso não receba o e-mail nos próximos 15 minutos, verifique as configurações de sua caixa de entrada e desabilite filtros de spam (lixo eletrônico) para o endereço <a href='mailto:emerjsite@tjrj.jus.br'>emerjsite@tjrj.jus.br</a><br />
		Se possuir filtro anti-spam do UOL (ou similar), seu e-mail será enviado em até 24 horas úteis.</p>
		<hr><a href='http://www.emerj.tjrj.jus.br/index.html'>voltar</a>");
	}
?>
  <?	if ($exibir == true) { ?>
  
	<table border="0" align="center" class="tabelanew_eventos">
    	<tr valign="baseline">
    		<td>
				<div align="right" class="textoTítulo"><div align="left">Nome</div></div>			</td>
       		<td>
				<div align="left"><span class="textoTítulo">CPF</span></div></td>
     	</tr>
     	<tr valign="baseline">
       		<td class="textoTítulo"><? echo($row_rsBusca[1]); ?>
            </td>
		    <td class="textoTítulo"><? echo(substr($row_rsBusca[3], 0,3) . "." . substr($row_rsBusca[3], 3,3) . "." . substr($row_rsBusca[3], 6,3) . "-". substr($row_rsBusca[3], 9,2)); ?>	
	  	    </td>
	  </tr>
       <tr><td colspan=2> </td>
       </tr>
</table>
<? 
	echo ("<b>Selecione o evento que deseja reimprimir o comprovante de inscrição:</b><br><br>"); 
 	echo ("<table border='0' align='center' class='tabelanew_eventos' style='border:#999 1px solid;'>");
	echo ("\n<tr style='border:#999 1px solid;'>");
	echo ("\n<td width='50' align='center'><strong>Data</strong></td>");
	echo ("\n<td width='250'><strong>Nome do evento</strong></td>");
	echo ("\n<td width='20'><strong>  </strong></td>");
	 do { 
	 	echo ("\n<tr style='border:#999 1px solid;'>");
		echo ("<td width='50'>");
		$codigoEvento = $row_rsBusca[4];
		$selectSQLDatas = sprintf("SELECT distinct (data)" .
						 "FROM    porta " .
						 "WHERE   codEvento = %s ORDER BY data ASC", $codigoEvento);

		$evento->select_db($dbname);
		$ResultDatas = $evento->query($selectSQLDatas) or die($mysqli->error);
		$row_Datas = $ResultDatas->fetch_assoc();
		$totalRows_Datas = $ResultDatas->num_rows;
		
		if ((isset($totalRows_Datas)) && ($totalRows_Datas > 0)) {
			do {  
				$datas = explode('-', $row_Datas["data"]);
				echo $datas[2] . "/" . $datas[1] . "/" . $datas[0] . "<br>";
				if (strcmp(($datas[2] . "/" . $datas[1] . "/" . $datas[0]), substr($dataTemp, strlen($dataTemp) - 10, 10)) == true) {
					if ($dataTemp == NULL) {
						$dataTemp = $dataTemp . $datas[2] . "/" . $datas[1] . "/" . $datas[0];
					} else {
						$dataTemp = $dataTemp . " - " . $datas[2] . "/" . $datas[1] . "/" . $datas[0];
					}
				}
			} while ($row_Datas = $ResultDatas->fetch_assoc());
			$rowsDatas = $ResultDatas->num_rows;
			if($rowsDatas > 0) {
				$ResultDatas->data_seek(0);
				$row_Datas = $ResultDatas->fetch_assoc();
			}
		}			
	 	echo ("</td>");
		echo ("\n<td>$row_rsBusca[5]</td>");
		echo ("\n<td width='50' align='center'><input name='rdreimpressao' type='radio' value='$row_rsBusca[4]' /></td>"); 
		echo ("\n</tr style='border:#999 1px solid;'>");
	} while ($row_rsBusca = $rsBusca->fetch_row());
	echo ("</table>");
	echo("<div align='center'><input name='btImprimir' class='button_eventos' type='button' id='btImprimir' onClick='reimprimeInscricao();' value='Reimprimir' /></div>");
?>
</form>

<? } ?>
            
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
        <p> </p>
</figcaption>
    <!-- ####################################################################################################### --></div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>

<!-- Footer -->
<div class="wrapper row2">
  <div id="footer" class="clear">
  </div>
</div>
<!-- Footer -->
<div class="wrapper row4">
  <div id="copyright" class="clear">
    <p class="fl_right"><strong>Rua Dom Manuel, nº 25 - Centro - CEP 20010-090<br>
      (21) 3133-3369 / (21) 3133-3380</strong></p>
    <p><strong>ESCOLA DA MAGISTRATURA DO ESTADO DO RIO DE JANEIRO - EMERJ<br>
    <em><strong>Este site foi desenvolvido para ser melhor visualizado em resolução de 1920x1080 no Internet Explorer ou Google Chrome</strong></em></strong></p>
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