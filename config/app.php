<?php
// Configurações gerais do projeto.
// Em produção, defina uma chave longa e exclusiva.
define('APP_NAME', 'Conexão Azul Manaus');
define('APP_ENV', getenv('APP_ENV') ?: 'production');
define('APP_KEY', getenv('APP_KEY') ?: 'troque-esta-chave-antes-de-publicar-uma-versao-real');
