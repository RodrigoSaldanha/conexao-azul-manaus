<?php
require_once __DIR__ . '/../config/auth.php'; require_admin();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Método não permitido.'); }
verify_csrf();
$id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
if($id){$st=$pdo->prepare("UPDATE sugestoes SET status='rejeitada' WHERE id=? AND status='pendente'");$st->execute([$id]);flash('Sugestão rejeitada.');}
header('Location: index.php');exit;
