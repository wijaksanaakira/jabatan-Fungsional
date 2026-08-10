-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Agu 2026 pada 20.40
-- Versi server: 10.6.27-MariaDB-cll-lve
-- Versi PHP: 8.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis data: `datacont_omoponse_pendidikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_sk`
--

CREATE TABLE `data_sk` (
  `id` int(11) NOT NULL,
  `nomor_sk` varchar(100) DEFAULT NULL,
  `id_jenis` int(100) DEFAULT NULL,
  `tmt` date DEFAULT NULL,
  `tanggal_sk` date DEFAULT NULL,
  `link_sk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id`, `nama_file`, `link`, `created_at`) VALUES
(10, 'SYARAT PENGANGKATAN KEMBALI DARI TUGAS BELAJAR (PENGANGKATAN)', 'https://drive.google.com/file/d/1wseU4mlC9Ar02hf9mn2K-fDeEK33sx3z/view?usp=drive_link', '2026-04-21 08:44:56'),
(11, 'SYARAT PEMBERHENTIAN DARI JF KARENA MENGUNDURKAN DIRI DARI JF', 'https://drive.google.com/file/d/1sKyPbtr1fdDVeUCtt9vT_hoQkII74-J2/view?usp=drive_link', '2026-04-21 08:45:22'),
(12, 'SYARAT PEMBERHENTIAN KARENA DITUGASKAN SECARA PENUH DILUAR JABATAN PELAKSANA', 'https://drive.google.com/file/d/1hpn3igtL1ZJwiRO2UbtQv8muJOw1xlCw/view?usp=drive_link', '2026-04-21 08:45:42'),
(13, 'SYARAT PROMOSI JF KENAIKAN JENJANG', 'https://drive.google.com/file/d/1edvL1SZRgEMSqzuRfQIAaOMn-2WaW8q8/view?usp=drive_link', '2026-04-21 08:46:23'),
(14, 'SYARAT PENGANGKATAN PERTAMA JF (PENGANGKATAN)', 'https://drive.google.com/file/d/1eTvShLcb6c8d2uGok3MCKaOqpJdBMepR/view?usp=drive_link', '2026-04-21 08:46:45'),
(15, 'SYARAT PENGANGKATAN MELALUI PERPINDAHAN DARI JABATAN LAIN (PENGANGKATAN)', 'https://drive.google.com/file/d/1P8xt9AaLQfFEVogPcJDTaRPdbPaN6Ar7/view?usp=drive_link', '2026-04-21 08:47:15'),
(16, 'SYARAT PEMBERHENTIAN KARENA DITUGASKAN SECARA PENUH DILUAR JABATAN STRUKTURAL', 'https://drive.google.com/file/d/10BQQcD_YWg-NQOwYYxxlp8wk88XrL_gU/view?usp=drive_link', '2026-04-21 08:47:39'),
(18, 'CARA MENYUSUN ANGKA KREDIT, KENAIKAN PANGKAT DAN JENJANG JABATAN FUNGSIONAL', 'https://drive.google.com/file/d/1j6VKcIvciXYLcx8tCxGhka6x155lw-AV/view?usp=sharing', '2026-04-23 06:55:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_jabatan_fungsional`
--

CREATE TABLE `dokumen_jabatan_fungsional` (
  `id` int(11) NOT NULL,
  `judul_dokumen` varchar(255) NOT NULL,
  `nama_peraturan` varchar(255) DEFAULT NULL,
  `id_jabatan_fungsional` int(11) NOT NULL,
  `link` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah_tunjangan` decimal(15,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumen_jabatan_fungsional`
--

INSERT INTO `dokumen_jabatan_fungsional` (`id`, `judul_dokumen`, `nama_peraturan`, `id_jabatan_fungsional`, `link`, `tanggal`, `jumlah_tunjangan`) VALUES
(2, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 68 Tahun 2017', 1, 'https://drive.google.com/file/d/1PFh28j9-NiGA__cmjvFk8QfV-1cDywQF/view?usp=sharing', '2017-01-01', 0.00),
(7, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 43 Tahun 2007', 4, 'https://drive.google.com/file/d/1CemA1nX1ZE3k1uKgAjasaFdKrmyPxsZ3/view?usp=sharing', '2007-01-01', 0.00),
(8, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 83 Tahun 2022', 7, 'https://drive.google.com/file/d/19CB12Apn5SOjWbwc7nMpedTS8YFgBG3I/view?usp=drive_link', '2022-01-01', 0.00),
(9, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 109 Tahun 2016', 10, 'https://drive.google.com/file/d/1Xycwlr0DJjDSbjQVNcU9u3gaYUwyK60e/view?usp=drive_link', '2016-01-01', 0.00),
(10, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 8 Tahun 2017', 13, 'https://drive.google.com/file/d/1dvfe5xqrHZLpfk_4moTzwxRukneKbWz1/view?usp=sharing', '2017-01-01', 540000.00),
(11, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 70 Tahun 2022', 16, 'https://drive.google.com/file/d/1VzDmBYNrYTZa9rjg4oxxVHNS2jGVb3E6/view?usp=sharing', '2022-01-01', 0.00),
(12, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 5 Tahun 2014', 19, 'https://drive.google.com/file/d/1or5Dr36cJ_sPZYF7f5cfjqO9eGUhk6Qi/view?usp=drive_link', '2014-01-01', 0.00),
(13, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 22 Tahun 2022', 22, 'https://drive.google.com/file/d/1TbpN0rgmv5LDbPD3HIIxyM_OVAomCoqr/view?usp=sharing', '2022-01-01', 0.00),
(14, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 36 Tahun 2022', 25, 'https://drive.google.com/file/d/1Hsyynt0aQSseR3HfE8VWsEbvxxeRaFy5/view?usp=sharing', '2022-01-01', 0.00),
(15, 'Tunjangan Fungsional', 'Peraturan Presiden (PERPRES) Nomor 65 Tahun 2021', 28, 'https://drive.google.com/file/d/1ed7q3AVIhZDa5UQRFgs436bFKV6qWz2R/view?usp=sharing', '2021-01-01', 0.00),
(16, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 97 Tahun 2022', 31, 'https://drive.google.com/file/d/1zf40Ted4JEgADepwmOZWi_T6Ld1wwHaJ/view?usp=sharing', '2022-01-01', 0.00),
(17, 'Tunjangan Fungsional', 'Peraturan Presiden (PERPRES) Nomor 70 Tahun 2020 ', 34, 'https://drive.google.com/file/d/1Cn88jX14land9LP3wnraZfgVI2PY3dZq/view?usp=sharing', '2020-01-01', 0.00),
(18, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 109 Tahun 2021', 37, 'https://drive.google.com/file/d/1ICwadpkGQfyL8AwR658rkw2qWCDaTLmM/view?usp=sharing', '2021-01-01', 0.00),
(19, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 24 Tahun 2021', 40, 'https://drive.google.com/file/d/1Pm3xK88qIlH8gr9UYcVh4xNtFUBDbXN8/view?usp=sharing', '2021-01-01', 0.00),
(20, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 93 Tahun 2020', 43, 'https://drive.google.com/file/d/1bFuBarbBu_qjgL9grconrVNBuKwrRXCs/view?usp=drive_link', '2020-01-01', 0.00),
(21, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 45 Tahun 2024', 46, 'https://drive.google.com/file/d/1tt7g8PSWNQL_4JCvF359vQqE05cs3Aup/view?usp=drive_link', '2021-01-01', 0.00),
(22, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 36 Tahun 2007', 49, 'https://drive.google.com/file/d/1LF8V0nx75vAYH6HONO9REClx8ccXxa91/view?usp=drive_link', '2007-01-01', 0.00),
(23, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 36 Tahun 2007', 52, 'https://drive.google.com/file/d/1LF8V0nx75vAYH6HONO9REClx8ccXxa91/view?usp=drive_link', '2007-01-01', 0.00),
(24, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 63 Tahun 2007', 55, 'https://drive.google.com/file/d/1PxPwi1hvjOlZJqphsak7jckzB5_8nCZC/view?usp=drive_link', '2007-01-01', 0.00),
(25, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 11 Tahun 2009', 58, 'https://drive.google.com/file/d/13RP204RQiEYV3d60Zexqjljaj_K5WNZP/view?usp=drive_link', '2009-01-01', 0.00),
(26, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 26 Tahun 2021', 61, 'https://drive.google.com/file/d/130Gx__n0lHLW9_ZRBV-Ezy4Cpf9XRsgm/view?usp=sharing', '2021-01-01', 0.00),
(27, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 69 Tahun 2022', 64, 'https://drive.google.com/file/d/1xVqFSX8ypHY3ERhHW_2QMHH3b65Sj959/view?usp=sharing', '2022-01-01', 0.00),
(28, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 16 Tahun 2013', 70, 'https://drive.google.com/file/d/1J0pmLaHFgkRrdXhcnchMYaSStkHOzNGX/view?usp=sharing', '2013-01-01', 0.00),
(29, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 21 Tahun 2021', 76, 'https://drive.google.com/file/d/1OzbP6b5sGsZcgy2YsbYXUjkNT77v0tMa/view?usp=sharing', '2021-01-01', 0.00),
(30, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 39 Tahun 2009', 79, 'https://drive.google.com/file/d/1jOfxEwP3qZ0Gg9OMPno2l70Pcc7zEM_U/view?usp=sharing', '2009-01-01', 0.00),
(31, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 51 Tahun 2021', 82, 'https://drive.google.com/file/d/1fbrm7bLuGHnl2kqFAc8ze-9y20vgjEpn/view?usp=drive_link', '2021-01-01', 0.00),
(32, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 32 Tahun 2007', 88, 'https://drive.google.com/file/d/1A7vsW_SoOblL8rixibhhNk4OZR92G-tX/view?usp=sharing', '2007-01-01', 0.00),
(33, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES)  Nomor 16 Tahun 2013 ', 91, 'https://drive.google.com/file/d/1s-P-ZiYvkSAgxQYNSqo9zpVl4bI8wMuT/view?usp=sharing', '2013-01-01', 0.00),
(34, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 16 Tahun 2013', 85, 'https://drive.google.com/file/d/1s-P-ZiYvkSAgxQYNSqo9zpVl4bI8wMuT/view?usp=drive_link', '2013-01-01', 0.00),
(35, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 20 Tahun 2013', 94, 'https://drive.google.com/file/d/1cmlZjq9CM8as8MKe1kS5MmdMTchjJrgU/view?usp=sharing', '2013-01-01', 0.00),
(36, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 125 Tahun 2024', 94, 'https://drive.google.com/file/d/1P0OIyUZBMI2n76gitHZWEgoeBw_QqAfR/view?usp=sharing', '2024-01-01', 0.00),
(37, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 52 Tahun 2018', 100, 'https://drive.google.com/file/d/10imOP51jMLsCYiSxPKUqgl_xBSWB5kjq/view?usp=sharing', '2018-01-01', 0.00),
(38, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 91 Tahun 2022', 106, 'https://drive.google.com/file/d/1G75u08NZVAZFTZtUVHt2B8H7J_EzvL2C/view?usp=sharing', '2022-01-01', 0.00),
(39, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES)  Nomor 71 Tahun 2013', 112, 'https://drive.google.com/file/d/1m0wMnCiV5ptVJwMJY3TBDlKM4sGPenij/view?usp=sharing', '2013-01-01', 0.00),
(40, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 30 Tahun 2006', 103, 'https://drive.google.com/file/d/1SorjIoGclGOSPtzvfvqhcIsG7Mpt-EOp/view?usp=drive_link', '2006-01-01', 0.00),
(41, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 30 tahun 2006', 97, 'https://drive.google.com/file/d/1SorjIoGclGOSPtzvfvqhcIsG7Mpt-EOp/view?usp=drive_link', '2006-01-01', 0.00),
(42, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 36 Tahun 2007', 103, 'https://drive.google.com/file/d/1LF8V0nx75vAYH6HONO9REClx8ccXxa91/view?usp=drive_link', '2007-01-01', 0.00),
(43, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 36 Tahun 2007', 97, 'https://drive.google.com/file/d/1LF8V0nx75vAYH6HONO9REClx8ccXxa91/view?usp=drive_link', '2007-01-01', 0.00),
(44, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 74 Tahun 2007', 118, 'https://drive.google.com/file/d/1pW5aKHMR_M8dEa7sypPUihDTCDCIzU_w/view?usp=sharing', '2007-01-01', 0.00),
(45, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 36 Tahun 2022', 121, 'https://drive.google.com/file/d/17VQ_qncN0u5dZX0nx8U2koaCqTnCTGT9/view?usp=sharing', '2022-01-01', 0.00),
(46, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 9 Tahun 2017', 124, 'https://drive.google.com/file/d/1rZgOdkGquhqZDK82YhLDSbk18uwC217S/view?usp=sharing', '2017-01-01', 0.00),
(48, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 77 Tahun 2022', 133, 'https://drive.google.com/file/d/1GXLrzXujFiHc_FL9Y2nP6dToAFFD9vpE/view?usp=drive_link', '2022-01-01', 0.00),
(49, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 139, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(50, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) nomor 54 Tahun 2007', 151, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(51, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 167, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(52, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 222, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(53, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 154, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(54, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 193, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(55, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 42 Tahun 2009', 207, 'https://drive.google.com/file/d/1lO92hH9yLJ7K-4bJ8xtc1Pacm-tSYGbf/view?usp=drive_link', '2009-01-01', 0.00),
(56, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 142, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=drive_link', '2007-01-01', 0.00),
(57, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 tahun 2007', 146, 'file:///C:/Users/Akira/Downloads/perpres54-2007.pdf', '2007-01-01', 0.00),
(58, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 9 tahun 2010', 160, 'https://drive.google.com/file/d/1tqboxuXZXficqEsqDexWK2ddbhrUrH0I/view?usp=drive_link', '2010-01-01', 0.00),
(59, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 115 Tahun 2016', 222, 'https://drive.google.com/file/d/1zYI0NtC5r3DqVeto9rChJIwButaM34Kc/view?usp=sharing', '2016-01-01', 0.00),
(60, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 114 Tahun 2016', 187, 'https://drive.google.com/file/d/1dHD4bHHH5SHq6Ng6k0OnTapA5GMvhcgN/view?usp=sharing', '2016-01-01', 0.00),
(61, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 113 Tahun 2016', 233, 'https://drive.google.com/file/d/1-6ZyuLpTSF3i2v-Nw4yxgUm-BOq0bxA8/view?usp=drive_link', '2016-01-01', 0.00),
(62, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 136, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(63, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 184, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(64, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 170, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(65, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007', 178, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=sharing', '2007-01-01', 0.00),
(66, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 108 Tahun 2007', 241, 'https://drive.google.com/file/d/1RtV4L8muwRmzUZrNYuK5rVxxv6GHZ2_Q/view?usp=drive_link', '2007-01-01', 0.00),
(67, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 108 Tahun 2007', 244, 'https://drive.google.com/file/d/1RtV4L8muwRmzUZrNYuK5rVxxv6GHZ2_Q/view?usp=drive_link', '2007-01-01', 0.00),
(68, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 108 Tahun 2007', 246, 'https://drive.google.com/file/d/1RtV4L8muwRmzUZrNYuK5rVxxv6GHZ2_Q/view?usp=drive_link', '2007-01-01', 0.00),
(69, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor108 Tahun 2007', 238, 'https://drive.google.com/file/d/1RtV4L8muwRmzUZrNYuK5rVxxv6GHZ2_Q/view?usp=drive_link', '2007-01-01', 0.00),
(71, 'Dasar Hukum', 'Peraturan Menteri PAN RB No. 45 Tahun 2013', 1, 'https://drive.google.com/file/d/1IJk8pwC4Uo0wM9hiKXYAaxTESKtCKick/view?usp=sharing', '2013-01-01', 0.00),
(72, 'Dasar Hukum', 'Peraturan Menteri PAN RB No. 65 Tahun 2021', 4, 'https://drive.google.com/file/d/1LfbzCJVPn26-gYsQgf36LVub9C-XrOzi/view?usp=sharing', '2021-01-01', 0.00),
(73, 'Dasar Hukum', 'Peraturan Menteri PAN RB No. 51 Tahun 2020', 7, 'https://drive.google.com/file/d/1GRPIT3HsMkjolDxgLQDA3kNVGK4IsGCA/view?usp=sharing', '2020-01-01', 0.00),
(74, 'Dasar Hukum', 'Peraturan Menteri PAN RB No. 29 Tahun 2020', 10, 'https://drive.google.com/file/d/1nllfwWy5Dz3tfNtmwgakkskKHO1hS2lf/view?usp=sharing', '2020-01-01', 0.00),
(75, 'Dasar Hukum', 'Permenpan RB Nomor 37 Tahun 2020 tentang Jabatan Fungsional Analis SDMA', 16, 'https://drive.google.com/file/d/1inrYtl0Y7dv4kda5hqjRkZohQSachpIZ/view?usp=drive_link', '2020-01-01', 0.00),
(76, 'Tunjangan Fungsional ', 'Peraturan Menteri PAN RB  NOMOR 48 TAHUN 2022', 19, 'https://drive.google.com/file/d/1tZCk2yAmk5nxH9Xa7zJjW1V8zNFLpJ3G/view?usp=drive_link', '2022-01-01', 0.00),
(77, 'Dasar Hukum', 'PERATURAN Menpanrb  NOMOR 36 TAHUN 2020', 22, 'https://drive.google.com/file/d/1tZCk2yAmk5nxH9Xa7zJjW1V8zNFLpJ3G/view?usp=sharing', '2020-01-01', 0.00),
(78, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 16 Tahun 2013', 67, 'https://drive.google.com/file/d/1s-P-ZiYvkSAgxQYNSqo9zpVl4bI8wMuT/view?usp=drive_link', '2013-01-01', 0.00),
(79, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor Tahun 2017', 115, 'https://drive.google.com/file/d/1FogkN9OyWV22JRBtJABakcoHJGp5MAJS/view?usp=sharing', '2017-01-01', 0.00),
(80, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 34 Tahun 2008', 210, 'https://drive.google.com/file/d/1wEcZ8Qea3nMXwRD1Xn7oHLeD0lHpNiO9/view?usp=sharing', '2008-01-01', 0.00),
(81, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 34 Tahun 2008', 219, 'https://drive.google.com/file/d/1wEcZ8Qea3nMXwRD1Xn7oHLeD0lHpNiO9/view?usp=sharing', '2008-01-01', 0.00),
(82, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 34 Tahun 2008', 230, 'https://drive.google.com/file/d/1wEcZ8Qea3nMXwRD1Xn7oHLeD0lHpNiO9/view?usp=sharing', '2008-01-01', 0.00),
(83, 'Tunjangan Fungsional (Perawat Gigi)', 'Peraturan Presiden (PERPRES) Nomor 54 Tahun 2007 ', 204, 'https://drive.google.com/file/d/14Hq38LyRmJkL1tpYdx9JiZHJPivfEWx-/view?usp=drive_link', '2007-01-01', 0.00),
(84, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 99 Tahun 2021', 198, 'https://drive.google.com/file/d/1HJbCWbc9GFIySKgtjX64SbFnOKtOJAF0/view?usp=sharing', '2021-01-01', 0.00),
(85, 'Tunjangan Fungsional (Penyuluh Sosial)', 'Peraturan Presiden (PERPRES) Nomor 11 Tahun 2009', 201, 'https://drive.google.com/file/d/1R4Z8IrKDMvcz25cR1zEuDnNgdOcvufyb/view?usp=sharing', '2009-01-01', 0.00),
(86, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES)  Nomor 90 Tahun 2022', 252, 'https://drive.google.com/file/d/12g2n8iiRZs69CzqOC7R1xa_EdYeU5aVs/view?usp=sharing', '2022-01-01', 0.00),
(87, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES)  Nomor 36 Tahun 2007', 252, 'https://drive.google.com/file/d/1od92QL7CeICKrlyT60SC7DpEwjCuO7Gy/view?usp=sharing', '2007-11-01', 0.00),
(88, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 89 Tahun 2022', 253, 'https://drivhttps://datacontoh.biz.id/jabatan-fungsional/dokumen/253e.google.com/file/d/1eHeO3vgy0ZfH_ulT8dBxGkcsxiEhptUT/view?usp=sharing', '2022-01-01', 0.00),
(89, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 75 Tahun 2013', 253, 'https://drive.google.com/file/d/1w7RQ1Cw8Gr1AcPJXFxkVQQTRbsr_NMOL/view?usp=drive_link', '2013-01-01', 0.00),
(90, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 44 Tahun 2007', 31, 'https://drive.google.com/file/d/1Nu51k92qPWZmvP5YhR8YKEnafSfgWGRV/view?usp=sharing', '2007-01-01', 0.00),
(91, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 36 Tahun 2024', 254, 'https://drive.google.com/file/d/1IKtjKFJIwDWEVMtiQKAIMiGUiHhdtMjs/view?usp=sharing', '2024-01-01', 0.00),
(92, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 30 Tahun 2021', 55, 'https://drive.google.com/file/d/1sYOX_0SOCxPO0GcIkzIwD5N2njVlC8C8/view?usp=sharing', '2021-01-01', 0.00),
(93, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 61 Tahun 2007', 255, 'https://drive.google.com/file/d/1FGqeE1pq-4V318QM9BPWPoEz_yljGgaN/view?usp=sharing', '2007-01-01', 0.00),
(94, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 7 Tahun 2017', 76, 'https://drive.google.com/file/d/1sBIFsKmXCVcEPQ7qcmY1phGE0O6AXIQV/view?usp=drive_link', '2017-01-01', 0.00),
(95, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES) Nomor 29 tahun 2007', 25, 'https://drive.google.com/file/d/1oMZ2Io8HQMolfUc-N2nqtl6dZefPJnZM/view?usp=sharing', '2007-01-01', 0.00),
(96, 'Tunjangan Fungsional ', 'Peraturan Presiden (PERPRES)  Nomor 129 Tahun 2024', 256, 'https://drive.google.com/file/d/1kG_Mh9ZxEkXl4P3XVkeYK0DR7cXbEThM/view?usp=sharing', '2024-01-01', 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gelar`
--

CREATE TABLE `gelar` (
  `id` int(11) NOT NULL,
  `fakultas` varchar(150) DEFAULT NULL,
  `program_studi` text DEFAULT NULL,
  `jenjang` varchar(50) DEFAULT NULL,
  `gelar` varchar(150) DEFAULT NULL,
  `gelar_inggris` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gelar`
--

INSERT INTO `gelar` (`id`, `fakultas`, `program_studi`, `jenjang`, `gelar`, `gelar_inggris`) VALUES
(1, 'Kedokteran', 'Kedokteran', 'S1', 'Sarjana Kedokteran (S.Ked.)', 'Bachelor of Medicine (B.M.)'),
(2, 'Kedokteran', 'Kebidanan', 'S1', 'Sarjana Kebidanan (S.Keb.)', 'Bachelor of Midwifery'),
(3, 'Kedokteran', 'Ilmu Kesehatan Olah Raga', 'S2', 'Magister Kesehatan (M.Kes)', 'Master of Sport Health Science'),
(4, 'Kedokteran', 'Ilmu Kedokteran Dasar', 'S2', 'Magister Sains (M.Si)', 'Master of Science?'),
(5, 'fakultas', 'program_studi', 'jenjang', 'gelar', 'gelar_inggris'),
(6, 'Kedokteran', 'Ilmu Kesehatan Reproduksi', 'S2', 'Magister Kesehatan (M.Kes)', 'Master of Reproductive Health'),
(7, 'Kedokteran', 'Ilmu Kedokteran Klinik', 'S2', 'Magister Kedokteran Klinik (M.Ked.Klin)', 'Master of Clinical Medicine'),
(8, 'Kedokteran', 'Ilmu Kedokteran?', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Medical Science'),
(9, 'Kedokteran', 'Pendidikan Profesi Dokter', 'Profesi', 'Dokter (dr.)', 'Medical Doctor (M.D.)'),
(10, 'Kedokteran', 'Pendidikan Profesi Bidan', 'Profesi', 'Bidan (Bdn)', 'Midwife (Bdn)'),
(11, 'Kedokteran', 'Anestesiologi dan Terapi Intensif', 'Spesialis', 'Spesialis Anestesiologi (Sp.An-TI)', 'Anesthesiologist'),
(12, 'Kedokteran', 'Orthopaedi dan Traumatologi', 'Spesialis', 'Spesialis Orthopaedi dan Traumatologi (Sp.OT)', 'Orthopaedic and Traumatologist'),
(13, 'Kedokteran', 'Ilmu Penyakit Dalam', 'Spesialis', 'Spesialis Penyakit Dalam (Sp.P.D)', 'Internist'),
(14, 'Kedokteran', 'Patologi Anatomik', 'Spesialis', 'Spesialis Patologi Anatomik (Sp.P.A.)', 'Anatomical Pathologist'),
(15, 'Kedokteran', 'Ilmu Kesehatan Telinga Hidung Tenggorok Bedah Kepala dan Leher', 'Spesialis', 'Spesialis Telinga Hidung Tenggorok Bedah Kepala dan Leher (Sp.T.H.T.B.K.L)', 'Otorhinolaryngologist Head and Neck Surgeon (ORL-HNS)'),
(16, 'Kedokteran', 'Ilmu Kedokteran Fisik dan Rehabilitasi', 'Spesialis', 'Spesialis Kedokteran Fisik dan Rehabilitasi (Sp.K.F.R.)', 'Physiatrist'),
(17, 'Kedokteran', 'Ilmu Kesehatan Mata', 'Spesialis', 'Spesialis Mata (Sp.M)', 'Ophthalmologist'),
(18, 'Kedokteran', 'Bedah Plastik Rekonstruksi dan Estetik', 'Spesialis', 'Spesialis Bedah Plastik Rekonstruksi dan Estetik (Sp.BP-RE)', 'Plastic Reconstructive and Aesthetic Surgeon'),
(19, 'Kedokteran', 'Pulmonologi dan Ilmu Kedokteran Respirasi', 'Spesialis', 'Spesialis Paru dan Pernapasan (Sp.P)', 'Pulmonologist'),
(20, 'Kedokteran', 'Neurologi', 'Spesialis', 'Spesialis Neurologi (Sp.N.)', 'Neurologist'),
(21, 'Kedokteran', 'Ilmu Bedah', 'Spesialis', 'Spesialis Bedah (Sp.B)', 'General Surgeon'),
(22, 'Kedokteran', 'Kedokteran Forensik dan Studi Medikolegal', 'Spesilais', 'Spesialis Forensik Medikolegal (Sp.F.M.)', 'Forensic Medicine and Medicolegal Specialist?'),
(23, 'Kedokteran', 'Jantung dan Pembuluh Darah', 'Spesialis', 'Spesialis Jantung dan Pembuluh Darah (Sp.J.P.)', 'Cardiologist'),
(24, 'Kedokteran', 'Obstetri dan Ginekologi', 'Spesialis', 'Spesialis Obstetri Ginekologi (Sp.OG)', 'Obstetrics and Gynecology'),
(25, 'Kedokteran', 'Radiologi', 'Spesialis', 'Spesialis Radiologi (Sp.Rad)', 'Radiologist'),
(26, 'Kedokteran', 'Dermatologi dan Venereologi', 'Spesialis', 'Spesialis Dermatologi Venereologi dan Estetika (Sp.D.V.E)', 'Dermatologist and Venereologist'),
(27, 'Kedokteran', 'Psikiatri', 'Spesialis', 'Spesialis Kedokteran Jiwa (Sp.K.J.)', 'Psychiatrist'),
(28, 'Kedokteran', 'Andrologi', 'Spesialis', 'Spesialis Andrologi (Sp.And.)', 'Andrologist'),
(29, 'Kedokteran', 'Mikrobiologi Klinik', 'Spesialis', 'Spesialis Mikrobiologi Klinik (Sp.MK)', 'Clinical Microbiologist'),
(30, 'Kedokteran', 'Bedah Toraks, Kardiak, dan Vaskular', 'Spesialis', 'Spesialis Bedah Toraks, Kardiak, dan Vaskular (Sp.B.T.K.V)', 'Thoracic, Cardiac and Vascular Surgeon'),
(31, 'Kedokteran', 'Bedah Saraf', 'Spesialis', 'Spesialis Bedah Saraf (Sp.B.S.)', 'Neurosurgeon'),
(32, 'Kedokteran', 'Urologi', 'Spesialis', 'Spesialis Urologi (Sp.U)', 'Urologist'),
(33, 'Kedokteran', 'Patologi Klinik', 'Spesialis', 'Spesialis Patologi Klinik (Sp.PK)', 'Clinical Pathologist'),
(34, 'Kedokteran', 'Ilmu Bedah Anak', 'Spesialis', 'Spesialis Ilmu Bedah Anak (Sp.B.A.)', 'Pediatric Surgeon'),
(35, 'Kedokteran', 'Ilmu Kesehatan Anak', 'Spesialis', 'Spesialis Anak (Sp.A)', 'Pediatrician'),
(36, 'Kedokteran', 'Neurologi (Kampus RS Pusat Otak Nasional)', 'Spesialis', 'Spesialis Neurologi (Sp.N.)', 'Neurologist'),
(37, 'Kedokteran', 'Bedah Digestif', 'Subspesialis', 'Spesialis Bedah Konsultan Digestif (Sp.B-KBD)', 'Digestive Surgeon'),
(38, 'Kedokteran', 'Subspesialis Psikiatri Anak dan Remaja Konsultan', 'Subspesialis', 'Subspesialis Psikiatri Anak dan Remaja Konsultan (Sp.K.J(K))', 'Child and Adolescent Psychiatry Consultant'),
(39, 'Kedokteran', 'Subspesialis Ilmu Kesehatan Anak', 'Subspesialis', 'Spesialis Anak Konsultan (Sp.A(K))', 'Pediatric Consultant'),
(40, 'Kedokteran', 'Bedah Kepala Leher', 'Subspesialis', 'Spesialis Bedah Konsultan Kepala Leher (Sp.B(K)KL)', 'Head and Neck Surgeon'),
(41, 'Kedokteran', 'Subspesialis Obstetri dan Ginekologi', 'Subspesialis', 'Peminatan Kedokteran Fetomaternal (Sp.OG,Subsp.KFM)', 'Obstetrician and Gynecologist Consultant of Maternal and Fetal Medicine?'),
(42, '', '', '', 'Peminatan Fertilitas Endokrinologi??Reproduksi (Sp.OG,Subsp.FER)', 'Obstetrician and Gynecologist Consultant of Fertility and Reproductive??Endocrinology'),
(43, '', '', '', 'Peminatan Onkologi Ginekologi (Sp.OG,Subsp.Onk.)', 'Obstetrician and Gynecologist Consultant of Oncology Gynecology'),
(44, '', '', '', 'Peminatan Uroginekologi Rekonstruksi (Sp.OG,Subsp.UroginRE)', 'Obstetrician and Gynecologist Consultant of??Urogynecology Reconstruction'),
(45, '', '', '', 'Peminatan Obstetri dan Ginekologi Sosial (Sp.OG,Subsp.Obginsos)', 'Obstetrician and Gynecologist Consultant of??Social Obstetric and Gynecology'),
(46, 'Kedokteran', 'Sub Spesialis Patologi Klinik', 'Subspesialis', 'Spesialis Patologi Klinik Konsultan (Sp.PK(K))', 'Clinical Pathologist Consultant'),
(47, 'Kedokteran', 'Sub Spesialis Ilmu Penyakit Dalam', 'Subspesialis', 'Spesialis Penyakit Dalam Konsultan Endokrinologi Metabolik dan Diabetes (Sp.PD, K-EMD)', 'Internist, Diabetic Metabolic Endocrinologist'),
(48, '', '', '', 'Spesialis Penyakit Dalam Konsultan Gastroenterohepatologi (Sp.PD, K-GEH)', 'Internist, Gastro Enterologist Hepatologist'),
(49, '', '', '', 'Spesialis Ilmu Penyakit Dalam, Konsultan Penyakit Tropik dan Infeksi (Sp.PD, K-PTI)', 'Internist, Tropical Infectiologist'),
(50, '', '', '', 'Spesialis Ilmu Penyakit Dalam, Konsultan Reumatologi (Sp.PD, K-R)', 'Internist, Rheumatologist'),
(51, '', '', '', 'Spesialis Ilmu Penyakit Dalam, Konsultan Hematologi Onkologi Medik (Sp.PD, K-HOM)', 'Internist, Medical Hematologist Oncologist'),
(52, '', '', '', 'Spesialis Penyakit Dalam Konsultan Alergi Imunologi Klinik (Sp.PD, K-AI)', 'Internist, Alergy Imunologist'),
(53, '', '', '', 'Spesialis Ilmu Penyakit Dalam, Konsultan Ginjal Hipertensi (Sp.PD, K-GH)', 'Internist, Nephrologist'),
(54, '', '', '', 'Spesialis Penyakit Dalam Konsultan Gastroenterohepatologi (Sp.PD, K-GEH)', 'Internist, Gastro Enterologist Hepatologist'),
(55, 'Kedokteran', 'Anestesiologi dan Terapi Intensif', 'Subspesialis', 'Terapi Intensif (T.I.(K)', 'Intensive Theraphy'),
(56, '', '', '', 'Anestesi Pediatrik dan Critical Care (An.Ped.(K))', 'Pediatric anesthesiology and Critical Care'),
(57, '', '', '', 'Anestesi Kardiovaskular dan Critical Care (An.Kv.(K))', 'Cardiovascular anesthesiology and Critical Care'),
(58, 'Kedokteran', 'Sub Spesialis Jantung dan Pembuluh Darah', 'Subspesialis', 'Subspesialis Jantung dan Pembuluh Darah Ekokardiografi (Sp.JP,Subsp.Eko(K))', ''),
(59, '', '', '', 'Subspesialis Jantung dan Pembuluh Darah Kardiologi Intervensi (Sp.JP,Subsp.KI(K))', ''),
(60, 'Kedokteran', 'Sub Spesialis Orthopaedi dan Traumatologi', 'Subspesialis', 'Subspesialis Orthopaedi dan Traumatologi Konsultan (Sp.OT. Konsultan)', ''),
(61, 'Kedokteran Gigi', 'Kedokteran Gigi', 'S1', 'Sarjana Kedokteran Gigi (S.KG)', 'Bachelor of Dental Surgery'),
(62, 'Kedokteran Gigi', 'Ilmu Kesehatan Gigi', 'S2', 'Magister Kesehatan (M.Kes.)', 'Master of Health Science'),
(63, 'Kedokteran Gigi', 'Ilmu Kedokteran Gigi', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Dental Medicine'),
(64, 'Kedokteran Gigi', 'Pendidikan Profesi Dokter Gigi', 'Profesi', 'Dokter Gigi (drg.)', 'Doctor of Dental Surgery'),
(65, 'Kedokteran Gigi', 'Bedah Mulut dan Maksilofasial', 'Spesialis', 'Spesialis Bedah Mulut Dan Maksilofasial (Sp.B.M.M.)', 'Oral and Maxillofacial Surgeon'),
(66, 'Kedokteran Gigi', 'Kedokteran Gigi Anak', 'Spesialis', 'Spesialis Kedokteran Gigi Anak (Sp.KGA.)', 'Specialist in Pediatrics Dentistry'),
(67, 'Kedokteran Gigi', 'Ilmu Konservasi Gigi', 'Spesialis', 'Spesialis Konservasi Gigi (Sp.KG.)', 'Specialist in Conservative Dentistry'),
(68, 'Kedokteran Gigi', 'Ilmu Penyakit Mulut', 'Spesialis', 'Spesialis Penyakit Mulut (Sp.PM.)', 'Oral Medicine Specialist'),
(69, 'Kedokteran Gigi', 'Ortodonti', 'Spesialis', 'Spesialis Ortodonti (Sp.Ort.)', 'Specialist in Orthodontics'),
(70, 'Kedokteran Gigi', 'Periodonsia', 'Spesialis', 'Spesialis Periodonsia (Sp.Perio.)', 'Specialist In Periodontics'),
(71, 'Kedokteran Gigi', 'Prostodonsia', 'Spesialis', 'Spesialis Prostodonsia (Sp.Pros.)', 'Spesialist in Prosthodontics'),
(72, 'Kedokteran Gigi', 'Radiologi Kedokteran Gigi', 'Spesialis', 'Spesialis Radiologi Kedokteran Gigi (Sp.RKG)', 'Oral and Maxillofacial Radiologist'),
(73, 'Hukum', 'Ilmu Hukum', 'S1', 'Sarjana Hukum (SH)', 'Bachelor of Law'),
(74, 'Hukum', 'Ilmu Hukum', 'S2', 'Magister Hukum (MH)', 'Master of Law??'),
(75, 'Hukum', 'Kenotariatan', 'S2', 'Magister Kenotariatan (M.Kn)', 'Master of Notary'),
(76, 'Hukum', 'Ilmu Hukum', 'S3', 'Doktor (Dr)', 'Doctor of Law'),
(77, 'Ekonomi dan Bisnis', 'Pendidikan Profesi Akuntan', 'Profesi', 'Akuntan (Ak.)', 'Accountant'),
(78, 'Ekonomi dan Bisnis', 'Akuntansi', 'S1', 'Sarjana Akuntansi (S.A.)', 'Bachelor of Accounting'),
(79, 'Ekonomi dan Bisnis', 'Ekonomi Pembangunan', 'S1', 'Sarjana Ekonomi (S.E.)', 'Bachelor of Economics'),
(80, 'Ekonomi dan Bisnis', 'Manajemen', 'S1', 'Sarjana Manajemen (S.M.)', 'Bachelor of Management'),
(81, 'Ekonomi dan Bisnis', 'Ekonomi Islam', 'S1', 'Sarjana Ekonomi Islam (S.EI.)', 'Bachelor of Islamic Economics'),
(82, 'Ekonomi dan Bisnis', 'Ilmu Ekonomi', 'S2', 'Magister Sains Ekonomi (M.SE.)', 'Master of Science in Economics'),
(83, 'Ekonomi dan Bisnis', 'Sains Ekonomi Islam', 'S2', 'Magister Sains Ekonomi Islam (M.SEI.)', 'Master of Science in Islamic Economics'),
(84, 'Ekonomi dan Bisnis', 'Akuntansi', 'S2', 'Magister Akuntansi (M.A.)', 'Master in Accounting'),
(85, 'Ekonomi dan Bisnis', 'Sains Manajemen', 'S2', 'Magister Sains Manajemen (M.SM.)', 'Master of Science in Management'),
(86, 'Ekonomi dan Bisnis', 'Magister Manajemen', 'S2', 'Magister Manajemen (M.M.)', 'Master of Management?'),
(87, 'Ekonomi dan Bisnis', 'Ilmu Ekonomi Islam', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Islamic Economics'),
(88, 'Ekonomi dan Bisnis', 'Ilmu Ekonomi', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Economics'),
(89, 'Ekonomi dan Bisnis', 'Ilmu Akuntansi', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Accountancy'),
(90, 'Ekonomi dan Bisnis', 'Ilmu Manajemen', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Management'),
(91, 'Farmasi', 'Pendidikan Profesi Apoteker', 'Profesi', 'Apoteker (Apt.)', 'Pharmacist'),
(92, 'Farmasi', 'Farmasi', 'S1', 'Sarjana Farmasi (S.Farm.)', 'Bachelor of Pharmacy'),
(93, 'Farmasi', 'Ilmu Farmasi', 'S2', 'Magister Farmasi (M.Farm.)', 'Master of Pharmaceutical Sciences'),
(94, 'Farmasi', 'Ilmu Farmasi', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Pharmacy'),
(95, 'Farmasi', 'Farmasi Klinik', 'S2', 'Magister Farmasi Klinik (M.Farm.Klin.)', 'Master of Clinical Pharmacy'),
(96, 'Kedokteran Hewan', 'Kedokteran Hewan', 'S1', 'Sarjana Kedokteran Hewan (S.KH)', 'Bachelor of Veterinary Medicine (BVM)'),
(97, 'Kedokteran Hewan', 'Pendidikan Profesi Dokter Hewan', 'Profesi', 'Dokter Hewan (drh)', 'Doctor of Veterinary Medicine (DVM)'),
(98, 'Kedokteran Hewan', 'Ilmu Penyakit dan Kesehatan Masyarakat Veteriner', 'S2', 'Magister Sains (M.Si)', 'Master of Science (M.Sc)'),
(99, 'Kedokteran Hewan', 'Vaksinologi dan Imunoterapetika', 'S2', 'Magister Sains (M.Si)', 'Master of Science (M.Sc)'),
(100, 'Kedokteran Hewan', 'Agribisnis Veteriner', 'S2', 'Magister Veteriner (M.Vet)', 'Master of Veterinary Science (M.Vet)'),
(101, 'Kedokteran Hewan', 'Biologi Reproduksi', 'S2', 'Magister Sains (M.Si)', 'Master of Science (M.Sc)'),
(102, 'Kedokteran Hewan', 'Sains Veteriner', 'S3', 'Doktor (Dr)', 'Doctor of Philosophy (Ph.D)'),
(103, 'Ilmu Sosial dan Ilmu Politik', 'Sosiologi', 'S1', 'Sarjana Sosiologi (S.Sosio.)', 'Bachelor of Arts (Sociology)'),
(104, 'Ilmu Sosial dan Ilmu Politik', 'Ilmu Komunikasi', 'S1', 'Sarjana Ilmu Komunikasi (S.I.Kom.)', 'Bachelor of Communications'),
(105, 'Ilmu Sosial dan Ilmu Politik', 'Ilmu Hubungan Internasional', 'S1', 'Sarjana Hubungan Internasional (S.Hub.Int.)', 'Bachelor of International Relations'),
(106, 'Ilmu Sosial dan Ilmu Politik', 'Administrasi Publik', 'S1', 'Sarjana Administrasi Publik (S.A.P.)', 'Bachelor of Public Administration (B.PA)'),
(107, 'Ilmu Sosial dan Ilmu Politik', 'Antropologi', 'S1', 'Sarjana Antropologi (S.Ant.)', 'Bachelor of Arts (Anthropology)'),
(108, 'Ilmu Sosial dan Ilmu Politik', 'Ilmu Informasi dan Perpustakaan', 'S1', 'Sarjana Ilmu Informasi dan Perpustakaan (S.IIP.)', 'Bachelor of Arts (Library and Information Science)'),
(109, 'Ilmu Sosial dan Ilmu Politik', 'Ilmu Politik', 'S1', 'Sarjana Ilmu Politik (S.IP.)', 'Bachelor of Arts (Political Science)'),
(110, 'Ilmu Sosial dan Ilmu Politik', 'Kebijakan Publik', 'S2', 'Magister Kebijakan Publik (M.KP.)', 'Master of Public Policy'),
(111, 'Ilmu Sosial dan Ilmu Politik', 'Sosiologi', 'S2', 'Magister Sosiologi (M.Sosio.)', 'Master of Sociology'),
(112, 'Ilmu Sosial dan Ilmu Politik', 'Hubungan Internasional', 'S2', 'Magister Hubungan Internasional (M.Hub.Int.)', 'Master of International Relations'),
(113, 'Ilmu Sosial dan Ilmu Politik', 'Ilmu Politik', 'S2', 'Magister Ilmu Politik (M.IP.)', 'Master of Arts (Political Science)'),
(114, 'Ilmu Sosial dan Ilmu Politik', 'Media dan Komunikasi', 'S2', 'Magister Media dan Komunikasi (M.Med.Kom)', 'Master of Media and Communication'),
(115, 'Ilmu Sosial dan Ilmu Politik', 'Ilmu Sosial?', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Social Science'),
(116, 'Sains dan Teknologi', 'Biologi', 'S1', 'Sarjana Sains (S.Si)', 'Bachelor of Science'),
(117, 'Sains dan Teknologi', 'Fisika', 'S1', 'Sarjana Sains (S.Si)', 'Bachelor of Science'),
(118, 'Sains dan Teknologi', 'Kimia', 'S1', 'Sarjana Sains (S.Si)', 'Bachelor of Science'),
(119, 'Sains dan Teknologi', 'Matematika', 'S1', 'Sarjana Sains (S.Si)', 'Bachelor of Science'),
(120, 'Sains dan Teknologi', 'Sistem Informasi', 'S1', 'Sarjana Komputer (S.Kom)', 'Bachelor of Computer Science'),
(121, 'Sains dan Teknologi', 'Statistika', 'S1', 'Sarjana Statistika (S.Stat)', 'Bachelor of Statistics'),
(122, 'Sains dan Teknologi', 'Teknik Biomedis', 'S1', 'Sarjana Teknik (S.T)', 'Bachelor of Engineering'),
(123, 'Sains dan Teknologi', 'Teknik Lingkungan', 'S1', 'Sarjana Teknik (S.T)', 'Bachelor of Engineering'),
(124, 'Sains dan Teknologi', 'Biologi', 'S2', 'Magister Sains (M.Si)', 'Master of Science'),
(125, 'Sains dan Teknologi', 'Kimia', 'S2', 'Magister Sains (M.Si)', 'Master of Science'),
(126, 'Sains dan Teknologi', 'Teknik Biomedis', 'S2', 'Magister Teknik (M.T)', 'Master of Engineering'),
(127, 'Sains dan Teknologi', 'Matematika', 'S2', 'Magister Sains (M.Si)', 'Master of Science'),
(128, 'Sains dan Teknologi', 'Matematika dan Ilmu Pengetahuan Alam', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Mathematics & Natural Science'),
(129, 'Sekolah Pascasarjana', 'Ilmu Forensik', 'S2', 'Magister Sains (M.Si.)', 'Master of Science'),
(130, 'Sekolah Pascasarjana', 'Imunologi', 'S2', 'Magister Imunologi (M. Imun.)', 'Master of Immunology'),
(131, 'Sekolah Pascasarjana', 'Sains Hukum dan Pembangunan', 'S2', 'Magister Hukum dan Pembangunan (M.HP.)', 'Master of Law and Development'),
(132, 'Sekolah Pascasarjana', 'Pengembangan Sumber Daya Manusia', 'S2', 'Magister Pengembangan Sumber Daya Manusia (M.PSDM.)', 'Master of Arts (Human Resouces Development)'),
(133, 'Sekolah Pascasarjana', 'Kajian Ilmu Kepolisian', 'S2', 'Magister Ilmu Kepolisian (M.IK)', 'Master of Police Science'),
(134, 'Sekolah Pascasarjana', 'Manajemen Bencana', 'S2', 'Magister Manajemen Bencana (M.MB.)', 'Master of Disaster Management'),
(135, 'Sekolah Pascasarjana', 'Ekonomi Kesehatan', 'S2', 'Magister Ekonomi Kesehatan(M.EK)', 'Master of Health Economics'),
(136, 'Sekolah Pascasarjana', 'Pengembangan Sumber Daya Manusia', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Human Resources Development'),
(137, 'Sekolah Pascasarjana', 'Hukum dan Pembangunan', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Law dan Development'),
(138, 'Kesehatan Masyarakat', 'Kesehatan Masyarakat', 'S1', 'Sarjana Kesehatan Masyarakat (S.KM.)', 'Bachelor of Public Health'),
(139, 'Kesehatan Masyarakat', 'Gizi', 'S1', 'Sarjana Gizi (S.Gz.)', 'Bachelor of Nutrition'),
(140, 'Kesehatan Masyarakat', 'Kesehatan Masyarakat', 'S2', 'Magister Kesehatan (M.Kes.)', 'Master of Public Health'),
(141, 'Kesehatan Masyarakat', 'Administrasi dan Kebijakan Kesehatan', 'S2', 'Magister Kesehatan (M.Kes.)', 'Master of Public Health'),
(142, 'Kesehatan Masyarakat', 'Kesehatan Lingkungan', 'S2', 'Magister Kesehatan Lingkungan (M.KL.)', 'Master of Environmental Health'),
(143, 'Kesehatan Masyarakat', 'Kesehatan dan Keselamatan Kerja', 'S2', 'Magister Kesehatan dan Keselamatan Kerja (M.KKK.)', 'Master of Occupational Health and Safety'),
(144, 'Kesehatan Masyarakat', 'Epidemiologi', 'S2', 'Magister Epidemiology (M.Epid.)', 'Master of Epidemiology'),
(145, 'Kesehatan Masyarakat', 'Kesehatan Masyarakat', 'S3', 'Doktor (Dr.)', 'Doctor of Philosophy in Public Health'),
(146, 'Psikologi', 'Psikologi', 'S1', 'Sarjana Psikologi (S.Psi)', 'Bachelor of Psychology'),
(147, 'Psikologi', 'Psikologi', 'S2', 'Magister Sains (M.Si)', 'Master of Science'),
(148, 'Psikologi', 'Psikologi Profesi', 'S2', 'Magister Psikologi Profesi (M.Psi)', 'Master Of Professional Psychology'),
(149, 'Psikologi', 'Psikologi Terapan', 'S2', 'Magister Psikologi Terapan (M.Psi.T)', 'Master of Applied Psychology'),
(150, 'Psikologi', 'Psikologi', 'S3', 'Doktor (Dr.)', 'Doctor pf Philosophy in Psychology'),
(151, 'Ilmu Budaya', 'Bahasa dan Sastra Indonesia', 'S1', 'Sarjana Humaniora (S.Hum)', 'Bachelor of Art'),
(152, 'Ilmu Budaya', 'Bahasa dan Sastra Inggris', 'S1', 'Sarjana Humaniora (S.Hum)', 'Bachelor of Art'),
(153, 'Ilmu Budaya', 'Ilmu Sejarah', 'S1', 'Sarjana Humaniora (S.Hum)', 'Bachelor of Art'),
(154, 'Ilmu Budaya', 'Studi Kejepangan', 'S1', 'Sarjana Humaniora (S.Hum)', 'Bachelor of Art'),
(155, 'Ilmu Budaya', 'Kajian Sastra dan Budaya', 'S2', 'Magister Humaniora (M.Hum)', 'Master of Art'),
(156, 'Ilmu Budaya', 'Ilmu Linguistik', 'S2', 'Magister Humaniora (M.Hum)', 'Master of Art'),
(157, 'Keperawatan', 'Keperawatan', 'S1', 'Sarjana Keperawatan (S.Kep.)', 'Bachelor of Nursing'),
(158, 'Keperawatan', 'Pendidikan Profesi Ners', 'Profesi', 'Ners (Ns.)', 'Nurse'),
(159, 'Keperawatan', 'Keperawatan', 'S2', 'Magister Keperawatan (M.Kep.)', 'Master or Nursing'),
(160, 'Keperawatan', 'Keperawatan', 'S3', 'Doktor (Dr.)', 'Doctor (in Nursing)'),
(161, 'Keperawatan', 'Keperawatan Medikal Bedah', 'Spesialis', 'Spesialis Keperawatan Medikal Bedah (Sp.Kep. MB.)', 'Medical and Surgical Nursing Specialist'),
(162, 'Perikanan dan Kelautan', 'Akuakultur', 'S1', 'Sarjana Perikanan (S.Pi.)', 'Bachelor of Fisheries Science'),
(163, 'Perikanan dan Kelautan', 'Teknologi Hasil Perikanan', 'S1', 'Sarjana Perikanan (S.Pi.)', 'Bachelor of Fisheries Science'),
(164, 'Perikanan dan Kelautan', 'Bioteknologi Perikanan dan Kelautan', 'S2', 'Magister Sains (M.Si.)', 'Master of Science'),
(165, 'Perikanan dan Kelautan', 'Ilmu Perikanan?', 'S2', 'Magister Sains (M.Si.)', 'Master of Science'),
(166, 'Vokasi', 'Fisioterapi', 'D4', 'Sarjana Terapan Fisioterapi (S.Tr. Fis.)', 'Bachelor Of Physiotherapy'),
(167, 'Vokasi', 'Pengobat Tradisional', 'D4', 'Sarjana Terapan Pengobat Tradisional (S.Tr. Battra.)', 'Bachelor Of Traditional Medicine Practitioner'),
(168, 'Vokasi', 'Teknologi Radiologi Pencitraan', 'D4', 'Sarjana Terapan Radiologi (S.Tr. Kes.)', 'Bachelor Of Applied Health'),
(169, 'Vokasi', 'Manajemen Perhotelan', 'D4', 'Sarjana Terapan Pariwisata (S.Tr.Par.)', 'Bachelor Of Hospitality Management'),
(170, 'Vokasi', 'Destinasi Pariwisata', 'D4', 'Sarjana Terapan Destinasi Pariwisata (S.Tr.Par.)', 'Bachelor Of Tourism Destination'),
(171, 'Vokasi', 'Perbankan Dan Keuangan', 'D4', 'Sarjana Terapan Bisnis (S.Tr.Bns.)', 'Bachelor Of Bussiness'),
(172, 'Vokasi', 'Teknologi Laboratorium Medik', 'D4', 'Sarjana Terapan (S.Tr.Kes)', 'Bachelor Of Applied Health'),
(173, 'Vokasi', 'Teknologi Rekayasa Instrumentasi Dan Kontrol', 'D4', 'Sarjana Terapan Teknik (S.Tr.T)', 'Bachelor Of Applied Engineering'),
(174, 'Vokasi', 'Keselamatan Dan Kesehatan Kerja', 'D4', 'Sarjana Terapan Kesehatan (S.Tr.Kes)', 'Bachelor Of Applied Health'),
(175, 'Vokasi', 'Manajemen Perkantoran Digital', 'D4', 'Sarjana Terapan Manajemen Perkantoran Digital (S.Tr.Mpkt)', 'Digital Office Management'),
(176, 'Vokasi', 'Administrasi Perkantoran', 'D3', 'Ahli Madya Administrasi Perkantoran (A.Md. A.Pkt. )', 'Diploma In Office Management'),
(177, 'Vokasi', 'Akuntansi', 'D3', 'Ahli Madya Akuntansi (A.Md. Akun. )', 'Diploma Of Accounting'),
(178, 'Vokasi', 'Bahasa Inggris', 'D3', 'Ahli Madya Linguistik (A.Md.Li. )', 'Diploma In English Language'),
(179, 'Vokasi', 'Kepariwisataan /Bina Wisata', 'D3', 'Ahli Madya Kepariwisataan (A.Md.Par. )', 'Diploma In Tourism'),
(180, 'Vokasi', 'Keperawatan', 'D3', 'Ahli Madya Keperawatan (A.Md.Kep. )', 'Diploma In Nursing'),
(181, 'Vokasi', 'Keselamatan dan Kesehatan Kerja', 'D3', 'Ahli Madya Keselamatan dan Kesehatan Kerja (A.Md. K.K.K.)?', 'Diploma in Occupational Safety and Health'),
(182, 'Vokasi', 'Otomasi Sistem Instrumentasi', 'D3', 'Ahli Madya Teknik (A.Md. T.)', 'Diploma of Instrumentation and Control Engineering'),
(183, 'Vokasi', 'Manajemen Pemasaran', 'D3', 'Ahli Madya Manajemen Pemasaran (A.Md. M. )', 'Diploma In Marketing Management'),
(184, 'Vokasi', 'Manajemen Perbankan', 'D3', 'Ahli Madya Perbankan Dan Keuangan (A.Md. Bns. )', 'Diploma In Banking Management'),
(185, 'Vokasi', 'Manajemen Perhotelan', 'D3', 'Ahli Madya Manajemen Perhotelan (A.Md.M. )', 'Diploma In Hospitality Management'),
(186, 'Vokasi', 'Paramedik Veteriner', 'D3', 'Ahli Madya Veteriner (A.Md.Vet. )', 'Diploma In Veterinary'),
(187, 'Vokasi', 'Perpajakan', 'D3', 'Ahli Madya Manajemen Perpajakan (A.Md.M. )', 'Diploma In Tax Management'),
(188, 'Vokasi', 'Perpustakaan', 'D3', 'Ahli Madya Perpustakaan (A.Md.Lib. )', 'Diploma In Library'),
(189, 'Vokasi', 'Sistem Informasi', 'D3', 'Ahli Madya Komputer (A.Md.Kom. )', 'Diploma In Information System'),
(190, 'Vokasi', 'Teknik Gigi', 'D3', 'Ahli Madya Kesehatan (A.Md.Kes. )', 'Diploma In Dental Health Technology'),
(191, 'Vokasi', 'Teknologi Laboratorium Medis', 'D3', 'Ahli Madya Kesehatan (A.Md.Kes)', 'Diploma In Medical Laboratory'),
(192, 'FTMM', 'Rekayasa Nanoteknologi', 'S1', 'Sarjana Teknik (S.T.)', 'Bachelor of Engineering (B.Eng.)'),
(193, 'FTMM', 'Teknik Elektro', 'S1', 'Sarjana Teknik (S.T.)', 'Bachelor of Engineering (B.Eng.)'),
(194, 'FTMM', 'Teknik Industri', 'S1', 'Sarjana Teknik (S.T.)', 'Bachelor of Engineering (B.Eng.)'),
(195, 'FTMM', 'Teknik Robotika dan Kecerdasan Buatan', 'S1', 'Sarjana Teknik (S.T.)', 'Bachelor of Engineering (B.Eng.)'),
(196, 'FTMM', 'Teknologi Sains Data', 'S1', 'Sarjana Teknik (S.T.)', 'Bachelor of Engineering (B.Eng.)'),
(197, 'SIKIA', 'Kesehatan Masyarakat', 'S1', 'Sarjana Kesehatan Masyarakat (S.KM.)', 'Bachelor of Public Health'),
(198, 'SIKIA', 'Kedokteran Hewan', 'S1', 'Sarjana Kedokteran Hewan (S.KH)', 'Bachelor of Veterinary Medicine?'),
(199, 'SIKIA', 'Akuakultur', 'S1', 'Sarjana Perikanan (S.Pi.)', 'Bachelor of Fisheries Science');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_fungsional`
--

CREATE TABLE `jabatan_fungsional` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jabatan_fungsional`
--

INSERT INTO `jabatan_fungsional` (`id`, `nama`) VALUES
(1, 'Analis Kebijakan '),
(4, 'Perancang Peraturan Perundang-Undangan '),
(7, 'Analis Hukum '),
(10, 'Pengelola Pengadaan Barang Dan Jasa'),
(13, 'Analis Keuangan Pusat Dan Daerah '),
(16, 'Analis SDM Aparatur '),
(19, 'Auditor '),
(22, 'PPUPD (Pengawas Penyelenggaraan Urusan Pemerintahan Daerah)'),
(25, 'Pranata Humas '),
(28, 'Perisalah Legislatif '),
(31, 'Perencana '),
(34, 'Penilai Pemerintah '),
(37, 'Pengantar Kerja '),
(40, 'Penyuluh Perindustrian Dan Perdagangan '),
(43, 'Asesor Manajemen Mutu Industri '),
(46, 'Analis Perdagangan '),
(49, 'Teknik Tata Bangunan Dan Perumahan '),
(52, 'Teknik Penyehatan Lingkungan '),
(55, 'Penggerak Swadaya Masyarakat '),
(58, 'Penyuluh Sosial '),
(61, 'Pengawas Koperasi '),
(64, 'Penata Kependudukan Dan Keluarga Berencana '),
(67, 'Medik Veteriner '),
(70, 'Paramedik Veteriner '),
(76, 'Analis Ketahanan Pangan'),
(79, 'Pengawas Mutu Hasil Pertanian'),
(82, 'Pengawas Alat Dan Mesin Pertanian '),
(85, 'Pengawas Benih Tanaman '),
(88, 'Pengawas Perikanan '),
(91, 'Pengawas Bibit Ternak '),
(94, 'Penata Ruang '),
(97, 'Teknik Jalan Dan Jembatan'),
(100, 'Pembina Jasa Konstruksi '),
(103, 'Teknik Pengairan '),
(106, 'Penyuluh Lingkungan Hidup '),
(109, 'Administrator Database Kependudukan'),
(112, 'Pustakawan '),
(115, 'Arsiparis '),
(118, 'Pamong Budaya '),
(121, 'Pranata Hubungan Masyarakat'),
(124, 'Pranata Komputer '),
(127, 'Pelatih Olahraga '),
(130, 'Analis Kebencanaan '),
(133, 'Analis Kebakaran '),
(136, 'Administrator Kesehatan '),
(139, 'Apoteker '),
(142, 'Penyuluh Kesehatan Masyarakat '),
(146, 'Sanitarian '),
(151, 'Dokter '),
(154, 'Asisten Apoteker'),
(160, 'Bidan '),
(167, 'Dokter Gigi'),
(170, 'Nutrisionis '),
(178, 'Perawat '),
(184, 'Perawat Gigi '),
(187, 'Perekam Medis'),
(193, 'Pranata Laboratorium '),
(198, 'Penyuluh Keluarga Berencana '),
(201, 'Tenaga Promosi Kesehatan Dan Ilmu Perilaku '),
(204, 'Terapis Gigi Dan Mulut '),
(207, 'Fisikawan Medis '),
(210, 'Fisioterapis '),
(219, 'Okupasi Terapis'),
(222, 'Radiografer '),
(230, 'Refraksionis Optisien '),
(233, 'Teknisi Elektromedis '),
(238, 'Pengawas Sekolah '),
(241, 'Guru '),
(244, 'Guru Ahli Muda Kepsek SD'),
(246, 'Guru Ahli Muda Kepsek SMP'),
(252, 'Pengendali Dampak Lingkungan'),
(253, 'Pengawas Lingkungan Hidup'),
(254, 'Pengembang Penilaian Pendidikan'),
(255, 'Perkerja Sosial'),
(256, 'Analisis Data Ilmiah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pegawai`
--

CREATE TABLE `jenis_pegawai` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_pegawai`
--

INSERT INTO `jenis_pegawai` (`id`, `nama_jenis`) VALUES
(6, 'PNS'),
(7, 'PPPK'),
(8, 'PPPK Paruh Waktu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sk`
--

CREATE TABLE `jenis_sk` (
  `id_jenis` int(100) NOT NULL,
  `nama_jenis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_sk`
--

INSERT INTO `jenis_sk` (`id_jenis`, `nama_jenis`) VALUES
(1, 'PENGANGKATAN PERTAMA JF'),
(2, 'PENGANGKATAN MELALUI PERPINDAHAN DARI JABATAN LAIN'),
(3, 'PENGANGKATAN KEMBALI DARI TUGAS BELAJAR'),
(4, 'PEMBERHENTIAN DARI JF KARENA MENGUNDURKAN DIRI DARI JF'),
(5, 'PEMBERHENTIAN KARENA DITUGASKAN SECARA PENUH DILUAR JABATAN PELAKSANA'),
(6, 'SYARAT PEMBERHENTIAN KARENA DITUGASKAN SECARA PENUH DILUAR JABATAN STRUKTURAL'),
(7, 'PROMOSI JF KENAIKAN JENJANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE `level_user` (
  `id_user_level` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level_user`
--

INSERT INTO `level_user` (`id_user_level`, `nama`) VALUES
(5, 'Operator'),
(1, 'Super Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user_hak_akses`
--

CREATE TABLE `level_user_hak_akses` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user_level` int(10) UNSIGNED NOT NULL,
  `id_hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `level_user_hak_akses`
--

INSERT INTO `level_user_hak_akses` (`id`, `id_user_level`, `id_hak_akses`) VALUES
(1, 1, 2),
(19, 1, 1),
(20, 1, 19),
(21, 1, 20),
(22, 1, 21),
(23, 1, 24),
(24, 1, 25),
(25, 1, 26),
(26, 1, 27),
(27, 1, 28),
(36, 1, 29),
(37, 1, 30),
(47, 1, 23),
(48, 5, 1),
(49, 5, 2),
(50, 5, 19),
(51, 5, 20),
(52, 5, 24),
(53, 5, 26),
(54, 5, 27),
(55, 5, 28),
(56, 5, 29),
(57, 5, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `url` varchar(150) NOT NULL,
  `urut` int(11) DEFAULT 0,
  `menu` int(11) DEFAULT 0,
  `icon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id`, `nama`, `url`, `urut`, `menu`, `icon`) VALUES
(1, 'Dashboard', 'admin', 1, 0, 'bi bi-speedometer2'),
(2, 'Data', '#', 2, 0, 'bi bi-list'),
(19, 'Data Pegawai', 'pegawai', 2, 2, 'bi bi-folder-fill'),
(20, 'Data SK', 'data-sk', 2, 2, 'bi bi-folder-fill'),
(21, 'Setting', '#', 4, 0, 'bi bi-gear'),
(22, 'User', 'user', 1, 21, 'bi bi-folder-fill'),
(23, 'Level User', 'leveluser', 2, 21, 'bi bi-folder-fill'),
(24, 'Data Jenis SK', 'jenis-sk', 3, 2, 'bi bi-folder-fill'),
(25, 'Jenis Pegawai', 'jenis-pegawai', 4, 21, 'bi bi-folder-fill'),
(26, 'Dokumen Jabatan Fungsional', '#', 2, 0, 'bi bi-list'),
(27, 'Jabatan Fungsional', 'jabatan-fungsional', 1, 26, 'bi bi-folder-fill'),
(28, 'Dokumen', '#', 3, 0, 'bi bi-list'),
(29, 'Persayaratan', 'dokumen', 1, 28, 'bi bi-folder-fill'),
(30, 'List Gelar', 'gelar', 2, 28, 'bi bi-folder-fill');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `id_jenis` int(11) UNSIGNED DEFAULT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `id_jenis`, `nip`) VALUES
(13, 'POPPY F.A. SYAHPUTRI', 6, '198307222010012029'),
(14, 'RONATIUR FEBRIANI', 6, '199902092025052003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sk_pegawai`
--

CREATE TABLE `sk_pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_sk` int(11) DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `id_user_level` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_code` varchar(100) DEFAULT NULL,
  `auth_act` enum('enable','disable') DEFAULT 'disable',
  `dibuat_pada_tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nip`, `foto`, `id_user_level`, `username`, `password`, `auth_code`, `auth_act`, `dibuat_pada_tanggal`) VALUES
(1, 'Super Administrator', '000001', 'default.png', 1, 'super_admin', '$2y$10$uZcC7JO2U0jFKbB0Iacge.tyCQkFoZbIkPwjDmpixIfH7XqBXQw/K', '', 'disable', '2026-03-12 04:40:00'),
(6, 'Haifiz', '199507202025211002', '', 5, 'hafiz', '$2y$10$T1/XmWCsrpBF321/ELkEs.2AIBpS6aE8LCVHWau1Y3fNkTlB/MQAy', 'INLUMQ2GJEYUSQ2QKZKDIUSIGI', 'disable', '2026-04-20 04:00:30'),
(7, 'Contoh', '1993081520251002', '', 5, 'contoh', '$2y$10$kWfK57SLv1AxOY6MIZw2muUAk9Pn61rRl2of8R2KFETu/VymwOd/i', 'GY3TIVKNLBBECMKKIJGUWSSMGI', 'enable', '2026-04-22 07:24:32'),
(8, 'ronatiur', '123', '', 5, 'rona', '$2y$10$qBud9Qv8TB3Tqt8k1kAFfeYpGcvbNKHUW4y2Qsbxb2EMQeDt.oEku', 'JFDDSUKLJVNDCWBVKA3TGMCOHE', 'disable', '2026-08-07 07:46:48');

--
-- Indeks untuk tabel yang dibuang
--

--
-- Indeks untuk tabel `data_sk`
--
ALTER TABLE `data_sk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jenis_sk` (`id_jenis`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen_jabatan_fungsional`
--
ALTER TABLE `dokumen_jabatan_fungsional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jabatan_fungsional` (`id_jabatan_fungsional`);

--
-- Indeks untuk tabel `gelar`
--
ALTER TABLE `gelar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_pegawai`
--
ALTER TABLE `jenis_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_sk`
--
ALTER TABLE `jenis_sk`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_user_level`),
  ADD KEY `idx_level_user` (`nama`);

--
-- Indeks untuk tabel `level_user_hak_akses`
--
ALTER TABLE `level_user_hak_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk._level_user` (`id_user_level`),
  ADD KEY `fk_hak_akses` (`id_hak_akses`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pegawai_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `sk_pegawai`
--
ALTER TABLE `sk_pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_sk` (`id_sk`),
  ADD KEY `created_by` (`created_by`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_username` (`username`),
  ADD KEY `idx_level_user` (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_sk`
--
ALTER TABLE `data_sk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `dokumen_jabatan_fungsional`
--
ALTER TABLE `dokumen_jabatan_fungsional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `gelar`
--
ALTER TABLE `gelar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `jabatan_fungsional`
--
ALTER TABLE `jabatan_fungsional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT untuk tabel `jenis_pegawai`
--
ALTER TABLE `jenis_pegawai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jenis_sk`
--
ALTER TABLE `jenis_sk`
  MODIFY `id_jenis` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_user_level` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `level_user_hak_akses`
--
ALTER TABLE `level_user_hak_akses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `sk_pegawai`
--
ALTER TABLE `sk_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_sk`
--
ALTER TABLE `data_sk`
  ADD CONSTRAINT `fk_jenis_sk` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_sk` (`id_jenis`);

--
-- Ketidakleluasaan untuk tabel `dokumen_jabatan_fungsional`
--
ALTER TABLE `dokumen_jabatan_fungsional`
  ADD CONSTRAINT `fk_jabatan_fungsional` FOREIGN KEY (`id_jabatan_fungsional`) REFERENCES `jabatan_fungsional` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `level_user_hak_akses`
--
ALTER TABLE `level_user_hak_akses`
  ADD CONSTRAINT `fk._level_user` FOREIGN KEY (`id_user_level`) REFERENCES `level_user` (`id_user_level`),
  ADD CONSTRAINT `fk_hak_akses` FOREIGN KEY (`id_hak_akses`) REFERENCES `modul` (`id`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_pegawai_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sk_pegawai`
--
ALTER TABLE `sk_pegawai`
  ADD CONSTRAINT `sk_pegawai_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sk_pegawai_ibfk_2` FOREIGN KEY (`id_sk`) REFERENCES `data_sk` (`id`),
  ADD CONSTRAINT `sk_pegawai_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_level` FOREIGN KEY (`id_user_level`) REFERENCES `level_user` (`id_user_level`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
