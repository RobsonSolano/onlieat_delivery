-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql305.epizy.com
-- Generation Time: Oct 15, 2020 at 10:22 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_25316507_onlieat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `cli_id` int(11) NOT NULL,
  `cli_name` varchar(220) CHARACTER SET utf8 DEFAULT NULL,
  `cli_phone` char(14) DEFAULT NULL,
  `cli_email` varchar(180) CHARACTER SET utf8 DEFAULT NULL,
  `cli_pass` char(32) DEFAULT NULL,
  `cli_data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_clientes`
--

INSERT INTO `tb_clientes` (`cli_id`, `cli_name`, `cli_phone`, `cli_email`, `cli_pass`, `cli_data_cadastro`) VALUES
(7, 'Administração', '11999998888', 'admin@rm.ceunsp.com', 'd02b9379d340382bb63232235c29edb5', '2020-08-31 15:01:58'),
(8, 'Robson Solano', '11996271186', 'robson.b.solano@hotmail.com', 'c1592c58ccb8836b2fcd0615c8c7d1dd', '2020-08-31 16:35:37'),
(9, 'Théo e Heitor', '11989059286', 'th@teste.com', '29fa2e8ba91c7d1496e7b711a0fa118e', '2020-08-31 19:05:07'),
(10, 'Matheus', '974563321', 'mathanjos@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-08-31 19:13:18'),
(11, 'Cilene Real', '19993045694', 'real.cilene@gmail.com', '84a8ed1d5525c9cdfa5eeda5c8651cd1', '2020-08-31 21:49:22'),
(15, 'Mayara Ribeiro', '11943621390', 'mah.gati12@hotmail.com', '25d55ad283aa400af464c76d713c07ad', '2020-09-04 21:52:59'),
(16, 'Miriam', '11972333306', 'miriam@gmail.com', '731982a033a5cc815ac03c8504abb748', '2020-09-05 17:06:34'),
(17, 'JEFERSON MOLLEMBERG DA SILVA', '11958107266', 'mollembergj@gmail.com', '0605cededc664c7789d2fa6c4d3dc90e', '2020-09-05 17:37:09'),
(18, 'Matheus', '992153690', 'matheus@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-09-09 20:35:44'),
(19, 'Gordinho faminto', '11988543223', 'faminto@gmail.com', 'a66d92cacbcb69c63a629611a1558195', '2020-09-12 01:54:21'),
(20, 'Bacalhau nervoso', '1174746666', 'bacalhau@gmail.com', '65a64219bee1527a36dcf405531d29ee', '2020-09-12 02:18:20'),
(21, 'Mayara Ribeiro', '11952326489', 'mah.rferreiira@hotmail.com', 'fb1d6c9b7a09fc0da567a9668f3a241a', '2020-09-13 21:33:30'),
(22, 'Yuri Campino', '11973319955', 'yuricamp@hotmail.com', '742c559a6212a0022e0fc2972fdba24a', '2020-09-16 17:37:20'),
(23, 'Everaldo', '11925896314', 'everaldo@eve.com', 'fcea920f7412b5da7be0cf42b8c93759', '2020-09-16 22:36:43'),
(24, 'Harrison Rickmann', '11963902290', 'harrison.gr@outlook.com', 'be1047dca86b78d24a2dc671df9fc400', '2020-09-19 15:36:43'),
(25, 'Convidado', '11988882222', 'convidado@gmail.com', 'cfb09e956cc12875edfd51e4cc1a1bcc', '2020-09-25 17:24:36'),
(26, 'Hugo Ferreira', '19992754853', 'hugo.ferreira@nanoincub.com.br', '25d55ad283aa400af464c76d713c07ad', '2020-09-29 20:13:06'),
(27, 'Matheus', '20202020', 'matanjos29@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-09-30 22:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_clientes_notifi`
--

CREATE TABLE `tb_clientes_notifi` (
  `cli_id` int(11) NOT NULL,
  `cli_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `cli_email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `cli_phone` char(13) NOT NULL,
  `cli_data_cad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_clientes_notifi`
--

INSERT INTO `tb_clientes_notifi` (`cli_id`, `cli_name`, `cli_email`, `cli_phone`, `cli_data_cad`) VALUES
(2, 'Robson Batista Solano', 'robson.b.solano@hotmail.com', '11996271186', '2020-08-31 17:47:50'),
(3, 'Harrison Rickmann', 'harrison.gr@outlook.com', '11 96390-2390', '2020-09-01 00:46:33'),
(4, 'Robson Batista Solano', 'robson@teste.com', '11 98905-8196', '2020-09-02 22:29:02'),
(5, 'Fábio Flôres', 'fsfloresjf@gmail.com', '11 94728-3555', '2020-09-09 18:14:13'),
(6, 'Gordinho faminto', 'faminto@gmail.com', '11988543223', '2020-09-12 01:57:04'),
(7, 'mah.rferreiira@hotmail.com', 'mah.rferreiira@hotmail.com', '11943621390', '2020-09-13 21:29:40'),
(8, 'Yuri Campino', 'yuricamp@hotmail.com', '11973319955', '2020-09-16 17:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cli_endereco`
--

CREATE TABLE `tb_cli_endereco` (
  `id_endereco` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `end_city` varchar(11) NOT NULL,
  `end_street` varchar(150) NOT NULL,
  `end_num` int(11) NOT NULL,
  `end_district` varchar(80) NOT NULL,
  `end_complement` varchar(200) NOT NULL,
  `end_data_cad_ende` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cli_endereco`
--

INSERT INTO `tb_cli_endereco` (`id_endereco`, `id_cliente`, `end_city`, `end_street`, `end_num`, `end_district`, `end_complement`, `end_data_cad_ende`) VALUES
(3, 8, 'Salto', 'albuquerque lins', 632, 'Vila teixera', '', '2020-08-31 12:36:55'),
(4, 10, 'Salto', 'Perto de narnia', 608, 'YouTube', 'Perto do boteco do Bira', '2020-08-31 15:15:40'),
(5, 12, 'Salto', 'Hélio steffen ', 212, 'Vila Henrique ', '', '2020-08-31 21:15:43'),
(6, 13, 'Salto', 'albuquerque lins', 632, 'Vila teixera', '', '2020-09-02 18:32:59'),
(7, 17, 'Itu', 'Av caetano ruggieri ', 5540, 'Pq das industria', 'Desconto por ser meu irmão ', '2020-09-05 13:39:13'),
(8, 18, 'Salto', 'OI', 508, 'RG', 'Teste', '2020-09-09 16:36:29'),
(9, 19, 'Salto', 'Alameda queiroz', 69, 'Sólamentos', '', '2020-09-11 21:55:45'),
(10, 21, 'Salto', 'Albuquerque Lins', 632, 'Vila Teixeira', 'Quero um chocolate', '2020-09-13 17:37:56'),
(11, 20, 'Salto', 'Alameda queiroz', 567, 'Sólamentos', '', '2020-09-13 17:39:07'),
(12, 26, 'Indaiatuba', 'Rua Bororó', 310, 'Vila Maria Helena', 'Testando o projeto do Robson...', '2020-09-29 16:14:37'),
(13, 25, 'Salto', 'Rua Monsenhor Couto', 352, 'Centro', '', '2020-09-30 15:03:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `pedi_value` double(5,2) NOT NULL,
  `pedi_data` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id_pedido`, `id_cliente`, `pedi_value`, `pedi_data`) VALUES
(3, 8, 58.00, '2020-08-31 13:50:04'),
(4, 8, 40.00, '2020-08-31 14:14:45'),
(5, 10, 24.00, '2020-08-31 15:16:01'),
(6, 10, 27.00, '2020-08-31 15:19:23'),
(7, 10, 27.00, '2020-08-31 15:20:03'),
(8, 8, 24.00, '2020-08-31 16:04:55'),
(9, 8, 24.00, '2020-08-31 16:12:11'),
(10, 8, 24.00, '2020-08-31 16:17:05'),
(11, 8, 24.00, '2020-08-31 16:17:45'),
(12, 8, 24.00, '2020-08-31 17:49:07'),
(13, 8, 24.00, '2020-08-31 17:49:37'),
(14, 12, 37.00, '2020-08-31 21:16:37'),
(15, 8, 24.00, '2020-09-01 10:03:48'),
(16, 8, 24.00, '2020-09-01 10:12:04'),
(17, 8, 24.00, '2020-09-01 10:15:25'),
(18, 8, 24.00, '2020-09-01 10:17:21'),
(19, 8, 24.00, '2020-09-01 10:17:59'),
(20, 8, 24.00, '2020-09-01 10:18:15'),
(21, 8, 24.00, '2020-09-01 10:20:00'),
(22, 8, 24.00, '2020-09-01 10:24:06'),
(23, 8, 24.00, '2020-09-01 10:26:15'),
(24, 13, 58.00, '2020-09-02 18:33:30'),
(25, 13, 54.00, '2020-09-02 18:48:01'),
(26, 13, 54.00, '2020-09-02 18:48:24'),
(27, 17, 19.00, '2020-09-05 13:39:33'),
(28, 8, 24.00, '2020-09-09 13:20:37'),
(29, 8, 42.00, '2020-09-09 13:27:24'),
(30, 8, 42.00, '2020-09-09 13:33:42'),
(31, 8, 52.00, '2020-09-09 14:05:27'),
(32, 18, 24.00, '2020-09-09 16:36:37'),
(33, 8, 44.00, '2020-09-09 18:23:50'),
(34, 19, 164.00, '2020-09-11 21:55:59'),
(35, 21, 101.00, '2020-09-13 17:39:29'),
(36, 21, 101.00, '2020-09-13 17:39:50'),
(37, 20, 58.00, '2020-09-13 17:46:42'),
(38, 19, 44.00, '2020-09-14 13:09:30'),
(39, 19, 18.00, '2020-09-14 13:10:39'),
(40, 19, 36.00, '2020-09-14 13:15:56'),
(41, 19, 36.00, '2020-09-14 13:16:18'),
(42, 19, 36.00, '2020-09-14 13:16:29'),
(43, 19, 36.00, '2020-09-14 13:16:50'),
(44, 18, 84.00, '2020-09-14 14:50:35'),
(45, 20, 18.00, '2020-09-14 19:58:26'),
(46, 8, 44.00, '2020-09-16 18:38:48'),
(47, 8, 44.00, '2020-09-16 18:42:08'),
(48, 20, 3.00, '2020-09-16 21:25:33'),
(49, 20, 24.00, '2020-09-16 21:41:26'),
(50, 20, 26.00, '2020-09-16 21:45:22'),
(51, 20, 26.00, '2020-09-16 21:49:13'),
(52, 20, 26.00, '2020-09-16 21:51:50'),
(53, 20, 26.00, '2020-09-16 21:52:12'),
(54, 20, 26.00, '2020-09-16 21:52:30'),
(55, 20, 26.00, '2020-09-16 21:53:44'),
(56, 20, 26.00, '2020-09-16 21:54:42'),
(57, 20, 26.00, '2020-09-16 21:55:35'),
(58, 20, 26.00, '2020-09-16 21:56:18'),
(59, 8, 18.00, '2020-09-16 22:01:25'),
(60, 8, 18.00, '2020-09-16 22:02:22'),
(61, 8, 18.00, '2020-09-16 22:03:20'),
(62, 8, 18.00, '2020-09-16 22:03:34'),
(63, 8, 18.00, '2020-09-16 22:05:24'),
(64, 8, 18.00, '2020-09-16 22:06:33'),
(65, 8, 26.00, '2020-09-16 22:07:51'),
(66, 8, 26.00, '2020-09-16 22:09:53'),
(67, 20, 44.00, '2020-09-17 05:29:20'),
(68, 20, 18.00, '2020-09-17 07:53:01'),
(69, 20, 18.00, '2020-09-17 07:53:34'),
(70, 20, 18.00, '2020-09-17 12:03:10'),
(71, 18, 45.00, '2020-09-21 10:32:28'),
(72, 18, 45.00, '2020-09-21 10:32:29'),
(73, 18, 36.00, '2020-09-21 10:44:16'),
(74, 8, 26.00, '2020-09-24 08:15:47'),
(75, 8, 26.00, '2020-09-24 08:20:39'),
(76, 8, 26.00, '2020-09-24 08:27:19'),
(77, 26, 60.00, '2020-09-29 16:15:57'),
(78, 26, 32.00, '2020-09-29 18:46:37'),
(79, 27, 21.00, '2020-09-30 18:21:11'),
(80, 27, 21.00, '2020-09-30 18:22:21'),
(81, 27, 43.00, '2020-09-30 18:23:18'),
(82, 25, 44.00, '2020-09-30 21:56:22'),
(83, 25, 44.00, '2020-09-30 22:08:12'),
(84, 25, 29.00, '2020-10-01 10:10:23'),
(85, 26, 55.00, '2020-10-01 11:52:53'),
(86, 25, 58.00, '2020-10-14 18:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `prod_id` int(11) NOT NULL,
  `prod_title` varchar(80) NOT NULL,
  `prod_name_image` varchar(150) NOT NULL,
  `prod_category` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prod_description` varchar(300) NOT NULL,
  `prod_value` double(5,2) NOT NULL DEFAULT '0.00',
  `date_cad_prod` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produtos`
--

INSERT INTO `tb_produtos` (`prod_id`, `prod_title`, `prod_name_image`, `prod_category`, `prod_description`, `prod_value`, `date_cad_prod`) VALUES
(4, 'Burguer cheddar', 'CheddarBurguer.jpg', 'lanche', 'Pão, alface, tomate, cebola, hambúrguer e cheddar', 15.00, '2020-08-31 13:02:05'),
(5, 'Burguer duplo', 'DuploBurguer.jpg', 'lanche', 'Pão, alface, tomate, cebola, 2 hambúrgueres', 18.00, '2020-08-31 13:03:22'),
(6, 'Mega burguer', 'MegaBurguer.jpg', 'lanche', 'Pão, alface, tomate, cebola, hambúrguer 120 gms', 18.50, '2020-08-31 13:09:24'),
(7, 'Ultra burguer', 'UltraBurguer.jpg', 'lanche', 'Pão, alface, tomate, cebola, queijo prato, hambúrguer 150 gramas', 20.00, '2020-08-31 13:10:46'),
(8, 'Coca cola lata', 'CocaLata.jpg', 'bebida', ' ', 6.00, '2020-08-31 13:11:21'),
(9, 'Coca cola 1,5 L', 'CocaCola1,5.jpg', 'bebida', ' ', 8.00, '2020-08-31 13:11:59'),
(10, 'Coca cola 2L', 'Coca2l.jpg', 'bebida', ' ', 9.00, '2020-08-31 13:12:21'),
(11, 'Schweeps 2L', 'Schwepps.jpg', 'bebida', ' ', 9.00, '2020-08-31 13:12:51'),
(12, 'Porção de batata frita', 'BatataFrita.jpg', 'porcao', ' ', 10.00, '2020-08-31 13:13:31'),
(13, 'Porção de calabresa', 'Calabresa.jpg', 'porcao', ' ', 14.00, '2020-08-31 13:13:55'),
(15, 'Porção de mandioca frita', 'mandiocaFrita.jpg', 'porcao', ' ', 14.00, '2020-08-31 13:14:41'),
(16, 'Porção de salame', 'salame.jpg', 'porcao', ' ', 19.00, '2020-08-31 13:15:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indexes for table `tb_clientes_notifi`
--
ALTER TABLE `tb_clientes_notifi`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indexes for table `tb_cli_endereco`
--
ALTER TABLE `tb_cli_endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cli` (`id_cliente`);

--
-- Indexes for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_clientes_notifi`
--
ALTER TABLE `tb_clientes_notifi`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_cli_endereco`
--
ALTER TABLE `tb_cli_endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
