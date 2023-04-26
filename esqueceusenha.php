<?php 
require_once('recursos/conexao.php'); 
require_once('recursos/enviaMail.php');

session_start();

$acao = NULL;

mysqli_select_db($conexao, $dbname);

$editFormAction = $_SERVER["PHP_SELF"];
if (isset($_SERVER["QUERY_STRING"]))
	$editFormAction .= "?" . htmlentities($_SERVER["QUERY_STRING"]);

/* ---------------------------------------------------------------------
   Ao pr o CPF e clicar em "Esqueci a senha"
--------------------------------------------------------------------- */
if ((isset($_POST["hdAcao"])) && (($_POST["hdAcao"] == "enviarSenha"))) {
	$email = $_POST['email'];
	$query_rsBusca = 	"SELECT codigo, nome, cpf, email, senha, ativo " .
						"FROM participante_novo " .
						"WHERE email = '$email' ";
	$rsBusca = mysqli_query($query_rsBusca, $evento) or die(mysqli_error($conexao));
	$row_rsBusca = mysqli_fetch_assoc($rsBusca);
	$totalRows_rsBusca = mysqli_num_rows($rsBusca);

	$_SESSION["codParticipante"] = $row_rsBusca["codigo"];
	$_SESSION["nome"] = $row_rsBusca["nome"];
	$_SESSION["cpf"] =  $row_rsBusca["cpf"];
	$_SESSION["email"] = $row_rsBusca["email"];
	$_SESSION["codAtivacao"] = $row_rsBusca["senha"];
	$_SESSION["ativo"] = $row_rsBusca["ativo"];

	// No cadastrado
	if ($totalRows_rsBusca == 0) { 
		$acao = "naoEncontrado";
	}

	if ($totalRows_rsBusca == 1) { 
		if ($_POST["hdAcao"] == "enviarSenha") {
			novaSenha();
			$acao = "novaSenha";
		}
	}
}

?>
	
<script language="javascript">
	function buscaParticipante() {
		if (validaCPF()) {
			document.form1.hdAcao.value = "buscar";
			document.form1.submit();
		} else {
			alert("O campo CPF n�o foi preenchido corretamente.");
		}
	}
	
	function senhaParticipante() {
		if (validaCPF()) {
			document.form1.hdAcao.value = "enviarSenha";
			document.form1.submit();
		} else {
			alert("O campo CPF est� incorreto.");
		}
	}

	function alterarDados() {
		if (validaCPF()) {
			if (document.form1.txtSenha.value != "") {
				document.form1.hdAcao.value = "alterar";
				document.form1.submit();
			} else {
				alert("O campo SENHA deve ser preenchido corretamente\n");
			}
		} else {
			alert("O campo CPF est� incorreto.");
		}
    }
	
	function cadastrarDados() {
		if (validaCPF()){
			document.form1.hdAcao.value = "cadastrar";
			document.form1.submit();
		} else {
			alert("O campo CPF est� incorreto.");
		}
	}
</script>

<link href="css/default_eventos_new.css" rel="stylesheet" type="text/css" />
<link href="css/estilomenuvertical.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="recursos/validador.js"></script>

<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/controledeeventos.dwt" codeOutsideHTMLIsLocked="false" -->
<head><meta charset="windows-1252">
<title>.: ESCOLA DA MAGISTRATURA DO ESTADO DO RIO DE JANEIRO - EMERJ :.</title>


<meta http-equiv="X-UA-Compatible" content="IE=edge">
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

<style type="text/css">
@font-face {
     font-family:"Titillium Web";
     src:url(../fonte/TitilliumWeb-Regular.ttf);
	 font-weight:normal;
	 font-style:normal;
}

