-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/06/2023 às 20:16
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `horusp54_cacaofertas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `idcatprincipal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `descricao`, `idcatprincipal`) VALUES
(1, 'Automotivo', NULL, 1),
(2, 'Açougue', NULL, 1),
(3, 'Bebidas', NULL, 1),
(4, 'Bebê e Infantil', NULL, 1),
(5, 'Brinquedos', NULL, 1),
(6, 'Calçados', NULL, 1),
(7, 'Cama, Mesa e banho', NULL, 1),
(8, 'Congelados', NULL, 1),
(9, 'Decoração', NULL, 1),
(10, 'Farmácia', NULL, 1),
(11, 'Esporte e Lazer', NULL, 1),
(12, 'Frios e Laticínios', NULL, 1),
(13, 'Higiene e Limpeza', NULL, 1),
(14, 'Hortifruti', NULL, 1),
(15, 'Jardim e Varanda', NULL, 1),
(16, 'Limpeza e Lavanderia', NULL, 1),
(17, 'Mercearia', NULL, 1),
(18, 'Moda e Acessórios', NULL, 1),
(19, 'Padaria e Matinais', NULL, 1),
(20, 'Papelaria', NULL, 1),
(21, 'Petshop', NULL, 1),
(22, 'Utilidades Domésticas', NULL, 1),
(23, 'Outros itens', NULL, 1),
(24, 'Vestidos', NULL, 2),
(25, 'Camisas e Blusas', NULL, 2),
(26, 'Lingerie', NULL, 2),
(27, 'Roupas Íntimas', NULL, 2),
(28, 'Shorts', NULL, 2),
(29, 'Calças e Leggings', NULL, 2),
(30, 'Conjuntos', NULL, 2),
(31, 'Jaquetas e Casacos', NULL, 2),
(32, 'Moletons e Suéteres', NULL, 2),
(33, 'Trajes para Dormir', NULL, 2),
(34, 'Outras Roupas', NULL, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria_principal`
--

CREATE TABLE `categoria_principal` (
  `idcatprincipal` int(11) NOT NULL,
  `nome` varchar(120) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `categoria_principal`
--

INSERT INTO `categoria_principal` (`idcatprincipal`, `nome`) VALUES
(1, 'Supermercados'),
(2, 'Roupas Femininas'),
(3, 'Casa e Decoração'),
(4, 'Beleza'),
(5, 'Roupas Masculinas'),
(6, 'Sapatos Femininos'),
(7, 'Sapatos Masculinos'),
(8, 'Celulares e Dispositivos'),
(9, 'Moda Infantil'),
(10, 'Acessórios de Moda'),
(11, 'Esporte e Lazer'),
(12, 'Eletroportáteis'),
(13, 'Hobbies e Coleções'),
(14, 'Automotivos'),
(15, 'Saúde'),
(16, 'Mãe e Bebê'),
(17, 'Áudio e Vídeo'),
(18, 'Papelaria'),
(19, 'Bolsas Femininas'),
(20, 'Bolsas Masculinas'),
(21, 'Animais Domésticos'),
(22, 'Motocicletas'),
(23, 'Computadores e Acessórios'),
(24, 'Alimentos e Bebidas'),
(25, 'Livros e Vídeo Games'),
(26, 'Livros e Revistas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `idempresa` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `img_produtos`
--

CREATE TABLE `img_produtos` (
  `idimgproduto` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url_caminho` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `img_produtos`
--

INSERT INTO `img_produtos` (`idimgproduto`, `nome`, `url_caminho`, `idproduto`) VALUES
(1, 'bolsonaro 1.jpg', 'img_produtos/bolsonaro 1.jpg', 4),
(2, 'frutas.jpg', 'img_produtos/frutas.jpg', 4),
(3, 'legumes.fw.png', 'img_produtos/legumes.fw.png', 5),
(4, 'mara bolos.fw.png', 'img_produtos/mara bolos.fw.png', 5),
(5, 'legumes.fw.png', '2projeto/img_produtos/legumes.fw.png', 6),
(6, 'mara bolos.fw.png', '2projeto/img_produtos/mara bolos.fw.png', 6),
(7, '', '', 10),
(8, '', '', 11),
(12, 'enedina', '', 29),
(13, '3.jpg', 'img_produtos/3.jpg', 31),
(14, 'image-crop-200000266.jpeg', 'img_produtos/image-crop-200000266.jpeg', 32),
(15, '3.jpg', 'img_produtos/3.jpg', 33),
(16, 'nome da imagem, ventilador de teto', 'img_produtos/3.jpg', 34),
(17, 'telvisao da sasung 32polegadas', 'img_produtos/2.jpg', 35),
(18, 'nome da imagem 2.jpg', '36_1687265186.jpg', 36);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `idmarca` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idsubcategoria` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `metodo_pagamento` enum('cartao_credito','cartao_debito','boleto','paypal') COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `data_pedido` datetime DEFAULT NULL,
  `status` enum('em_andamento','concluido','cancelado') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci,
  `subcategoria_id` int(11) DEFAULT NULL,
  `preco_venda` decimal(10,2) DEFAULT NULL,
  `idmarca` int(11) NOT NULL,
  `preco_compra` decimal(10,2) NOT NULL,
  `idsupermercado` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `data_atualizacao` datetime NOT NULL,
  `qtd_comprada` int(11) NOT NULL,
  `qtd_atual` int(11) NOT NULL,
  `foto_produto` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `total_da_compra` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `subcategoria_id`, `preco_venda`, `idmarca`, `preco_compra`, `idsupermercado`, `data_cadastro`, `data_atualizacao`, `qtd_comprada`, `qtd_atual`, `foto_produto`, `total_da_compra`) VALUES
(1, 'Banana Nanica', 'Melhor banana da regial', 1, '198.57', 1, '19.33', 1, '2023-06-21 00:00:00', '2023-06-27 00:00:00', 50, 9, '', '1987.54'),
(2, 'Tomate de Corda', 'Descricao vem aqui', 1, '17.97', 1, '9.33', 2, '2023-06-19 00:00:00', '2023-06-23 00:00:00', 33, 17, '', '1897.57'),
(3, 'Tomate de Corda', 'Descricao vem aqui', 1, '17.97', 1, '9.33', 2, '2023-06-19 00:00:00', '2023-06-23 00:00:00', 33, 17, '', '1897.57'),
(4, 'Tomate de Corda', 'Descricao vem aqui', 1, '17.97', 1, '9.33', 2, '2023-06-19 00:00:00', '2023-06-23 00:00:00', 33, 17, '', '1897.57'),
(5, 'teste', 'dadd', 2, '587.70', 4, '45.58', 3, '2023-06-22 00:00:00', '2023-06-21 00:00:00', 99, 15, '', '187.00'),
(6, 'teste', 'dadd', 2, '587.70', 4, '45.58', 3, '2023-06-22 00:00:00', '2023-06-21 00:00:00', 99, 15, '', '187.00'),
(7, 'tomatinho pasqualotto', '', 25, '0.00', 0, '0.00', 5, '2023-06-19 16:24:14', '2023-06-19 16:24:14', 0, 0, '', '0.00'),
(8, 'dadasd', 'asdfwef', 2, '42423.00', 0, '4343.00', 5, '2023-06-19 21:25:49', '0000-00-00 00:00:00', 33, 33, 'rwerwer', '5442.00'),
(9, 'nome do produto', 'desad', 25, '7567568.00', 0, '4234.00', 4, '2023-06-19 22:56:03', '0000-00-00 00:00:00', 154, 154, 'wreyrt', '5466.00'),
(10, 'uyyiuy', 'ddasds', 28, '332.00', 0, '221.00', 1, '2023-06-19 23:13:05', '0000-00-00 00:00:00', 333, 0, 'wddsdf', '33.00'),
(11, 'Achocolatado Toddy Original Pote 370G', 'todis descrciao aqui', 95, '10.00', 0, '7.00', 7, '2023-06-20 01:14:44', '0000-00-00 00:00:00', 10, 0, 'url aqui', '46.00'),
(12, 'Iphone 13 max', 'descricao do item', 32, '314.00', 0, '19.00', 4, '2023-06-20 02:09:09', '0000-00-00 00:00:00', 333, 0, '', '5466.00'),
(13, 'Iphone 13 max', 'descricao do item', 32, '314.00', 0, '19.00', 4, '2023-06-20 02:10:56', '0000-00-00 00:00:00', 333, 0, '', '5466.00'),
(14, 'Oculo raybanmasculieno', 'dasdasd', 10, '314.00', 0, '36198122.00', 1, '2023-06-20 02:11:38', '0000-00-00 00:00:00', 36, 0, '', '44.00'),
(15, 'Oculo raybanmasculieno', 'dasdasd', 10, '314.00', 0, '36198122.00', 1, '2023-06-20 02:15:06', '0000-00-00 00:00:00', 36, 0, '', '44.00'),
(16, 'Oculo rayban masculino', '4ddas ', 81, '223.00', 0, '4234.00', 3, '2023-06-20 02:15:35', '0000-00-00 00:00:00', 154, 0, '', '5466.00'),
(18, '', '', 1, '0.00', 0, '0.00', 0, '2023-06-20 00:41:37', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(19, 'prdoto nome', 'desdd', 1, '8.00', 0, '19.00', 1, '2023-06-20 00:42:13', '0000-00-00 00:00:00', 100, 0, '', '193.00'),
(20, 'Iphone 13 max', 'descricao', 1, '0.00', 0, '19.00', 0, '2023-06-20 00:47:29', '0000-00-00 00:00:00', 333, 0, '', '498.00'),
(21, 'Koblenz', 'ddd', 1, '10.00', 0, '15.00', 1, '2023-06-20 00:51:40', '0000-00-00 00:00:00', 10, 0, '', '495.00'),
(24, '', NULL, NULL, '123.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(25, 'ronan', NULL, NULL, '123.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(26, 'ricardos', NULL, NULL, '1257.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(27, 'joana', NULL, NULL, '7841.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(28, 'enedina', NULL, NULL, '45555.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(29, 'enedina', NULL, NULL, '45555.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(30, 'marcos produto', NULL, NULL, '9874.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(31, 'produto ronaldo', NULL, NULL, '455.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(32, 'teste', NULL, NULL, '0.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(33, 'vanilza produto', NULL, NULL, '3111.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(34, 'Ventilador de teto', NULL, NULL, '222.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(35, 'Televisao samsung', NULL, NULL, '36.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00'),
(36, 'celular xiaomi', NULL, NULL, '22.00', 0, '0.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, '', '0.00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `promocoes`
--

CREATE TABLE `promocoes` (
  `idpromocao` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `idempresa` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `inicio_oferta` datetime NOT NULL,
  `fim_oferta` datetime NOT NULL,
  `qtd_ofertado` int(11) NOT NULL,
  `qtd_disponivel` int(11) NOT NULL,
  `descricao_oferta` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `nome`, `categoria_id`) VALUES
(1, 'Carnes Bovinas', 2),
(2, 'Aves', 2),
(3, 'Carnes Suínas', 2),
(4, 'Linguiça', 2),
(5, 'Peixes', 2),
(6, 'Salsichas', 2),
(7, 'Outros itens', 2),
(8, 'Vinhos', 3),
(9, 'Destilados', 3),
(10, 'Sucos e Refrescos', 3),
(11, 'Cervejas', 3),
(12, 'Refrigerantes', 3),
(13, 'Cafés e Chás', 3),
(14, 'Águas', 3),
(15, 'Energéticos', 3),
(16, 'Isotônicos', 3),
(17, 'Espumantes', 3),
(18, 'Bebidas Vegetal', 3),
(19, 'Bebida Láctea', 3),
(20, 'Outras Bebidas', 3),
(24, 'Higiene e Bem Estar', 4),
(25, 'Alimentação Infantil', 4),
(26, 'Outros Itens', 4),
(27, 'jogos', 5),
(28, 'Bonecos e Bonecas', 5),
(29, 'carrinhos', 5),
(30, 'outros Itens', 5),
(31, 'Sapatos Femininos', 6),
(32, 'Sapatos Masculinos', 6),
(33, 'Caçados de Menina', 6),
(34, 'Calçados de Menino', 6),
(35, 'Tênis de Corrida', 6),
(36, 'Chuteira de Futebol', 6),
(37, 'Calçados Infantil', 6),
(38, 'Tênis de Basquete', 6),
(39, 'Tênis de Caminhada', 6),
(40, 'Tênis de Futsal', 6),
(41, 'Chinelos', 6),
(42, 'Outros Calçados', 6),
(43, 'Sorvetes', 8),
(44, 'Pratos Prontos', 8),
(45, 'Aves', 8),
(46, 'Legumes e Vegetais', 8),
(47, 'Polpas e Frutas', 8),
(48, 'Veganos', 8),
(49, 'Hambúrguer', 8),
(50, 'Outros Ítens', NULL),
(54, 'Tapetes', 9),
(55, 'Quadros', 9),
(56, 'Outros Itens', 9),
(60, 'Suplementos Vitamínicos', 10),
(61, 'Dermocosméticos', 10),
(62, 'Outros Itens', 10),
(63, 'Iogurtes', 12),
(64, 'Frios e Embutidos', 12),
(65, 'Manteiga e Margarina', 12),
(66, 'Queijos', 12),
(67, 'Sobremesa Láctea', 12),
(68, 'Outros Itens', 12),
(69, 'Corpo', 13),
(70, 'Cabelo', 13),
(71, 'Higiene Bucal', 13),
(72, 'Cuidados Pessoais', 13),
(73, 'Maquiagem', 13),
(74, 'Unhas', 13),
(75, 'Barba', 13),
(76, 'Rosto', 13),
(77, 'Cuidados Geriátricos', 13),
(78, 'Outros Itens', NULL),
(79, 'Legumes e Vegetais', 14),
(80, 'Frutas Frescas', 14),
(81, 'Verduras e Hortaliças', 14),
(82, 'Outros Itens', 14),
(83, 'Acessórios para Jardim', 15),
(84, 'Plantio e Colheita', 15),
(85, 'Flores', 15),
(86, 'Plantas', 15),
(87, 'Outros Itens', 15),
(88, 'Limpeza em Geral', 16),
(89, 'Limpeza de Roupas', 16),
(90, 'Limpeza de Banheiro', 16),
(91, 'Limpeza de Cozinha', 16),
(92, 'Outros Itens', 16),
(93, 'Guloseimas', 17),
(94, 'Massas e Molhos', 17),
(95, 'Cafés, Chás e Achocolatados', 17),
(96, 'Biscoitos e Bolachas', 17),
(97, 'Temperos e Condimentos', 17),
(98, 'Doces e Confeitaria', 17),
(99, 'Conservas e Enlatados', 17),
(100, 'Alimentos Básicos', 17),
(101, 'Azeite, Óleos e Vinagre', 17),
(102, 'Suplementos Alimentares', 17),
(103, 'Açúcar e Adoçante', 17),
(104, 'Grãos e Sementes', 17),
(105, 'Sopas e cremes', 17),
(106, 'Outros Itens', 17),
(107, 'Pães e Torradas', 19),
(108, 'Bolos', 19),
(109, 'Cereal Matinal', 19),
(110, 'Mel, Geléias e Patês', 19),
(111, 'Leites', 19),
(112, 'Outros Itens', 19),
(113, 'Material Escolar', 20),
(114, 'Material de Escritório', 20),
(115, 'Outros Itens', 20),
(116, 'Alimentos Pet', 21),
(117, 'Adestramento Pet', 21),
(118, 'Acessórios Pet', 21),
(119, 'Higiene Pet', 21),
(120, 'Beleza Pet', 21),
(121, 'Outros Itens Pet', 21),
(122, 'Cozinha', 22),
(123, 'Banheiro e Lavanderia', 22),
(124, 'Itens para festa', 22),
(125, 'Diversos para Festas', 22),
(126, 'Churrasco', 22),
(127, 'Outros Itens', 22);

-- --------------------------------------------------------

--
-- Estrutura para tabela `supermercados`
--

CREATE TABLE `supermercados` (
  `idsupermercado` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `supermercados`
--

INSERT INTO `supermercados` (`idsupermercado`, `nome`, `telefone`, `endereco`) VALUES
(1, 'Sup. Pasqualotto', '44998331612', ''),
(2, 'Sup. Serve Bem', '', ''),
(3, 'Sup. Favorito', '', ''),
(4, 'Sup. Bom Preço', '', ''),
(5, 'Sup. Coroado', '', ''),
(6, 'Sup. Noroeste', '', ''),
(7, 'Sup. Canário', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `bairro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `endereco`, `whatsapp`, `genero`, `data_nascimento`, `bairro`) VALUES
(1, 'dyedys', 'centralronan@gmail.com', 'RO1624DU*', '', '44998331612', '', '0000-00-00', 0),
(2, 'dyedys', 'dyedys@yahoo.com.br', '$2y$10$Po5cfYvgsn/5EmDaDihZ3um5g1u3gEkHnqwKpDz1d6PNotv2aOISa', '', '44998331612', '', '0000-00-00', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcatprincipal` (`idcatprincipal`);

--
-- Índices de tabela `categoria_principal`
--
ALTER TABLE `categoria_principal`
  ADD PRIMARY KEY (`idcatprincipal`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`idempresa`);

--
-- Índices de tabela `img_produtos`
--
ALTER TABLE `img_produtos`
  ADD PRIMARY KEY (`idimgproduto`),
  ADD KEY `idproduto` (`idproduto`);

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idmarca`),
  ADD KEY `idproduto` (`idproduto`),
  ADD KEY `marcas_ibfk_1` (`idsubcategoria`);

