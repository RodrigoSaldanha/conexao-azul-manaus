<?php
require_once __DIR__ . '/config/database.php';
$stmt = $pdo->query("SELECT id,nome,categoria,bairro,endereco,telefone,descricao,latitude,longitude FROM servicos WHERE status='ativo' ORDER BY nome");
$servicos = $stmt->fetchAll();
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Conexão Azul Manaus</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header class="top"><div class="wrap nav">
<a class="brand" href="index.php">Conexão Azul <span>Manaus</span></a>
<nav><a href="#servicos">Serviços</a><a href="#orientacoes">Orientações</a><a href="#sugerir">Sugerir serviço</a><a href="admin/login.php">Área administrativa</a></nav>
</div></header>
<main>
<section class="hero"><div class="wrap hero-grid"><div>
<span class="eyebrow">Inclusão digital • Comunidade local</span>
<h1>Informação organizada para famílias de crianças com TEA e TDAH.</h1>
<p>Uma plataforma experimental para facilitar a consulta de serviços, instituições e recursos de apoio em Manaus.</p>
<a class="btn" href="#servicos">Encontrar serviços</a>
</div><div class="hero-card"><strong>Como funciona?</strong><p>Pesquise, filtre por categoria ou bairro e abra a página individual de cada serviço.</p><p class="muted">Os dados devem ser validados antes do uso como informação oficial.</p></div></div></section>

<section id="servicos" class="section wrap">
<h2>Serviços e instituições</h2>
<div class="filters"><input id="busca" placeholder="Buscar por nome, categoria ou bairro"><select id="categoria"><option value="">Todas as categorias</option></select><select id="bairro"><option value="">Todos os bairros</option></select></div>
<div id="lista" class="cards"></div><p id="vazio" class="muted" hidden>Nenhum serviço encontrado.</p>
</section>

<section id="orientacoes" class="section alt"><div class="wrap"><h2>Orientações</h2><div class="info-grid"><article><h3>Use a busca</h3><p>Digite o nome de um serviço, categoria ou bairro para reduzir os resultados.</p></article><article><h3>Confira os detalhes</h3><p>A página individual reúne endereço, contato, descrição e localização quando cadastrada.</p></article><article><h3>Ajude a atualizar</h3><p>Se conhecer um serviço relevante, envie uma sugestão. A publicação depende de validação administrativa.</p></article></div></div></section>

<section id="sugerir" class="section wrap">
<h2>Sugerir um novo serviço</h2><p>Envie uma indicação para avaliação. O registro ficará pendente até revisão administrativa.</p>
<form id="sugestao" class="form"><div class="hp" aria-hidden="true"><label>Site<input name="website" tabindex="-1" autocomplete="off"></label></div>
<div class="grid2"><label>Nome do serviço<input name="nome" required></label><label>Categoria<input name="categoria" required></label></div>
<div class="grid2"><label>Bairro<input name="bairro"></label><label>Telefone<input name="telefone"></label></div>
<label>Endereço<input name="endereco"></label>
<label>Descrição<textarea name="descricao" rows="4"></textarea></label>
<label>Seu e-mail (opcional)<input type="email" name="email"></label>
<button class="btn" type="submit">Enviar sugestão</button><p id="msg"></p>
</form></section>
</main>
<footer></footer>
<script>
const dados = <?=json_encode($servicos, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)?>;
const lista=document.querySelector('#lista'), busca=document.querySelector('#busca'), cat=document.querySelector('#categoria'), bairro=document.querySelector('#bairro'), vazio=document.querySelector('#vazio');
[...new Set(dados.map(x=>x.categoria).filter(Boolean))].sort().forEach(x=>cat.insertAdjacentHTML('beforeend',`<option>${escapeHtml(x)}</option>`));
[...new Set(dados.map(x=>x.bairro).filter(Boolean))].sort().forEach(x=>bairro.insertAdjacentHTML('beforeend',`<option>${escapeHtml(x)}</option>`));
function escapeHtml(s){return String(s??'').replace(/[&<>"']/g,m=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[m]));}
function render(){
 const q=busca.value.toLowerCase().trim();
 const arr=dados.filter(x=>(!q||`${x.nome} ${x.categoria} ${x.bairro} ${x.descricao}`.toLowerCase().includes(q))&&(!cat.value||x.categoria===cat.value)&&(!bairro.value||x.bairro===bairro.value));
 lista.innerHTML=arr.map(x=>`<article class="card"><span class="tag">${escapeHtml(x.categoria||'Serviço')}</span><h3>${escapeHtml(x.nome)}</h3><p>${escapeHtml(x.descricao||'')}</p><p class="small">${escapeHtml(x.bairro||'')} • ${escapeHtml(x.endereco||'')}</p><a class="link" href="servico.php?id=${x.id}">Ver detalhes →</a></article>`).join('');
 vazio.hidden=arr.length>0;
}
[busca,cat,bairro].forEach(e=>e.addEventListener('input',render)); render();
document.querySelector('#sugestao').addEventListener('submit', async e=>{e.preventDefault(); const r=await fetch('api/sugestoes.php',{method:'POST',body:new FormData(e.target)}); const j=await r.json(); document.querySelector('#msg').textContent=j.message; if(j.ok)e.target.reset();});
</script>
</body></html>