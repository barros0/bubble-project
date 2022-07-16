-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 08:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubble_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `publicacao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`comentario_id`, `user_id`, `comentario`, `estado`, `created_at`, `updated_at`, `publicacao_id`) VALUES
(14, 16, 'CAP', NULL, '2022-07-10 07:47:28', '2022-07-10 08:47:28', 1167),
(16, 10, 'Isto é do melhor!', NULL, '2022-07-14 07:40:05', '2022-07-14 08:40:05', 1172),
(17, 12, 'Estou a adorar o website PARABÉNS', NULL, '2022-07-14 07:40:49', '2022-07-14 08:40:49', 1172),
(18, 12, 'HAHAHAHAA', NULL, '2022-07-14 07:41:16', '2022-07-14 08:41:16', 1166),
(19, 14, 'Excelente trabalho', NULL, '2022-07-14 07:41:53', '2022-07-14 08:41:53', 1172);

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
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
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `estados_users`
--

CREATE TABLE `estados_users` (
  `estado_user_id` int(11) NOT NULL,
  `nome_estado_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `estados_users`
--

INSERT INTO `estados_users` (`estado_user_id`, `nome_estado_user`) VALUES
(1, 'Aguardar confirmação email'),
(2, 'Ativo'),
(3, 'Desativado'),
(4, 'Suspenso'),
(5, 'Banido');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id_evento`, `titulo`, `localizacao`, `descricao`, `imagem`, `created_at`, `updated_at`) VALUES
(9, 'Lisboa Games Week', 'Campo Grande ', 'Lisboa Games Week, or simply LGW, is a trade fair for video games held annually at the FIL Exhibition Centre in Lisbon, Portugal. It is organised by FIL - International Fair of Lisbon with the approval of Portuguese Ministry of Education. 21 a 24 de Março', '3a00a59421c0881b760aa3a9632e52ae75c65fbf.jpg', '2022-06-13 01:02:38', '2022-06-13 02:02:38'),
(10, 'CES', 'Rua da Beleza', 'We save our participants significant amounts of time and money by soliciting bids and proposals on a state and national level and award contracts on their behalf.', '9954090ee0cd81548423a3d52c545dbc1ab82463.jpg', '2022-06-13 01:11:03', '2022-06-13 02:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id_faq` int(11) NOT NULL,
  `resposta` varchar(255) DEFAULT NULL,
  `pergunta` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id_faq`, `resposta`, `pergunta`, `created_at`, `updated_at`) VALUES
(1, 'Não! O Bubble é uma rede social gratuita e sempre o será!', 'Tenho de pagar alguma coisa para Utilizar o Bubble?', '2022-05-26 22:10:00', '2022-06-15 23:15:16'),
(2, 'Sim, desde que a publicação esteja dentro dos padrões da comunidade e do Bubble.\r\n', 'Posso publicar qualquer coisa no Bubble?\r\n', '2022-05-26 22:10:08', '2022-05-26 23:10:08'),
(3, 'Deves falar com um administrador e mostrar algo que comprove que de facto o utilizador está a quebrar as regras da comunidade.', 'Um utilizador está a ter comportamentos inadequados, o que devo fazer?\r\n', '2022-05-26 22:38:25', '2022-05-26 23:38:25');

-- --------------------------------------------------------

--
-- Table structure for table `files_css_paginas_site`
--

CREATE TABLE `files_css_paginas_site` (
  `id_file` int(11) NOT NULL,
  `id_pagina` int(11) NOT NULL,
  `ficheirocss` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files_css_paginas_site`
--

INSERT INTO `files_css_paginas_site` (`id_file`, `id_pagina`, `ficheirocss`) VALUES
(1, 1, 'css/feed.css'),
(37, 2, 'css/faqs.css'),
(38, 13, 'css/feed.css'),
(39, 13, 'css/perfil.css'),
(40, 14, 'css/eventos.css'),
(41, 12, 'css/mensagens.css'),
(42, 15, 'css/empregos.css'),
(43, 16, 'css/marketplace.css'),
(44, 19, 'css/insere_emprego.css'),
(45, 17, 'css/definicoes.css'),
(46, 18, 'css/definicoes.css'),
(47, 20, 'css/singleEmprego.css'),
(48, 21, 'css/empregosUtilizador.css'),
(49, 22, 'css/insere_emprego.css'),
(50, 23, 'css/definicoes.css'),
(53, 26, 'css/feed.css'),
(54, 27, 'css/conexoes.css'),
(56, 29, 'css/conexoes.css'),
(57, 30, 'css/pesquisa.css'),
(58, 31, 'css/saved-liked.css'),
(59, 32, 'css/notificacoes_p.css');

-- --------------------------------------------------------

--
-- Table structure for table `files_js_paginas_site`
--

