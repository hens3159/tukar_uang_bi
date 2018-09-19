-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Sep 2018 pada 18.25
-- Versi server: 5.7.19
-- Versi PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_indonesia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usia` int(11) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `nama`, `usia`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 24, 'Sukamenak Indah', '2018-09-18 10:24:17', '2018-09-18 10:24:17'),
(2, 'Reza', 25, 'Sukaasih', '2018-09-18 10:24:48', '2018-09-18 10:24:48'),
(3, 'Irwan', 24, 'Bogor', '2018-09-18 11:00:12', '2018-09-18 11:00:12'),
(4, 'cinta', 24, 'Perum Nagrog', '2018-09-18 11:00:57', '2018-09-18 11:00:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer_money`
--

CREATE TABLE `customer_money` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `money_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer_money`
--

INSERT INTO `customer_money` (`id`, `customer_id`, `money_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-09-18 10:24:18', '2018-09-18 10:24:18'),
(2, 2, 2, '2018-09-18 10:24:48', '2018-09-18 10:24:48'),
(3, 3, 3, '2018-09-18 11:00:12', '2018-09-18 11:00:12'),
(4, 4, 4, '2018-09-18 11:00:57', '2018-09-18 11:00:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_12_031409_create_customer_table', 1),
(4, '2018_09_12_031529_create_money_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `moneys`
--

CREATE TABLE `moneys` (
  `id` int(10) UNSIGNED NOT NULL,
  `nominal_penukaran` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `moneys`
--

INSERT INTO `moneys` (`id`, `nominal_penukaran`, `created_at`, `updated_at`) VALUES
(1, '20000', '2018-09-18 10:24:18', '2018-09-18 10:24:18'),
(2, '50000', '2018-09-18 10:24:48', '2018-09-18 10:24:48'),
(3, '100000', '2018-09-18 11:00:12', '2018-09-18 11:00:12'),
(4, '10000', '2018-09-18 11:00:57', '2018-09-18 11:00:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '1', NULL, '$2y$10$ANNXhD1eKJQ3AehGuVii.O8nQPxmmc1JqdobbNdMKJWzC30Boa41i', '7R18wnwe1ApNRgZbQuujm0vhEG1T2jINcuZAmW7zJeJTbboXyo9QqC7f4eza', '2018-09-13 06:04:27', '2018-09-13 06:04:27'),
(2, 'kolektor', 'kolektor', 'kolektor@gmail.com', '0', NULL, '$2y$10$l53k98wWwzpTIKAZdveVwO.weIZ4k4iuAgnc1obBUQjmgD4ReZHkW', 'DbaOGgkHwxHKPkspCWwduf04WRF33MURutzQ8MOGwmCF3LhyFM7ITh0ysTBq', '2018-09-13 07:18:51', '2018-09-13 07:18:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer_money`
--
ALTER TABLE `customer_money`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penukaran_uang_customer_id_foreign` (`customer_id`),
  ADD KEY `money` (`money_id`) USING BTREE;

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `moneys`
--
ALTER TABLE `moneys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customer_money`
--
ALTER TABLE `customer_money`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `moneys`
--
ALTER TABLE `moneys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customer_money`
--
ALTER TABLE `customer_money`
  ADD CONSTRAINT `customer_money_ibfk_1` FOREIGN KEY (`money_id`) REFERENCES `moneys` (`id`),
  ADD CONSTRAINT `penukaran_uang_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
