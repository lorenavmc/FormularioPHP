<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar</title>
</head>
<body>
  <h2>EDITAR DADOS</h2>
  <br>
   <?php
      // Inclui constantes para conexão ao BD
      include('conexao.php');
      // Buscar no BD o aluno conforme parâmetro ID
      $pdo = new PDO(host,usuario,senha);
      $cmp = $pdo->prepare('select id, nome, endereco from aluno where id=:id');
      $cmp->execute([':id'=>$_GET['id']]);
      $aluno = $cmp->fetch(PDO::FETCH_ASSOC);
   ?>
   <form action="update.php" method="post">
      <div>
        <input type="hidden" name="txtid" value="<?= $aluno['id'] ?>"/>
      </div>
      <div>
        <label>Nome<input type="text" name="txtnm" maxlength="100" pattern="[A-Za-z ]+" value="<?= $aluno['nome'] ?>"/></label>
      </div>
      <div>
        <label>Data Nascimento<input type="date" name="txtdn" maxlength="100" pattern="[0-9]+"/></label>
     </div>
      <div>
        <label>Endereço<input type="text" name="txted" maxlength="100" pattern="[A-Za-z ]+" value="<?= $aluno['endereco'] ?>"/></label>
      </div>
      <div>
        <input type="submit" value="Enviar"/>
        <input type="reset" value="Limpar"/>
        <a href="index.php">Voltar</a>
      </div>
   </form>
</body>
</html>