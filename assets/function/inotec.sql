-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Dez-2024 às 11:47
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inotec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `data_post` timestamp NOT NULL DEFAULT current_timestamp(),
  `quem_post` int(11) DEFAULT NULL,
  `conteudo` text DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `blog`
--

INSERT INTO `blog` (`id`, `titulo`, `categoria`, `data_post`, `quem_post`, `conteudo`, `img`) VALUES
(2, 'Recresso dos Cursos INOTEC', 'cursos', '2024-12-28 10:24:23', NULL, 'TGSTHSRDYJHNDYRJN\r\nSRYHWSY4RHEY', 'uploads/676aaff9e131b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `data_inscricao` timestamp NOT NULL DEFAULT current_timestamp(),
  `course_id` int(11) DEFAULT NULL,
  `morada` varchar(150) DEFAULT NULL,
  `n_bi` varchar(20) DEFAULT NULL,
  `periodo` enum('manhã','tarde','noite') DEFAULT NULL,
  `dia` enum('segunda - sexta','sábado') DEFAULT NULL,
  `course` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `class`
--

INSERT INTO `class` (`id`, `nome`, `apelido`, `email`, `telefone`, `data_nascimento`, `status`, `data_inscricao`, `course_id`, `morada`, `n_bi`, `periodo`, `dia`, `course`) VALUES
(10, 'Miguel', NULL, 'kinamukumbaa@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-19 16:01:47', NULL, 'Palanca', '', 'tarde', '', 'Informática'),
(11, 'Miguel', NULL, 'kinamukumbaa@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-19 16:15:48', NULL, 'Palanca', '8645645LA234', 'noite', 'sábado', 'Informática'),
(12, 'Miguel', NULL, 'kinamukumbaa@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-19 16:17:06', NULL, 'Palanca', '8645645LA234', 'manhã', '', 'Informática'),
(13, 'Miguel', NULL, 'kinamukumbaa@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-19 16:22:12', NULL, 'Palanca', '8645645LA234', 'tarde', 'segunda - sexta', 'Informática'),
(14, 'Miguel', NULL, 'kinamukumbaa@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-19 16:22:39', NULL, 'Palanca', '', 'manhã', 'sábado', 'Informática'),
(15, 'Miguel', NULL, 'kinamukumbaa@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-19 16:30:16', NULL, 'Palanca', '8645645LA234', 'manhã', 'segunda - sexta', 'Informática'),
(16, 'Miguel', NULL, 'kinamukumbaa@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-19 16:31:38', NULL, 'Palanca', '8645645LA234', 'tarde', 'segunda - sexta', 'Informática'),
(17, 'Miguel Mukumba', NULL, 'kinamukumbaa@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-19 16:47:58', NULL, 'Palanca', '8645645LA234', 'manhã', 'segunda - sexta', 'Informática'),
(18, 'Miguel', NULL, 'kinamukumbaa@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-19 16:51:07', NULL, 'Palanca', '8645645LA234', 'tarde', 'sábado', 'Informática'),
(19, 'Teste', NULL, 'teste@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-26 12:46:25', NULL, 'Palanca', '8645645LA234', 'tarde', 'sábado', 'Informática'),
(20, 'Teste', NULL, 'teste@gmail.com', '978654129', '0000-00-00', 'ativo', '2024-12-30 10:29:59', NULL, 'Palanca', '', 'tarde', 'segunda - sexta', 'Programação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `sent_date`) VALUES
(1, 'Kina Mukumba', 'kinamukumba@gmail.com', '926775029', 'Amei este site!', '2024-12-20 15:16:54'),
(2, 'Kina Mukumba', 'kinamukumba@gmail.com', '', 'Olá INOTEC, como estão ai?', '2024-12-20 15:39:12'),
(3, 'Kina Mukumba', 'jht67@gmail.com', '', 'bem grande', '2024-12-23 13:48:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `img` varchar(200) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `course`
--

INSERT INTO `course` (`id`, `nome`, `categoria`, `preco`, `duracao`, `vagas`, `status`, `img`, `code`) VALUES
(11, 'Programação Web - FrontEnd', 'tecnologia', 50000.00, 4, 10, 'ativo', 'uploads/676aacae8cb55.png', 'TEC-PRO-6112'),
(12, 'Power BI', 'tecnologia', 40000.00, 4, 10, 'ativo', 'uploads/676ab6409ff4e.jpg', 'TEC-POW-3301'),
(13, 'Gestão Empresarial', 'gestao', 100000.00, 4, 10, 'ativo', 'uploads/676d5144a44c6.jpg', 'GES-GES-6953'),
(14, 'Secretariado Executivo', 'tecnologia', 40000.00, 4, 10, 'ativo', 'uploads/677278ce40f87.jpg', 'TEC-SEC-7087');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensage`
--

CREATE TABLE `mensage` (
  `id` int(11) NOT NULL,
  `nome_user` int(11) DEFAULT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp(),
  `conteudo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `status` enum('ativo','inativo') DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `service`
--

INSERT INTO `service` (`id`, `nome`, `categoria`, `preco`, `status`) VALUES
(2, 'Pacote design Básico', 'design', 50000.00, 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `shop`
--

CREATE TABLE `shop` (
  `client_id` varchar(200) DEFAULT NULL,
  `idProduto` int(11) NOT NULL,
  `preco` int(11) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `shop`
--

INSERT INTO `shop` (`client_id`, `idProduto`, `preco`, `nome`, `data`) VALUES
('6', 1, 170, 'Pacote website Médio', '2024-12-26'),
('6UN5MUXA', 1, 170, 'Pacote website Médio', '2024-12-26'),
('6UN5MUXA', 1, 170, 'Pacote website Médio', '2024-12-26'),
('6UN5MUXA', 1, 250, 'Pacote website Avançado', '2024-12-26'),
('P5PUQTT3', 1, 250, 'Pacote website Avançado', '2024-12-26'),
('LUN3LTTX', 3, 100, 'Pacote website Básico', '2024-12-26'),
('LUN3LTTX', 2, 250, 'Pacote website Avançado', '2024-12-26'),
('LUN3LTTX', 1, 170, 'Pacote website Médio', '2024-12-26'),
('LCFVA2DC', 1, 170, 'Pacote website Médio', '2024-12-26'),
('E267ZPCR', 1, 250, 'Pacote website Avançado', '2024-12-26'),
('9BFVNMHJ', 2, 170, 'Pacote website Médio', '2024-12-26'),
('9BFVNMHJ', 1, 100, 'Pacote website Básico', '2024-12-26'),
('9BFVNMHJ', 3, 250, 'Pacote website Avançado', '2024-12-26'),
('XAVC592Y', 1, 170, 'Pacote website Médio', '2024-12-26'),
('FH6W9VMR', 1, 250, 'Pacote website Avançado', '2024-12-26'),
('FH6W9VMR', 2, 170, 'Pacote website Médio', '2024-12-26'),
('JJPP67JV', 1, 50000, 'Programação Web - FrontEnd', '2024-12-27'),
('EHN4F2ZE', 1, 40000, 'Power BI', '2024-12-27'),
('EHN4F2ZE', 2, 100000, 'Gestão Empresarial', '2024-12-27'),
('2WZ8UCL5', 1, 170, 'Pacote website Médio', '2024-12-27'),
('6M55P3R9', 1, 250, 'Pacote website Avançado', '2024-12-27'),
('6M55P3R9', 2, 170, 'Pacote website Médio', '2024-12-27'),
('GRSSRY3N', 4, 250, 'Pacote website Avançado', '2024-12-27'),
('GRSSRY3N', 1, 250, 'Pacote website Avançado', '2024-12-27'),
('GRSSRY3N', 2, 250, 'Pacote website Avançado', '2024-12-27'),
('GRSSRY3N', 3, 250, 'Pacote website Avançado', '2024-12-27'),
('GRSSRY3N', 5, 250, 'Pacote website Avançado', '2024-12-27'),
('7JYJWJH2', 3, 250, 'Pacote website Avançado', '2024-12-27'),
('7JYJWJH2', 6, 250, 'Pacote website Avançado', '2024-12-27'),
('7JYJWJH2', 2, 250, 'Pacote website Avançado', '2024-12-27'),
('7JYJWJH2', 7, 250, 'Pacote website Avançado', '2024-12-27'),
('7JYJWJH2', 1, 250, 'Pacote website Avançado', '2024-12-27'),
('7JYJWJH2', 5, 250, 'Pacote website Avançado', '2024-12-27'),
('7JYJWJH2', 4, 250, 'Pacote website Avançado', '2024-12-27'),
('PNTDVA9G', 1, 250, 'Pacote website Avançado', '2024-12-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(50) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `morada` varchar(150) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_inscricao` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('ativo','inativo') DEFAULT 'ativo',
  `n_bi` varchar(200) DEFAULT NULL,
  `nome_user` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `apelido`, `idade`, `morada`, `email`, `telefone`, `senha`, `data_nascimento`, `data_inscricao`, `status`, `n_bi`, `nome_user`) VALUES
(1, 'Kina', 'Mukumba', NULL, NULL, 'kinamukumba@gmail.com', '926775029', '$2y$10$uKmXztEzw8pjm9lKcRf0le9UvOfd/BNSIFhLeIlLLKauFqujL4jAG', NULL, '2024-12-19 14:36:41', 'ativo', NULL, NULL),
(2, 'Paulo', 'Bita', NULL, NULL, 'paulobitakk@gmail.com', '978654129', '$2y$10$dtemMaBzwrTIi6wjaeppG.1u5jE1tNlX0nbY4LCf188632bfryGIW', NULL, '2024-12-19 14:37:57', 'ativo', NULL, NULL),
(10, 'Miguel', 'Mukumba', NULL, NULL, 'kinamukumbaa@gmail.com', '978654129', '$2y$10$BYok/GnyB.d5ei0jqhVDZu/jPigrQs0p1oMrf/gWe3wWyA40CFCRW', NULL, '2024-12-19 14:48:48', 'ativo', NULL, NULL),
(11, 'Kina', 'Mukumba', NULL, NULL, 'lastcosta999@gmail.com', '926775029', '$2y$10$EgcwU3YiWPH/fIUp7B3YBeIxJETcvuNB.xfrTJmCP/bej8SzIsmaK', NULL, '2024-12-20 09:43:28', 'ativo', NULL, NULL),
(12, 'David', 'Moy', NULL, NULL, 'david@gmail.com', '978654129', '$2y$10$O3TJwdkTVzVV5ih0S7YD6.u7gD7aDEKoOYp2O2Mw4lykb9y8ZAZvS', NULL, '2024-12-20 10:21:25', 'ativo', NULL, NULL),
(13, 'Castigo', 'Bita', NULL, NULL, 'paulobitakkuu@gmail.com', '987654321', '$2y$10$vrhpHNdSe1t0Wvn5I0YdO.vu28AFv/3xjkTTYmcDZ4mFmUn0gF7S6', NULL, '2024-12-20 10:23:32', 'ativo', NULL, NULL),
(16, 'Paulo', 'Bita', NULL, NULL, 'kinamukt7umba@gmail.com', '987654321', '$2y$10$XpDo5fUtr9qACYsqFWOqieJCM/x70sfsOcnVmknn6ARs5/wF11clK', NULL, '2024-12-20 10:24:21', 'ativo', NULL, NULL),
(17, 'Moisés', 'Kialanda', NULL, NULL, 'moiseskialanda@gmail.com', '978654129', '$2y$10$R1Ha16ViPDUr897h4e6kuucR8XMmxIwEnkfbtXh37Xs4E4zj138gu', NULL, '2024-12-20 15:42:01', 'ativo', NULL, NULL),
(18, 'Moisés', 'Kialanda', NULL, NULL, 'moiseskialanda09@gmail.com', '936103729', '$2y$10$s15xBFnozvsbe3L1IE2o/e4e/97DzrkOoCTRlh5Q035EW7MuCnfB2', NULL, '2024-12-21 11:38:55', 'ativo', NULL, NULL),
(19, 'Teste', 'Testando', NULL, NULL, 'teste@gmail.com', '978654129', '$2y$10$tU/O9hyesY2BCzoto0DbEeRhHkqXQbx.DRlwrSE0EmL2ECWCD8yvG', NULL, '2024-12-26 12:27:48', 'ativo', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quem_post` (`quem_post`);

--
-- Índices para tabela `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Índices para tabela `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mensage`
--
ALTER TABLE `mensage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nome_user` (`nome_user`);

--
-- Índices para tabela `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `mensage`
--
ALTER TABLE `mensage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`quem_post`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Limitadores para a tabela `mensage`
--
ALTER TABLE `mensage`
  ADD CONSTRAINT `mensage_ibfk_1` FOREIGN KEY (`nome_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
