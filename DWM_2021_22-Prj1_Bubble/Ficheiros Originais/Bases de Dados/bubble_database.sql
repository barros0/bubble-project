-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2022 às 11:08
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bubble_database`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `resposta_id` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados_users`
--

CREATE TABLE `estados_users` (
  `estado_user_id` int(11) NOT NULL,
  `nome_estado_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estados_users`
--

INSERT INTO `estados_users` (`estado_user_id`, `nome_estado_user`) VALUES
(1, 'Aguardar confirmação email'),
(2, 'Ativo'),
(3, 'Desativado'),
(4, 'Suspenso'),
(5, 'Banido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `faqs`
--

CREATE TABLE `faqs` (
  `id_faq` int(11) NOT NULL,
  `resposta` varchar(255) DEFAULT NULL,
  `pergunta` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `generos`
--

CREATE TABLE `generos` (
  `genero_id` int(11) NOT NULL,
  `sigla_genero` varchar(10) NOT NULL,
  `nome_genero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `generos`
--

INSERT INTO `generos` (`genero_id`, `sigla_genero`, `nome_genero`) VALUES
(1, 'm', 'Masculino'),
(2, 'f', 'Femenino'),
(3, 'o', 'Outro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gostos`
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
-- Extraindo dados da tabela `gostos`
--

INSERT INTO `gostos` (`gosto_id`, `user_id`, `publicacao_id`, `gosto`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2022-05-20 08:44:10', '2022-05-20 09:44:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_pesquisa`
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
-- Estrutura da tabela `marketplace`
--

CREATE TABLE `marketplace` (
  `id_produto` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `preco` decimal(10,0) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nacionalidades`
--

CREATE TABLE `nacionalidades` (
  `nacionalidade_id` int(11) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `gentilico` varchar(255) NOT NULL,
  `sigla` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `nacionalidades`
--

INSERT INTO `nacionalidades` (`nacionalidade_id`, `pais`, `gentilico`, `sigla`) VALUES
(1, 'Afganistán', 'AFGANA', 'AFG'),
(2, 'Albania', 'ALBANESA', 'ALB'),
(3, 'Alemania', 'ALEMANA', 'DEU'),
(4, 'Andorra', 'ANDORRANA', 'AND'),
(5, 'Angola', 'ANGOLEÑA', 'AGO'),
(6, 'AntiguayBarbuda', 'ANTIGUANA', 'ATG'),
(7, 'ArabiaSaudita', 'SAUDÍ', 'SAU'),
(8, 'Argelia', 'ARGELINA', 'DZA'),
(9, 'Argentina', 'ARGENTINA', 'ARG'),
(10, 'Armenia', 'ARMENIA', 'ARM'),
(11, 'Aruba', 'ARUBEÑA', 'ABW'),
(12, 'Australia', 'AUSTRALIANA', 'AUS'),
(13, 'Austria', 'AUSTRIACA', 'AUT'),
(14, 'Azerbaiyán', 'AZERBAIYANA', 'AZE'),
(15, 'Bahamas', 'BAHAMEÑA', 'BHS'),
(16, 'Bangladés', 'BANGLADESÍ', 'BGD'),
(17, 'Barbados', 'BARBADENSE', 'BRB'),
(18, 'Baréin', 'BAREINÍ', 'BHR'),
(19, 'Bélgica', 'BELGA', 'BEL'),
(20, 'Belice', 'BELICEÑA', 'BLZ'),
(21, 'Benín', 'BENINÉSA', 'BEN'),
(22, 'Bielorrusia', 'BIELORRUSA', 'BLR'),
(23, 'Birmania', 'BIRMANA', 'MMR'),
(24, 'Bolivia', 'BOLIVIANA', 'BOL'),
(25, 'BosniayHerzegovina', 'BOSNIA', 'BIH'),
(26, 'Botsuana', 'BOTSUANA', 'BWA'),
(27, 'Brasil', 'BRASILEÑA', 'BRA'),
(28, 'Brunéi', 'BRUNEANA', 'BRN'),
(29, 'Bulgaria', 'BÚLGARA', 'BGR'),
(30, 'BurkinaFaso', 'BURKINÉS', 'BFA'),
(31, 'Burundi', 'BURUNDÉSA', 'BDI'),
(32, 'Bután', 'BUTANÉSA', 'BTN'),
(33, 'CaboVerde', 'CABOVERDIANA', 'CPV'),
(34, 'Camboya', 'CAMBOYANA', 'KHM'),
(35, 'Camerún', 'CAMERUNESA', 'CMR'),
(36, 'Canadá', 'CANADIENSE', 'CAN'),
(37, 'Catar', 'CATARÍ', 'QAT'),
(38, 'Chad', 'CHADIANA', 'TCD'),
(39, 'Chile', 'CHILENA', 'CHL'),
(40, 'China', 'CHINA', 'CHN'),
(41, 'Chipre', 'CHIPRIOTA', 'CYP'),
(42, 'CiudaddelVaticano', 'VATICANA', 'VAT'),
(43, 'Colombia', 'COLOMBIANA', 'COL'),
(44, 'Comoras', 'COMORENSE', 'COM'),
(45, 'CoreadelNorte', 'NORCOREANA', 'PRK'),
(46, 'CoreadelSur', 'SURCOREANA', 'KOR'),
(47, 'CostadeMarfil', 'MARFILEÑA', 'CIV'),
(48, 'CostaRica', 'COSTARRICENSE', 'CRI'),
(49, 'Croacia', 'CROATA', 'HRV'),
(50, 'Cuba', 'CUBANA', 'CUB'),
(51, 'Dinamarca', 'DANÉSA', 'DNK'),
(52, 'Dominica', 'DOMINIQUÉS', 'DMA'),
(53, 'Ecuador', 'ECUATORIANA', 'ECU'),
(54, 'Egipto', 'EGIPCIA', 'EGY'),
(55, 'ElSalvador', 'SALVADOREÑA', 'SLV'),
(56, 'EmiratosÁrabesUnidos', 'EMIRATÍ', 'ARE'),
(57, 'Eritrea', 'ERITREA', 'ERI'),
(58, 'Eslovaquia', 'ESLOVACA', 'SVK'),
(59, 'Eslovenia', 'ESLOVENA', 'SVN'),
(60, 'España', 'ESPAÑOLA', 'ESP'),
(61, 'EstadosUnidos', 'ESTADOUNIDENSE', 'USA'),
(62, 'Estonia', 'ESTONIA', 'EST'),
(63, 'Etiopía', 'ETÍOPE', 'ETH'),
(64, 'Filipinas', 'FILIPINA', 'PHL'),
(65, 'Finlandia', 'FINLANDÉSA', 'FIN'),
(66, 'Fiyi', 'FIYIANA', 'FJI'),
(67, 'Francia', 'FRANCÉSA', 'FRA'),
(68, 'Gabón', 'GABONÉSA', 'GAB'),
(69, 'Gambia', 'GAMBIANA', 'GMB'),
(70, 'Georgia', 'GEORGIANA', 'GEO'),
(71, 'Gibraltar', 'GIBRALTAREÑA', 'GIB'),
(72, 'Ghana', 'GHANÉSA', 'GHA'),
(73, 'Granada', 'GRANADINA', 'GRD'),
(74, 'Grecia', 'GRIEGA', 'GRC'),
(75, 'Groenlandia', 'GROENLANDÉSA', 'GRL'),
(76, 'Guatemala', 'GUATEMALTECA', 'GTM'),
(77, 'Guineaecuatorial', 'ECUATOGUINEANA', 'GNQ'),
(78, 'Guinea', 'GUINEANA', 'GIN'),
(79, 'Guinea-Bisáu', 'GUINEANA', 'GNB'),
(80, 'Guyana', 'GUYANESA', 'GUY'),
(81, 'Haití', 'HAITIANA', 'HTI'),
(82, 'Honduras', 'HONDUREÑA', 'HND'),
(83, 'Hungría', 'HÚNGARA', 'HUN'),
(84, 'India', 'HINDÚ', 'IND'),
(85, 'Indonesia', 'INDONESIA', 'IDN'),
(86, 'Irak', 'IRAQUÍ', 'IRQ'),
(87, 'Irán', 'IRANÍ', 'IRN'),
(88, 'Irlanda', 'IRLANDÉSA', 'IRL'),
(89, 'Islandia', 'ISLANDÉSA', 'ISL'),
(90, 'IslasCook', 'COOKIANA', 'COK'),
(91, 'IslasMarshall', 'MARSHALÉSA', 'MHL'),
(92, 'IslasSalomón', 'SALOMONENSE', 'SLB'),
(93, 'Israel', 'ISRAELÍ', 'ISR'),
(94, 'Italia', 'ITALIANA', 'ITA'),
(95, 'Jamaica', 'JAMAIQUINA', 'JAM'),
(96, 'Japón', 'JAPONÉSA', 'JPN'),
(97, 'Jordania', 'JORDANA', 'JOR'),
(98, 'Kazajistán', 'KAZAJA', 'KAZ'),
(99, 'Kenia', 'KENIATA', 'KEN'),
(100, 'Kirguistán', 'KIRGUISA', 'KGZ'),
(101, 'Kiribati', 'KIRIBATIANA', 'KIR'),
(102, 'Kuwait', 'KUWAITÍ', 'KWT'),
(103, 'Laos', 'LAOSIANA', 'LAO'),
(104, 'Lesoto', 'LESOTENSE', 'LSO'),
(105, 'Letonia', 'LETÓNA', 'LVA'),
(106, 'Líbano', 'LIBANÉSA', 'LBN'),
(107, 'Liberia', 'LIBERIANA', 'LBR'),
(108, 'Libia', 'LIBIA', 'LBY'),
(109, 'Liechtenstein', 'LIECHTENSTEINIANA', 'LIE'),
(110, 'Lituania', 'LITUANA', 'LTU'),
(111, 'Luxemburgo', 'LUXEMBURGUÉSA', 'LUX'),
(112, 'Madagascar', 'MALGACHE', 'MDG'),
(113, 'Malasia', 'MALASIA', 'MYS'),
(114, 'Malaui', 'MALAUÍ', 'MWI'),
(115, 'Maldivas', 'MALDIVA', 'MDV'),
(116, 'Malí', 'MALIENSE', 'MLI'),
(117, 'Malta', 'MALTÉSA', 'MLT'),
(118, 'Marruecos', 'MARROQUÍ', 'MAR'),
(119, 'Martinica', 'MARTINIQUÉS', 'MTQ'),
(120, 'Mauricio', 'MAURICIANA', 'MUS'),
(121, 'Mauritania', 'MAURITANA', 'MRT'),
(122, 'México', 'MEXICANA', 'MEX'),
(123, 'Micronesia', 'MICRONESIA', 'FSM'),
(124, 'Moldavia', 'MOLDAVA', 'MDA'),
(125, 'Mónaco', 'MONEGASCA', 'MCO'),
(126, 'Mongolia', 'MONGOLA', 'MNG'),
(127, 'Montenegro', 'MONTENEGRINA', 'MNE'),
(128, 'Mozambique', 'MOZAMBIQUEÑA', 'MOZ'),
(129, 'Namibia', 'NAMIBIA', 'NAM'),
(130, 'Nauru', 'NAURUANA', 'NRU'),
(131, 'Nepal', 'NEPALÍ', 'NPL'),
(132, 'Nicaragua', 'NICARAGÜENSE', 'NIC'),
(133, 'Níger', 'NIGERINA', 'NER'),
(134, 'Nigeria', 'NIGERIANA', 'NGA'),
(135, 'Noruega', 'NORUEGA', 'NOR'),
(136, 'NuevaZelanda', 'NEOZELANDÉSA', 'NZL'),
(137, 'Omán', 'OMANÍ', 'OMN'),
(138, 'PaísesBajos', 'NEERLANDÉSA', 'NLD'),
(139, 'Pakistán', 'PAKISTANÍ', 'PAK'),
(140, 'Palaos', 'PALAUANA', 'PLW'),
(141, 'Palestina', 'PALESTINA', 'PSE'),
(142, 'Panamá', 'PANAMEÑA', 'PAN'),
(143, 'PapúaNuevaGuinea', 'PAPÚ', 'PNG'),
(144, 'Paraguay', 'PARAGUAYA', 'PRY'),
(145, 'Perú', 'PERUANA', 'PER'),
(146, 'Polonia', 'POLACA', 'POL'),
(147, 'Portugal', 'PORTUGUÉSA', 'PRT'),
(148, 'PuertoRico', 'PUERTORRIQUEÑA', 'PRI'),
(149, 'ReinoUnido', 'BRITÁNICA', 'GBR'),
(150, 'RepúblicaCentroafricana', 'CENTROAFRICANA', 'CAF'),
(151, 'RepúblicaCheca', 'CHECA', 'CZE'),
(152, 'RepúblicadeMacedonia', 'MACEDONIA', 'MKD'),
(153, 'RepúblicadelCongo', 'CONGOLEÑA', 'COG'),
(154, 'RepúblicaDemocráticadelCongo', 'CONGOLEÑA', 'COD'),
(155, 'RepúblicaDominicana', 'DOMINICANA', 'DOM'),
(156, 'RepúblicaSudafricana', 'SUDAFRICANA', 'ZAF'),
(157, 'Ruanda', 'RUANDÉSA', 'RWA'),
(158, 'Rumanía', 'RUMANA', 'ROU'),
(159, 'Rusia', 'RUSA', 'RUS'),
(160, 'Samoa', 'SAMOANA', 'WSM'),
(161, 'SanCristóbalyNieves', 'CRISTOBALEÑA', 'KNA'),
(162, 'SanMarino', 'SANMARINENSE', 'SMR'),
(163, 'SanVicenteylasGranadinas', 'SANVICENTINA', 'VCT'),
(164, 'SantaLucía', 'SANTALUCENSE', 'LCA'),
(165, 'SantoToméyPríncipe', 'SANTOTOMENSE', 'STP'),
(166, 'Senegal', 'SENEGALÉSA', 'SEN'),
(167, 'Serbia', 'SERBIA', 'SRB'),
(168, 'Seychelles', 'SEYCHELLENSE', 'SYC'),
(169, 'SierraLeona', 'SIERRALEONÉSA', 'SLE'),
(170, 'Singapur', 'SINGAPURENSE', 'SGP'),
(171, 'Siria', 'SIRIA', 'SYR'),
(172, 'Somalia', 'SOMALÍ', 'SOM'),
(173, 'SriLanka', 'CEILANÉSA', 'LKA'),
(174, 'Suazilandia', 'SUAZI', 'SWZ'),
(175, 'SudándelSur', 'SURSUDANÉSA', 'SSD'),
(176, 'Sudán', 'SUDANÉSA', 'SDN'),
(177, 'Suecia', 'SUECA', 'SWE'),
(178, 'Suiza', 'SUIZA', 'CHE'),
(179, 'Surinam', 'SURINAMESA', 'SUR'),
(180, 'Tailandia', 'TAILANDÉSA', 'THA'),
(181, 'Tanzania', 'TANZANA', 'TZA'),
(182, 'Tayikistán', 'TAYIKA', 'TJK'),
(183, 'TimorOriental', 'TIMORENSE', 'TLS'),
(184, 'Togo', 'TOGOLÉSA', 'TGO'),
(185, 'Tonga', 'TONGANA', 'TON'),
(186, 'TrinidadyTobago', 'TRINITENSE', 'TTO'),
(187, 'Túnez', 'TUNECINA', 'TUN'),
(188, 'Turkmenistán', 'TURCOMANA', 'TKM'),
(189, 'Turquía', 'TURCA', 'TUR'),
(190, 'Tuvalu', 'TUVALUANA', 'TUV'),
(191, 'Ucrania', 'UCRANIANA', 'UKR'),
(192, 'Uganda', 'UGANDÉSA', 'UGA'),
(193, 'Uruguay', 'URUGUAYA', 'URY'),
(194, 'Uzbekistán', 'UZBEKA', 'UZB'),
(195, 'Vanuatu', 'VANUATUENSE', 'VUT'),
(196, 'Venezuela', 'VENEZOLANA', 'VEN'),
(197, 'Vietnam', 'VIETNAMITA', 'VNM'),
(198, 'Yemen', 'YEMENÍ', 'YEM'),
(199, 'Yibuti', 'YIBUTIANA', 'DJI'),
(200, 'Zambia', 'ZAMBIANA', 'ZMB'),
(201, 'Zimbabue', 'ZIMBABUENSE', 'ZWE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id_notificacao` int(11) NOT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id_notificacao`, `id_utilizador`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-19 10:20:17', '2022-05-19 11:27:58'),
(2, 1, 1, '2022-05-19 10:39:35', '2022-05-19 11:39:35'),
(3, 1, 1, '2022-05-20 08:28:26', '2022-05-20 09:28:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes_comentario`
--

CREATE TABLE `notificacoes_comentario` (
  `notificacao_comentario_id` int(11) NOT NULL,
  `id_notificao` int(11) DEFAULT NULL,
  `id_comentario` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes_gosto`
--

CREATE TABLE `notificacoes_gosto` (
  `notificacao_gosto_id` int(11) NOT NULL,
  `id_notificacao` int(11) DEFAULT NULL,
  `id_gosto` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `notificacoes_gosto`
--

INSERT INTO `notificacoes_gosto` (`notificacao_gosto_id`, `id_notificacao`, `id_gosto`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-05-20 08:28:13', '2022-05-20 09:28:13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes_seguir`
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
-- Estrutura da tabela `notificação_mensagem`
--

CREATE TABLE `notificação_mensagem` (
  `notificacao_mensagem_id` int(11) NOT NULL,
  `id_notificao` int(11) DEFAULT NULL,
  `id_mensagem` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `descrição` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `publicacao_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `publicacoes`
--

INSERT INTO `publicacoes` (`publicacao_id`, `user_id`, `conteudo`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, '1dwrwqe', 1, '2022-05-20 08:27:59', '2022-05-20 09:27:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes_fav`
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
-- Estrutura da tabela `publicacoes_fotos`
--

CREATE TABLE `publicacoes_fotos` (
  `publicacao__foto_id` int(11) NOT NULL,
  `publicacao_id` int(11) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguir`
--

CREATE TABLE `seguir` (
  `id_seguir` int(11) NOT NULL,
  `id_seguidor` int(11) DEFAULT NULL,
  `id_utilizador` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_user`
--

CREATE TABLE `tipo_user` (
  `tipo_user_id` int(11) NOT NULL,
  `nome_tipo_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_user`
--

INSERT INTO `tipo_user` (`tipo_user_id`, `nome_tipo_user`) VALUES
(1, 'Administrador'),
(2, 'Utilizador');

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
  `género` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `nome`, `username`, `email`, `password`, `banner_image`, `profile_image`, `nacionalidade`, `tipo`, `estado`, `género`, `created_at`, `updated_at`) VALUES
(1, 'Lopes da Silva', 'Xo_Guarda', 'porcoassassino1@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', NULL, NULL, NULL, 1, 2, '1', '2022-05-18 08:10:23', '2022-05-18 11:20:59');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentario_id`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `estados_users`
--
ALTER TABLE `estados_users`
  ADD PRIMARY KEY (`estado_user_id`);

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
-- Índices para tabela `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genero_id`);

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
-- Índices para tabela `nacionalidades`
--
ALTER TABLE `nacionalidades`
  ADD PRIMARY KEY (`nacionalidade_id`);

--
-- Índices para tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id_notificacao`);

--
-- Índices para tabela `notificacoes_comentario`
--
ALTER TABLE `notificacoes_comentario`
  ADD PRIMARY KEY (`notificacao_comentario_id`);

--
-- Índices para tabela `notificacoes_gosto`
--
ALTER TABLE `notificacoes_gosto`
  ADD PRIMARY KEY (`notificacao_gosto_id`);

--
-- Índices para tabela `notificacoes_seguir`
--
ALTER TABLE `notificacoes_seguir`
  ADD PRIMARY KEY (`notificacao_seguir_id`);

--
-- Índices para tabela `notificação_mensagem`
--
ALTER TABLE `notificação_mensagem`
  ADD PRIMARY KEY (`notificacao_mensagem_id`);

--
-- Índices para tabela `oferta_emprego`
--
ALTER TABLE `oferta_emprego`
  ADD PRIMARY KEY (`id_oferta`);

--
-- Índices para tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`publicacao_id`);

--
-- Índices para tabela `publicacoes_fav`
--
ALTER TABLE `publicacoes_fav`
  ADD PRIMARY KEY (`id_pub_fav`);

--
-- Índices para tabela `publicacoes_fotos`
--
ALTER TABLE `publicacoes_fotos`
  ADD PRIMARY KEY (`publicacao__foto_id`);

--
-- Índices para tabela `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`id_seguir`),
  ADD UNIQUE KEY `id_utilizador` (`id_utilizador`);

--
-- Índices para tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`tipo_user_id`);

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
  MODIFY `comentario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estados_users`
--
ALTER TABLE `estados_users`
  MODIFY `estado_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT de tabela `generos`
--
ALTER TABLE `generos`
  MODIFY `genero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `gostos`
--
ALTER TABLE `gostos`
  MODIFY `gosto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT de tabela `nacionalidades`
--
ALTER TABLE `nacionalidades`
  MODIFY `nacionalidade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `notificacoes_comentario`
--
ALTER TABLE `notificacoes_comentario`
  MODIFY `notificacao_comentario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacoes_gosto`
--
ALTER TABLE `notificacoes_gosto`
  MODIFY `notificacao_gosto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `notificacoes_seguir`
--
ALTER TABLE `notificacoes_seguir`
  MODIFY `notificacao_seguir_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificação_mensagem`
--
ALTER TABLE `notificação_mensagem`
  MODIFY `notificacao_mensagem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `oferta_emprego`
--
ALTER TABLE `oferta_emprego`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `publicacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `publicacoes_fav`
--
ALTER TABLE `publicacoes_fav`
  MODIFY `id_pub_fav` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `publicacoes_fotos`
--
ALTER TABLE `publicacoes_fotos`
  MODIFY `publicacao__foto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `seguir`
--
ALTER TABLE `seguir`
  MODIFY `id_seguir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `tipo_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
