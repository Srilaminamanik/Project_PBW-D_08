-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2025 at 06:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mental_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `created_at`) VALUES
(1, 'Mengenali Ciri-Ciri Kesehatan Mental yang Baik', 'Kesehatan mental yang baik bukan berarti seseorang selalu merasa bahagia atau bebas dari masalah. Sebaliknya, seseorang dengan mental yang sehat mampu menghadapi tantangan hidup, menjaga hubungan yang sehat, serta memiliki kontrol emosi dan pola pikir yang stabil.\r\nMengetahui ciri-ciri kesehatan mental yang baik penting agar kita bisa lebih memahami diri sendiri dan orang lain, serta mendorong gaya hidup yang lebih seimbang secara emosional.\r\nApa Itu Kesehatan Mental yang Baik?\r\nKesehatan mental yang baik adalah kondisi di mana seseorang merasa sejahtera secara emosional, psikologis, dan sosial. Hal ini memengaruhi bagaimana seseorang berpikir, merasa, bertindak, serta bagaimana mereka menghadapi stres, menjalin hubungan, dan membuat keputusan.\r\nCiri-Ciri Kesehatan Mental yang Baik\r\nBerikut adalah beberapa indikator bahwa seseorang memiliki kesehatan mental yang baik:\r\n1. Mampu Mengelola Emosi dengan Baik\r\n2. Mampu Menjalin Hubungan yang Positif\r\n3. Punya Rasa Percaya Diri dan Harga Diri yang Seimbang\r\n4. Mampu Mengatasi Stres dan Masalah\r\n5. Memiliki Tujuan dan Makna Hidup\r\n\r\n', '2025-06-06 13:25:00'),
(2, 'Kenali Tanda-Tanda Gangguan Kesehatan Mental', 'Kesehatan mental adalah bagian penting dari kesejahteraan kita secara keseluruhan. Sayangnya, gangguan kesehatan mental sering kali tidak disadari atau diabaikan karena gejalanya tidak selalu tampak jelas secara fisik. Mengenali tanda-tanda awal gangguan mental sangat penting agar seseorang bisa segera mendapatkan bantuan yang dibutuhkan.\r\nApa Itu Gangguan Kesehatan Mental?\r\nGangguan kesehatan mental adalah kondisi yang memengaruhi suasana hati, pola pikir, dan perilaku seseorang. Kondisi ini dapat bersifat sementara atau jangka panjang, ringan hingga berat, dan dapat memengaruhi kemampuan seseorang dalam menjalani kehidupan sehari-hari.\r\nTanda-Tanda Umum Gangguan Kesehatan Mental\r\nBerikut adalah beberapa tanda yang perlu diwaspadai:\r\n1. Perubahan Emosi yang Ekstrem\r\n2. Menarik Diri dari Sosial\r\n3. Penurunan Energi dan Motivasi\r\n4. Gangguan Pola Tidur dan Makan\r\n5. Kesulitan Berkonsentrasi', '2025-06-06 13:25:00'),
(3, 'Tips Menjaga Kesehatan Mental Sehari-hari', 'Kesehatan mental sama pentingnya dengan kesehatan fisik. Dalam kehidupan sehari-hari yang penuh tekanan, menjaga kesehatan mental menjadi kunci untuk tetap produktif dan bahagia. Banyak orang cenderung mengabaikan kesehatan mental karena terlalu sibuk dengan rutinitas, padahal dengan langkah-langkah sederhana, kita bisa menjaga kestabilan emosi dan pikiran.\r\nPertama, penting untuk memiliki waktu istirahat yang cukup. Tidur yang berkualitas membantu tubuh dan pikiran untuk pulih dari kelelahan. Selain itu, melakukan aktivitas fisik seperti olahraga ringan atau berjalan kaki setiap hari juga terbukti mampu meningkatkan suasana hati karena tubuh melepaskan hormon endorfin yang memberikan efek bahagia.\r\nKedua, jangan ragu untuk mengekspresikan perasaan. Bercerita kepada orang terdekat atau menulis jurnal harian bisa membantu melepaskan beban pikiran. Menyimpan emosi terlalu lama dapat menumpuk dan berdampak negatif terhadap kesehatan mental. Maka, milikilah support system yang sehat, seperti teman atau keluarga yang bisa dipercaya.\r\nKetiga, kurangi paparan negatif dari media sosial. Terlalu sering membandingkan diri dengan orang lain di media sosial bisa memicu rasa tidak cukup baik atau cemas. Batasi waktu bermain media sosial dan lebih fokus pada perkembangan diri sendiri, misalnya dengan belajar hal baru atau mengejar hobi yang menyenangkan. \r\nBerikut beberapa tips menjaga kesehatan mental sehari-hari yang bisa kamu terapkan dalam kehidupan sehari-hari:\r\n1. Mulai Hari dengan Rutinitas Positif\r\n2. Kelola Stres dengan Baik \r\n3. Bicara dengan Orang yang Dipercaya\r\n4. Tidur yang Cukup\r\n5. Aktif Bergerak\r\n\r\n', '2025-06-06 13:25:00'),
(4, 'Cara Meningkatkan Rasa Percaya Diri pada Remaja', 'Masa remaja adalah fase penting dalam perkembangan diri, di mana seseorang mulai membentuk identitas, mengeksplorasi minat, dan mencari pengakuan sosial. Namun, banyak remaja menghadapi tantangan seperti tekanan dari teman sebaya, standar kecantikan di media sosial, dan tuntutan akademik — yang dapat mengganggu rasa percaya diri mereka.\r\nRasa percaya diri sangat penting karena memengaruhi cara remaja mengambil keputusan, membangun hubungan, dan menjalani kehidupan sehari-hari. Untungnya, rasa percaya diri dapat ditumbuhkan dan ditingkatkan.\r\nApa Itu Rasa Percaya Diri?\r\nPercaya diri adalah keyakinan seseorang terhadap kemampuan, nilai, dan potensi dirinya sendiri. Remaja yang percaya diri cenderung lebih berani mencoba hal baru, lebih tahan terhadap tekanan, dan tidak mudah terpengaruh oleh penilaian negatif orang lain.\r\nPenyebab Rasa Percaya Diri Rendah pada Remaja:\r\n1. Perbandingan dengan orang lain, terutama di media sosial\r\n2. Komentar negatif atau bullying\r\n3. Kegagalan akademik atau prestasi\r\n4. Kurangnya dukungan dari lingkungan sekitar\r\n5. Ketidaksempurnaan fisik atau body image issues\r\nCara Meningkatkan Rasa Percaya Diri pada Remaja:\r\n- Kenali dan Hargai Diri Sendiri\r\n- Tetapkan Tujuan Kecil dan Capai Secara Bertahap\r\n- Berani Mencoba Hal Baru', '2025-06-11 11:08:00'),
(5, 'Mengenali Bullying dan Cara Menghadapinya', 'Bullying adalah perilaku agresif yang dilakukan secara sengaja dan berulang-ulang dengan tujuan menyakiti, merendahkan, atau mengintimidasi orang lain. Bullying bisa terjadi di sekolah, lingkungan sosial, bahkan secara online (cyberbullying). Dampaknya tidak hanya dirasakan secara fisik, tetapi juga secara emosional dan mental, terutama bagi anak-anak dan remaja.\r\nApa Itu Bullying?\r\nBullying melibatkan ketidakseimbangan kekuatan, di mana pelaku merasa lebih kuat secara fisik, sosial, atau psikologis daripada korbannya. Ini bukan hanya soal bercanda, tetapi tindakan yang bisa menimbulkan luka psikologis jangka panjang.\r\nJenis-Jenis Bullying:\r\n1. Bullying Fisik\r\n2. Bullying Verbal\r\n3. Bullying Sosial\r\n4. Cyberbullying\r\nDampak Bullying:\r\n- Psikologis: stres, depresi, kecemasan, rendah diri, bahkan pemikiran untuk menyakiti diri\r\n- Sosial: takut bersosialisasi, menarik diri dari lingkungan\r\n- Akademik: menurunnya prestasi dan motivasi belajar\r\n- Fisik: gangguan tidur, sakit kepala, dan masalah kesehatan lainnya\r\nCara Menghadapi Bullying\r\nBagi Korban:\r\n~ Jangan Membalas dengan Kekerasan\r\n~ Bicaralah dengan Orang yang Dipercaya\r\n~ Bangun Rasa Percaya Diri', '2025-06-11 11:10:00'),
(6, 'Media Sosial dan Dampaknya terhadap Kesehatan Mental Remaja', 'Media sosial telah menjadi bagian tak terpisahkan dari kehidupan remaja masa kini. Platform seperti Instagram, TikTok, X (Twitter), dan Snapchat digunakan untuk berkomunikasi, mengekspresikan diri, mencari hiburan, bahkan mendapatkan informasi. Namun, di balik manfaatnya, penggunaan media sosial yang berlebihan atau tidak sehat bisa berdampak serius pada kesehatan mental remaja.\r\nMengapa Remaja Rentan Terhadap Dampak Media Sosial?\r\nMasa remaja adalah fase pencarian jati diri, di mana seseorang sangat peka terhadap penilaian sosial. Media sosial memperkuat kebutuhan untuk “diakui”, “disukai”, dan “diterima”, yang bisa memengaruhi citra diri dan kesehatan emosional jika tidak dikendalikan dengan bijak.\r\nDampak Negatif Media Sosial terhadap Kesehatan Mental Remaja:\r\n- Perbandingan Sosial (Social Comparison)\r\n- Kecanduan Media Sosial\r\n- Gangguan Tidur dan Konsentrasi\r\nDampak Positif Media Sosial (Jika Digunakan dengan Bijak)\r\nMeskipun memiliki risiko, media sosial juga memiliki sisi positif:\r\n~ Ekspresi Diri: Remaja bisa menyalurkan kreativitas, opini, dan minat mereka.\r\n~ Koneksi Sosial: Mempermudah komunikasi dengan teman dan keluarga, terutama saat berjauhan.\r\n~ Akses Informasi dan Edukasi: Banyak konten positif dan edukatif tentang kesehatan, pengembangan diri, dan motivasi.\r\nTips Menggunakan Media Sosial Secara Sehat\r\n1. Batasi Waktu Penggunaan\r\n2. Pilih Konten yang Positif\r\n3. Jangan Bandingkan Diri dengan Orang Lain\r\n4. Berani Istirahat dari Media Sosial\r\n5. Bicara Jika Merasa Tidak Baik', '2025-06-11 11:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `psikolog` varchar(100) DEFAULT NULL,
  `pesan` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id`, `nama`, `email`, `psikolog`, `pesan`, `created_at`) VALUES
(12, 'riri', '240441100138@student.trunojoyo.ac.id', 'dr. kim jiso, M.Psi', 'pening', '2025-06-11 09:30:53'),
(13, 'ismaboyss', 'mohismaya29@gmail.com', 'dr. kim jiso, M.Psi', 'sakit hati', '2025-06-11 10:25:32'),
(14, 'Ole Romeny', 'oleskena@gmail.com', 'dr. kim jiso, M.Psi', 'saya kena mental pas lawan jepang kemarin', '2025-06-11 12:24:00'),
(15, 'Tamara Chann', 'tamara244@gmai.com', 'dr. Choi Hyun Wook, M.Psi', 'kadang saya lapar pas dimasukkan nasi tiba tib a ga lapar', '2025-06-11 15:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `psikolog`
--

CREATE TABLE `psikolog` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `psikolog`
--

INSERT INTO `psikolog` (`id`, `nama`) VALUES
(1, 'dr. kim jiso, M.Psi'),
(2, 'dr. Cha Eun-woo, Psikolog'),
(3, 'dr. Choi Hyun Wook, M.Psi'),
(4, 'dr. Songkang, Psikolog');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'RIRI', '$2y$10$WJnnB88zLHn.XCuqTQfPLOpIZznywygrHYpwhVvsxvrWyEWVcEMSK', 'user'),
(2, 'sri manik', '$2y$10$ORej73mwjJ1hXbZ1RjtlpuQ0eptmgGtgfgweeiZUqFKwmY.rspSVO', 'admin'),
(3, 'agung', '$2y$10$VxrdzZOtMsQYl1nlqCXw7Oldglt5Rcmt2r0OT59fPw6KWsIBUgFBe', 'user'),
(4, 'agung purba2', '$2y$10$P2aMiFV6WQSuqh1qe.LIFO1B6m5.1rt4Vwc9SvliCrm7hDYjxl7wK', 'user'),
(5, 'cece', '$2y$10$UYfKjj8u2MQz5fqwExmUtuPWSlUGiYz.b75dhWSfKmueuSLuYru8O', 'admin'),
(6, 'cece2', '$2y$10$y1KAvUiJXAfpA147cNvIoO9VkdhsbS99tsGdDkfwwC5CHjIzoJR.m', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psikolog`
--
ALTER TABLE `psikolog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `psikolog`
--
ALTER TABLE `psikolog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
