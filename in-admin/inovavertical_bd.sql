-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Jul-2018 às 00:03
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inovavertical_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `capa_projeto`
--

CREATE TABLE `capa_projeto` (
  `id` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `capa_projeto`
--

INSERT INTO `capa_projeto` (`id`, `image1`, `image2`, `image3`, `created`, `modified`) VALUES
(1, '5b47be0959d37.jpg', '5b478f0de83a6.jpg', 'img-3-projetos-servicos.jpg', '2018-07-12 00:00:00', '2018-07-12 22:46:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `name`, `image`, `created`, `modified`) VALUES
(1, 'Tecnegocios', '5b3cc82291af1.jpg', '2018-07-04 15:14:10', '0000-00-00 00:00:00'),
(2, 'Sanay', '5b3cc84bd06a3.jpg', '2018-07-04 15:14:51', '0000-00-00 00:00:00'),
(3, 'Plaza Offices', '5b3cc85e1bfa1.jpg', '2018-07-04 15:15:10', '0000-00-00 00:00:00'),
(4, 'Delpa', '5b3cc86725980.jpg', '2018-07-04 15:15:19', '0000-00-00 00:00:00'),
(5, 'Luciane', '5b3cc86fbc72d.jpg', '2018-07-04 15:15:27', '0000-00-00 00:00:00'),
(6, 'PBA Study', '5b3cc87996fcf.jpg', '2018-07-04 15:15:37', '0000-00-00 00:00:00'),
(7, 'Timbas', '5b3cc8820186d.jpg', '2018-07-04 15:15:46', '0000-00-00 00:00:00'),
(8, 'Blackhere', '5b3cc88faea67.jpg', '2018-07-04 15:15:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `images` varchar(5000) NOT NULL,
  `performance_date` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`id`, `name`, `description`, `images`, `performance_date`, `created`, `modified`) VALUES
(1, 'Tecnegocios', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '5b47b5962838e.', 'SP - 23/04/2008', '2018-07-12 22:05:51', '2018-07-12 22:09:58'),
(2, 'ConstruGlass', 'InstalaÃ§Ã£o do quadro de forÃ§a e manutenÃ§Ã£o interna elÃ©trica.', '5b47b4ee67f40.jpg,5b47b4ee68192.jpg,5b47b4ee68370.jpg', 'SP - 23/04/2080', '2018-07-12 22:07:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Marcelo', 'inovavertical@inovavertical.com.br', 'b809221ba6bbceef27dd00dcc00da7958da56d99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
