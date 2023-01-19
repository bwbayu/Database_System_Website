-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 03:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `author_num_of_books` int(11) NOT NULL DEFAULT 0,
  `author_instagram` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `author_num_of_books`, `author_instagram`) VALUES
(1, 'Andrea Hirata', 2, 'hirataandrea'),
(2, 'Tere Liye', 0, 'tereliyewriter'),
(3, 'Haidar Musyafa', 1, 'haidarmusyafa'),
(4, 'Raditya Dika', 1, 'raditya_dika'),
(5, 'Haruki Murakami', 1, 'haruki_murakami_'),
(6, 'J.K. Rowling', 0, 'jkrowling_official'),
(7, 'James Patterson', 1, 'jamespattersonbooks'),
(8, 'Clive Staples Lewis', 0, 'cslewis_official'),
(9, 'Dan Brown', 1, 'authordanbrown'),
(10, 'Stephen King', 1, 'stephenkingofficialpage');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_cover` varchar(255) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_price` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_publisher` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_synopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_cover`, `book_title`, `book_price`, `author_id`, `book_publisher`, `category_id`, `book_synopsis`) VALUES
(5, 'bayu.png', 'Buya Hamka Sibe', 160000, 3, 'Imania', 4, 'Di masa Demokrasi Terpimpin, Buya Hamka adalah sosok yang kadang berbeda pendapat dengan Presiden Sukarno, juga berseberangan dengan kaum komunis. Melalui Majalah Lentera, karya-karyanya diserang habis. Berbulan-bulan lamanya ia hadapi hantaman orang-orang yang tak sepaham dengannya. Dua tahun empat bulan lamanya, Buya Hamka hidup dalam penjara rezim Sukarno. Meski begitu, ia tak marah. Ia tidak hanya dekat dengan mereka yang sepaham dan sepemikiran, tapi juga tidak menghindari orang yang tidak disukainya. Ia berprinsip bahwa dengan mengenal sesama yang berbeda, akan menemukan sudut pandang baru. Meski ilmunya sangat tinggi, ia tak pernah merasa besar diri. Sikap hidupnya yang lurus terbukti saat ia menjadi Ketua Majelis Ulama Indonesia (MUI). Ia jalankan amanah itu dengan penuh tanggung jawab. Meski mendapat banyak tekanan, ia tetap teguh bersikap dan memegang prinsip. Baginya, kehebatan ulama diukur sejauh mana ia mampu melembutkan kerasnya hati para pembenci, dan sejauh mana kemampuannya menenangkan jiwa-jiwa yang gundah gulana. Buya Hamka adalah sosok ulama paripurna, moderat, teduh yang tidak mudah membuat gaduh, apalagi memancing di air keruh. Tuturan dan pesan dakwahnya selalu menyejukkan bukan memojokkan, mengundang simpati, jauh dari kata umpat dan hujat. Figur ulama pembina bukan penghina, pendidik bukan pembidik, pengukuh bukan peruntuh. Ketika mengkritisi kebijakan pemerintah yang tidak prorakyat dan memihak umat Islam, ia lebih memilih jalur pena dalam rangka menyampaikan aspirasi dan pesannya daripada menggalang aksi massa. Pendiriannya teguh, prinsipnya kuat, namun lentur dan menaruh hormat kepada liyan yang berbeda. Sosok ulama besar yang bersahaja, tak terbeli, independen, dan tak gemar mengobral fatwa. Beragam laku luhur inilah yang membuat ulama berdarah Minangkabau ini disegani banyak orang.'),
(6, 'koalakumal.jpg', 'Koala Kumal', 60300, 4, 'Gagas Media', 4, 'Dika (Raditya Dika) baru saja batal menikah, karena pacarnya, Andrea (Acha Septriasa), selingkuh dengan James (Nino Fernandez). Patah hatinya membuat Dika kesulitan menulis bab terakhir bukunya. Suatu hari, Dika bertemu dengan Trisna (Sheryl Sheinafia), cewek unik yang menolong Dika dari perjodohan kacau sang Mama Dika (Cut Mini Theo) dan yang akan membuat pandangan Dika terhadap dunia menjadi berbeda.\r\n\r\nDika pun pergi bersama Trisna. Mereka menjadi semakin akrab. Trisna yang berniat membantu Dika menyelesaikan bab terakhir bukunya, menemukan alasannya: Dika masih patah hati. Trisna mencoba membuat Dika berhenti patah hati. Trisna menyuruh Dika melakukan balas dendam kepada Andrea.'),
(7, 'colorlesstsukuru.jpg', 'Colorless Tsukuru', 190000, 5, 'Bungeishujuu', 4, 'Dalam Bildungsroman jenis realis ini (petunjuk realisme magis penulis dibiarkan dalam mimpi dan dongeng), narasi orang ketiga mengikuti masa lalu dan masa kini Tsukuru Tazaki (diucapkan [taꜜzaki tsɯ̥kɯɾɯ]), seorang pria yang ingin memahami mengapa hidupnya tergelincir enam belas tahun yang lalu.\r\n\r\nPada awal 1990-an di kota kelahirannya Nagoya, Tsukuru muda adalah penggemar stasiun kereta api. Di sekolah menengah, dua anak laki-laki dan dua perempuan yang merupakan empat sahabatnya semuanya memiliki warna sebagai bagian dari nama keluarga mereka, meninggalkan dia yang \"tidak berwarna\" salah satu dari \"komunitas yang tertib dan harmonis\". Namun suatu hari di tahun 1995, selama tahun keduanya di perguruan tinggi, teman-temannya tiba-tiba memutuskan semua hubungan dengannya. Pengasingan Kafkaesque yang tidak pernah dijelaskan itu membuatnya merasa ingin bunuh diri kemudian bersalah \"sebagai orang kosong, kurang warna dan identitas\"; dan ketika satu-satunya teman kuliahnya menghilang pada semester berikutnya, dia merasa \"ditakdirkan untuk selalu sendirian\".\r\n\r\nSekarang di Tokyo 2011, insinyur berusia 36 tahun Tazaki bekerja untuk sebuah perusahaan kereta api dan membangun stasiun. Pacar barunya, Sara, mendorongnya \"untuk bertatap muka dengan masa lalu, bukan sebagai anak laki-laki yang naif dan mudah terluka, tetapi sebagai orang dewasa\" dan mencari mantan teman-temannya untuk memperbaiki hubungan dan mencari tahu mengapa mereka menolaknya. , karena dia tidak akan berkomitmen padanya kecuali dia bisa mengatasi masalah itu. Maka dia akan mengunjungi mereka satu per satu, pertama kembali di Nagoya, kemudian di pedesaan Finlandia, dalam pencarian kebenaran dan ziarah untuk kebahagiaan.'),
(8, 'targetalex.jpg', 'Target: Alex Cross', 200100, 7, 'Little, Brown and Company', 4, 'Seseorang membunuh para pemimpin politik negara. Alex Cross sekarang ditugaskan ke FBI dan istrinya, Bree Stone, sekarang menjadi kepala detektif untuk Polisi DC. Alex dan tim agen FBI, serta Bree dan Secret Service harus menemukan siapa dalang pembunuhan itu dan mengapa. Sebelum semua kekacauan selesai, presiden baru dan banyak orang yang akan suksesi Kepresidenan telah dilengserkan. Plot ditemukan dan ketika itu, mereka yang memecahkan kasus ini benar-benar terkejut siapa yang berada di balik ini dan mengapa.'),
(9, 'origin.jpg', 'Origin', 145000, 9, 'Doubleday', 4, 'Robert Langdon, profesor simbologi dan ikonologi agama Universitas Harvard, tiba di Museum Guggenheim yang supermodern untuk menghadiri pengumuman besar tentang penemuan yang akan mengubah dunia sains. Tuan rumah acara malam hari itu adalah Edmond Kirsch, seorang miliuner dan Futuris berusia empat puluh tahun. Kirsch adalah sosok yang terkenal di seluruh dunia, berkat penemuan-penemuan teknologi tingkat tingginya yang mengagumkan, serta prediksi-prediksinya yang berani. Dia juga merupakan salah satu mahasiswa Langdon dua puluh tahun yang lalu, dan sekarang dia akan mengungkap suatu terobosan yang mencengangkan yang akan menjawab dua pertanyaan fundamental terkait eksistensi manusia.\r\n\r\nBegitu acara dimulai, Langdon dan beberapa ratus hadirin lainnya terpukau oleh pemaparan yang begitu orisinil, dan Langdon menyadari bahwa ini akan jauh lebih kontroversial daripada dugaannya. Namun acara yang telah diatur dengan amat cermat itu tiba-tiba kacau balau, dan penemuan berharga Kirsch nyaris hilang selamanya. Terguncang dan menghadapi bahaya besar, Langdon terpaksa melarikan diri dari Bilbao. Dia didampingi oleh Ambra Vidal, sang direktur museum yang bekerja sama dengan Kirsch untuk menyelenggarakan acara. Keduanya bertolak ke Barcelona untuk mencari password teka-teki yang akan mengungkap rahasia Kirsch.\r\n\r\nMenyusuri koridor-koridor gelap sejarah rahasia dan agama ekstrem, Langdon dan Vidal harus menghindari lawan yang sepertinya tahu segalanya, yang kemungkinan didukung oleh pihak Istana Kerajaan Spanyol yang akan melakukan apa pun untuk membungkam Edmond Kirsch. Mengikuti jejak-jejak tersembunyi dalam karya seni modern dan beragam simbol misterius, Langdon dan Vidal menemukan petunjuk-petunjuk yang pada akhirnya membawa mereka berhadapan dengan penemuan Kirsch dan kenyataan mencengangkan yang selama ini tidak kita ketahui.'),
(10, '11-22-63.jpg', '11/22/63', 342000, 10, 'Scribner', 4, 'Jake Epping adalah seorang guru bahasa Inggris sekolah menengah yang baru saja bercerai di Lisbon Falls, Maine, mendapatkan uang tambahan untuk mengajar kelas GED. Epping memberikan tugas kepada siswa dewasanya, meminta mereka untuk menulis tentang hari yang mengubah hidup mereka. Salah satu siswa, seorang petugas kebersihan bernama Harry Dunning, menyerahkan tugas yang menjelaskan malam ayahnya yang alkoholik membunuh ibu dan saudara-saudaranya dengan palu dan melukai Harry, menyebabkan dia mengalami cedera otak permanen; cerita secara emosional mempengaruhi Jake, dan keduanya menjadi teman setelah Harry mendapatkan GED-nya.\r\n\r\nDua tahun kemudian, pada Juni 2011, Jake dipanggil setelah kelas di sekolahnya dan diminta untuk datang ke restoran Al untuk berbicara dengan Al. Ketika Jake tiba, dia terkejut melihat Al tampaknya telah berusia bertahun-tahun dalam waktu kurang dari 24 jam. Al menjelaskan bahwa dia sedang sekarat dan bahwa penampilannya disebabkan oleh perjalanan waktu dan hidup selama bertahun-tahun di masa lalu. Metode perjalanan waktu Al adalah portal waktu yang dia temukan di dapur restorannya, yang dia gunakan untuk mengangkut dirinya sendiri ke tahun 1958. Meragukan cerita Al pada awalnya, Jake melakukan perjalanan melalui portal, di mana dia bertemu dengan wino gila yang dijuluki Al sebagai \"Kuning Card Man\" karena warna kartu di topi pria itu.'),
(18, '213214915-352-k256545.jpg', 'mariposa', 111111123, 1, 'a', 1, 'aaaaaaaaa'),
(20, '213214915-352-k256545.jpg', 'mariposa', 1123213213, 1, 'aaaaaaaaaaaaaaaaa', 4, 'aaaaaaaaaaa');

--
-- Triggers `book`
--
DELIMITER $$
CREATE TRIGGER `tr_book_deleted` AFTER DELETE ON `book` FOR EACH ROW BEGIN

	UPDATE author SET

    author_num_of_books=author_num_of_books-1

    WHERE author_id=OLD.author_id;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_num_of_books` AFTER INSERT ON `book` FOR EACH ROW BEGIN


	UPDATE author SET


    author.author_num_of_books=author.author_num_of_books+1


    WHERE author_id=NEW.author_id;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_icon`) VALUES
(1, 'New Books', 'category-icon.png'),
(2, 'Recommendation', 'category-icon.png'),
(3, 'Import Books', 'category-icon.png'),
(4, 'Novel', 'category-icon.png'),
(5, 'Encyclopedia', 'category-icon.png'),
(6, 'Anthology', 'category-icon.png'),
(7, 'Life Style', 'category-icon.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`),
  ADD UNIQUE KEY `author_instagram` (`author_instagram`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