body {
    font-family:"Titillium Web";  
	font-weight:normal;
	font-style:normal;
	font-size: 15px;
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
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/curso_especializacao/cursoespecializacaoemdireito.html" title="Curso de Especializa��o em Direito P�blico e Privado">Curso de Especializa&ccedil;&atilde;o em </br> Direito P&uacute;blico e Privado<br></a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/curso_especializacao/cursodeespecializacaointro.html" title="Curso de Especializa&ccedil;&atilde;o nas </br> &Aacute;reas do Direito </br> P&oacute;s-Gradua��o <i>Lato Sensu</i>">Curso de Especializa&ccedil;&atilde;o nas </br> &Aacute;reas do Direito </br> P&oacute;s-Gradua&ccedil;&atilde;o <i>Lato Sensu</i></a></li>

          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/premerj/premerj.html" title="PREMERJ">PREMERJ</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/cursos/cursodeextensao/cursodeextensaoemerj.html" title="Cursos de Extens&atilde;o">Cursos de Extens&atilde;o</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/magistrados/magistrados.html" title="Cursos Oficiais para Magistrados">Cursos Oficiais para<br>Magistrados</a></li>
            <li><a href="http://www.emerj.tjrj.jus.br/cursos_livres/direito_eletronico/curso_livre_emerj.html" title="Cursos Livres" target="_blank">Cursos Livres</a></li>
        </ul>
      </li>
      <li><a class="drop" href="#" title="BIBLIOTECA">BIBLIOTECA</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/principal_biblioteca.html" title="Biblioteca e Videoteca">Biblioteca e Videoteca</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/biblioteca_videoteca/normasbiblioteca.htm" title="Normas de Atendimento">Normas de Atendimento</a></li>
          <li><a href="http://emerj.bnweb.org/scripts/bnportal/bnportal.exe/index#acao=geral&uv=vbibltip1:tipos:descricao;vbibluni0:unidades:nome_unidade;vbiblidi0:idiomas:nome;vbiblaco0:areas:nome&alias=geral&xsl=consulta" title="Consulta on-line ao acervo" target="_blank">Consulta on-line ao acervo</a></li>
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
      <li><a class="drop" href="#" title="Licita&ccedil;&otilde;es">LICITA&Ccedil;&Otilde;ES</a>
        <ul>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacao_comunicado.html" title="Comunicado">Comunicado</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesnovas.htm" title="Licita&ccedil;&otilde;es Novas">Licita&ccedil;&otilde;es Novas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoeshomologadas_ano.html" title="Licita&ccedil;&otilde;es Homologadas">Licita&ccedil;&otilde;es Homologadas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesdesertas.htm" title="Licita&ccedil;&otilde;es Desertas">Licita&ccedil;&otilde;es Desertas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesrevogadas.htm" title="Licita&ccedil;&otilde;es Revogadas">Licita&ccedil;&otilde;es Revogadas</a></li>
          <li><a href="http://www.emerj.tjrj.jus.br/paginas/licitacao/licitacoesfracassadas.htm" title="Licita&ccedil;&otilde;es Fracassadas">Licita&ccedil;&otilde;es Fracassadas</a></li>
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
            <li><a href="http://www.emerj.tjrj.jus.br/paginas/eventos/duvidaseperguntas.html">D&uacute;vidas e Perguntas Frequentes - Presencial</a></li>
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
              Qualquer problema, sugest&atilde;o ou dificuldade na realiza&ccedil;&atilde;o da inscri&ccedil;&atilde;o, enviar&nbsp;<em>e-mail</em>&nbsp;para <a href="mailto:emerjsite@tjrj.jus.br">emerjsite@tjrj.jus.br</a>, nos dias &uacute;teis, das 10 &agrave;s 18 hs, relatando o problema e informando seu nome completo e CPF.
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

<div id="content"><!-- end #sidebar -->
	<div id="main">
<div id="welcome" class="post">
        <p class="row5"><strong><span style="font-size:18px">ESQUECEU SUA SENHA?</span></strong></p>
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
    	$browser = '�pera for iOS.';
	}  
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE ||
    	strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) {
		$browser = 'Internet Explorer';	
	}
  
  if (($browser == "Mozilla Firefox") || ($browser == "Firefox for iOS")){ 
  echo "<span style='color:#F00'><center>O sistema de eventos da EMERJ n&atilde;o &eacute; compat&iacute;vel com o navegador Mozilla Firefox.<br>N&atilde;o utilize o navegador Mozilla Firefox, pois poder&atilde;o surgir erros no cadastro e inscri&ccedil;&atilde;o.<br>Recomendamos que acesse atrav&eacute;s do navegador <strong>Internet Explorer</strong> ou <strong>Google Chrome</strong>.</center>";
  } else {
  	echo "";
  }
