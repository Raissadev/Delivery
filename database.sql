-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Out-2021 às 02:47
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `delivery_mycode`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_foods`
--

CREATE TABLE `tb_foods` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_foods`
--

INSERT INTO `tb_foods` (`id`, `nome`, `descricao`, `preco`, `imagem`) VALUES
(1, 'Macchiato espresso coffee', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempor viverra urna, nec molestie felis porttitor at. Integer maximus vulputate arcu eget lobortis. Aliquam eu lacinia felis. Duis finibus nibh id augue tincidunt, et lacinia enim vulpu', '19.00', 'coffe.jpg'),
(2, 'Double espresso', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tempor viverra urna, nec molestie felis porttitor at. Integer maximus vulputate arcu eget lobortis. Aliquam eu lacinia felis. Duis finibus nibh id augue tincidunt, et lacinia enim vulpu', '29.00', 'coffeetwo.jpg'),
(3, 'Letter coffee brand', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas quis molestie urna. Cras scelerisque tempor pretium. Vestibulum porta, ante sit amet pulvinar efficitur, tortor risus egestas risus, vel suscipit justo lectus rutrum nibh. Curabitur molesti', '79.00', 'coffeeThree.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_foods`
--
ALTER TABLE `tb_foods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_foods`
--
ALTER TABLE `tb_foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
