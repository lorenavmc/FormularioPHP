<?php
  // O header abaixo causará o redirecionamento do navegador para index.php. Não se pode enviar qualquer conteúdo antes de um header.
	include('conexao.php');

	header("location:index.php");

	$pdo = new PDO(host, usuario,senha);

	$cmp = $pdo->prepare('INSERT INTO ALUNO VALUES(:id,:nome,:endereco,:dataNasc)');

	$cmp->execute([
		':id' => $_POST['txtid'], 
		':nome' => $_POST['txtnm'], 
		':dataNasc' => $_POST['txtdn'], 
		':endereco' => $_POST['txted']
	]);

  // INCLUIR AQUI O CÓDIGO PARA INSERIR UM NOVO ALUNO DO BD CONFORME PARÂMETROS DA REQUISIÇÃO ($_POST)

?>