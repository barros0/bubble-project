-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 11:31 AM
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
(2, 1, 'Muito lindo', NULL, '2022-06-13 17:12:58', '2022-06-13 18:51:41', 1091),
(5, 6, 'ola', NULL, '2022-06-14 13:25:47', '2022-06-14 14:25:47', 1094),
(6, 6, 'teste', NULL, '2022-06-15 09:14:34', '2022-06-15 10:18:21', 1094),
(7, 6, 'dwadwa', NULL, '2022-06-15 09:20:47', '2022-06-15 10:20:47', 1094),
(8, 1, 'teste1', NULL, '2022-06-19 04:36:36', '2022-06-23 09:24:41', 1095),
(10, 1, 'teste', NULL, '2022-06-23 08:24:30', '2022-06-23 09:24:30', 1100),
(11, 1, 'dwadwa', NULL, '2022-07-01 09:49:48', '2022-07-01 10:49:48', 1105),
(12, 1, 'ola', NULL, '2022-07-05 04:35:19', '2022-07-05 05:35:19', 1099);

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
(43, 16, 'css/anaStyles.css'),
(44, 19, 'css/insere_emprego.css'),
(45, 17, 'css/definicoes.css'),
(46, 18, 'css/definicoes.css'),
(47, 20, 'css/singleEmprego.css'),
(48, 21, 'css/empregos.css'),
(49, 22, 'css/insere_emprego.css'),
(50, 23, 'css/definicoes.css'),
(53, 26, 'css/feed.css');

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
(24, 15, 'js/inserirempregos.js'),
(25, 16, 'js/marketplace.js'),
(26, 16, 'https://cdn.tailwindcss.com'),
(27, 17, 'js/definicoes.js'),
(28, 18, 'js/definicoes.js'),
(29, 13, 'js/feed.js'),
(30, 13, 'js/like.js'),
(31, 13, 'js/comments.js'),
(34, 26, 'js/like.js'),
(35, 26, 'js/comments.js'),
(36, 26, 'js/feed.js');

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
  `gosto` tinyint(1) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gostos`
--

INSERT INTO `gostos` (`gosto_id`, `user_id`, `publicacao_id`, `gosto`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2022-05-20 08:44:10', '2022-05-20 09:44:10');

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
(1, 1, 'Ola', '2022-06-21 19:07:59', '2022-06-21 20:07:59'),
(2, 1, 'Ola', '2022-06-21 19:07:59', '2022-06-21 20:07:59'),
(3, 1, 'da', '2022-06-21 19:08:08', '2022-06-21 20:08:08'),
(4, 1, 'da', '2022-06-21 19:08:08', '2022-06-21 20:08:08'),
(5, 1, 'ola', '2022-07-01 08:21:43', '2022-07-01 09:21:43'),
(6, 1, 'ola', '2022-07-01 08:21:43', '2022-07-01 09:21:43'),
(7, 1, 'xo', '2022-07-01 08:22:01', '2022-07-01 09:22:01'),
(8, 1, 'xo', '2022-07-01 08:22:01', '2022-07-01 09:22:01'),
(9, 1, 'xo', '2022-07-01 09:52:52', '2022-07-01 10:52:52'),
(10, 1, 'xo', '2022-07-01 09:52:52', '2022-07-01 10:52:52'),
(11, 12, 'Ola', '2022-07-05 00:48:11', '2022-07-05 01:48:11'),
(12, 12, 'Ola', '2022-07-05 00:48:11', '2022-07-05 01:48:11');

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
(114, 1, '::1', '', '2022-07-01 01:04:34'),
(115, 1, '::1', '', '2022-07-01 01:15:04'),
(116, 1, '::1', '', '2022-07-01 08:14:13'),
(117, 1, '::1', '', '2022-07-01 09:48:50'),
(118, 1, '::1', '', '2022-07-01 09:49:02'),
(119, 1, '::1', '', '2022-07-01 10:00:11'),
(120, 1, '::1', '', '2022-07-01 12:30:01'),
(121, 1, '::1', '', '2022-07-01 13:45:13'),
(122, 1, '::1', '', '2022-07-01 13:45:24'),
(123, 1, '::1', '', '2022-07-02 19:45:28'),
(124, 1, '::1', '', '2022-07-03 00:23:51'),
(125, 1, '::1', '', '2022-07-03 05:23:04'),
(126, 1, '::1', '', '2022-07-03 09:05:44'),
(127, 1, '::1', '', '2022-07-03 18:32:54'),
(128, 1, '::1', '', '2022-07-03 19:25:14'),
(129, 1, '::1', '', '2022-07-04 02:17:25'),
(130, 1, '::1', '', '2022-07-04 04:43:06'),
(131, 1, '::1', '', '2022-07-04 05:26:56'),
(132, 1, '::1', '', '2022-07-04 18:01:18'),
(133, 1, '::1', '', '2022-07-04 20:07:08'),
(134, 6, '::1', '', '2022-07-04 20:24:42'),
(135, 6, '::1', '', '2022-07-04 21:05:01'),
(136, 6, '::1', '', '2022-07-04 23:46:32'),
(137, 12, '::1', '', '2022-07-05 00:44:52'),
(138, 12, '::1', '', '2022-07-05 01:04:52'),
(139, 1, '::1', '', '2022-07-05 01:05:08'),
(140, 1, '::1', '', '2022-07-05 02:24:19'),
(141, 1, '::1', '', '2022-07-05 03:16:40'),
(142, 1, '::1', '', '2022-07-05 07:13:20');

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
(1, 1, 'Produto Um', 'cat-1', '15', NULL, '2022-05-27 09:27:52', '2022-06-13 10:29:47', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(2, 1, 'Produto Dois', 'cat-1', '16', NULL, '2022-05-27 09:28:15', '2022-06-13 10:30:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(3, 1, 'Produto Três', 'cat-4', '9', NULL, '2022-05-27 09:28:32', '2022-06-13 10:30:22', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(4, 1, 'Produto Quatro', 'cat-1', '12', NULL, '2022-06-13 08:14:17', '2022-06-13 10:30:37', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(5, 1, 'Produto Cinco', 'cat-2', '13', NULL, '2022-06-13 09:32:12', '2022-06-13 10:32:12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(6, 1, 'Produto Seis', 'cat-3', '20', NULL, '2022-06-13 09:32:31', '2022-06-13 10:32:31', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(7, 1, 'Produto Sete', 'cat-5', '15', NULL, '2022-06-13 09:32:56', '2022-06-13 10:33:12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'),
(8, 1, 'Produto Oito', 'cat-4', '8', NULL, '2022-06-13 10:04:05', '2022-06-13 11:04:05', 'sdfghjdgnkfdhktu');

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
(1, 1, 1, 'gvghgf', 1, '2022-05-27 08:38:32', '2022-05-27 09:38:32'),
(2, 1, 6, '1234213', 1, '2022-07-04 20:12:15', '2022-07-04 21:25:10'),
(3, 1, 6, 'dwa', 1, '2022-07-04 20:24:16', '2022-07-04 21:25:12'),
(4, 6, 1, 'dwadwa', 1, '2022-07-04 20:25:17', '2022-07-04 21:25:17'),
(5, 1, 1, 'dwadwa', 1, '2022-07-04 20:26:13', '2022-07-04 21:26:13'),
(6, 1, 6, 'dwa', 1, '2022-07-04 20:51:22', '2022-07-04 21:51:22'),
(7, 1, 1, 'dwadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwawadwadwa', 1, '2022-07-04 23:45:17', '2022-07-05 00:45:17'),
(8, 6, 1, 'dwadwa', 1, '2022-07-04 23:48:25', '2022-07-05 00:48:25'),
(9, 6, 1, 'dwadwa', 1, '2022-07-04 23:55:14', '2022-07-05 00:55:14'),
(10, 6, 1, 'dwadwadwa', 1, '2022-07-04 23:55:16', '2022-07-05 00:55:16'),
(12, 1, 7, 'dwa', 1, '2022-07-05 00:12:14', '2022-07-05 01:12:14'),
(13, 12, 1, 'boas', 1, '2022-07-05 00:47:00', '2022-07-05 01:47:00'),
(14, 1, 6, 'dwa', 1, '2022-07-05 03:07:29', '2022-07-05 04:07:29');

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
(1, 1, 1, '2022-05-19 10:20:17', '2022-05-19 11:27:58'),
(2, 1, 1, '2022-05-19 10:39:35', '2022-05-19 11:39:35'),
(3, 1, 1, '2022-05-20 08:28:26', '2022-05-20 09:28:26');

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
(1, 1, 1, '2022-05-20 08:28:13', '2022-05-20 09:28:13');

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

--
-- Dumping data for table `notificacoes_seguir`
--

INSERT INTO `notificacoes_seguir` (`notificacao_seguir_id`, `id_notificao`, `id_seguir`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-27 08:41:17', '2022-05-27 09:41:17');

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
(6, 1, '', 'Full Stack Developer', 'Conhecimentos de PHP,JS, CSS', 2, 'Curso TeSP ou Equivalência', 'Mínimo 2 Anos', 'Leiria', 'Remoto / Presencial', 'Full-Time', 'Web Development teste', 'Emprego flexível, horários rotativos.', '2022-06-27 16:09:35', '2022-07-01 10:51:56'),
(7, 1, '', 'Web Designer', 'Conhecimentos de Adobe Illustrator', 1, 'Curso Superior', 'Sem Experiência Mínima', 'Lisboa', 'Remoto', 'Part-Time', 'Design', 'Procuro Web Designer com ou sem experiência para desenvolvimento de website em part-time.', '2022-06-27 16:10:05', '2022-07-01 10:22:52'),
(8, 7, '', 'Técnico de Cibersegurança', 'Conhecimentos de Linux', 2, 'Licenciatura ou Superior', '4 anos', 'Porto', 'Presencial', 'Full Time', 'Cibersegurança', 'Procuramos técnicos especializados em cibersegurança, com experiência', '2022-06-27 17:07:26', '2022-07-01 10:28:07');

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
(26, 'partilha.php', 'Partilha');

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
(1091, 1, 'aaaa', 1, '2022-06-08 18:21:09', '2022-07-04 19:29:58', NULL),
(1094, 1, 'dwadwa', 1, '2022-06-14 13:17:47', '2022-07-04 19:29:55', NULL),
(1099, 7, 'Boas maltinha, estou a desenvolver uma nova app o que acham da UI/UX', 1, '2022-06-20 13:53:21', '2022-06-20 14:56:34', NULL),
(1100, 7, 'Procuro emprego', 1, '2022-06-20 13:58:45', '2022-06-20 14:58:45', NULL),
(1102, 10, 'ddwadawdawad', 1, '2022-06-26 21:37:52', '2022-07-04 06:30:42', NULL),
(1103, 10, 'dwadwadwa', 1, '2022-06-26 21:38:01', '2022-06-26 22:38:01', NULL),
(1104, 10, 'dwadwadw', 1, '2022-06-26 21:38:56', '2022-06-26 22:38:56', NULL),
(1105, 10, 'dwadwa', 1, '2022-06-26 21:39:27', '2022-06-26 22:39:27', NULL),
(1155, 1, 'texto', 1, '2022-07-01 15:07:50', '2022-07-04 19:33:29', NULL),
(1163, 12, 'Ola estou numa apresentacao', 1, '2022-07-05 00:45:58', '2022-07-05 01:46:15', NULL);

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
(120, 1091, 'c87d4bb4b8a18ab8caee393ff0c23698ccd2e026.jpg', '2022-06-08 18:21:09', '2022-06-08 19:21:09'),
(121, 1095, '6297e25a992f183134077dc5e0f32d03ba7b5ad7.jpg', '2022-06-15 10:25:00', '2022-06-15 11:25:00'),
(125, 1099, '73dd04a57c80ed230911e1a14b0d60d230726326.png', '2022-06-20 13:53:21', '2022-06-20 14:53:21'),
(126, 1103, '5d981a92b35eaf91bc7d7edcf845461a8d3cbbf7.jpg', '2022-06-26 21:38:01', '2022-06-26 22:38:01'),
(127, 1107, 'c5362365a1773ed890ef0b94310508b3767dc831.JPG', '2022-06-26 21:41:54', '2022-06-26 22:41:54'),
(128, 1108, 'c04f7439ecaa731f0aa53a9c83dc8244673b1b03.jpg', '2022-06-26 21:45:15', '2022-06-26 22:45:15'),
(144, 1152, '03348a750a7bf686f8cbd21b63db3de9cb8e4391.jpg', '2022-07-01 14:33:09', '2022-07-01 15:33:09'),
(152, 1154, '24388c733902e04abce7d5c7315818fcb127e7f5.jpg', '2022-07-01 15:00:15', '2022-07-01 16:00:15'),
(153, 1157, 'a837e458767522f7ef2df3f548ccc90d49a9fa4e.jpg', '2022-07-01 15:08:22', '2022-07-01 16:08:22'),
(154, 1158, '612c53857001da90090b16cc5244b9435b2554a9.jpg', '2022-07-01 15:08:43', '2022-07-01 16:08:43'),
(155, 1159, '5da6510eb3314b74e5a78091324fef50339eb15b.jpg', '2022-07-01 15:09:01', '2022-07-01 16:09:01'),
(156, 1160, 'f46f5af77bf12e65ca5a4a3dac6ad3bbcd3c7875.jpg', '2022-07-01 15:09:26', '2022-07-01 16:09:26'),
(157, 1161, 'ef1aa70a6996492bfa7ccd9625aa0dd4b416b4fa.jpg', '2022-07-01 15:09:37', '2022-07-01 16:09:37'),
(158, 1162, 'cb022f35297913a5882ffb94b2db5340b59f55d4.jpg', '2022-07-01 15:10:23', '2022-07-01 16:10:23'),
(159, 1163, 'b29a6366b4f0fec2b8e50cd69ec990513ff8dc24.jpg', '2022-07-05 00:45:58', '2022-07-05 01:45:58');

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
  `data` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id_report`, `user_id`, `publicacao_id`, `categoria`, `report_comment`, `data`) VALUES
