<?php
  // O header abaixo causará o redirecionamento do navegador para index.php. Não se pode enviar qualquer conteúdo antes de um header.
	include('conexao.php');

	header("location:index.php");

		$pdo = new PDO(host, usuario,senha);

		$cmp = $pdo->prepare('DELETE from ALUNO WHERE id =:prx');

		$cmp->execute([':prx' => $_GET['id']]);

  // INCLUIR AQUI O CÓDIGO PARA EXCLUIR ALUNO DO BD

?>