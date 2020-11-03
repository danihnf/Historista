-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Nov 2020 pada 03.26
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `historista`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'admin1', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `telepon` int(13) NOT NULL,
  `lahir` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jeniskelamin` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama`, `username`, `sekolah`, `email`, `telepon`, `lahir`, `jeniskelamin`, `password`, `status`, `foto`, `alamat`) VALUES
(1, 'Dani Hanafi', '', '', 'danihanafi169@gmail.', 2147483647, '0000-00-00 00:00:00', 'Laki - Laki', '55b7e8b895d047537e672250dd781555', 'siswa', '', ''),
(2, 'Dani Hanafi', '', 'smk telkom', 'sapabae186@gmail.com', 2811, '2019-09-27 17:00:00', 'Laki - Laki', '55b7e8b895d047537e672250dd781555', 'siswa', '', ''),
(3, 'dani', 'dani', '', 'daidsan@gmail.com12', 123212, '2019-09-06 04:26:29', 'Laki - Laki', 'd41d8cd98f00b204e9800998ecf8427e', 'umum', 'default.jpg', 'sada1212'),
(5, 'ELSA', 'ELSA', 'TELKOM', 'ELSA@gmail.com', 9212, '2019-09-06 02:35:15', 'Perempuan', '55b7e8b895d047537e672250dd781555', 'siswa', 'default.jpg', 'DSADAS'),
(6, 'saprol', 'elsa', 'telkom', 'elsa@gmail.com', 821, '2019-09-06 06:24:08', 'Perempuan', 'ec02c59dee6faaca3189bace969c22d3', 'siswa', 'KTM_DANI1.png', 'anjeng'),
(7, 'hanafi', 'hanafi', '', 'd@gmail.com', 821, '2019-09-15 06:17:54', 'Laki - Laki', 'ddb4f9f25acf275396aa15605bb059ad', 'guru', 'Screenshot_(77).png', 'dd'),
(8, 'fiparmada', 'mada', 'SMABA', 'mada@gmail.com', 2147483647, '2019-09-11 14:30:42', 'Perempuan', 'ddb4f9f25acf275396aa15605bb059ad', 'umum', 'openhouse4.jpeg', 'Alamat Gada'),
(9, 'dani', 'dani`', '', 'ss@gmail.com', 21, '2019-09-12 17:00:00', 'Laki - Laki', '55b7e8b895d047537e672250dd781555', 'umum', 'default.jpg', ''),
(10, 'yuniar', 'yuniaramin', '', 'ynm@gmail.com', 2147483647, '2019-09-15 11:55:26', 'Perempuan', 'ddb4f9f25acf275396aa15605bb059ad', 'guru', 'Screenshot_(12).png', 'weqwe'),
(11, 'Alvina Andini Putri Prasetyo', 'vivi', '', 'vivivi@gmail.com', 2147483647, '2019-09-11 14:48:16', 'Perempuan', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'umum', 'vivi1.jpg', 'Perum Puri ASU'),
(12, 'hnf', 'hnf', 'telkom', 'asd@gmial.com', 99, '2019-09-11 17:00:00', 'Perempuan', '00a2632fe4bfb40c8532e852491ac685', 'guru', 'default.jpg', ''),
(13, 'dani', 'dani', 'smp1pw', 'dani@gmail.com', 9290390, '2020-11-10 17:00:00', 'Laki - Laki', '55b7e8b895d047537e672250dd781555', 'siswa', 'default.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `foto_artikel` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bintang` int(11) NOT NULL,
  `bintang2` int(11) NOT NULL,
  `bintang3` int(11) NOT NULL,
  `jumlah_komentar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `id_akun`, `penulis`, `foto_artikel`, `judul`, `isi`, `kategori`, `tgl_buat`, `bintang`, `bintang2`, `bintang3`, `jumlah_komentar`) VALUES
(1, 3, 'hanafi', 'Ikigai-Diagram.jpg', 'dani hanafi elsa putri apsarini', '1Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'politik', '2019-09-15 06:34:23', 18, 80, 18, 0),
(15, 7, 'hanafi', 'Screenshot_(77).png', 'JUDUL', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum efficitur suscipit. Donec sed mi et nulla semper tempus eget in dui. Ut porttitor venenatis ligula, et aliquam magna volutpat ut. Nullam eu est finibus, vulputate ex eu, euismod nisl. Donec sed sapien non eros rutrum lobortis. Morbi pellentesque ipsum ut molestie lacinia. Etiam lobortis sem odio, et congue lacus efficitur sed. Fusce quis nunc ipsum. Praesent aliquet diam eu eros accumsan porttitor. Maecenas mi velit, vestibulum nec velit nec, rutrum porta justo. Nulla placerat turpis aliquam, interdum libero id, eleifend diam. Duis tincidunt libero felis, a cursus purus posuere et. Pellentesque porttitor nulla in sem efficitur, non aliquam metus lacinia. Fusce ultrices massa nec sem convallis, sed sodales libero maximus. Aenean vel diam venenatis, elementum sapien eget, dictum enim. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Praesent sit amet posuere lectus, vitae auctor tortor. Nullam dignissim lacus non nisl accumsan sodales. Etiam sagittis magna vel diam sodales fringilla. Nulla facilisi. Praesent et ultrices ligula. Curabitur vel elementum ante. Nullam venenatis nisi odio, quis vehicula lacus sollicitudin vitae. Aenean a pellentesque nunc. Quisque iaculis lacus metus, id sollicitudin ipsum porta ut.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Aenean nec tincidunt nulla, quis sodales nibh. Fusce ac hendrerit sem. Morbi commodo ligula ac dui mattis mollis. Nunc eget libero ut erat vehicula luctus. Duis venenatis sodales venenatis. Nulla fringilla semper suscipit. Donec quis odio faucibus, porttitor mi eget, mattis enim. Proin gravida a nibh quis bibendum. Curabitur ante turpis, suscipit semper ante non, semper eleifend nunc. Nullam vel turpis vitae orci rhoncus pellentesque vitae eget metus. Vivamus eu velit vitae odio feugiat lobortis quis in mi. Pellentesque non turpis sed nisi faucibus lobortis sed eu erat.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id lobortis leo, non porta lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin in imperdiet mi. Morbi a ipsum vel lorem porttitor condimentum. Phasellus suscipit lacus interdum interdum laoreet. Sed efficitur sodales vulputate. Donec eget ligula commodo, aliquam ante quis, tincidunt mauris. Nam gravida, massa eget sodales elementum, leo eros aliquet mauris, non fermentum eros libero et neque. Phasellus vitae sagittis ex. Donec consequat ex justo, sit amet egestas sapien tempor nec. Aliquam eget lorem velit. Maecenas urna arcu, pretium ut velit vitae, pellentesque tincidunt nibh. Vestibulum ex nibh, ultricies quis metus sit amet, rutrum congue tortor. Pellentesque mollis, velit vel tincidunt viverra, metus quam scelerisque urna, ac sagittis nulla nulla sit amet neque. Nam mi tellus, molestie vel sagittis sit amet, accumsan quis urna.</p>\r\n<p><span style=\"background-color: #ffffff; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">Nulla vulputate suscipit erat vel porttitor. Fusce interdum aliquet lorem ut viverra. Praesent consequat placerat leo. Vivamus semper hendrerit commodo. Nulla sed justo ac lectus iaculis elementum ac eget augue. Proin eget libero porta, luctus metus vel, egestas ante. Nam vel urna ac nisi posuere blandit eget nec lorem. Etiam viverra, felis non rhoncus pharetra, lectus metus hendrerit ante, at vehicula elit dui ut eros. Suspendisse vehicula quis nunc at sodales.</span>dsadasd</p>', 'agama', '2019-09-13 11:13:44', 47, 0, 0, 0),
(16, 7, 'hanafi', 'Screenshot_(13).png', 'test', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum efficitur suscipit. Donec sed mi et nulla semper tempus eget in dui. Ut porttitor venenatis ligula, et aliquam magna volutpat ut. Nullam eu est finibus, vulputate ex eu, euismod nisl. Donec sed sapien non eros rutrum lobortis. Morbi pellentesque ipsum ut molestie lacinia. Etiam lobortis sem odio, et congue lacus efficitur sed. Fusce quis nunc ipsum. Praesent aliquet diam eu eros accumsan porttitor. Maecenas mi velit, vestibulum nec velit nec, rutrum porta justo. Nulla placerat turpis aliquam, interdum libero id, eleifend diam. Duis tincidunt libero felis, a cursus purus posuere et. Pellentesque porttitor nulla in sem efficitur, non aliquam metus lacinia. Fusce ultrices massa nec sem convallis, sed sodales libero maximus. Aenean vel diam venenatis, elementum sapien eget, dictum enim. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Praesent sit amet posuere lectus, vitae auctor tortor. Nullam dignissim lacus non nisl accumsan sodales. Etiam sagittis magna vel diam sodales fringilla. Nulla facilisi. Praesent et ultrices ligula. Curabitur vel elementum ante. Nullam venenatis nisi odio, quis vehicula lacus sollicitudin vitae. Aenean a pellentesque nunc. Quisque iaculis lacus metus, id sollicitudin ipsum porta ut.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Aenean nec tincidunt nulla, quis sodales nibh. Fusce ac hendrerit sem. Morbi commodo ligula ac dui mattis mollis. Nunc eget libero ut erat vehicula luctus. Duis venenatis sodales venenatis. Nulla fringilla semper suscipit. Donec quis odio faucibus, porttitor mi eget, mattis enim. Proin gravida a nibh quis bibendum. Curabitur ante turpis, suscipit semper ante non, semper eleifend nunc. Nullam vel turpis vitae orci rhoncus pellentesque vitae eget metus. Vivamus eu velit vitae odio feugiat lobortis quis in mi. Pellentesque non turpis sed nisi faucibus lobortis sed eu erat.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id lobortis leo, non porta lorem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin in imperdiet mi. Morbi a ipsum vel lorem porttitor condimentum. Phasellus suscipit lacus interdum interdum laoreet. Sed efficitur sodales vulputate. Donec eget ligula commodo, aliquam ante quis, tincidunt mauris. Nam gravida, massa eget sodales elementum, leo eros aliquet mauris, non fermentum eros libero et neque. Phasellus vitae sagittis ex. Donec consequat ex justo, sit amet egestas sapien tempor nec. Aliquam eget lorem velit. Maecenas urna arcu, pretium ut velit vitae, pellentesque tincidunt nibh. Vestibulum ex nibh, ultricies quis metus sit amet, rutrum congue tortor. Pellentesque mollis, velit vel tincidunt viverra, metus quam scelerisque urna, ac sagittis nulla nulla sit amet neque. Nam mi tellus, molestie vel sagittis sit amet, accumsan quis urna.</p>\r\n<p><span style=\"background-color: #ffffff; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">Nulla vulputate suscipit erat vel porttitor. Fusce interdum aliquet lorem ut viverra. Praesent consequat placerat leo. Vivamus semper hendrerit commodo. Nulla sed justo ac lectus iaculis elementum ac eget augue. Proin eget libero porta, luctus metus vel, egestas ante. Nam vel urna ac nisi posuere blandit eget nec lorem. Etiam viverra, felis non rhoncus pharetra, lectus metus hendrerit ante, at vehicula elit dui ut eros. Suspendisse vehicula quis nunc at sodales.</span>dsadasd</p>', 'sejarah', '2019-09-13 11:13:47', 0, 80, 0, 0),
(17, 10, 'yuniaramin', 'Screenshot_(10)1.png', 'dsd', '<p>dasdasdsa</p>', 'sejarah', '2019-09-15 08:27:10', 72, 80, 72, 1),
(18, 12, 'hnf', 'Screenshot_(15).png', 'tes', '<p>dsadasdasdasdasds</p>', 'agama', '2019-09-15 11:55:55', 0, 80, 0, 0),
(19, 10, 'yuniaramin', 'Screenshot_(17).png', 'dsadas', '<p>dsada</p>', 'sejarah', '2019-09-14 18:56:13', 0, 0, 0, 0),
(20, 10, 'yuniaramin', 'Screenshot_(12)2.png', 'dasdasdas', '<p>dasdasd</p>', 'sejarah', '2019-09-14 18:56:22', 0, 0, 0, 0),
(21, 10, 'yuniaramin', 'Screenshot_(12)3.png', 'dasdasdas', '<p>dasdasd</p>', 'sejarah', '2019-09-14 18:56:22', 0, 0, 0, 0),
(22, 13, 'dani', 'image_1.png', 'test', '<p>dsadas</p>', 'sejarah', '2020-10-30 23:55:06', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `judul`
--

CREATE TABLE `judul` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `judul`
--

INSERT INTO `judul` (`id`, `judul`) VALUES
(1, 'Mengenal tokoh-tokoh sejarah'),
(2, 'Menyebutkan tempat-tempat terjadinya peristiwa'),
(3, 'Mengetahui waktu terjadinya peristiwa sejarah'),
(4, 'Menguraikan proses terjadinya peristiwa'),
(5, 'Menganalisis hubungan sebab akibat'),
(6, 'Menentukan topik penelitian sejarah'),
(7, 'Mengumpulkan sumber sejarah'),
(8, 'Menganalisis keabsahan sumber sejarah'),
(9, 'Membuat interpretasi sejarah berdasarkan sumbersumber'),
(10, 'Menulis cerita sejarah'),
(11, 'Mengidentifikasi kegunaan sejarah'),
(12, 'Menemukan dampak positif dan negatif peristiwa sejarah'),
(13, 'Menemukan nilai-nilai sejarah yang masih berlaku di\r\nmasyarakat'),
(14, 'Menemukan nilai-nilai sejarah yang telah ditinggalkan\r\nmasyarakat'),
(15, 'Memberikan respons secara moral');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `total_komentar` int(11) NOT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_artikel`, `username`, `komentar`, `total_komentar`, `tanggal_komentar`) VALUES
(1, 17, 'hanafi', '', 1, '2019-09-15 01:17:09');

