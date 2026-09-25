<?php
require_once __DIR__ . '/config/database.php';
$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
if (!$id) { http_response_code(404); die('Serviço não encontrado.'); }
$stmt=$pdo->prepare("SELECT * FROM servicos WHERE id=? AND status='ativo'");
$stmt->execute([$id]); $s=$stmt->fetch();
if (!$s) { http_response_code(404); die('Serviço não encontrado.'); }
?>
<!doctype html><html lang="pt-BR"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title><?=htmlspecialchars($s['nome'])?> — Conexão Azul Manaus</title><link rel="stylesheet" href="assets/style.css"></head>
<body><header class="top"><div class="wrap nav"><a class="brand" href="index.php">Conexão Azul <span>Manaus</span></a><a href="index.php#servicos">← Voltar</a></div></header>
<main class="section wrap"><span class="tag"><?=htmlspecialchars($s['categoria'])?></span><h1><?=htmlspecialchars($s['nome'])?></h1><div class="detail-grid"><div class="panel"><h2>Informações</h2><p><strong>Descrição</strong><br><?=nl2br(htmlspecialchars($s['descricao']??''))?></p><p><strong>Endereço</strong><br><?=htmlspecialchars($s['endereco']??'Não informado')?></p><p><strong>Bairro</strong><br><?=htmlspecialchars($s['bairro']??'Não informado')?></p><p><strong>Telefone</strong><br><?=htmlspecialchars($s['telefone']??'Não informado')?></p></div>
<div class="panel"><h2>Localização</h2><div id="mapa" class="map"></div><p class="small">A localização é exibida a partir das coordenadas cadastradas. Confirme os dados antes de se deslocar.</p></div></div></main>
<script>
const lat=<?=json_encode($s['latitude'])?>, lng=<?=json_encode($s['longitude'])?>;
const m=document.querySelector('#mapa');
if(lat&&lng){m.innerHTML=`<iframe title="Mapa" width="100%" height="360" style="border:0" loading="lazy" src="https://www.openstreetmap.org/export/embed.html?bbox=${Number(lng)-0.01}%2C${Number(lat)-0.01}%2C${Number(lng)+0.01}%2C${Number(lat)+0.01}&layer=mapnik&marker=${lat}%2C${lng}"></iframe>`;} else m.innerHTML='<p class="muted">Coordenadas não cadastradas.</p>';
</script></body></html>