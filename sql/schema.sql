CREATE DATABASE IF NOT EXISTS rede_apoio_manaus CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rede_apoio_manaus;

CREATE TABLE IF NOT EXISTS admins (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(120) NOT NULL,
 email VARCHAR(160) NOT NULL UNIQUE,
 senha_hash VARCHAR(255) NOT NULL,
 criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS servicos (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(180) NOT NULL,
 categoria VARCHAR(120) NOT NULL,
 bairro VARCHAR(120),
 endereco VARCHAR(255),
 telefone VARCHAR(60),
 descricao TEXT,
 latitude DECIMAL(10,7),
 longitude DECIMAL(10,7),
 status ENUM('ativo','inativo') NOT NULL DEFAULT 'ativo',
 criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 atualizado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS sugestoes (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nome VARCHAR(180) NOT NULL,
 categoria VARCHAR(120) NOT NULL,
 bairro VARCHAR(120),
 endereco VARCHAR(255),
 telefone VARCHAR(60),
 descricao TEXT,
 email VARCHAR(160),
 status ENUM('pendente','aprovada','rejeitada') NOT NULL DEFAULT 'pendente',
 criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Credencial inicial do protótipo:
-- e-mail: admin@redeapoio.local
-- senha: Admin@123
-- O hash abaixo corresponde à senha indicada.
INSERT INTO admins (nome,email,senha_hash)
SELECT 'Administrador','admin@redeapoio.local','$2y$12$9c6TCcxs7iu77nkc6Fh3N.e0TWDBB8T50Z5hnSVWLnVeYiNRWayBe'
WHERE NOT EXISTS (SELECT 1 FROM admins WHERE email='admin@redeapoio.local');

-- Dados reais de Manaus: importe também sql/dados_reais_manaus.sql após este arquivo.
