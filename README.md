# Conexão Azul Manaus

Projeto acadêmico da Atividade Extensionista II do CST em Análise e Desenvolvimento de Sistemas — UNINTER.

Plataforma colaborativa para organizar informações de serviços de apoio a famílias de crianças com TEA e TDAH em Manaus/AM.

## Tecnologias
HTML5, CSS3, JavaScript, PHP 8+ e MySQL/MariaDB (PDO).

## Funcionalidades
- busca e filtros por categoria e bairro;
- página individual de cada serviço;
- mapa com OpenStreetMap quando há latitude/longitude;
- formulário público de sugestão;
- login administrativo;
- cadastro, edição, ativação/inativação e exclusão de serviços;
- aprovação ou rejeição de sugestões;
- consultas preparadas com PDO e proteção CSRF nas ações administrativas.

## Rodar localmente com XAMPP
1. Extraia a pasta para `C:\xampp\htdocs\conexao-azul-manaus`.
2. Inicie Apache e MySQL no XAMPP.
3. Acesse `http://localhost/phpmyadmin`.
4. Importe `sql/schema.sql`.
5. Acesse `http://localhost/conexao-azul-manaus/`.
6. Painel: `http://localhost/conexao-azul-manaus/admin/`.

### Login inicial de TESTE
- E-mail: `admin@redeapoio.local`
- Senha: `Admin@123`

A senha acima é somente para demonstração acadêmica. Antes de expor o painel publicamente, substitua o hash no banco por uma senha exclusiva.

## Banco em hospedagem gratuita
A hospedagem normalmente fornece host, nome do banco, usuário e senha próprios. Ajuste `config/database.php` ou use as variáveis `DB_HOST`, `DB_NAME`, `DB_USER` e `DB_PASS` quando o provedor permitir.

Se o provedor já cria o banco e rejeitar `CREATE DATABASE`/`USE`, remova apenas as duas primeiras instruções correspondentes de `sql/schema.sql` antes da importação.

## Publicar no GitHub
Crie um repositório vazio e, dentro desta pasta, execute:

```bash
git init
git add .
git commit -m "Versão inicial do Conexão Azul Manaus"
git branch -M main
git remote add origin https://github.com/SEU-USUARIO/conexao-azul-manaus.git
git push -u origin main
```

## Observação acadêmica e privacidade
Os serviços incluídos no SQL são **demonstrativos**. Substitua-os por informações reais previamente verificadas antes de apresentar a plataforma como fonte comunitária. Não cadastre dados médicos ou dados pessoais de crianças. O formulário de sugestão deve receber apenas informações sobre o serviço/instituição e, opcionalmente, contato do adulto que envia a indicação.

## Evidências para a UNINTER
Na entrega final, use o endereço público do repositório GitHub como evidência do código. Grave também um vídeo curto mostrando a plataforma funcionando e sua aplicação real à comunidade, conforme as orientações da disciplina. Não substitua a evidência de aplicação comunitária por dados fictícios.
