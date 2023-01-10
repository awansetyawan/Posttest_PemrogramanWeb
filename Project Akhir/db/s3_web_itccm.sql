-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 10:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s3_web_itccm`
--

-- --------------------------------------------------------

--
-- Table structure for table `auditors`
--

CREATE TABLE `auditors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditors`
--

INSERT INTO `auditors` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `birthday`, `address`, `photo`) VALUES
(1, 'Bayu', 'Setiawan', 'setiawanbayu66152@gmail.com', '082353165184', '2022-10-12', 'Jl. Auditor Satu', 'bayu.png'),
(2, 'Alfi', 'Nor Ihsan', 'alfinorihsan@gmail.com', '081234567891', '1995-10-13', 'Jl. Auditor Dua', 'alfi.png'),
(3, 'Alif', 'Maulana Setyawan', 'kecebongungu@gmail.com', '081234567891', '1995-10-13', 'Jl. Auditor 3', 'awan.jpeg');
-- --------------------------------------------------------

--
-- Table structure for table `auditor_qualifications`
--

CREATE TABLE `auditor_qualifications` (
  `id` int(11) NOT NULL,
  `auditor_id` int(11) DEFAULT NULL,
  `standard_id` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auditor_qualifications`
--

INSERT INTO `auditor_qualifications` (`id`, `auditor_id`, `standard_id`, `expiration_date`) VALUES
(1, 1, 1, '2024-10-13'),
(2, 1, 2, '2024-10-13'),
(3, 1, 3, '2024-10-13'),
(4, 1, 4, '2024-10-13'),
(5, 2, 1, '2025-10-13'),
(6, 2, 2, '2025-10-13'),
(7, 2, 3, '2025-10-13'),
(8, 2, 4, '2025-10-13'),
(9, 3, 1, '2024-10-13'),
(10, 3, 2, '2024-10-13'),
(11, 3, 3, '2024-10-13'),
(12, 3, 4, '2024-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `registration_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `fax_number` varchar(255) DEFAULT NULL,
  `homepage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `registration_number`, `name`, `email`, `phone_number`, `address`, `fax_number`, `homepage`) VALUES
(1, 'RQ1000', 'ADEKA', 'adeka@gmail.com', '082323232323', 'Jl. Kerinci', '346-8910', NULL),
(2, 'RQ1100', 'LIXIL', 'lixil@gmail.com', '081100110011', 'Jl. Lixil', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `standard_id` int(11) DEFAULT NULL,
  `examination_number` varchar(255) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `examination_start_date` date DEFAULT NULL,
  `examination_end_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `status` enum('1','2','3','4') NOT NULL DEFAULT '1',
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `examination_auditors`
--

CREATE TABLE `examination_auditors` (
  `id` int(11) NOT NULL,
  `examination_id` int(11) DEFAULT NULL,
  `auditor_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `position` enum('1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `examination_documents`
--

CREATE TABLE `examination_documents` (
  `id` int(11) NOT NULL,
  `examination_id` int(11) DEFAULT NULL,
  `document_type` enum('1','2','3') DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `uploaded_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `examination_scopes`
--

CREATE TABLE `examination_scopes` (
  `id` int(11) NOT NULL,
  `examination_id` int(11) DEFAULT NULL,
  `scope_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `scopes`
--

CREATE TABLE `scopes` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scopes`
--

INSERT INTO `scopes` (`id`, `code`, `name`, `desc`) VALUES
(1, '45.11', 'Penghancuran Struktur', 'Penghancuran Struktur'),
(2, '45.12', 'Prospektik dan Boring', 'Prospektik dan Boring'),
(3, '45.21', 'Pengecekan Bangunan General', 'Pengecekan Bangunan General'),
(4, '45.22', 'Atap dan Kerangka', 'Atap dan Kerangka'),
(5, '45.31', 'Instalasi Kabel Elektrik', 'Instalasi Kabel Elektrik'),
(6, '45.32', 'Pemasangan Insulasi Suhu', 'Pemasangan Insulasi Suhu'),
(7, '45.33', 'Pengecekan Saluran Air', 'Pengecekan Saluran Air'),
(8, '45.41', 'Plastering', 'Plastering'),
(9, '45.43', 'Lantai dan Dinding', 'Lantai dan Dinding'),
(10, '45.44', 'Pengecatan dan Pengerjaan Jendela', 'Pengecatan dan Pengerjaan Jendela');

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

CREATE TABLE `standards` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`id`, `code`, `name`, `desc`) VALUES
(1, 'QMS', 'ISO 9001', 'Sistem Manajamen Mutu. Tujuan sertifikasi ini adalah untuk menjamin produk atau jasa yang dihasilkkan suatu perusahaan memenuhi persyaratan yang ditetapkan.'),
(2, 'EMS', 'ISO 14001', 'Sistem Manajemen Lingkungan. Standarisasi segala aktivitas perusahaan dan dampak-dampaknya terhadap lingkungan.'),
(3, 'OHSAS', 'ISO 50001', 'Sistem Manajemen Energi. Standarisasi internasional yang membantu mengurangi konsumsi, meminimalkan jejak karbon, dan memangkas biaya dengan mempromosikan penggunaan energi yang berkelanjutan.'),
(4, 'AMS', 'ISO 55001', 'Sistem Manajemen Aset. Standar ini memberikan kerangka kerja untuk pembentukan dan pengaturan tujuan, kebijakan, proses, pemerintahan, dan fasilitas yang terlibat dalam usaha organisasi untuk mencapai tujuan dan sasaran mereka.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('1','2','3') DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `auditor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `company_id`, `auditor_id`) VALUES
(1, 'admin', '$2y$10$1c544DDvxuCGwQrFrUqMaO/1HGSfFM5AGtEJ4eeDRXTvpkNI2ZPl.', '1', NULL, NULL),
(2, 'bayu', '$2y$10$1c544DDvxuCGwQrFrUqMaO/1HGSfFM5AGtEJ4eeDRXTvpkNI2ZPl.', '2', NULL, 1),
(3, 'alfi', '$2y$10$1c544DDvxuCGwQrFrUqMaO/1HGSfFM5AGtEJ4eeDRXTvpkNI2ZPl.', '2', NULL, 2),
(4, 'awan', '$2y$10$1c544DDvxuCGwQrFrUqMaO/1HGSfFM5AGtEJ4eeDRXTvpkNI2ZPl.', '2', NULL, 3),
(5, 'RQ1000', '$2y$10$1c544DDvxuCGwQrFrUqMaO/1HGSfFM5AGtEJ4eeDRXTvpkNI2ZPl.', '3', 1, NULL),
(6, 'RQ1100', '$2y$10$1c544DDvxuCGwQrFrUqMaO/1HGSfFM5AGtEJ4eeDRXTvpkNI2ZPl.', '3', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auditors`
--
ALTER TABLE `auditors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auditor_qualifications`
--
ALTER TABLE `auditor_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auditor_id` (`auditor_id`),
  ADD KEY `standard_id` (`standard_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_number` (`registration_number`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `examination_number` (`examination_number`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `standard_id` (`standard_id`);

--
-- Indexes for table `examination_auditors`
--
ALTER TABLE `examination_auditors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `auditor_id` (`auditor_id`);

--
-- Indexes for table `examination_documents`
--
ALTER TABLE `examination_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examination_id` (`examination_id`);

--
-- Indexes for table `examination_scopes`
--
ALTER TABLE `examination_scopes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examination_id` (`examination_id`),
  ADD KEY `scope_id` (`scope_id`);

--
-- Indexes for table `scopes`
--
ALTER TABLE `scopes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `auditor_id` (`auditor_id`),
  ADD KEY `company_id` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditors`
--
ALTER TABLE `auditors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auditor_qualifications`
--
ALTER TABLE `auditor_qualifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `examination_auditors`
--
ALTER TABLE `examination_auditors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `examination_documents`
--
ALTER TABLE `examination_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examination_scopes`
--
ALTER TABLE `examination_scopes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scopes`
--
ALTER TABLE `scopes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `standards`
--
ALTER TABLE `standards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auditor_qualifications`
--
ALTER TABLE `auditor_qualifications`
  ADD CONSTRAINT `auditor_qualifications_ibfk_1` FOREIGN KEY (`auditor_id`) REFERENCES `auditors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auditor_qualifications_ibfk_2` FOREIGN KEY (`standard_id`) REFERENCES `standards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examinations`
--
ALTER TABLE `examinations`
  ADD CONSTRAINT `examinations_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examinations_ibfk_2` FOREIGN KEY (`standard_id`) REFERENCES `standards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examination_auditors`
--
ALTER TABLE `examination_auditors`
  ADD CONSTRAINT `examination_auditors_ibfk_1` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examination_auditors_ibfk_2` FOREIGN KEY (`auditor_id`) REFERENCES `auditors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examination_documents`
--
ALTER TABLE `examination_documents`
  ADD CONSTRAINT `examination_documents_ibfk_1` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `examination_scopes`
--
ALTER TABLE `examination_scopes`
  ADD CONSTRAINT `examination_scopes_ibfk_1` FOREIGN KEY (`examination_id`) REFERENCES `examinations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `examination_scopes_ibfk_2` FOREIGN KEY (`scope_id`) REFERENCES `scopes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`auditor_id`) REFERENCES `auditors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