?>
        <div class="story">
          <div align="center">             
            <form method="post" name="form1" action="<?php echo $editFormAction; ?>">

        <div align="justify" class="style1 style5">
          <?php 
	if ($acao == "ativar") {
		echo ("<script language='javascript'>alert('Seu cadastro n�o foi ativado.');</script>
			<p><b>Seu cadastro n&atilde;o foi ativado.</b>
			<br />Foi reenviado um e-mail informando como ativ&aacute;-lo.<br />
			   Verifique dentro de alguns instantes e siga as instru&ccedil;&otilde;es para ativ�-lo.<br />
			   Caso n&atilde;o receba o e-mail nos pr&oacute;ximos 15 minutos, verifique as configura��es de sua caixa de entrada e desabilite filtros de spam (lixo eletr&ocirc;nico) para o endere�o <a href='mailto:emerjsite@tjrj.jus.br'>emerjsite@tjrj.jus.br</a><br />
			   Se possuir filtro anti-spam do UOL (ou similar), seu e-mail ser&aacute; enviado em at&eacute; 24 horas &uacute;teis.</p>
		<hr><a href='http://www.emerj.tjrj.jus.br/index.html'>voltar</a>");
	}
	if ($acao == "senha") { 
		echo("<p>A senha est� incorreta.</p>
		<hr><a href='participante.php'>voltar</a>");
	}
	if ($acao == "naoEncontrado") {
		echo("<p>Usu&aacute;rio n&atilde;o encontrado. <br />
		&Eacute; necess&aacute;rio realizar o <a href='http://emerj.com.br/evento/cadastro.php'>Cadastro de Participantes</a>.</p>
		<hr><a href='participante'>voltar</a>");
	}
	if ($acao == "novaSenha") {
		echo("<p>Foi enviado um e-mail com as instru&ccedil;&otilde;es de como definir uma nova senha.<br />
		Verifique seu e-mail dentro de alguns instantes e siga os procedimentos.<br />
		Caso n&atilde;o receba o e-mail nos pr&oacute;ximos 15 minutos, verifique as configura&ccedil;&otilde;es de sua caixa de entrada e desabilite filtros de spam (lixo eletr&ocirc;nico) para o endere&ccedil;o <a href='mailto:emerjsite@tjrj.jus.br'>emerjsite@tjrj.jus.br</a><br />
		Se possuir filtro anti-spam do UOL (ou similar), seu e-mail ser&aacute; enviado em at&eacute; 24 horas &uacute;teis.</p>
		<hr><a href='http://www.emerj.tjrj.jus.br/index.html'>voltar</a>");
	} ?>
          <input name="hdAcao" type="hidden" id="hdAcao" value="<?php if (isset($_POST["hdAcao"])) echo ($_POST["hdAcao"]); ?>"/>
          </div>
  
  		<table border="0" align="center" class="tabelanew_eventos">				
			<tr valign="baseline">
				  <td colspan="3" align="center"><div align="center" class="style6">Digite seu CPF e em seguida, clique em &quot;Enviar&quot;.<br /><br />Um e-mail com as instru&ccedil;&otilde;es de como definir uma nova senha ser&aacute; enviado. Verifique seu e-mail dentro de alguns instantes e siga os procedimentos.<br /></div></td>
			  </tr>
				<tr valign="baseline">
				  <td align="center">&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
		      </tr>
				<tr valign="baseline">
				  <td align="right" nowrap="nowrap" class="textoT&iacute;tulo" valign="middle">EMAIL:</td>
			      <td align="right" nowrap="nowrap" class="textoT&iacute;tulo"><input name="email" required type="email" class="textoNormal" size="20" maxlength="140"/></td>
				  <td align="right" nowrap="nowrap" class="textoT&iacute;tulo">&nbsp;</td>
			  </tr>
				<tr valign="baseline">
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
				  <td>&nbsp;</td>
			  </tr>
				<tr valign="baseline">
				  <td align="right" nowrap="nowrap" class="textoT&iacute;tulo">&nbsp;</td>
				  <td><div align="center">
                    <input name="btEnviar" type="button" class="button_eventos" id="btEnviar" onClick="senhaParticipante();" value="Enviar" />
                  </div></td>
				  <td>&nbsp;</td>
		      </tr>
				<tr valign="baseline">
				  <td height="46" colspan="3" align="right" nowrap="nowrap" class="textoT&iacute;tulo">&nbsp;</td>
			  </tr>
		</table>

		<div align="center"></div>
</form>            
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