-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 03:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
(7, 6, 'dwadwa', NULL, '2022-06-15 09:20:47', '2022-06-15 10:20:47', 1094);

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
(10, 'CES', 'Rua da Beleza', 'We save our participants significant amounts of time and money by soliciting bids and proposals on a state and national level and award contracts on their behalf.', '9954090ee0cd81548423a3d52c545dbc1ab82463.jpg', '2022-06-13 01:11:03', '2022-06-13 02:13:04'),
(11, 'Web Summit', 'Campo pequeno', 'ffbnvhydcvhjjfdrcgh', '7a2c4b66b9950dad4166de78ec7e80af2436777c.jpeg', '2022-06-13 10:02:37', '2022-06-13 11:02:37');

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
(1, 1, 1, 'gvghgf', 1, '2022-05-27 08:38:32', '2022-05-27 09:38:32');

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
(249, 'Zimbabwe', 'Zimbabwe', 'Zimbabue', 716, 'ZWE', 'ZW');

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

INSERT INTO `oferta_emprego` (`id_oferta`, `foto`, `titulo`, `requisitos`, `vagas`, `qualificacoes`, `experiencia`, `localizacao`, `tipo`, `horario`, `categoria`, `descricao`, `created_at`, `updated_at`) VALUES
(1, 'http://blog.adrianalombardo.com/wp-content/uploads/2019/08/como-encontrar-emprego.jpg', 'Full Stack Developer', 'Conhecimentos PHP / MySQL / HTML / JS', 2, 'Curso TeSP ou Superior', '2 anos experiência', 'Leiria', 'Remoto / Presencial', 'Full Time', 'Desenvolvimento Web', 'Teste descrição', '2022-06-11 15:53:58', '2022-06-11 16:53:58');

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
(1091, 1, 'aaaa', 1, '2022-06-08 18:21:09', '2022-06-13 12:08:39', NULL),
(1094, 1, 'dwadwa', 1, '2022-06-14 13:17:47', '2022-06-14 14:17:47', NULL),
(1095, 6, 'teste', 1, '2022-06-15 10:25:00', '2022-06-15 11:25:00', NULL);

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
(122, 1096, '924e4f712b731a7847426e5a15ed2a511dbe5a9b.jpg', '2022-06-15 17:42:54', '2022-06-15 18:42:54');

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
(1, 1, 1, '2022-05-27 08:38:45', '2022-05-27 09:38:45');

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
  `sobre` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT 'foto_banner_default.jpg',
  `profile_image` varchar(255) DEFAULT 'foto_perfil_default.png',
  `nacionalidade` int(11) DEFAULT NULL,
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

INSERT INTO `users` (`id_user`, `nome`, `username`, `email`, `password`, `sobre`, `skills`, `banner_image`, `profile_image`, `nacionalidade`, `tipo`, `estado`, `genero`, `created_at`, `updated_at`, `data_nascimento`) VALUES
(1, 'Xo Lopes da Silva', 'Xo_Guarda', 'porcoassassino1@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'ola', 'ola', '30c1713669926d3ff345dcb111e292e13353abab.jpg', '054125beccde42ed19193974844ce77a285a62d6.jpg', 22, 1, 1, 1, '2022-05-18 08:10:23', '2022-06-14 14:17:09', '2011-11-03'),
(6, 'joao', 'joao', '123@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', NULL, NULL, 'foto_banner_default.jpg', 'foto_perfil_default.png', 22, 2, 1, 1, '2022-06-14 02:10:47', '2022-06-14 14:17:11', '2144-12-31');

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
-- Indexes for table `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`id_seguir`),
  ADD UNIQUE KEY `id_utilizador` (`id_utilizador`);

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
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marketplace`
--
ALTER TABLE `marketplace`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nacionalidades`
--
ALTER TABLE `nacionalidades`
  MODIFY `nacionalidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

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
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `publicacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1098;

--
-- AUTO_INCREMENT for table `publicacoes_fav`
--
ALTER TABLE `publicacoes_fav`
  MODIFY `id_pub_fav` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publicacoes_fotos`
--
ALTER TABLE `publicacoes_fotos`
  MODIFY `publicacao__foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `seguir`
--
ALTER TABLE `seguir`
  MODIFY `id_seguir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `tipo_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
