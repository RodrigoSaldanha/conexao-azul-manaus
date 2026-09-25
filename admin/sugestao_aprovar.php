<?php
require_once __DIR__ . '/../config/auth.php'; require_admin();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Método não permitido.'); }
verify_csrf();
$id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
if($id){
 $pdo->beginTransaction();
 try {
  $st=$pdo->prepare("SELECT * FROM sugestoes WHERE id=? AND status='pendente' FOR UPDATE");$st->execute([$id]);$x=$st->fetch();
  if($x){
   $ins=$pdo->prepare("INSERT INTO servicos(nome,categoria,bairro,endereco,telefone,descricao,status) VALUES(?,?,?,?,?,?,'ativo')");
   $ins->execute([$x['nome'],$x['categoria'],$x['bairro'],$x['endereco'],$x['telefone'],$x['descricao']]);
   $pdo->prepare("UPDATE sugestoes SET status='aprovada' WHERE id=?")->execute([$id]);
   flash('Sugestão aprovada e publicada.');
  }
  $pdo->commit();
 } catch(Throwable $e){$pdo->rollBack(); throw $e;}
}
header('Location: index.php');exit;
