-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Maio-2022 às 23:50
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--
-- --------------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Bubble_joaobarros` DEFAULT CHARACTER SET utf8 ;
USE `Bubble_joaobarros` ;
--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `comentário_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comentário` text DEFAULT NULL,
  `resposta_id` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `imagem_perfil` varchar(255) DEFAULT NULL,
  `imagem_fundo` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `descrição` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faqs`
--

CREATE TABLE `faqs` (
  `id_faq` int(11) NOT NULL,
  `resposta` varchar(255) DEFAULT NULL,
  `pergunta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gostos`
--

CREATE TABLE `gostos` (
  `gosto_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publicação_id` int(11) DEFAULT NULL,
  `gosto` tinyint(1) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_pesquisa`
--

CREATE TABLE `historico_pesquisa` (
  `id_historico` int(11) NOT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `pesquisa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marketplace`
--

CREATE TABLE `marketplace` (
  `id_produto` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id_mensagem` int(11) NOT NULL,
  `from_id_user` int(11) DEFAULT NULL,
  `to_id_user` int(11) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id_notificacao` int(11) NOT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `data` DATE DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificação_comentario`
--

CREATE TABLE `notificação_comentario` (
  `notificação_comentario_id` int(11) NOT NULL,
  `id_notificao` int(11) DEFAULT NULL,
  `id_comentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificação_gosto`
--

CREATE TABLE `notificação_gosto` (
  `notificação_gosto_id` int(11) NOT NULL,
  `id_notificao` int(11) DEFAULT NULL,
  `id_gosto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificação_mensagem`
--

CREATE TABLE `notificação_mensagem` (
  `notificação_mensagem_id` int(11) NOT NULL,
  `id_notificao` int(11) DEFAULT NULL,
  `id_mensagem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificação_seguir`
--

CREATE TABLE `notificação_seguir` (
  `notificação_seguir_id` int(11) NOT NULL,
  `id_notificao` int(11) DEFAULT NULL,
  `id_seguir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `oferta_emprego`
--

CREATE TABLE `oferta_emprego` (
  `id_oferta` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `requisitos` text DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `descrição` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `publicação_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `conteudo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes_fav`
--

CREATE TABLE `publicacoes_fav` (
  `id_pub_fav` int(11) NOT NULL,
  `id_pub` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes_fotos`
--

CREATE TABLE `publicacoes_fotos` (
  `publicação__foto_id` int(11) NOT NULL,
  `publicação_id` int(11) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguir`
--

CREATE TABLE `seguir` (
  `id_seguir` int(11) NOT NULL,
  `id_seguidor` int(11) DEFAULT NULL,
  `id_utilizador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `nacionalidade` varchar(255) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `género` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentário_id`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Índices para tabela `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id_faq`);

--
-- Índices para tabela `gostos`
--
ALTER TABLE `gostos`
  ADD PRIMARY KEY (`gosto_id`);

--
-- Índices para tabela `historico_pesquisa`
--
ALTER TABLE `historico_pesquisa`
  ADD PRIMARY KEY (`id_historico`);

--
-- Índices para tabela `marketplace`
--
ALTER TABLE `marketplace`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_mensagem`);

--
-- Índices para tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id_notificacao`);

--
-- Índices para tabela `notificação_comentario`
--
ALTER TABLE `notificação_comentario`
  ADD PRIMARY KEY (`notificação_comentario_id`);

--
-- Índices para tabela `notificação_gosto`
--
ALTER TABLE `notificação_gosto`
  ADD PRIMARY KEY (`notificação_gosto_id`);

--
-- Índices para tabela `notificação_mensagem`
--
ALTER TABLE `notificação_mensagem`
  ADD PRIMARY KEY (`notificação_mensagem_id`);

--
-- Índices para tabela `notificação_seguir`
--
ALTER TABLE `notificação_seguir`
  ADD PRIMARY KEY (`notificação_seguir_id`);

--
-- Índices para tabela `oferta_emprego`
--
ALTER TABLE `oferta_emprego`
  ADD PRIMARY KEY (`id_oferta`);

--
-- Índices para tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`publicação_id`);

--
-- Índices para tabela `publicacoes_fav`
--
ALTER TABLE `publicacoes_fav`
  ADD PRIMARY KEY (`id_pub_fav`);

--
-- Índices para tabela `publicacoes_fotos`
--
ALTER TABLE `publicacoes_fotos`
  ADD PRIMARY KEY (`publicação__foto_id`);

--
-- Índices para tabela `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`id_seguir`),
  ADD UNIQUE KEY `id_utilizador` (`id_utilizador`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentário_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gostos`
--
ALTER TABLE `gostos`
  MODIFY `gosto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `historico_pesquisa`
--
ALTER TABLE `historico_pesquisa`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marketplace`
--
ALTER TABLE `marketplace`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificação_comentario`
--
ALTER TABLE `notificação_comentario`
  MODIFY `notificação_comentario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificação_gosto`
--
ALTER TABLE `notificação_gosto`
  MODIFY `notificação_gosto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificação_mensagem`
--
ALTER TABLE `notificação_mensagem`
  MODIFY `notificação_mensagem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificação_seguir`
--
ALTER TABLE `notificação_seguir`
  MODIFY `notificação_seguir_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `oferta_emprego`
--
ALTER TABLE `oferta_emprego`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `publicação_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `publicacoes_fav`
--
ALTER TABLE `publicacoes_fav`
  MODIFY `id_pub_fav` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `publicacoes_fotos`
--
ALTER TABLE `publicacoes_fotos`
  MODIFY `publicação__foto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `seguir`
--
ALTER TABLE `seguir`
  MODIFY `id_seguir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