--
-- Trigger `komentar`
--
DELIMITER $$
CREATE TRIGGER `jumlah_komentar` AFTER INSERT ON `komentar` FOR EACH ROW BEGIN
UPDATE artikel SET jumlah_komentar = jumlah_komentar + NEW.total_komentar WHERE id = NEW.id_artikel;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan1`
--

CREATE TABLE `laporan1` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `penulis` varchar(20) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `penilai` varchar(20) NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `telepon` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_penilaian` int(11) NOT NULL,
  `soal1` int(11) NOT NULL,
  `soal2` int(11) NOT NULL,
  `soal3` int(11) NOT NULL,
  `soal4` int(11) NOT NULL,
  `soal5` int(11) NOT NULL,
  `soal6` int(11) NOT NULL,
  `soal7` int(11) NOT NULL,
  `soal8` int(11) NOT NULL,
  `soal9` int(11) NOT NULL,
  `soal10` int(11) NOT NULL,
  `soal11` int(11) NOT NULL,
  `soal12` int(11) NOT NULL,
  `soal13` int(11) NOT NULL,
  `soal14` int(11) NOT NULL,
  `soal15` int(11) NOT NULL,
  `soal16` int(11) NOT NULL,
  `soal17` int(11) NOT NULL,
  `soal18` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `laporan1`