CREATE TABLE `files_js_paginas_site` (
  `id_file` int(11) NOT NULL,
  `id_pagina` int(11) NOT NULL,
  `ficheirojs` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files_js_paginas_site`
--

INSERT INTO `files_js_paginas_site` (`id_file`, `id_pagina`, `ficheirojs`) VALUES
(1, 1, 'js/feed.js'),
(2, 1, 'js/like.js'),
(18, 1, 'js/comments.js'),
(20, 2, 'bootstrap/js/bootstrap.js'),
(21, 14, 'js/eventos.js'),
(22, 12, 'js/mensagens.js'),
(23, 13, 'js/perfil_modal.js'),
(24, 15, 'js/empregos.js'),
(25, 16, 'js/marketplace.js'),
(27, 17, 'js/definicoes.js'),
(28, 18, 'js/definicoes.js'),
(29, 13, 'js/feed.js'),
(30, 13, 'js/like.js'),
(31, 13, 'js/comments.js'),
(34, 26, 'js/like.js'),
(35, 26, 'js/comments.js'),
(36, 26, 'js/feed.js'),
(38, 30, 'js/pesquisa.js'),
(39, 31, 'js/saved-liked.js'),
(40, 21, 'js/empregosUtilizador.js'),
(41, 22, 'js/editarEmprego.js'),
(42, 32, 'js/notificacoes_p.js');

-- --------------------------------------------------------

--
-- Table structure for table `foto_emprego`
--

CREATE TABLE `foto_emprego` (
  `idfoto` int(11) NOT NULL,
  `id_emprego` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_emprego`
--

INSERT INTO `foto_emprego` (`idfoto`, `id_emprego`, `foto`) VALUES
(1, 8, '0dcc0a9f254c5ae3209f9905dc40925076f7ca09.jpg'),
(2, 9, '5c94d3fe63508b620c3e6cc525f3facd9cfb467f.jpg'),
(7, 6, '8ec2d6e00ee3a9c54cb9e158460e0ea6c1e53e28.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `genero_id` int(11) NOT NULL,
  `sigla_genero` varchar(10) NOT NULL,
  `nome_genero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`genero_id`, `sigla_genero`, `nome_genero`) VALUES
(1, 'm', 'Masculino'),
(2, 'f', 'Feminino'),
(3, 'o', 'Outro');

-- --------------------------------------------------------

--
-- Table structure for table `gostos`
--

CREATE TABLE `gostos` (
  `gosto_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publicacao_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gostos`
--

INSERT INTO `gostos` (`gosto_id`, `user_id`, `publicacao_id`, `created_at`, `updated_at`) VALUES
(35, 16, 1166, '2022-07-13 12:15:50', '2022-07-13 13:15:50'),
(46, 6, 1172, '2022-07-14 07:39:07', '2022-07-14 08:39:07'),
(47, 6, 1166, '2022-07-14 07:39:16', '2022-07-14 08:39:16'),
(48, 7, 1172, '2022-07-14 07:39:26', '2022-07-14 08:39:26'),
(49, 10, 1172, '2022-07-14 07:39:38', '2022-07-14 08:39:38'),
(50, 12, 1172, '2022-07-14 07:41:04', '2022-07-14 08:41:04'),
(51, 12, 1166, '2022-07-14 07:41:17', '2022-07-14 08:41:17'),
(52, 14, 1172, '2022-07-14 07:41:37', '2022-07-14 08:41:37'),
(62, 1, 1172, '2022-07-16 11:10:53', '2022-07-16 12:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `guardados`
--

CREATE TABLE `guardados` (
  `id_guardado` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `publicacao_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `historico_pesquisa`
--

CREATE TABLE `historico_pesquisa` (
  `id_historico` int(11) NOT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `pesquisa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historico_pesquisa`
--

INSERT INTO `historico_pesquisa` (`id_historico`, `id_utilizador`, `pesquisa`, `created_at`, `updated_at`) VALUES
(35, 16, 'bubble', '2022-07-16 06:31:45', '2022-07-16 07:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `ip_sessions`
--

CREATE TABLE `ip_sessions` (
  `id_ip_sessions` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ip_sessions` varchar(32) DEFAULT NULL,
  `localizacao` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ip_sessions`
--

INSERT INTO `ip_sessions` (`id_ip_sessions`, `id_user`, `ip_sessions`, `localizacao`, `data`) VALUES
(155, 1, '::1', 'Local Host', '2022-07-06 19:33:59'),
(156, 16, '148.71.78.140', 'Portugal', '2022-07-06 19:34:27'),
(218, 1, '::1', 'Local Host', '2022-07-14 07:38:53'),
(219, 6, '::1', 'Local Host', '2022-07-14 07:39:06'),
(220, 7, '::1', 'Local Host', '2022-07-14 07:39:25'),
(221, 10, '::1', 'Local Host', '2022-07-14 07:39:35'),
(222, 12, '::1', 'Local Host', '2022-07-14 07:40:26'),
(223, 14, '::1', 'Local Host', '2022-07-14 07:41:35'),
(224, 16, '::1', 'Local Host', '2022-07-14 07:42:23'),
(225, 16, '::1', 'Local Host', '2022-07-14 07:45:55'),
(226, 16, '::1', 'Local Host', '2022-07-14 12:48:47'),
(227, 16, '::1', 'Local Host', '2022-07-14 13:01:53'),
(228, 16, '::1', 'Local Host', '2022-07-14 13:04:33'),
(229, 16, '::1', 'Local Host', '2022-07-14 13:58:00'),
(230, 16, '::1', 'Local Host', '2022-07-14 14:30:55'),
(231, 16, '::1', 'Local Host', '2022-07-15 03:51:39'),
(232, 16, '::1', 'Local Host', '2022-07-15 04:27:11'),
(233, 16, '::1', 'Local Host', '2022-07-15 05:11:40'),
(234, 16, '::1', 'Local Host', '2022-07-15 11:24:55'),
(235, 1, '::1', 'Local Host', '2022-07-15 11:30:13'),
(236, 16, '::1', 'Local Host', '2022-07-15 11:30:48'),
(237, 16, '::1', 'Local Host', '2022-07-15 11:56:26'),
(238, 16, '::1', 'Local Host', '2022-07-15 12:03:57'),
(239, 16, '::1', 'Local Host', '2022-07-15 12:04:40'),
(240, 16, '::1', 'Local Host', '2022-07-15 12:12:22'),
(241, 16, '::1', 'Local Host', '2022-07-15 13:07:29'),
(242, 16, '::1', 'Local Host', '2022-07-15 16:14:00'),
(243, 27, '::1', 'Local Host', '2022-07-15 16:19:54'),
(244, 16, '::1', 'Local Host', '2022-07-15 17:16:45'),
(245, 16, '::1', 'Local Host', '2022-07-15 19:09:02'),
(246, 16, '::1', 'Local Host', '2022-07-16 03:57:31'),
(247, 16, '::1', 'Local Host', '2022-07-16 04:02:25'),
(248, 28, '::1', 'Local Host', '2022-07-16 04:04:20'),
(249, 16, '::1', 'Local Host', '2022-07-16 04:18:45'),
(250, 16, '::1', 'Local Host', '2022-07-16 04:58:18'),
(251, 16, '::1', 'Local Host', '2022-07-16 05:33:30'),
(252, 1, '::1', 'Local Host', '2022-07-16 05:34:13'),
(253, 1, '::1', 'Local Host', '2022-07-16 05:39:05'),
(254, 16, '::1', 'Local Host', '2022-07-16 07:25:14'),
(255, 16, '127.0.0.1', '-', '2022-07-16 11:00:01'),
(256, 16, '::1', 'Local Host', '2022-07-16 11:08:38'),
(257, 1, '::1', 'Local Host', '2022-07-16 11:10:52'),
(258, 16, '::1', 'Local Host', '2022-07-16 14:14:07'),
(259, 16, '::1', 'Local Host', '2022-07-16 14:21:07'),
(260, 16, '::1', 'Local Host', '2022-07-16 16:24:42'),
(261, 16, '::1', 'Local Host', '2022-07-16 17:15:27'),
(262, 1, '::1', 'Local Host', '2022-07-16 17:26:27'),
(263, 6, '::1', 'Local Host', '2022-07-16 17:27:50'),
(264, 7, '::1', 'Local Host', '2022-07-16 18:00:18'),
(265, 16, '::1', 'Local Host', '2022-07-16 18:01:05'),
(266, 7, '::1', 'Local Host', '2022-07-16 18:01:54'),
(267, 1, '::1', 'Local Host', '2022-07-16 18:02:14'),
(268, 16, '::1', 'Local Host', '2022-07-16 18:10:40'),
(269, 7, '::1', 'Local Host', '2022-07-16 18:11:06'),
(270, 1, '::1', 'Local Host', '2022-07-16 18:14:32'),
(271, 16, '::1', 'Local Host', '2022-07-16 18:30:52'),
(272, 16, '::1', 'Local Host', '2022-07-16 18:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `marketplace`
--

CREATE TABLE `marketplace` (
  `id_produto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marketplace`
--

INSERT INTO `marketplace` (`id_produto`, `id_user`, `titulo`, `categoria`, `preco`, `imagem`, `created_at`, `updated_at`, `descricao`) VALUES
(14, 16, 'Imgbot', 'Gestao de API', '5', '2bf38e15d9d50528d8340feb6aa32b5a7e60f83f.png', '2022-07-16 06:37:33', '2022-07-16 07:37:33', 'Imgbot is a friendly robot that optimizes your images and saves you time. Optimized images mean smaller file sizes without sacrificing quality.'),
(15, 16, 'CodeFactor', 'Mobile', '15', 'd93173a171c48b373052b95f87aa294169c86761.png', '2022-07-16 06:39:07', '2022-07-16 07:39:07', 'CodeFactor instantly performs Code Review with every GitHub Commit or PR. Zero setup time. Get actionable feedback within seconds. Customize rules, ge'),
(16, 16, 'CircleCI', 'Deployment', '15', 'e72535f4bbcbd59832da3a3f580165e232f6831a.png', '2022-07-16 11:16:38', '2022-07-16 12:16:38', 'The world’s best software teams deliver quality code, confidently, with CircleCI.'),
(17, 16, 'Codiga', 'Gestao de API', '2', 'd148661a996cc2403f3bb7cbd7600139bada2fbc.png', '2022-07-16 11:18:03', '2022-07-16 12:18:03', 'Codiga is a code analysis and code review platform'),
(18, 16, 'Visual Source\r\n', 'IDEs', '0', 'b87a8cb3c53fa293590b6965e3f4bbe8afbc09ef.png', '2022-07-16 11:18:38', '2022-07-16 12:18:38', 'Mesmerizing Source Code History Visualization.'),
(19, 16, 'Datree', 'Mobile', '50', '0b64d832ee133ed1fa1bb3e86811c96bba0933e2.png', '2022-07-16 11:20:49', '2022-07-16 12:20:49', 'The Datree app allows engineering teams to automatically identify errors in newly committed YAML configs, including k8s manifests, and prevent these m'),
(20, 16, 'Codeit', 'IDEs', '0', 'e45b1ed3d6d13fbd3fb200fcd3b1a20bbba7162c.png', '2022-07-16 11:21:21', '2022-07-16 12:21:21', 'Mobile code editor connected to Git. Runs on the web, open source, and free.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `mensagens`
--

CREATE TABLE `mensagens` (
  `id_mensagem` int(11) NOT NULL,
  `from_id_user` int(11) DEFAULT NULL,
  `to_id_user` int(11) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mensagens`
--

INSERT INTO `mensagens` (`id_mensagem`, `from_id_user`, `to_id_user`, `mensagem`, `estado`, `created_at`, `updated_at`) VALUES
(30, 1, 16, 'Ola', 1, '2022-07-16 05:39:15', '2022-07-16 19:01:38'),
(31, 16, 1, 'Olá', 1, '2022-07-16 16:32:28', '2022-07-16 19:01:43'),
(32, 16, 1, 'ola', 1, '2022-07-16 16:49:19', '2022-07-16 17:49:19'),
(33, 1, 6, 'ola', 1, '2022-07-16 17:26:52', '2022-07-16 18:26:52'),
(34, 6, 1, 'ola', 1, '2022-07-16 17:27:54', '2022-07-16 18:27:54'),
(35, 16, 1, 'ola', 1, '2022-07-16 17:30:35', '2022-07-16 18:30:35'),
(36, 6, 16, 'ola', 1, '2022-07-16 17:36:46', '2022-07-16 18:36:46'),
(37, 16, 6, 'ola', 1, '2022-07-16 17:44:49', '2022-07-16 18:44:49'),
(38, 16, 7, 'ola', 1, '2022-07-16 17:59:14', '2022-07-16 18:59:14'),
(39, 7, 1, 'ola', 1, '2022-07-16 18:02:02', '2022-07-16 19:02:02'),
(40, 1, 7, 'ola', 1, '2022-07-16 18:09:37', '2022-07-16 19:09:37'),
(41, 1, 1, 'dwa', 1, '2022-07-16 18:16:40', '2022-07-16 19:16:40'),
(42, 1, 7, 'dwa', 1, '2022-07-16 18:16:47', '2022-07-16 19:16:47'),
(43, 1, 6, 'dwa', 1, '2022-07-16 18:16:50', '2022-07-16 19:16:50'),
(44, 1, 16, 'dwa', 1, '2022-07-16 18:16:53', '2022-07-16 19:16:53'),
(45, 1, 1, 'a', 1, '2022-07-16 18:17:01', '2022-07-16 19:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `nacionalidades`
--

CREATE TABLE `nacionalidades` (
  `nacionalidade_id` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `paisEN` varchar(100) NOT NULL,
  `paisES` varchar(100) NOT NULL,
  `NumCode` int(11) DEFAULT NULL,
  `Iso` varchar(5) DEFAULT NULL,
  `siglapais` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nacionalidades`
--

INSERT INTO `nacionalidades` (`nacionalidade_id`, `pais`, `paisEN`, `paisES`, `NumCode`, `Iso`, `siglapais`) VALUES
(1, 'Aruba', 'Aruba', 'Aruba', 533, 'ABW', 'AW'),
(2, 'Afeganistão', 'Afghanistan', 'Afganistán', 4, 'AFG', 'AF'),
(3, 'Angola', 'Angola', 'Angola', 24, 'AGO', 'AO'),
(4, 'Anguilla', 'Anguilla', 'Anguila', 660, 'AIA', 'AI'),
(5, 'Åland, Ilhas', 'Åland Islands', 'Islas Åland', 248, 'ALA', 'AX'),
(6, 'Albânia', 'Albania', 'Albania', 8, 'ALB', 'AL'),
(7, 'Andorra', 'Andorra', 'Andorra', 20, 'AND', 'AD'),
(8, 'Emirados Árabes Unidos', 'United Arab Emirates', 'Emiratos Árabes Unidos (Los)', 784, 'ARE', 'AE'),
(9, 'Argentina', 'Argentina', 'Argentina', 32, 'ARG', 'AR'),
(10, 'Armênia', 'Armenia', 'Armenia', 51, 'ARM', 'AM'),
(11, 'Samoa Americana', 'American Samoa', 'Samoa Americana', 16, 'ASM', 'AS'),
(12, 'Antártida', 'Antarctica', 'Antártida', 10, 'ATA', 'AQ'),
(13, 'Terras Austrais e Antárticas Francesas (TAAF)', 'French Southern Territories', 'Territorios Australes Franceses (los)', 260, 'ATF', 'TF'),
(14, 'Antígua e Barbuda', 'Antigua and Barbuda', 'Antigua y Barbuda', 28, 'ATG', 'AG'),
(15, 'Austrália', 'Australia', 'Australia', 36, 'AUS', 'AU'),
(16, 'Áustria', 'Austria', 'Austria', 40, 'AUT', 'AT'),
(17, 'Azerbaijão', 'Azerbaijan', 'Azerbaiyán', 31, 'AZE', 'AZ'),
(18, 'Burundi', 'Burundi', 'Burundi', 108, 'BDI', 'BI'),
(19, 'Bélgica', 'Belgium', 'Bélgica', 56, 'BEL', 'BE'),
(20, 'Benim', 'Benin', 'Benín', 204, 'BEN', 'BJ'),
(21, 'Bonaire, Santo Eustáquio e Saba', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, San Eustaquio y Saba', 535, 'BES', 'BQ'),
(22, 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 854, 'BFA', 'BF'),
(23, 'Bangladesh', 'Bangladesh', 'Bangladés', 50, 'BGD', 'BD'),
(24, 'Bulgária', 'Bulgaria', 'Bulgaria', 100, 'BGR', 'BG'),
(25, 'Bahrain', 'Bahrain', 'Baréin', 48, 'BHR', 'BH'),
(26, 'Bahamas', 'Bahamas', 'Bahamas (las)', 44, 'BHS', 'BS'),
(27, 'Bósnia e Herzegovina', 'Bosnia and Herzegovina', 'Bosnia y Herzegovina', 70, 'BIH', 'BA'),
(28, 'São Bartolomeu', 'Saint Barthélemy', 'San Bartolomé', 652, 'BLM', 'BL'),
(29, 'Bielorrússia', 'Belarus', 'Bielorrusia', 112, 'BLR', 'BY'),
(30, 'Belize', 'Belize', 'Belice', 84, 'BLZ', 'BZ'),
(31, 'Bermudas', 'Bermuda', 'Bermudas', 60, 'BMU', 'BM'),
(32, 'Bolívia', 'Bolivia (Plurinational State of)', 'Bolivia, Estado Plurinacional de', 68, 'BOL', 'BO'),
(33, 'Brasil', 'Brazil', 'Brasil', 76, 'BRA', 'BR'),
(34, 'Barbados', 'Barbados', 'Barbados', 52, 'BRB', 'BB'),
(35, 'Brunei', 'Brunei Darussalam', 'Brunéi Darussalam', 96, 'BRN', 'BN'),
(36, 'Butão', 'Bhutan', 'Bután', 64, 'BTN', 'BT'),
(37, 'Bouvet, Ilha', 'Bouvet Island', 'Isla Bouvet', 74, 'BVT', 'BV'),
(38, 'Botswana', 'Botswana', 'Botsuana', 72, 'BWA', 'BW'),
(39, 'Centro-Africana, República', 'Central African Republic', 'República Centroafricana (la)', 140, 'CAF', 'CF'),
(40, 'Canadá', 'Canada', 'Canadá', 124, 'CAN', 'CA'),
(41, 'Cocos, Ilhas', 'Cocos (Keeling) Islands', 'Islas Cocos (Keeling)', 166, 'CCK', 'CC'),
(42, 'Suíça', 'Switzerland', 'Suiza', 756, 'CHE', 'CH'),
(43, 'Chile', 'Chile', 'Chile', 152, 'CHL', 'CL'),
(44, 'China', 'China', 'China', 156, 'CHN', 'CN'),
(45, 'Costa do Marfim', 'Côte dIvoire', 'Côte dIvoire', 384, 'CIV', 'CI'),
(46, 'Camarões', 'Cameroon', 'Camerún', 120, 'CMR', 'CM'),
(47, 'Congo, República Democrática do (antigo Zaire)', 'Congo (Democratic Republic of the)', 'Congo (la República Democrática del)', 180, 'COD', 'CD'),
(48, 'Congo, República do', 'Congo', 'Congo', 178, 'COG', 'CG'),
(49, 'Cook, Ilhas', 'Cook Islands', 'Islas Cook (las)', 184, 'COK', 'CK'),
(50, 'Colômbia', 'Colombia', 'Colombia', 170, 'COL', 'CO'),
(51, 'Comores', 'Comoros', 'Comoras', 174, 'COM', 'KM'),
(52, 'Cabo Verde', 'Cabo Verde', 'Cabo Verde', 132, 'CPV', 'CV'),
(53, 'Costa Rica', 'Costa Rica', 'Costa Rica', 188, 'CRI', 'CR'),
(54, 'Cuba', 'Cuba', 'Cuba', 192, 'CUB', 'CU'),
(55, 'Curaçao', 'Curaçao', 'Curaçao', 531, 'CUW', 'CW'),
(56, 'Christmas, Ilha', 'Christmas Island', 'Isla de Navidad', 162, 'CXR', 'CX'),
(57, 'Cayman, Ilhas', 'Cayman Islands', 'Islas Caimán (las)', 136, 'CYM', 'KY'),
(58, 'Chipre', 'Cyprus', 'Chipre', 196, 'CYP', 'CY'),
(59, 'Checa, República', 'Czech Republic', 'República Checa (la)', 203, 'CZE', 'CZ'),
(60, 'Alemanha', 'Germany', 'Alemania', 276, 'DEU', 'DE'),
(61, 'Djibouti', 'Djibouti', 'Yibuti', 262, 'DJI', 'DJ'),
(62, 'Dominica', 'Dominica', 'Dominica', 212, 'DMA', 'DM'),
(63, 'Dinamarca', 'Denmark', 'Dinamarca', 208, 'DNK', 'DK'),
(64, 'Dominicana, República', 'Dominican Republic', 'República Dominicana (la)', 214, 'DOM', 'DO'),
(65, 'Argélia', 'Algeria', 'Argelia', 12, 'DZA', 'DZ'),
(66, 'Equador', 'Ecuador', 'Ecuador', 218, 'ECU', 'EC'),
(67, 'Egito', 'Egypt', 'Egipto', 818, 'EGY', 'EG'),
(68, 'Eritreia', 'Eritrea', 'Eritrea', 232, 'ERI', 'ER'),
(69, 'Saara Ocidental', 'Western Sahara', 'Sahara Occidental', 732, 'ESH', 'EH'),
(70, 'Espanha', 'Spain', 'España', 724, 'ESP', 'ES'),
(71, 'Estónia', 'Estonia', 'Estonia', 233, 'EST', 'EE'),
(72, 'Etiópia', 'Ethiopia', 'Etiopía', 231, 'ETH', 'ET'),
(73, 'Finlândia', 'Finland', 'Finlandia', 246, 'FIN', 'FI'),
(74, 'Fiji', 'Fiji', 'Fiyi', 242, 'FJI', 'FJ'),
(75, 'Malvinas, Ilhas (Falkland)', 'Falkland Islands (Malvinas)', 'Islas Malvinas [Falkland] (las)', 238, 'FLK', 'FK'),
(76, 'França', 'France', 'Francia', 250, 'FRA', 'FR'),
(77, 'Feroé, Ilhas', 'Faroe Islands', 'Islas Feroe (las)', 234, 'FRO', 'FO'),
(78, 'Micronésia, Estados Federados da', 'Micronesia (Federated States of)', 'Micronesia (los Estados Federados de)', 583, 'FSM', 'FM'),
(79, 'Gabão', 'Gabon', 'Gabón', 266, 'GAB', 'GA'),
(80, 'Reino Unido da Grã-Bretanha e Irlanda do Norte', 'United Kingdom of Great Britain and Northern Ireland', 'Reino Unido (el)', 826, 'GBR', 'GB'),
(81, 'Geórgia', 'Georgia', 'Georgia', 268, 'GEO', 'GE'),
(82, 'Guernsey', 'Guernsey', 'Guernsey', 831, 'GGY', 'GG'),
(83, 'Gana', 'Ghana', 'Ghana', 288, 'GHA', 'GH'),
(84, 'Gibraltar', 'Gibraltar', 'Gibraltar', 292, 'GIB', 'GI'),
(85, 'Guiné-Conacri', 'Guinea', 'Guinea', 324, 'GIN', 'GN'),
(86, 'Guadalupe', 'Guadeloupe', 'Guadalupe', 312, 'GLP', 'GP'),
(87, 'Gâmbia', 'Gambia', 'Gambia (La)', 270, 'GMB', 'GM'),
(88, 'Guiné-Bissau', 'Guinea-Bissau', 'Guinea-Bisáu', 624, 'GNB', 'GW'),
(89, 'Guiné Equatorial', 'Equatorial Guinea', 'Guinea Ecuatorial', 226, 'GNQ', 'GQ'),
(90, 'Grécia', 'Greece', 'Grecia', 300, 'GRC', 'GR'),
(91, 'Grenada', 'Grenada', 'Granada', 308, 'GRD', 'GD'),
(92, 'Groenlândia', 'Greenland', 'Groenlandia', 304, 'GRL', 'GL'),
(93, 'Guatemala', 'Guatemala', 'Guatemala', 320, 'GTM', 'GT'),
(94, 'Guiana Francesa', 'French Guiana', 'Guayana Francesa', 254, 'GUF', 'GF'),
(95, 'Guam', 'Guam', 'Guam', 316, 'GUM', 'GU'),
(96, 'Guiana', 'Guyana', 'Guyana', 328, 'GUY', 'GY'),
(97, 'Hong Kong', 'Hong Kong', 'Hong Kong', 344, 'HKG', 'HK'),
(98, 'Heard e Ilhas McDonald, Ilha', 'Heard Island and McDonald Islands', 'Isla Heard e Islas McDonald', 334, 'HMD', 'HM'),
(99, 'Honduras', 'Honduras', 'Honduras', 340, 'HND', 'HN'),
(100, 'Croácia', 'Croatia', 'Croacia', 191, 'HRV', 'HR'),
(101, 'Haiti', 'Haiti', 'Haití', 332, 'HTI', 'HT'),
(102, 'Hungria', 'Hungary', 'Hungría', 348, 'HUN', 'HU'),
(103, 'Indonésia', 'Indonesia', 'Indonesia', 360, 'IDN', 'ID'),
(104, 'Man, Ilha de', 'Isle of Man', 'Isla de Man', 833, 'IMN', 'IM'),
(105, 'Índia', 'India', 'India', 356, 'IND', 'IN'),
(106, 'Território Britânico do Oceano Índico', 'British Indian Ocean Territory', 'Territorio Británico del Océano Índico (el)', 86, 'IOT', 'IO'),
(107, 'Irlanda', 'Ireland', 'Irlanda', 372, 'IRL', 'IE'),
(108, 'Irã', 'Iran (Islamic Republic of)', 'Irán (la República Islámica de)', 364, 'IRN', 'IR'),
(109, 'Iraque', 'Iraq', 'Irak', 368, 'IRQ', 'IQ'),
(110, 'Islândia', 'Iceland', 'Islandia', 352, 'ISL', 'IS'),
(111, 'Israel', 'Israel', 'Israel', 376, 'ISR', 'IL'),
(112, 'Itália', 'Italy', 'Italia', 380, 'ITA', 'IT'),
(113, 'Jamaica', 'Jamaica', 'Jamaica', 388, 'JAM', 'JM'),
(114, 'Jersey', 'Jersey', 'Jersey', 832, 'JEY', 'JE'),
(115, 'Jordânia', 'Jordan', 'Jordania', 400, 'JOR', 'JO'),
(116, 'Japão', 'Japan', 'Japón', 392, 'JPN', 'JP'),
(117, 'Cazaquistão', 'Kazakhstan', 'Kazajistán', 398, 'KAZ', 'KZ'),
(118, 'Quênia', 'Kenya', 'Kenia', 404, 'KEN', 'KE'),
(119, 'Quirguistão', 'Kyrgyzstan', 'Kirguistán', 417, 'KGZ', 'KG'),
(120, 'Cambodja', 'Cambodia', 'Camboya', 116, 'KHM', 'KH'),
(121, 'Kiribati', 'Kiribati', 'Kiribati', 296, 'KIR', 'KI'),
(122, 'São Cristóvão e Névis (Saint Kitts e Nevis)', 'Saint Kitts and Nevis', 'San Cristóbal y Nieves', 659, 'KNA', 'KN'),
(123, 'Coreia do Sul', 'Korea (Republic of)', 'Corea (la República de)', 410, 'KOR', 'KR'),
(124, 'Kuwait', 'Kuwait', 'Kuwait', 414, 'KWT', 'KW'),
(125, 'Laos', 'Lao Peoples Democratic Republic', 'Lao, (la) República Democrática Popular', 418, 'LAO', 'LA'),
(126, 'Líbano', 'Lebanon', 'Líbano', 422, 'LBN', 'LB'),
(127, 'Libéria', 'Liberia', 'Liberia', 430, 'LBR', 'LR'),
(128, 'Líbia', 'Libya', 'Libia', 434, 'LBY', 'LY'),
(129, 'Santa Lúcia', 'Saint Lucia', 'Santa Lucía', 662, 'LCA', 'LC'),
(130, 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 438, 'LIE', 'LI'),
(131, 'Sri Lanka', 'Sri Lanka', 'Sri Lanka', 144, 'LKA', 'LK'),
(132, 'Lesoto', 'Lesotho', 'Lesoto', 426, 'LSO', 'LS'),
(133, 'Lituânia', 'Lithuania', 'Lituania', 440, 'LTU', 'LT'),
(134, 'Luxemburgo', 'Luxembourg', 'Luxemburgo', 442, 'LUX', 'LU'),
(135, 'Letônia', 'Latvia', 'Letonia', 428, 'LVA', 'LV'),
(136, 'Macau', 'Macao', 'Macao', 446, 'MAC', 'MO'),
(137, 'São Martinho (França)', 'Saint Martin (French part)', 'San Martín (parte francesa)', 663, 'MAF', 'MF'),
(138, 'Marrocos', 'Morocco', 'Marruecos', 504, 'MAR', 'MA'),
(139, 'Mônaco', 'Monaco', 'Mónaco', 492, 'MCO', 'MC'),
(140, 'Moldávia', 'Moldova (Republic of)', 'Moldavia (la República de)', 498, 'MDA', 'MD'),
(141, 'Madagáscar', 'Madagascar', 'Madagascar', 450, 'MDG', 'MG'),
(142, 'Maldivas', 'Maldives', 'Maldivas', 462, 'MDV', 'MV'),
(143, 'México', 'Mexico', 'México', 484, 'MEX', 'MX'),
(144, 'Marshall, Ilhas', 'Marshall Islands', 'Islas Marshall (las)', 584, 'MHL', 'MH'),
(145, 'Macedônia, República da', 'Macedonia (the former Yugoslav Republic of)', 'Macedonia (la antigua República Yugoslava de)', 807, 'MKD', 'MK'),
(146, 'Mali', 'Mali', 'Malí', 466, 'MLI', 'ML'),
(147, 'Malta', 'Malta', 'Malta', 470, 'MLT', 'MT'),
(148, 'Myanmar (antiga Birmânia)', 'Myanmar', 'Myanmar', 104, 'MMR', 'MM'),
(149, 'Montenegro', 'Montenegro', 'Montenegro', 499, 'MNE', 'ME'),
(150, 'Mongólia', 'Mongolia', 'Mongolia', 496, 'MNG', 'MN'),
(151, 'Marianas Setentrionais', 'Northern Mariana Islands', 'Islas Marianas del Norte (las)', 580, 'MNP', 'MP'),
(152, 'Moçambique', 'Mozambique', 'Mozambique', 508, 'MOZ', 'MZ'),
(153, 'Mauritânia', 'Mauritania', 'Mauritania', 478, 'MRT', 'MR'),
(154, 'Montserrat', 'Montserrat', 'Montserrat', 500, 'MSR', 'MS'),
(155, 'Martinica', 'Martinique', 'Martinica', 474, 'MTQ', 'MQ'),
(156, 'Maurícia', 'Mauritius', 'Mauricio', 480, 'MUS', 'MU'),
(157, 'Malawi', 'Malawi', 'Malaui', 454, 'MWI', 'MW'),
(158, 'Malásia', 'Malaysia', 'Malasia', 458, 'MYS', 'MY'),
(159, 'Mayotte', 'Mayotte', 'Mayotte', 175, 'MYT', 'YT'),
(160, 'Namíbia', 'Namibia', 'Namibia', 516, 'NAM', 'NA'),
(161, 'Nova Caledônia', 'New Caledonia', 'Nueva Caledonia', 540, 'NCL', 'NC'),
(162, 'Níger', 'Niger', 'Níger (el)', 562, 'NER', 'NE'),
(163, 'Norfolk, Ilha', 'Norfolk Island', 'Isla Norfolk', 574, 'NFK', 'NF'),
(164, 'Nigéria', 'Nigeria', 'Nigeria', 566, 'NGA', 'NG'),
(165, 'Nicarágua', 'Nicaragua', 'Nicaragua', 558, 'NIC', 'NI'),
(166, 'Niue', 'Niue', 'Niue', 570, 'NIU', 'NU'),
(167, 'Países Baixos (Holanda)', 'Netherlands', 'Países Bajos (los)', 528, 'NLD', 'NL'),
(168, 'Noruega', 'Norway', 'Noruega', 578, 'NOR', 'NO'),
(169, 'Nepal', 'Nepal', 'Nepal', 524, 'NPL', 'NP'),
(170, 'Nauru', 'Nauru', 'Nauru', 520, 'NRU', 'NR'),
(171, 'Nova Zelândia (Aotearoa)', 'New Zealand', 'Nueva Zelanda', 554, 'NZL', 'NZ'),
(172, 'Oman', 'Oman', 'Omán', 512, 'OMN', 'OM'),
(173, 'Paquistão', 'Pakistan', 'Pakistán', 586, 'PAK', 'PK'),
(174, 'Panamá', 'Panama', 'Panamá', 591, 'PAN', 'PA'),
(175, 'Pitcairn', 'Pitcairn', 'Pitcairn', 612, 'PCN', 'PN'),
(176, 'Peru', 'Peru', 'Perú', 604, 'PER', 'PE'),
(177, 'Filipinas', 'Philippines', 'Filipinas (las)', 608, 'PHL', 'PH'),
(178, 'Palau', 'Palau', 'Palaos', 585, 'PLW', 'PW'),
(179, 'Papua-Nova Guiné', 'Papua New Guinea', 'Papúa Nueva Guinea', 598, 'PNG', 'PG'),
(180, 'Polônia', 'Poland', 'Polonia', 616, 'POL', 'PL'),
(181, 'Porto Rico', 'Puerto Rico', 'Puerto Rico', 630, 'PRI', 'PR'),
(182, 'Coreia, República Democrática da (Coreia do Norte)', 'Korea (Democratic Peoples Republic of)', 'Corea (la República Democrática Popular de)', 408, 'PRK', 'KP'),
(183, 'Portugal', 'Portugal', 'Portugal', 620, 'PRT', 'PT'),
(184, 'Paraguai', 'Paraguay', 'Paraguay', 600, 'PRY', 'PY'),
(185, 'Palestina', 'Palestine, State of', 'Palestina, Estado de', 275, 'PSE', 'PS'),
(186, 'Polinésia Francesa', 'French Polynesia', 'Polinesia Francesa', 258, 'PYF', 'PF'),
(187, 'Qatar', 'Qatar', 'Catar', 634, 'QAT', 'QA'),
(188, 'Reunião', 'Réunion', 'Reunión', 638, 'REU', 'RE'),
(189, 'Romênia', 'Romania', 'Rumania', 642, 'ROU', 'RO'),
(190, 'Rússia', 'Russian Federation', 'Rusia, (la) Federación de', 643, 'RUS', 'RU'),
(191, 'Ruanda', 'Rwanda', 'Ruanda', 646, 'RWA', 'RW'),
(192, 'Arábia Saudita', 'Saudi Arabia', 'Arabia Saudita', 682, 'SAU', 'SA'),
(193, 'Sudão', 'Sudan', 'Sudán (el)', 729, 'SDN', 'SD'),
(194, 'Senegal', 'Senegal', 'Senegal', 686, 'SEN', 'SN'),
(195, 'Singapura', 'Singapore', 'Singapur', 702, 'SGP', 'SG'),
(196, 'Geórgia do Sul e Sandwich do Sul, Ilhas', 'South Georgia and the South Sandwich Islands', 'Georgia del sur y las islas sandwich del sur', 239, 'SGS', 'GS'),
(197, 'Santa Helena', 'Saint Helena, Ascension and Tristan da Cunha', 'Santa Helena, Ascensión y Tristán de Acuña', 654, 'SHN', 'SH'),
(198, 'Svalbard e Jan Mayen', 'Svalbard and Jan Mayen', 'Svalbard y Jan Mayen', 744, 'SJM', 'SJ'),
(199, 'Salomão, Ilhas', 'Solomon Islands', 'Islas Salomón (las)', 90, 'SLB', 'SB'),
(200, 'Serra Leoa', 'Sierra Leone', 'Sierra leona', 694, 'SLE', 'SL'),
(201, 'El Salvador', 'El Salvador', 'El Salvador', 222, 'SLV', 'SV'),
(202, 'San Marino', 'San Marino', 'San Marino', 674, 'SMR', 'SM'),
(203, 'Somália', 'Somalia', 'Somalia', 706, 'SOM', 'SO'),
(204, 'Saint Pierre et Miquelon', 'Saint Pierre and Miquelon', 'San Pedro y Miquelón', 666, 'SPM', 'PM'),
(205, 'Sérvia', 'Serbia', 'Serbia', 688, 'SRB', 'RS'),
(206, 'Sudão do Sul', 'South Sudan', 'Sudán del Sur', 728, 'SSD', 'SS'),
(207, 'São Tomé e Príncipe', 'Sao Tome and Principe', 'Santo Tomé y Príncipe', 678, 'STP', 'ST'),
(208, 'Suriname', 'Suriname', 'Surinam', 740, 'SUR', 'SR'),
(209, 'Eslováquia', 'Slovakia', 'Eslovaquia', 703, 'SVK', 'SK'),
(210, 'Eslovênia', 'Slovenia', 'Eslovenia', 705, 'SVN', 'SI'),
(211, 'Suécia', 'Sweden', 'Suecia', 752, 'SWE', 'SE'),
(212, 'Suazilândia', 'Swaziland', 'Suazilandia', 748, 'SWZ', 'SZ'),
(213, 'São Martinho (Países Baixos)', 'Sint Maarten (Dutch part)', 'Sint Maarten (parte holandesa)', 534, 'SXM', 'SX'),
(214, 'Seychelles', 'Seychelles', 'Seychelles', 690, 'SYC', 'SC'),
(215, 'Síria', 'Syrian Arab Republic', 'Siria, (la) República Árabe', 760, 'SYR', 'SY'),
(216, 'Turks e Caicos', 'Turks and Caicos Islands', 'Islas Turcas y Caicos (las)', 796, 'TCA', 'TC'),
(217, 'Chade', 'Chad', 'Chad', 148, 'TCD', 'TD'),
(218, 'Togo', 'Togo', 'Togo', 768, 'TGO', 'TG'),
(219, 'Tailândia', 'Thailand', 'Tailandia', 764, 'THA', 'TH'),
(220, 'Tajiquistão', 'Tajikistan', 'Tayikistán', 762, 'TJK', 'TJ'),
(221, 'Toquelau', 'Tokelau', 'Tokelau', 772, 'TKL', 'TK'),
(222, 'Turquemenistão', 'Turkmenistan', 'Turkmenistán', 795, 'TKM', 'TM'),
(223, 'Timor-Leste', 'Timor-Leste', 'Timor-Leste', 626, 'TLS', 'TL'),
(224, 'Tonga', 'Tonga', 'Tonga', 776, 'TON', 'TO'),
(225, 'Trindade e Tobago', 'Trinidad and Tobago', 'Trinidad y Tobago', 780, 'TTO', 'TT'),
(226, 'Tunísia', 'Tunisia', 'Túnez', 788, 'TUN', 'TN'),
(227, 'Turquia', 'Turkey', 'Turquía', 792, 'TUR', 'TR'),
(228, 'Tuvalu', 'Tuvalu', 'Tuvalu', 798, 'TUV', 'TV'),
(229, 'Taiwan', 'Taiwan, Province of China', 'Taiwán (Provincia de China)', 158, 'TWN', 'TW'),
(230, 'Tanzânia', 'Tanzania, United Republic of', 'Tanzania, República Unida de', 834, 'TZA', 'TZ'),
(231, 'Uganda', 'Uganda', 'Uganda', 800, 'UGA', 'UG'),
(232, 'Ucrânia', 'Ukraine', 'Ucrania', 804, 'UKR', 'UA'),
(233, 'Menores Distantes dos Estados Unidos, Ilhas', 'United States Minor Outlying Islands', 'Islas de Ultramar Menores de Estados Unidos (las)', 581, 'UMI', 'UM'),
(234, 'Uruguai', 'Uruguay', 'Uruguay', 858, 'URY', 'UY'),
(235, 'Estados Unidos', 'United States of America', 'Estados Unidos (los)', 840, 'USA', 'US'),
(236, 'Usbequistão', 'Uzbekistan', 'Uzbekistán', 860, 'UZB', 'UZ'),
(237, 'Vaticano', 'Holy See', 'Santa Sede[Estado de la Ciudad del Vaticano] (la)', 336, 'VAT', 'VA'),
(238, 'São Vicente e Granadinas', 'Saint Vincent and the Grenadines', 'San Vicente y las Granadinas', 670, 'VCT', 'VC'),
(239, 'Venezuela', 'Venezuela (Bolivarian Republic of)', 'Venezuela, República Bolivariana de', 862, 'VEN', 'VE'),
(240, 'Virgens Britânicas, Ilhas', 'Virgin Islands (British)', 'Islas Vírgenes (Británicas)', 92, 'VGB', 'VG'),
(241, 'Virgens Americanas, Ilhas', 'Virgin Islands (U.S.)', 'Islas Vírgenes (EE.UU.)', 850, 'VIR', 'VI'),
(242, 'Vietnam', 'Viet Nam', 'Viet Nam', 704, 'VNM', 'VN'),
(243, 'Vanuatu', 'Vanuatu', 'Vanuatu', 548, 'VUT', 'VU'),
(244, 'Wallis e Futuna', 'Wallis and Futuna', 'Wallis y Futuna', 876, 'WLF', 'WF'),
(245, 'Samoa (Samoa Ocidental)', 'Samoa', 'Samoa', 882, 'WSM', 'WS'),
(246, 'Iémen', 'Yemen', 'Yemen', 887, 'YEM', 'YE'),
(247, 'África do Sul', 'South Africa', 'Sudáfrica', 710, 'ZAF', 'ZA'),
(248, 'Zâmbia', 'Zambia', 'Zambia', 894, 'ZMB', 'ZM'),
(249, 'Zimbabwe', 'Zimbabwe', 'Zimbabue', 716, 'ZWE', 'ZW'),
(250, 'none', 'none', 'none', 10000, 'none', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id_notificacao` int(11) NOT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificacoes`
--

INSERT INTO `notificacoes` (`id_notificacao`, `id_utilizador`, `tipo`, `created_at`, `updated_at`) VALUES
(10, 16, 1, '2022-07-16 11:10:53', '2022-07-16 12:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `notificacoes_comentario`
--

CREATE TABLE `notificacoes_comentario` (
  `notificacao_comentario_id` int(11) NOT NULL,
  `id_notificacao` int(11) DEFAULT NULL,
  `id_comentario` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notificacoes_gosto`
--

CREATE TABLE `notificacoes_gosto` (
  `notificacao_gosto_id` int(11) NOT NULL,
  `id_notificacao` int(11) DEFAULT NULL,
  `id_gosto` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notificacoes_gosto`
--

INSERT INTO `notificacoes_gosto` (`notificacao_gosto_id`, `id_notificacao`, `id_gosto`, `created_at`, `updated_at`) VALUES
(7, 10, 62, '2022-07-16 11:10:53', '2022-07-16 12:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `notificacoes_mensagem`
--

CREATE TABLE `notificacoes_mensagem` (
  `notificacao_mensagem_id` int(11) NOT NULL,
  `id_notificacao` int(11) DEFAULT NULL,
  `id_mensagem` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notificacoes_seguir`
--

CREATE TABLE `notificacoes_seguir` (
  `notificacao_seguir_id` int(11) NOT NULL,
  `id_notificao` int(11) DEFAULT NULL,
  `id_seguir` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oferta_emprego`
--

CREATE TABLE `oferta_emprego` (
  `id_oferta` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `requisitos` text DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `qualificacoes` varchar(255) NOT NULL,
  `experiencia` varchar(100) NOT NULL,
  `localizacao` varchar(60) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oferta_emprego`
--

INSERT INTO `oferta_emprego` (`id_oferta`, `id_user`, `foto`, `titulo`, `requisitos`, `vagas`, `qualificacoes`, `experiencia`, `localizacao`, `tipo`, `horario`, `categoria`, `descricao`, `created_at`, `updated_at`) VALUES
(6, 16, '', 'Full Stack Developer', 'Conhecimentos de PHP,JS, CSS', 2, 'Curso TeSP ou Equivalência', 'Mínimo 2 Anos', 'Leiria', 'Remoto / Presencial', 'Full-Time', 'Web Development teste', 'Emprego flexível, horários rotativos', '2022-06-27 16:09:35', '2022-07-16 07:34:45'),
(7, 16, '', 'Web Designer', 'Conhecimentos de Adobe Illustrator', 1, 'Curso Superior', 'Sem Experiência Mínima', 'Lisboa', 'Remoto', 'Part-Time', 'Design', 'Procuro Web Designer com ou sem experiência para desenvolvimento de website em part-time.', '2022-06-27 16:10:05', '2022-07-16 07:34:48'),
(8, 1, '', 'Técnico de Cibersegurança', 'Conhecimentos de Linux', 2, 'Licenciatura ou Superior', '4 anos', 'Porto', 'Presencial', 'Full Time', 'Cibersegurança', 'Procuramos técnicos especializados em cibersegurança, com experiência.', '2022-06-27 17:07:26', '2022-07-16 07:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `paginas_site`
--

CREATE TABLE `paginas_site` (
  `id_pag` int(11) NOT NULL,
  `urlpagina` varchar(30) NOT NULL,
  `nomepagina` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paginas_site`
--

INSERT INTO `paginas_site` (`id_pag`, `urlpagina`, `nomepagina`) VALUES
(1, 'feed.php', 'Página Inicial'),
(2, 'faqs.php', 'FAQs'),
(12, 'mensagens.php', 'Mensagens'),
(13, 'perfil.php', 'Perfil'),
(14, 'eventos.php', 'Eventos'),
(15, 'empregos.php', 'Empregos'),
(16, 'marketplace.php', 'Marketplace'),
(17, 'definicoes_geral.php', 'Definições Gerais'),
(18, 'definicoes_seguranca.php', 'Definições Segurança'),
(19, 'inseriremprego.php', 'Inserir Emprego'),
(20, 'emprego.php', 'Emprego'),
(21, 'empregosUtilizador.php', 'Os seus Empregos'),
(22, 'editarEmprego.php', 'Editar Emprego'),
(23, 'definicoes_suporte.php', 'Denúncias'),
(26, 'partilha.php', 'Partilha'),
(27, 'conexoes_seguidores.php', 'Conexões'),
(29, 'conexoes_aseguir.php', 'Conexões'),
(30, 'pesquisa.php', 'Pesquisa'),
(31, 'saved-liked.php', 'Guardados'),
(32, 'notificacoes.php', 'Notificações');

-- --------------------------------------------------------

--
-- Table structure for table `publicacoes`
--

CREATE TABLE `publicacoes` (
  `publicacao_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `estado_pub` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publicacoes`
--

INSERT INTO `publicacoes` (`publicacao_id`, `user_id`, `conteudo`, `estado_pub`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1165, 1, 'The shift to hybrid work has made a Zero Trust framework crucial to an organisation’s success. Accelerate your strategy today with our free eBook. ', 1, '2022-07-09 04:44:58', '2022-07-09 05:44:58', NULL),
(1166, 6, 'No caso de achares que estás a trabalhar sob pressão', 1, '2022-07-09 04:48:31', '2022-07-09 05:48:31', NULL),
(1167, 7, 'Este design esta semelhante ao do Facebook', 1, '2022-07-09 05:18:19', '2022-07-13 20:19:28', NULL),
(1172, 16, 'BEM-VINDOS AO BUBBLEEEEEE !!!!!!', 1, '2022-07-14 07:38:35', '2022-07-16 04:57:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publicacoes_fav`
--

CREATE TABLE `publicacoes_fav` (
  `id_pub_fav` int(11) NOT NULL,
  `id_pub` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publicacoes_fav`
--

INSERT INTO `publicacoes_fav` (`id_pub_fav`, `id_pub`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 1100, 1, '2022-06-26 02:13:15', '2022-06-26 03:13:15'),
(2, 1094, 1, '2022-06-26 17:21:06', '2022-06-26 18:21:06'),
(3, 1099, 1, '2022-07-05 04:21:59', '2022-07-05 05:21:59');

-- --------------------------------------------------------

--
-- Table structure for table `publicacoes_fotos`
--

CREATE TABLE `publicacoes_fotos` (
  `publicacao__foto_id` int(11) NOT NULL,
  `publicacao_id` int(11) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publicacoes_fotos`
--

INSERT INTO `publicacoes_fotos` (`publicacao__foto_id`, `publicacao_id`, `caminho`, `created_at`, `updated_at`) VALUES
(160, 1165, 'd876f2f3026029b9f08e21e4c127b61c8bcd64e4.png', '2022-07-09 04:44:58', '2022-07-09 05:44:58'),
(161, 1166, '21a014576ba222ce4de7c207f63b0d6e56dc58cd.png', '2022-07-09 04:48:31', '2022-07-09 05:48:31'),
(164, 1171, '9f05fded3fad70f20a93fb9a8f4a0086c4a4281d.jpg', '2022-07-13 19:16:59', '2022-07-13 20:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id_report` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publicacao_id` int(11) DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `report_comment` text DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `data` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seguir`
--

CREATE TABLE `seguir` (
  `id_seguir` int(11) NOT NULL,
  `id_seguidor` int(11) DEFAULT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seguir`
--

INSERT INTO `seguir` (`id_seguir`, `id_seguidor`, `id_utilizador`, `created_at`, `updated_at`) VALUES
(8, 1, 6, '2022-06-26 02:23:12', '2022-06-26 03:23:12'),
(24, 12, 1, '2022-07-05 00:49:29', '2022-07-05 01:49:29'),
(27, 1, 10, '2022-07-05 00:54:33', '2022-07-05 01:54:33'),
(33, 10, 12, '2022-07-05 01:01:13', '2022-07-05 02:01:13'),
(37, 12, 10, '2022-07-05 01:03:13', '2022-07-05 02:03:13'),
(38, 12, 6, '2022-07-05 01:03:27', '2022-07-05 02:03:27'),
(39, 12, 7, '2022-07-05 01:03:33', '2022-07-05 02:03:33'),
(41, 1, 12, '2022-07-05 01:06:03', '2022-07-05 02:06:03'),
(52, 23, 25, '2022-07-13 02:31:07', '2022-07-13 03:31:07'),
(53, 23, 24, '2022-07-13 02:31:12', '2022-07-13 03:31:12'),
(54, 23, 16, '2022-07-13 02:31:16', '2022-07-13 03:31:16'),
(55, 24, 23, '2022-07-13 02:32:49', '2022-07-13 03:32:49'),
(56, 24, 25, '2022-07-13 02:32:51', '2022-07-13 03:32:51'),
(57, 24, 16, '2022-07-13 02:33:17', '2022-07-13 03:33:17'),
(58, 25, 24, '2022-07-13 02:35:07', '2022-07-13 03:35:07'),
(59, 25, 23, '2022-07-13 02:35:11', '2022-07-13 03:35:11'),
(60, 25, 16, '2022-07-13 02:35:15', '2022-07-13 03:35:15'),
(61, 16, 23, '2022-07-13 02:35:34', '2022-07-13 03:35:34'),
(62, 16, 24, '2022-07-13 02:35:37', '2022-07-13 03:35:37'),
(68, 16, 25, '2022-07-13 12:47:24', '2022-07-13 13:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_user`
--

CREATE TABLE `tipo_user` (
  `tipo_user_id` int(11) NOT NULL,
  `nome_tipo_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo_user`
--

INSERT INTO `tipo_user` (`tipo_user_id`, `nome_tipo_user`) VALUES
(1, 'Administrador'),
(2, 'Utilizador');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `vkey` varchar(255) NOT NULL,
  `sobre` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT 'foto_banner_default.jpg',
  `profile_image` varchar(255) DEFAULT 'foto_perfil_default.png',
  `nacionalidade` int(11) DEFAULT 250,
  `tipo` int(11) DEFAULT 2,
  `estado` int(11) DEFAULT NULL,
  `genero` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_nascimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nome`, `username`, `email`, `password`, `vkey`, `sobre`, `skills`, `banner_image`, `profile_image`, `nacionalidade`, `tipo`, `estado`, `genero`, `created_at`, `updated_at`, `data_nascimento`) VALUES
(1, 'Microsoft Portugal', 'MicrosoftPortugal', 'user1@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'Every company has a mission.', 'Desenvolvimento de software', 'fc4748c1d2a152b6d52c888ac9681901ab309b7e.jpg', '65679cda762da9427a2ba545934e10b8adb141d0.jpg', 183, 2, 2, 1, '2022-05-18 08:10:23', '2022-07-16 06:34:07', '2003-03-18'),
(6, 'GeeksGods', 'GeeksGods', 'user2@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'GeeksGod has been providing ample opportunities to aspirants. We started in March 2020 & at a time when layoffs and unemployment were at their peak.', 'Job Updates | Internships | Free Courses With Certification', '9a3eca01ce6abb0dfebeba13c1d92c032d766ede.jpg', '125fbd3eb4373c511244428635b3bd8b82190494.jpg', 235, 2, 2, 1, '2022-06-14 02:10:47', '2022-07-16 18:27:44', '1986-09-14'),
(7, 'Filipe Vieira', 'fifi', 'user3@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'Nunca fico satisfeito com nada', 'editorX', 'bec19ed9b9c310bc7fd5e34bcdbc69c57efdad84.jpg', 'eb27cfb71b06308fcc66631f7cb6b060c4b44864.png', 60, 2, 2, 1, '2022-06-20 13:44:32', '2022-07-16 18:59:49', '2003-09-14'),
(10, 'Emanuel Sousa', 'EmanuelSousa', 'user4@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'Operation Supervisor na McDonald\'s', 'McDonald\'s', '95408d8ebf71230a7e4d0b962b9ad9614ecfb6ac.jpg', '48c0dfbd4468ea81da659ba1057ce0b289f0aaea.jpg', 183, 2, 1, 1, '2022-06-26 21:29:14', '2022-07-09 06:03:02', '2003-03-20'),
(12, 'Luciana Santos', 'lucylucy123', 'user5@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'Web dev', 'HTML CSS JS PHP MYSQL\r\n', 'a443e9e7604cf74f67b6bc3f23c6a5c5e045a6a8.jpg', '37fcaf99601383adf733febb9df8e21bfb8ba5e0.jpg', 7, 2, 1, 1, '2022-07-05 00:44:39', '2022-07-09 06:09:05', '2003-12-12'),
(14, 'Tyrone Jeff', 'tyjeff_12', 'user6@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'Heineken Software enginner', 'Python and Javascript\r\n', 'd6aadf193ebe17878be92e0af62a9e49f242051f.jpg', '76ce2374ccd94a80884f1c51213a40f4d0de0b0a.jpg', 56, 2, 1, 1, '2022-07-10 07:39:51', '2022-07-11 04:12:59', '1983-12-12'),
(15, 'Carlos Silva', 'carly_silvinha', 'user7@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'CEO Github', 'Reforma', 'foto_banner_default.jpg', '25e4066b42e3f871954fefab92e91c8a406d94d9.jpg', 183, 2, 1, 1, '2022-07-10 07:41:27', '2022-07-11 04:12:58', '1999-12-12'),
(16, 'João Barros', 'barros', 'barros@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'CEO do Bubble | Desenvolvimento Web e Multimedia no IPL', 'PHP | JQuery | Boostrap', '636159831d6b9ec1c450a6c722f9068b3ff98455.jpg', 'c39b89fdf147d1eae65651043a2601366e3c9b8a.jpg', 183, 1, 2, 1, '2022-07-10 07:44:45', '2022-07-15 18:16:42', '2003-03-18'),
(23, 'João Duarte', 'bartz', 'bartz@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'CFO do Bubble | Desenvolvimento Web e Multimedia no IPL', 'PHP | JQuery | Boostrap', 'a3c175add0461bdd86cd426207dc9759256ccc0e.jpg', 'af88a708224f1b601668a9e7969fec2634fd8be7.jpg', 22, 2, 1, 1, '2022-07-13 02:17:42', '2022-07-13 03:30:52', '2003-12-12'),
(24, 'André Sousa', 'sousaexe', 'sousaexe@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'CTO do Bubble | Desenvolvimento Web e Multimedia no IPL', 'PHP | JQuery | Boostrap', 'c3cd15847f360f9c0c39a1c1c454978d091249ea.jpg', '9a558ee841fbd23e5abb80dd15a05ff7ac69f352.jpg', 183, 2, 1, 1, '2022-07-13 02:20:05', '2022-07-13 03:34:40', '2001-06-06'),
(25, 'Micael Pereira', 'mica', 'mica@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'COO do Bubble | Desenvolvimento Web e Multimedia no IPL', 'PHP | JQuery | Boostrap', 'foto_banner_default.jpg', 'foto_perfil_default.png', 250, 2, 1, 1, '2022-07-13 02:22:52', '2022-07-13 03:28:07', '2003-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `estados_users`
--
ALTER TABLE `estados_users`
  ADD PRIMARY KEY (`estado_user_id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `files_css_paginas_site`
--
ALTER TABLE `files_css_paginas_site`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `files_js_paginas_site`
--
ALTER TABLE `files_js_paginas_site`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `foto_emprego`
--
ALTER TABLE `foto_emprego`
  ADD PRIMARY KEY (`idfoto`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genero_id`);

--
-- Indexes for table `gostos`
--
ALTER TABLE `gostos`
  ADD PRIMARY KEY (`gosto_id`);

--
-- Indexes for table `guardados`
--
ALTER TABLE `guardados`
  ADD PRIMARY KEY (`id_guardado`);

--
-- Indexes for table `historico_pesquisa`
--
ALTER TABLE `historico_pesquisa`
  ADD PRIMARY KEY (`id_historico`);

--
-- Indexes for table `ip_sessions`
--
ALTER TABLE `ip_sessions`
  ADD PRIMARY KEY (`id_ip_sessions`);

--
-- Indexes for table `marketplace`
--
ALTER TABLE `marketplace`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_mensagem`);

--
-- Indexes for table `nacionalidades`
--
ALTER TABLE `nacionalidades`
  ADD PRIMARY KEY (`nacionalidade_id`);

--
-- Indexes for table `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id_notificacao`);

--
-- Indexes for table `notificacoes_comentario`
--
ALTER TABLE `notificacoes_comentario`
  ADD PRIMARY KEY (`notificacao_comentario_id`);

--
-- Indexes for table `notificacoes_gosto`
--
ALTER TABLE `notificacoes_gosto`
  ADD PRIMARY KEY (`notificacao_gosto_id`);

--
-- Indexes for table `notificacoes_mensagem`
--
ALTER TABLE `notificacoes_mensagem`
  ADD PRIMARY KEY (`notificacao_mensagem_id`);

--
-- Indexes for table `notificacoes_seguir`
--
ALTER TABLE `notificacoes_seguir`
  ADD PRIMARY KEY (`notificacao_seguir_id`);

--
-- Indexes for table `oferta_emprego`
--
ALTER TABLE `oferta_emprego`
  ADD PRIMARY KEY (`id_oferta`);

--
-- Indexes for table `paginas_site`
--
ALTER TABLE `paginas_site`
  ADD PRIMARY KEY (`id_pag`);

--
-- Indexes for table `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`publicacao_id`);

--
-- Indexes for table `publicacoes_fav`
--
ALTER TABLE `publicacoes_fav`
  ADD PRIMARY KEY (`id_pub_fav`);

--
-- Indexes for table `publicacoes_fotos`
--
ALTER TABLE `publicacoes_fotos`
  ADD PRIMARY KEY (`publicacao__foto_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`id_seguir`),
  ADD KEY `id_utilizador_2` (`id_utilizador`);

--
-- Indexes for table `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`tipo_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estados_users`
--
ALTER TABLE `estados_users`
  MODIFY `estado_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `files_css_paginas_site`
--
ALTER TABLE `files_css_paginas_site`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `files_js_paginas_site`
--
ALTER TABLE `files_js_paginas_site`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `foto_emprego`
--
ALTER TABLE `foto_emprego`
  MODIFY `idfoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gostos`
--
ALTER TABLE `gostos`
  MODIFY `gosto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `guardados`
--
ALTER TABLE `guardados`
  MODIFY `id_guardado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historico_pesquisa`
--
ALTER TABLE `historico_pesquisa`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `ip_sessions`
--
ALTER TABLE `ip_sessions`
  MODIFY `id_ip_sessions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `marketplace`
--
ALTER TABLE `marketplace`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `nacionalidades`
--
ALTER TABLE `nacionalidades`
  MODIFY `nacionalidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notificacoes_comentario`
--
ALTER TABLE `notificacoes_comentario`
  MODIFY `notificacao_comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notificacoes_gosto`
--
ALTER TABLE `notificacoes_gosto`
  MODIFY `notificacao_gosto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notificacoes_mensagem`
--
ALTER TABLE `notificacoes_mensagem`
  MODIFY `notificacao_mensagem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificacoes_seguir`
--
ALTER TABLE `notificacoes_seguir`
  MODIFY `notificacao_seguir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oferta_emprego`
--
ALTER TABLE `oferta_emprego`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paginas_site`
--
ALTER TABLE `paginas_site`
  MODIFY `id_pag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `publicacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1173;

--
-- AUTO_INCREMENT for table `publicacoes_fav`
--
ALTER TABLE `publicacoes_fav`
  MODIFY `id_pub_fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `publicacoes_fotos`
--
ALTER TABLE `publicacoes_fotos`
  MODIFY `publicacao__foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `seguir`
--
ALTER TABLE `seguir`
  MODIFY `id_seguir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `tipo_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
