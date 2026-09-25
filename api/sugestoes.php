<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/database.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['ok'=>false,'message'=>'Método não permitido.']); exit; }
if (!empty($_POST['website'] ?? '')) { echo json_encode(['ok'=>true,'message'=>'Sugestão enviada.']); exit; }
function field(string $name, int $max): string { return mb_substr(trim($_POST[$name] ?? ''), 0, $max); }
$nome=field('nome',180); $categoria=field('categoria',120); $email=field('email',160);
if($nome===''||$categoria===''){http_response_code(422);echo json_encode(['ok'=>false,'message'=>'Preencha nome e categoria.']);exit;}
if($email!=='' && !filter_var($email,FILTER_VALIDATE_EMAIL)){http_response_code(422);echo json_encode(['ok'=>false,'message'=>'Informe um e-mail válido ou deixe o campo vazio.']);exit;}
$stmt=$pdo->prepare("INSERT INTO sugestoes (nome,categoria,bairro,endereco,telefone,descricao,email,status) VALUES (?,?,?,?,?,?,?,'pendente')");
$stmt->execute([$nome,$categoria,field('bairro',120),field('endereco',255),field('telefone',60),field('descricao',3000),$email]);
echo json_encode(['ok'=>true,'message'=>'Sugestão enviada. Ela será analisada pela administração.']);