--
DELIMITER $$
CREATE TRIGGER `nilai_bintang` AFTER INSERT ON `laporan1` FOR EACH ROW BEGIN
UPDATE artikel SET bintang = NEW.soal1
+NEW.soal2+NEW.soal3+NEW.soal4+NEW.soal5+NEW.soal6+NEW.soal7+NEW.soal8+NEW.soal9+NEW.soal10+NEW.soal11+NEW.soal12+NEW.soal13+NEW.soal14+NEW.soal15+NEW.soal16+NEW.soal17+NEW.soal18 WHERE id = NEW.id_artikel;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan2`
--

CREATE TABLE `laporan2` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `penulis` varchar(20) NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `penilai` varchar(20) NOT NULL,
  `telepon` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_penilaian` int(11) NOT NULL,
  `soal1` int(11) NOT NULL,
  `soal2` int(11) NOT NULL,
  `soal3` int(11) NOT NULL,
  `soal4` int(11) NOT NULL,
  `soal5` int(11) NOT NULL,
  `soal6` int(11) NOT NULL,
  `soal7` int(11) NOT NULL,
  `soal8` int(11) NOT NULL,
  `soal9` int(11) NOT NULL,
  `soal10` int(11) NOT NULL,
  `soal11` int(11) NOT NULL,
  `soal12` int(11) NOT NULL,
  `soal13` int(11) NOT NULL,
  `soal14` int(11) NOT NULL,
  `soal15` int(11) NOT NULL,
  `soal16` int(11) NOT NULL,
  `soal17` int(11) NOT NULL,
  `soal18` int(11) NOT NULL,
  `soal19` int(11) NOT NULL,
  `soal20` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan2`
--

INSERT INTO `laporan2` (`id`, `id_artikel`, `penulis`, `jeniskelamin`, `sekolah`, `penilai`, `telepon`, `email`, `status_penilaian`, `soal1`, `soal2`, `soal3`, `soal4`, `soal5`, `soal6`, `soal7`, `soal8`, `soal9`, `soal10`, `soal11`, `soal12`, `soal13`, `soal14`, `soal15`, `soal16`, `soal17`, `soal18`, `soal19`, `soal20`) VALUES
(8, 17, 'yuniaramin', 'Perempuan', '', 'hanafi', 2147483647, 'ynm@gmail.com', 1, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
(9, 18, 'hnf', 'Perempuan', 'telkom', 'yuniar', 99, 'asd@gmial.com', 1, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4);

--
-- Trigger `laporan2`
--
DELIMITER $$
CREATE TRIGGER `nilai_bintang2` AFTER INSERT ON `laporan2` FOR EACH ROW BEGIN
UPDATE artikel SET bintang2 = NEW.soal1
+NEW.soal2+NEW.soal3+NEW.soal4+NEW.soal5+NEW.soal6+NEW.soal7+NEW.soal8+NEW.soal9+NEW.soal10+NEW.soal11+NEW.soal12+NEW.soal13+NEW.soal14+NEW.soal15+NEW.soal16+NEW.soal17+NEW.soal18+NEW.soal19+NEW.soal20 WHERE id = NEW.id_artikel;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan3`
--

