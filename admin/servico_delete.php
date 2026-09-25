<?php
require_once __DIR__ . '/../config/auth.php'; require_admin();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); exit('Método não permitido.'); }
verify_csrf();
$id=filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
if($id){$st=$pdo->prepare("DELETE FROM servicos WHERE id=?");$st->execute([$id]);flash('Serviço excluído.');}
header('Location: index.php');exit;
