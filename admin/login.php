<?php
require_once __DIR__ . '/../config/auth.php';
if(!empty($_SESSION['admin_id'])){header('Location: index.php');exit;}
$erro='';
if($_SERVER['REQUEST_METHOD']==='POST'){
 verify_csrf();
 $email=trim($_POST['email']??''); $senha=$_POST['senha']??'';
 $st=$pdo->prepare("SELECT * FROM admins WHERE email=? LIMIT 1"); $st->execute([$email]); $a=$st->fetch();
 if($a && password_verify($senha,$a['senha_hash'])){
   session_regenerate_id(true); $_SESSION['admin_id']=$a['id']; $_SESSION['admin_nome']=$a['nome'];
   header('Location: index.php'); exit;
 }
 $erro='E-mail ou senha inválidos.';
}
?><!doctype html><html lang="pt-BR"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Login administrativo</title><link rel="stylesheet" href="../assets/style.css"></head>
<body><main class="login"><div class="panel"><h1>Área administrativa</h1><p class="muted">Conexão Azul Manaus</p><?php if($erro):?><p class="error"><?=htmlspecialchars($erro)?></p><?php endif;?><form method="post" class="form"><?=csrf_input()?><label>E-mail<input type="email" name="email" autocomplete="username" required></label><label>Senha<input type="password" name="senha" autocomplete="current-password" required></label><button class="btn">Entrar</button></form><p class="small">A credencial inicial existe apenas para teste local. Troque-a antes de divulgar o painel.</p></div></main></body></html>