CREATE TABLE `laporan3` (
  `id` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `penulis` varchar(20) NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `penilai` varchar(20) NOT NULL,
  `telepon` int(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status_penilaian` int(11) NOT NULL,
  `soal1` int(11) NOT NULL,
  `soal2` int(11) NOT NULL,
  `soal3` int(11) NOT NULL,
  `soal4` int(11) NOT NULL,
  `soal5` int(11) NOT NULL,
  `soal6` int(11) NOT NULL,
  `soal7` int(11) NOT NULL,
  `soal8` int(11) NOT NULL,
  `soal9` int(11) NOT NULL,
  `soal10` int(11) NOT NULL,
  `soal11` int(11) NOT NULL,
  `soal12` int(11) NOT NULL,
  `soal13` int(11) NOT NULL,
  `soal14` int(11) NOT NULL,
  `soal15` int(11) NOT NULL,
  `soal16` int(11) NOT NULL,
  `soal17` int(11) NOT NULL,
  `soal18` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `laporan3`
--
DELIMITER $$
CREATE TRIGGER `nilai_bintang3` AFTER INSERT ON `laporan3` FOR EACH ROW BEGIN
UPDATE artikel SET bintang3 = NEW.soal1
+NEW.soal2+NEW.soal3+NEW.soal4+NEW.soal5+NEW.soal6+NEW.soal7+NEW.soal8+NEW.soal9+NEW.soal10+NEW.soal11+NEW.soal12+NEW.soal13+NEW.soal14+NEW.soal15+NEW.soal16+NEW.soal17+NEW.soal18 WHERE id = NEW.id_artikel;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `id_judul` int(11) NOT NULL,
  `soal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `id_judul`, `soal`) VALUES
(1, 1, 'Menyebutkan pelaku-pelaku dari suatu peristiwa sejarah.'),
(2, 1, 'Menjelaskan peran penting individu atau kelompok dalam\r\nsuatu peristiwa.'),
(3, 1, 'Menganalisis pengaruh ide-ide dan gagasan tokoh terhadap\r\nperubahan.'),
(4, 1, 'Menganalisis hubungan antara pelaku-pelaku sejarah.'),
(5, 2, 'Menyebutkan nama-nama tempat terjadinya peristiwa'),
(6, 2, 'Mengenali perbedaan sejarah antar wilayah.'),
(7, 2, 'Menemukan keterkaitan antara satu tempat dengan tempat\r\nlain.'),
(8, 3, 'Menyebutkan waktu terjadinya peristiwa sejarah dengan tepat.'),
(9, 3, 'Menganalisis perubahan dari waktu ke waktu.'),
(10, 3, 'Menyebutkan bentuk-bentuk perubahan antar waktu.'),
(11, 3, 'Menganalisis keterkaitan peristiwa dari waktu ke waktu.'),
(12, 4, 'Menyajikan cerita sejarah secara kronologis.'),
(13, 4, 'Menjelaskan permulaan dan akhir peristiwa.'),
(14, 4, 'Menjelaskan pertentangan dan kesepakatan antar pelaku\r\nsejarah.'),
(15, 4, 'Membuat kesimpulan.'),
(16, 5, 'Menjelaskan faktor-faktor penyebab terjadinya suatu\r\nperistiwa.'),
(17, 5, 'Menganalisis akibat jangka pendek.'),
(18, 5, 'Mengidentifikasi akibat jangka panjang.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal2`
--

CREATE TABLE `soal2` (
  `id` int(11) NOT NULL,
  `id_judul` int(11) NOT NULL,
  `soal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal2`
--

INSERT INTO `soal2` (`id`, `id_judul`, `soal`) VALUES
(1, 6, 'Menentukan tema karya tulis sejarah.'),
(2, 6, 'Mengidentifikasi karakter peristiwa sejarah.'),
(3, 6, 'Mengemukakan latar belakang peristiwa.'),
(4, 6, 'Mengemukakan tujuan dan manfaat karya tulis sejarah.'),
(5, 7, 'Menunjukkan bukti sejarah yang digunakan sebagai sumber.'),
(6, 7, 'Membedakan sumber sejarah primer, sekunder, dan tersier.'),
(7, 7, 'Menyertakan sumber-sumber pendukung sumber utama.'),
(8, 8, 'Mengidentifikasi tujuan pengarang atau pembuat sumber.'),
(9, 8, 'Mengidentifikasi zaman ketika sumber sejarah dibuat.'),
(10, 8, 'Memeriksa kesesuaian waktu dan tempat yang disebutkan\r\ndalam sumber.'),
(11, 8, 'Mengevaluasi perbedaan informasi dari sumber yang berbeda.'),
(12, 8, 'Menganalisis kebenaran sumber sejarah yang digunakan.'),
(13, 9, 'Menafsirkan sumber sejarah, baik sumber tertulis, gambar,\r\nrekaman suara atau video.'),
(14, 9, 'Menggunakan berbagai sudut pandang dalam menafsirkan\r\nsumber sejarah.'),
(15, 9, 'Menggunakan prinsip berpikir sinkronis dan diakronis dalam\r\nmenyusun cerita sejarah.'),
(16, 9, 'Menggabungkan berbagai sumber sejarah dalam membuat\r\nkesimpulan.'),
(17, 10, 'Membuat periodisasi sejarah berdasarkan urutan waktu.'),
(18, 10, 'Menjelaskan proses perubahan sejarah dari waktu ke waktu.'),
(19, 10, 'Merekonstruksi peristiwa sejarah berdasarkan urutan waktu\r\nkejadian peristiwa sejarah.'),
(20, 10, 'Membuat generalisasi.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal3`
--

CREATE TABLE `soal3` (
  `id` int(11) NOT NULL,
  `id_judul` int(11) NOT NULL,
  `soal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal3`
--

INSERT INTO `soal3` (`id`, `id_judul`, `soal`) VALUES
(1, 11, 'Menjelaskan kegunaan sejarah untuk kehidupan saat ini.'),
(2, 11, 'Menjelaskan kegunaan sejarah untuk kehidupan di masa\r\ndepan.'),
(3, 11, 'Menjelaskan kegunaan sejarah untuk melestarikan nilai-nilai\r\nkearifan lokal.'),
(4, 12, 'Menganalisis dampak positif peristiwa sejarah terhadap\r\nkehidupan masyarakat pada masa lalu dan masa kini.'),
(5, 12, 'Menganalisis dampak negatif peristiwa sejarah terhadap\r\nkehidupan masyarakat pada masa lalu dan masa kini.'),
(6, 12, 'Menganalisis dampak positif dan negatif peristiwa masa lalu\r\nterhadap kehidupan masyarakat pada masa depan.'),
(7, 13, 'Menemukan nilai positif dari peristiwa sejarah.'),
(8, 13, 'Mengidentifikasi nilai-nilai masa lalu yang masih berlaku\r\nhingga saat ini.'),
(9, 13, 'Menjelaskan alasan mengapa nilai-nilai tersebut masih\r\nberlaku'),
(10, 13, 'Memberikan penilaian terhadap nilai-nilai masa lalu dengan\r\nsudut pandang masa kini.'),
(11, 14, 'Mengidentifikasi nilai-nilai masa lalu yang sudah ditinggalkan'),
(12, 14, 'Menjelaskan alasan mengapa nilai-nilai pada masa lalu\r\nditinggalkan masyakat.'),
(13, 14, 'Menjelaskan mengapa nilai-nilai tersebut tidak dapat bertahan.'),
(14, 14, 'Membandingkan nilai-nilai masa lalu dan nilai-nilai saat ini'),
(15, 15, 'Memberikan penilaian baik atau buruk terhadap pelaku sejarah'),
(16, 15, 'Memberikan penilaian benar atau salah terhadap pelaku.'),
(17, 15, 'Memberikan penilaian terhadap nilai-nilai yang berlaku pada\r\nmasyarakat pada masa lalu.'),
(18, 15, 'Memberikan penilaian terhadap kehidupan masa lalu dengan\r\nsudut pandang masa kini.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akun` (`id_akun`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `laporan1`
--
ALTER TABLE `laporan1`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indeks untuk tabel `laporan2`
--
ALTER TABLE `laporan2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indeks untuk tabel `laporan3`
--
ALTER TABLE `laporan3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_judul` (`id_judul`);

--
-- Indeks untuk tabel `soal2`
--
ALTER TABLE `soal2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_judul` (`id_judul`);

--
-- Indeks untuk tabel `soal3`
--
ALTER TABLE `soal3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_judul` (`id_judul`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `judul`
--
ALTER TABLE `judul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan1`
--
ALTER TABLE `laporan1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan2`
--
ALTER TABLE `laporan2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `laporan3`
--
ALTER TABLE `laporan3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `soal2`
--
ALTER TABLE `soal2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `soal3`
--
ALTER TABLE `soal3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

--
-- Ketidakleluasaan untuk tabel `laporan1`
--
ALTER TABLE `laporan1`
  ADD CONSTRAINT `laporan1_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`);

--
-- Ketidakleluasaan untuk tabel `laporan2`
--
ALTER TABLE `laporan2`
  ADD CONSTRAINT `laporan2_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`);

--
-- Ketidakleluasaan untuk tabel `laporan3`
--
ALTER TABLE `laporan3`
  ADD CONSTRAINT `laporan3_ibfk_1` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id`);

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_judul`) REFERENCES `judul` (`id`);

--
-- Ketidakleluasaan untuk tabel `soal2`
--
ALTER TABLE `soal2`
  ADD CONSTRAINT `soal2_ibfk_1` FOREIGN KEY (`id_judul`) REFERENCES `judul` (`id`);

--
-- Ketidakleluasaan untuk tabel `soal3`
--
ALTER TABLE `soal3`
  ADD CONSTRAINT `soal3_ibfk_1` FOREIGN KEY (`id_judul`) REFERENCES `judul` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