--
-- Índices de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategoria_id` (`subcategoria_id`);

--
-- Índices de tabela `promocoes`
--
ALTER TABLE `promocoes`
  ADD PRIMARY KEY (`idpromocao`),
  ADD KEY `idempresa` (`idempresa`),
  ADD KEY `idproduto` (`idproduto`);

--
-- Índices de tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices de tabela `supermercados`
--
ALTER TABLE `supermercados`
  ADD PRIMARY KEY (`idsupermercado`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `categoria_principal`
--
ALTER TABLE `categoria_principal`
  MODIFY `idcatprincipal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `img_produtos`
--
ALTER TABLE `img_produtos`
  MODIFY `idimgproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idmarca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `promocoes`
--
ALTER TABLE `promocoes`
  MODIFY `idpromocao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de tabela `supermercados`
--
ALTER TABLE `supermercados`
  MODIFY `idsupermercado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`idcatprincipal`) REFERENCES `categoria_principal` (`idcatprincipal`);

--
-- Restrições para tabelas `img_produtos`
--
ALTER TABLE `img_produtos`
  ADD CONSTRAINT `img_produtos_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `marcas`
--
ALTER TABLE `marcas`
  ADD CONSTRAINT `marcas_ibfk_1` FOREIGN KEY (`idsubcategoria`) REFERENCES `subcategorias` (`id`);

--
-- Restrições para tabelas `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`);

--
-- Restrições para tabelas `promocoes`
--
ALTER TABLE `promocoes`
  ADD CONSTRAINT `promocoes_ibfk_1` FOREIGN KEY (`idempresa`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `promocoes_ibfk_2` FOREIGN KEY (`idproduto`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
