<?php
// Incluindo arquivo de conexão/configuração
require('conexao.php');
require_once('Login.php');
$db=conectar("lronetto_ssa");
 
// Instanciando novo objeto da classe Login
$objLogin = new Login('usuario','Id','login','pass');
 
// Recuperando informações enviadas
$login = $_POST['login'];
$senha = $_POST['senha'];
 
// Se conseguir encontrar o usuário e a senha estiver correta
if ($objLogin->logar($login, $senha)){
	$query = mysql_query("SELECT * FROM usuario WHERE Id = {$objLogin->getID()}");
	$usuario = mysql_fetch_object($query);
    	echo "adfaisjdfiuasdf";
	}
	else echo false;
?>
