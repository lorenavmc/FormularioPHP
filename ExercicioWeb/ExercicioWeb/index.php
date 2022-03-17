<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <meta charset="utf-8">
	<title>Listar</title>
</head>
<body>
  <div>
    <h2>ALUNOS MATRICULADOS</h2>
  </div>
  	<?php
  	    //Para executar este aplicativo, criar no Mysql banco de dados "escola" e a tabela "aluno" por meio do comando: create table aluno (id int not null primary key, nome varchar(100) not null, endereco varchar(100) not null)

        // Inclui constantes para conexão ao BD
        include('conexao.php');
        // Buscar no BD todas os alunos cadastrados
        $pdo = new PDO(host,usuario,senha);
        $cmp = $pdo->prepare('select id, nome, endereco, dataNasc from aluno');
        $cmp->execute();

  		  
  		  // Cada iteração do loop abaixo obtém uma linha da tabela resultante do Select e envia seus dados ao navegador. $lin é uma vetor com índices correspondendo ao nome das colunas (id, nome, endereco) e contéudo com seus respectivos dados.
        $lin = $cmp->fetch(PDO::FETCH_ASSOC);
  		  while ($lin != null) {
  		  	echo 
          $lin['nome']." - ".
          $lin['endereco']." - ".
          $lin['dataNasc']." 

          <a href='edit.php?id=".$lin['id']."'>Editar</a> <a href='delete.php?id=".$lin['id']."'>Excluir</a><br/>";

          $lin = $cmp->fetch(PDO::FETCH_ASSOC);
  		  }

        echo "<br><a href='create.php'>Criar</a><br/><br/>";
	?>
</body>
</html>