(4, 1, 1091, 'Nudez', 'nudez', '2022-07-04'),
(5, 12, 1091, 'Spam', 'spam', '2022-07-05');

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
(41, 1, 12, '2022-07-05 01:06:03', '2022-07-05 02:06:03');

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
(1, 'Xo Lopes da Silva', 'Xo_Guarda', 'porcoassassino1@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'Ola', 'Ola', '7f55890e2eca38e794328338d96ca031e882f85f.jpg', 'c26d30104e7524585eb5c4682c43990e15597bdb.jpg', 183, 1, 1, 1, '2022-05-18 08:10:23', '2022-07-04 19:42:05', '2003-03-18'),
(6, 'joao', 'joao', '123@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', NULL, NULL, 'foto_banner_default.jpg', 'foto_perfil_default.png', 22, 2, 1, 1, '2022-06-14 02:10:47', '2022-06-23 15:16:42', '1986-09-14'),
(7, 'André Sousa', 'sousaexe', 'lalala@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'Aluno de desenvolvimento web', 'HTML | CSS | JAVASCRIPT | PHP | SQL | JAVA', 'bda67a1825d4ef6d8bcdaceca7ad6448728e9745.jpeg', 'e2df563aef12fa99cb9d21aee0eae9b0e35d2735.jpeg', 1, 2, 1, 1, '2022-06-20 13:44:32', '2022-06-26 22:32:58', '2003-09-14'),
(10, 'Diogo Raimundo', 'FlávioNeta', 'antoniobiscainha@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', '', 'LAlal', 'Lalala', '29d38830dd46dc41d0b31f7ae3703842a84c0eea.jpg', '661cede78dfdf093bf37119c0484c48312b9df86.jpg', 18, 2, 1, 1, '2022-06-26 21:29:14', '2022-07-03 06:43:13', '2003-03-20'),
(12, 'Sr.RicardoDos', 'Rixa123_bubble', '123455555555@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', '', 'Web dev', 'HTML CSS JS PHP MYSQL\r\n', '3367c73d20d9ed81fb15fb7c5296535f75521a58.jpg', '5c9d1f4955a848614fb972537f71b58f74279f4f.jpg', 183, 2, 1, 1, '2022-07-05 00:44:39', '2022-07-05 01:48:39', '2003-12-12');

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
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `files_js_paginas_site`
--
ALTER TABLE `files_js_paginas_site`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `gosto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guardados`
--
ALTER TABLE `guardados`
  MODIFY `id_guardado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historico_pesquisa`
--
ALTER TABLE `historico_pesquisa`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ip_sessions`
--
ALTER TABLE `ip_sessions`
  MODIFY `id_ip_sessions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `marketplace`
--
ALTER TABLE `marketplace`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nacionalidades`
--
ALTER TABLE `nacionalidades`
  MODIFY `nacionalidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notificacoes_comentario`
--
ALTER TABLE `notificacoes_comentario`
  MODIFY `notificacao_comentario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificacoes_gosto`
--
ALTER TABLE `notificacoes_gosto`
  MODIFY `notificacao_gosto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_pag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `publicacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1164;

--
-- AUTO_INCREMENT for table `publicacoes_fav`
--
ALTER TABLE `publicacoes_fav`
  MODIFY `id_pub_fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publicacoes_fotos`
--
ALTER TABLE `publicacoes_fotos`
  MODIFY `publicacao__foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seguir`
--
ALTER TABLE `seguir`
  MODIFY `id_seguir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `tipo_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
