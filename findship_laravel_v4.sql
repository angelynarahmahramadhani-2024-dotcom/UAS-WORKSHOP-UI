-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: findship
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `beasiswa`
--

DROP TABLE IF EXISTS `beasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beasiswa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyelenggara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('dalam negeri','luar negeri') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Semua Jurusan',
  `min_ipk` decimal(3,2) DEFAULT NULL,
  `deadline` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_resmi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beasiswa`
--

LOCK TABLES `beasiswa` WRITE;
/*!40000 ALTER TABLE `beasiswa` DISABLE KEYS */;
INSERT INTO `beasiswa` VALUES (1,'Beasiswa LPDP (Lembaga Pengelola Dana Pendidikan)','Kementerian Keuangan RI','luar negeri','S2','Semua Jurusan',3.25,'2026-07-25','Beasiswa penuh dari Pemerintah Indonesia untuk melanjutkan studi Magister (S2) dan Doktor (S3) di universitas terbaik dunia. Mencakup biaya kuliah penuh, tunjangan hidup bulanan, asuransi kesehatan, biaya visa, dan tiket pesawat PP.','https://lpdp.kemenkeu.go.id','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01'),(2,'Beasiswa Unggulan Kemendikbudristek','Kementerian Pendidikan dan Kebudayaan RI','dalam negeri','S1','Semua Jurusan',3.00,'2026-08-15','Program beasiswa dari Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi untuk mendukung pendidikan tinggi di Indonesia bagi mahasiswa berprestasi. Mencakup biaya kuliah UKT, biaya hidup bulanan, dan bantuan biaya buku.','https://beasiswaunggulan.kemdikbud.go.id','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01'),(3,'Djarum Beasiswa Plus','Djarum Foundation','dalam negeri','S1','Semua Jurusan',3.00,'2026-06-30','Beasiswa prestasi yang diberikan kepada mahasiswa S1 semester 4. Selain bantuan finansial sebesar Rp12.000.000 selama satu tahun, para Beswan Djarum juga mendapatkan pelatihan soft skills yang intensif seperti Character Building dan Leadership.','https://djarumbeasiswaplus.org','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01'),(4,'Monbukagakusho (MEXT) Japan Scholarship','Pemerintah Jepang','luar negeri','S1','Teknik Informatika',3.20,'2026-09-10','Program beasiswa penuh dari Kementerian Pendidikan, Budaya, Olahraga, Sains, dan Teknologi Jepang (MEXT) untuk lulusan SMA/SMK/sederajat guna melanjutkan studi D3/S1 di Jepang. Bebas biaya kuliah, tunjangan bulanan, serta tiket pesawat kelas ekonomi PP.','https://www.id.emb-japan.go.jp/sch.html','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01'),(5,'Chevening Scholarship UK','Pemerintah Britania Raya','luar negeri','S2','Politik',3.30,'2026-11-05','Beasiswa global Pemerintah Inggris yang didanai oleh Foreign, Commonwealth & Development Office (FCDO). Beasiswa ini diberikan kepada calon pemimpin masa depan untuk menempuh studi magister satu tahun di universitas-universitas ternama Inggris.','https://www.chevening.org/scholarship/indonesia/','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01'),(6,'Beasiswa KIP Kuliah (Kartu Indonesia Pintar)','Pemerintah RI','dalam negeri','S1','Semua Jurusan',2.50,'2026-08-31','Program bantuan biaya pendidikan dari Pemerintah RI untuk lulusan SMA atau sederajat yang memiliki potensi akademik baik tetapi memiliki keterbatasan ekonomi. Memberikan pembebasan biaya kuliah dan bantuan biaya hidup bulanan.','https://kip-kuliah.kemdikbud.go.id','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01'),(7,'KAIST International Student Scholarship','KAIST (Korea Advanced Institute of Science & Technology)','luar negeri','S1','Teknik',3.00,'2026-08-05','Beasiswa penuh dari salah satu universitas sains dan teknologi terkemuka di Korea Selatan. Beasiswa mencakup pembebasan biaya kuliah 100% untuk 8 semester, tunjangan hidup KRW 350.000 per bulan, dan asuransi kesehatan nasional Korea.','https://admission.kaist.ac.kr','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01'),(8,'Erasmus Mundus Joint Master (EMJM)','Uni Eropa','luar negeri','S2','Semua Jurusan',3.40,'2026-10-30','Program beasiswa prestigius yang didanai oleh Uni Eropa. Mahasiswa terpilih akan belajar di minimal dua negara Eropa yang berbeda dan mendapatkan gelar ganda (joint/multiple degree) setelah lulus. Mencakup seluruh biaya kuliah dan biaya perjalanan.','https://ec.europa.eu/programmes/erasmus-plus/opportunities/individuals/students/erasmus-mundus-joint-master-degrees_en','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01');
/*!40000 ALTER TABLE `beasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel-cache-admin@mail.com|127.0.0.1','i:2;',1783599628),('laravel-cache-admin@mail.com|127.0.0.1:timer','i:1783599628;',1783599628),('laravel-cache-wordpress_post_102','a:6:{s:2:\"id\";i:102;s:5:\"title\";a:1:{s:8:\"rendered\";s:63:\"Panduan Menulis Motivation Letter yang Menarik Perhatian Komite\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:127:\"Motivation letter adalah penentu kelulusan administrasi Anda. Simak struktur penulisan yang baik dan contoh praktisnya di sini.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:1908:\"<p>Motivation letter adalah salah satu dokumen paling krusial dalam aplikasi beasiswa. Dokumen satu halaman ini menjadi kesempatan pertama Anda untuk berkomunikasi langsung dengan komite seleksi dan meyakinkan mereka bahwa Anda adalah kandidat terbaik. Berikut adalah panduan langkah demi langkah menulis motivation letter yang memukau:</p><h3>1. Bagian Pendahuluan: Tuliskan Kalimat Pembuka (Hook) yang Menarik</h3><p>Hindari pembukaan klise seperti <em>\"Nama saya adalah X dan saya ingin melamar beasiswa Y...\"</em>. Cobalah mulai dengan cerita singkat tentang momen penting yang memicu ketertarikan Anda pada bidang studi tersebut. Misalnya, pengalaman kerja lapangan atau proyek penelitian yang membuka mata Anda terhadap tantangan di sektor tersebut.</p><h3>2. Bagian Isi: Hubungkan Latar Belakang Akademis dengan Tujuan Studi</h3><p>Pada paragraf berikutnya, jelaskan pencapaian akademis dan profesional Anda yang relevan. Ceritakan bagaimana latar belakang tersebut mempersiapkan Anda untuk mengambil program studi tujuan. Jelaskan juga mata kuliah spesifik di universitas target yang sangat ingin Anda pelajari dan bagaimana hal tersebut berkaitan langsung dengan karier impian Anda.</p><h3>3. Tunjukkan Mengapa Anda Memilih Universitas dan Negara Tersebut</h3><p>Tunjukkan bahwa Anda telah melakukan riset mendalam. Mengapa memilih Jerman dibanding Inggris? Mengapa memilih program Master di universitas ini bukan universitas lain? Hubungkan keunggulan fasilitas, budaya akademik, atau fokus riset universitas tersebut dengan rencana masa depan Anda.</p><h3>4. Bagian Penutup: Akhiri dengan Pernyataan Kontribusi yang Kuat</h3><p>Tutup surat motivasi Anda dengan merangkum kembali komitmen Anda. Jelaskan secara singkat bagaimana beasiswa ini akan bertindak sebagai batu loncatan yang membantu Anda memberikan dampak positif bagi komunitas, organisasi, atau negara asal Anda setelah lulus studi.</p>\";}s:4:\"date\";s:19:\"2026-06-04T14:30:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:40:\"Siti Aminah (Chevening Awardee @ Oxford)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=1200&auto=format&fit=crop\";}}}}',1783587332),('laravel-cache-wordpress_posts_page_1_limit_10','a:6:{i:0;a:6:{s:2:\"id\";i:101;s:5:\"title\";a:1:{s:8:\"rendered\";s:44:\"5 Langkah Strategis Lolos Beasiswa LPDP 2026\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:119:\"Ingin lolos beasiswa LPDP? Pelajari strategi jitu menyusun esai kontribusi dan menghadapi wawancara dari alumni sukses.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:2495:\"<p>Beasiswa Lembaga Pengelola Dana Pendidikan (LPDP) adalah salah satu beasiswa paling populer dan bergengsi bagi mahasiswa Indonesia yang ingin melanjutkan studi S2 atau S3. Proses seleksi LPDP dikenal sangat kompetitif dan ketat. Untuk membantu Anda bersiap, berikut adalah 5 langkah strategis yang terbukti meloloskan banyak awardee:</p><h3>1. Pahami Visi dan Karakter Calon Penerima Beasiswa LPDP</h3><p>LPDP mencari calon pemimpin masa depan yang memiliki komitmen kuat untuk kembali dan berkontribusi bagi Indonesia. Seluruh dokumen dan jawaban Anda selama wawancara harus sejalan dengan visi ini. Identifikasi kontribusi konkret apa yang bisa Anda berikan kepada masyarakat atau sektor industri Anda sekembalinya dari studi.</p><h3>2. Tulis Esai Kontribusi dengan Struktur yang Kuat</h3><p>Esai kontribusi bukan sekadar curahan hati atau daftar riwayat hidup. Buatlah esai yang terstruktur dengan memuat tiga poin utama:</p><ul><li><strong>Masalah Nyata:</strong> Deskripsikan masalah mendesak di Indonesia yang relevan dengan bidang keahlian Anda.</li><li><strong>Rencana Solusi:</strong> Jelaskan bagaimana studi yang Anda pilih akan membantu menyelesaikan masalah tersebut.</li><li><strong>Kontribusi Riil:</strong> Jelaskan peran konkret yang akan Anda ambil setelah lulus, baik jangka pendek maupun jangka panjang.</li></ul><h3>3. Dapatkan Surat Rekomendasi yang Kredibel</h3><p>Surat rekomendasi sebaiknya berasal dari dosen pembimbing akademis atau atasan langsung di tempat kerja yang benar-benar mengenal kompetensi dan karakter Anda. Mintalah surat rekomendasi jauh-jauh hari dan berikan mereka draf esai atau CV Anda agar rekomendasi yang ditulis bisa lebih spesifik dan berbobot.</p><h3>4. Lakukan Riset Universitas dan Program Studi Tujuan Secara Mendalam</h3><p>Jangan memilih universitas hanya berdasarkan reputasi global atau peringkat QS World saja. Pelajari kurikulum mata kuliah, daftar laboratorium penelitian, dan keahlian dosen pembimbing di universitas tersebut. Anda harus bisa menjelaskan mengapa universitas tersebut adalah tempat terbaik untuk mendukung rencana kontribusi Anda.</p><h3>5. Persiapkan Wawancara dengan Simulasi (Mock Interview)</h3><p>Wawancara adalah penentu akhir kelulusan Anda. Latihlah cara berbicara, bahasa tubuh, dan cara menjawab pertanyaan sulit seperti kelemahan diri atau rencana kontribusi yang kurang realistis. Lakukan simulasi berkali-kali bersama alumni LPDP atau rekan sejawat untuk mendapatkan umpan balik yang konstruktif.</p>\";}s:4:\"date\";s:19:\"2026-06-05T10:00:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:33:\"Budi Santoso (LPDP Awardee @ UCL)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop\";}}}}i:1;a:6:{s:2:\"id\";i:102;s:5:\"title\";a:1:{s:8:\"rendered\";s:63:\"Panduan Menulis Motivation Letter yang Menarik Perhatian Komite\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:127:\"Motivation letter adalah penentu kelulusan administrasi Anda. Simak struktur penulisan yang baik dan contoh praktisnya di sini.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:1908:\"<p>Motivation letter adalah salah satu dokumen paling krusial dalam aplikasi beasiswa. Dokumen satu halaman ini menjadi kesempatan pertama Anda untuk berkomunikasi langsung dengan komite seleksi dan meyakinkan mereka bahwa Anda adalah kandidat terbaik. Berikut adalah panduan langkah demi langkah menulis motivation letter yang memukau:</p><h3>1. Bagian Pendahuluan: Tuliskan Kalimat Pembuka (Hook) yang Menarik</h3><p>Hindari pembukaan klise seperti <em>\"Nama saya adalah X dan saya ingin melamar beasiswa Y...\"</em>. Cobalah mulai dengan cerita singkat tentang momen penting yang memicu ketertarikan Anda pada bidang studi tersebut. Misalnya, pengalaman kerja lapangan atau proyek penelitian yang membuka mata Anda terhadap tantangan di sektor tersebut.</p><h3>2. Bagian Isi: Hubungkan Latar Belakang Akademis dengan Tujuan Studi</h3><p>Pada paragraf berikutnya, jelaskan pencapaian akademis dan profesional Anda yang relevan. Ceritakan bagaimana latar belakang tersebut mempersiapkan Anda untuk mengambil program studi tujuan. Jelaskan juga mata kuliah spesifik di universitas target yang sangat ingin Anda pelajari dan bagaimana hal tersebut berkaitan langsung dengan karier impian Anda.</p><h3>3. Tunjukkan Mengapa Anda Memilih Universitas dan Negara Tersebut</h3><p>Tunjukkan bahwa Anda telah melakukan riset mendalam. Mengapa memilih Jerman dibanding Inggris? Mengapa memilih program Master di universitas ini bukan universitas lain? Hubungkan keunggulan fasilitas, budaya akademik, atau fokus riset universitas tersebut dengan rencana masa depan Anda.</p><h3>4. Bagian Penutup: Akhiri dengan Pernyataan Kontribusi yang Kuat</h3><p>Tutup surat motivasi Anda dengan merangkum kembali komitmen Anda. Jelaskan secara singkat bagaimana beasiswa ini akan bertindak sebagai batu loncatan yang membantu Anda memberikan dampak positif bagi komunitas, organisasi, atau negara asal Anda setelah lulus studi.</p>\";}s:4:\"date\";s:19:\"2026-06-04T14:30:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:40:\"Siti Aminah (Chevening Awardee @ Oxford)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=1200&auto=format&fit=crop\";}}}}i:2;a:6:{s:2:\"id\";i:103;s:5:\"title\";a:1:{s:8:\"rendered\";s:62:\"IELTS vs TOEFL iBT: Perbedaan Detail & Tips Memilih Tes Bahasa\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:132:\"Bingung memilih tes kecakapan bahasa Inggris untuk beasiswa? Cari tahu perbedaan format, sistem penilaian, dan kecocokannya di sini.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:2349:\"<p>Sertifikat kecakapan bahasa Inggris adalah persyaratan mutlak untuk sebagian besar beasiswa dalam dan luar negeri. Dua jenis tes yang paling populer dan diterima secara global adalah IELTS (International English Language Testing System) dan TOEFL iBT (Test of English as a Foreign Language internet-Based Test). Simak perbandingan mendalam berikut untuk menentukan pilihan Anda:</p><h3>1. Format dan Metode Pelaksanaan Tes</h3><p>Perbedaan terbesar terletak pada bagaimana tes diselenggarakan:</p><ul><li><strong>IELTS:</strong> Tersedia dalam format berbasis komputer dan kertas. Pada bagian Speaking, Anda akan melakukan wawancara tatap muka secara langsung dengan seorang penguji penutur asli (native speaker).</li><li><strong>TOEFL iBT:</strong> Seluruh tes dilakukan secara komputerisasi. Bahkan pada sesi Speaking, Anda akan berbicara menggunakan mikrofon dan rekaman suara Anda akan dinilai oleh sistem kombinasi AI dan penguji manusia.</li></ul><h3>2. Struktur Sesi Ujian</h3><p>Kedua tes menguji empat keterampilan utama, namun dengan pendekatan yang sedikit berbeda:</p><ul><li><strong>Listening:</strong> IELTS menggunakan aksen bahasa Inggris yang beragam (British, Australian, American) dengan tipe soal isian singkat dan pilihan ganda. TOEFL didominasi aksen American dengan tipe soal pilihan ganda berbasis rekaman kuliah akademis.</li><li><strong>Writing:</strong> IELTS mengharuskan Anda mendeskripsikan grafik/tabel di tugas pertama dan menulis esai argumentatif di tugas kedua. TOEFL menguji kemampuan integrasi (membaca, mendengarkan, lalu menulis rangkuman) dan esai diskusi akademis.</li></ul><h3>3. Sistem Penilaian (Skor)</h3><p>Sistem skor keduanya sangat berbeda. IELTS dinilai menggunakan skala Band Score dari 1.0 hingga 9.0 (dengan kenaikan per 0.5). Sementara itu, TOEFL iBT dinilai dengan rentang skor total dari 0 hingga 120 (masing-masing dari 4 sesi bernilai maksimum 30 poin).</p><h3>4. Negara dan Beasiswa Mana yang Harus Dipilih?</h3><p>Secara umum, IELTS sangat populer di Inggris, Australia, Selandia Baru, Kanada, dan Eropa. TOEFL iBT sangat dominan di Amerika Serikat. Namun saat ini, hampir semua universitas top dunia menerima keduanya. Pilihlah tes yang sesuai dengan kenyamanan Anda: apakah Anda lebih suka berbicara langsung dengan manusia (IELTS) atau berinteraksi penuh dengan komputer (TOEFL).</p>\";}s:4:\"date\";s:19:\"2026-06-01T09:15:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:40:\"Andi Wijaya (IELTS Trainer & Consultant)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:90:\"https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=1200&auto=format&fit=crop\";}}}}i:3;a:6:{s:2:\"id\";i:104;s:5:\"title\";a:1:{s:8:\"rendered\";s:55:\"Cara Menghubungi Calon Promotor Akademik di Luar Negeri\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:138:\"Untuk melamar beasiswa riset S2/S3, Anda membutuhkan persetujuan profesor. Pelajari etika menulis email dingin (cold email) agar direspon.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:2023:\"<p>Bagi pelamar beasiswa jalur riset (Master by Research atau PhD), mendapatkan supervisor atau promotor akademik adalah salah satu prasyarat wajib. Menghubungi profesor luar negeri yang belum pernah Anda kenal (disebut cold emailing) membutuhkan strategi khusus agar email Anda dibaca dan dibalas. Berikut panduannya:</p><h3>1. Lakukan Riset Mendalam Mengenai Profil Profesor</h3><p>Jangan mengirim email massal yang sama ke banyak profesor. Cari profesor yang memiliki minat penelitian yang selaras dengan proposal tesis atau disertasi Anda. Baca setidaknya 2 atau 3 jurnal ilmiah terbaru yang dipublikasikan oleh profesor tersebut agar Anda memahami fokus riset terkininya.</p><h3>2. Gunakan Subjek Email yang Jelas dan Profesional</h3><p>Subjek email harus langsung menjelaskan maksud Anda. Gunakan format yang ringkas seperti:<br><strong>\"Inquiry on PhD Supervision - [Nama Beasiswa / Bidang Riset]\"</strong> atau <strong>\"Prospective Research Student: [Nama Anda]\"</strong>. Hal ini meminimalkan risiko email Anda masuk ke folder spam atau diabaikan karena dikira iklan.</p><h3>3. Struktur Isi Email yang Ringkas dan Padat</h3><p>Tulis email dalam bahasa Inggris yang formal dengan bagian-bagian berikut:</p><ul><li><strong>Salam & Pengenalan:</strong> Perkenalkan diri, latar belakang pendidikan, dan IPK Anda secara singkat.</li><li><strong>Ketertarikan Riset:</strong> Jelaskan mengapa Anda tertarik pada riset beliau, sebutkan jurnal beliau yang Anda baca, dan hubungkan dengan rencana riset Anda.</li><li><strong>Rencana Pendanaan:</strong> Nyatakan bahwa Anda sedang atau akan melamar beasiswa (misalnya LPDP, MEXT, atau AAS) untuk mendanai studi Anda secara penuh.</li></ul><h3>4. Lampirkan CV Akademik dan Ringkasan Proposal Riset</h3><p>Lampirkan CV akademik (maksimal 2 halaman) yang menonjolkan IPK, publikasi ilmiah, dan pengalaman riset. Sertakan juga ringkasan draf proposal penelitian (Research Proposal) sebanyak 1-2 halaman saja. Jangan melampirkan berkas berukuran besar lainnya kecuali diminta.</p>\";}s:4:\"date\";s:19:\"2026-05-28T11:20:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:46:\"Dr. Ahmad Fauzi (Research Fellow @ Tokyo Tech)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=1200&auto=format&fit=crop\";}}}}i:4;a:6:{s:2:\"id\";i:105;s:5:\"title\";a:1:{s:8:\"rendered\";s:62:\"Cara Menjawab Pertanyaan Wawancara Beasiswa dengan Metode STAR\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:124:\"Pelajari cara menyusun jawaban wawancara beasiswa secara sistematis, logis, dan profesional menggunakan kerangka kerja STAR.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:2130:\"<p>Tahap wawancara sering kali menjadi bagian yang paling menegangkan dalam seleksi beasiswa. Salah satu kesalahan umum kandidat adalah memberikan jawaban yang terlalu bertele-tele atau tidak fokus. Untuk mengatasinya, Anda bisa menggunakan metode STAR. Ini adalah kerangka kerja yang sangat efektif untuk menjawab pertanyaan berbasis perilaku (behavioral questions), seperti menceritakan pengalaman kepemimpinan atau cara mengatasi konflik.</p><h3>Mengenal Komponen Metode STAR</h3><p>STAR adalah singkatan dari empat elemen utama:</p><ul><li><strong>Situation (Situasi):</strong> Deskripsikan konteks atau latar belakang dari kejadian yang ingin Anda ceritakan secara singkat namun jelas.</li><li><strong>Task (Tugas):</strong> Jelaskan tanggung jawab atau tantangan utama yang harus diselesaikan dalam situasi tersebut.</li><li><strong>Action (Tindakan):</strong> Terangkan secara detail tindakan nyata apa yang Anda ambil untuk mengatasi masalah. Fokuskan pada peran Anda sendiri, bukan kelompok.</li><li><strong>Result (Hasil):</strong> Bagikan hasil akhir dari tindakan Anda. Sajikan data kuantitatif jika memungkinkan (misalnya: meningkatkan efisiensi sebesar 20%, menghemat waktu pendaftaran, dsb).</li></ul><h3>Contoh Penerapan Metode STAR</h3><p>Berikut adalah simulasi jawaban atas pertanyaan: <em>\"Ceritakan momen ketika Anda berhasil menunjukkan kemampuan kepemimpinan Anda.\"</em></p><p><strong>[Situation]</strong> \"Saat semester 6 kuliah S1, saya ditunjuk menjadi ketua panitia seminar nasional dengan target 500 peserta.\"</p><p><strong>[Task]</strong> \"Tiga minggu sebelum acara dimulai, jumlah pendaftar baru mencapai 150 orang karena promosi offline kami kurang efektif.\"</p><p><strong>[Action]</strong> \"Saya segera mereorganisasi tim humas dan mengalihkan fokus ke kampanye digital berbayar serta bekerja sama dengan 10 media partner kampus. Saya juga mengadakan kuis interaktif di Instagram untuk menarik audiens.\"</p><p><strong>[Result]</strong> \"Hasilnya, dalam waktu dua minggu, kami berhasil mendaftarkan 580 peserta (melebihi target awal sebesar 16%) dan acara berjalan sukses tanpa hambatan teknis.\"</p>\";}s:4:\"date\";s:19:\"2026-05-25T15:45:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:41:\"Diana Putri (AAS Awardee @ Melbourne Uni)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1200&auto=format&fit=crop\";}}}}i:5;a:6:{s:2:\"id\";i:106;s:5:\"title\";a:1:{s:8:\"rendered\";s:67:\"Timeline Persiapan Beasiswa Luar Negeri Sejak 1 Tahun Sebelum Apply\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:127:\"Persiapan yang terburu-buru adalah penyebab utama kegagalan beasiswa. Simak timeline aksi bulanan terbaik untuk kelolosan Anda.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:1997:\"<p>Mempersiapkan pendaftaran beasiswa dan universitas luar negeri bukanlah proses instan. Banyak dokumen seperti sertifikat bahasa, surat rekomendasi, dan esai memerlukan waktu berbulan-bulan untuk dipoles hingga matang. Untuk memaksimalkan peluang lolos, berikut adalah timeline ideal 12 bulan yang bisa Anda ikuti:</p><h3>Bulan 1 - 3: Riset Mendalam dan Menentukan Target</h3><p>Mulailah dengan membuat daftar target beasiswa (seperti LPDP, AAS, Chevening, MEXT) beserta persyaratannya. Tentukan pula 3 universitas dan jurusan tujuan. Di tahap ini, lakukan penilaian mandiri terhadap kemampuan bahasa Inggris Anda dengan mengikuti tes simulasi (prediction test).</p><h3>Bulan 4 - 6: Persiapan dan Tes Kecakapan Bahasa Inggris</h3><p>Gunakan waktu ini untuk belajar secara intensif untuk IELTS atau TOEFL. Jadwalkan tes resmi pada bulan ke-6. Mengambil tes lebih awal memberi Anda waktu cadangan untuk tes ulang seandainya skor pertama belum memenuhi syarat minimum universitas tujuan Anda.</p><h3>Bulan 7 - 9: Pembuatan Esai dan Menghubungi Penulis Rekomendasi</h3><p>Mulailah menyusun draf pertama motivation letter, esai kontribusi, atau proposal penelitian. Tulis beberapa versi dan mintalah koreksi dari mentor atau alumni. Secara bersamaan, hubungi dosen atau atasan Anda untuk meminta kesediaan mereka menulis surat rekomendasi.</p><h3>Bulan 10 - 11: Pendaftaran Universitas & Penerjemahan Dokumen</h3><p>Dapatkan Letter of Acceptance (LoA) dari universitas pilihan Anda dengan mendaftar langsung ke portal admisi kampus. Pastikan juga semua ijazah, transkrip nilai, dan dokumen pendukung lainnya telah diterjemahkan oleh penerjemah tersumpah (sworn translator).</p><h3>Bulan 12: Pengajuan Aplikasi Beasiswa & Latihan Wawancara</h3><p>Unggah seluruh dokumen yang telah dipersiapkan dengan teliti ke portal beasiswa tujuan. Jangan mengirimkan aplikasi mepet dengan batas waktu (deadline) untuk menghindari server lambat. Setelah submit, segera lakukan latihan wawancara secara intensif.</p>\";}s:4:\"date\";s:19:\"2026-05-20T09:00:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:38:\"Rian Kurnia (MEXT Awardee @ Kyoto Uni)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=1200&auto=format&fit=crop\";}}}}}',1783654359),('laravel-cache-wordpress_posts_page_1_limit_3','a:6:{i:0;a:6:{s:2:\"id\";i:101;s:5:\"title\";a:1:{s:8:\"rendered\";s:44:\"5 Langkah Strategis Lolos Beasiswa LPDP 2026\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:119:\"Ingin lolos beasiswa LPDP? Pelajari strategi jitu menyusun esai kontribusi dan menghadapi wawancara dari alumni sukses.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:2495:\"<p>Beasiswa Lembaga Pengelola Dana Pendidikan (LPDP) adalah salah satu beasiswa paling populer dan bergengsi bagi mahasiswa Indonesia yang ingin melanjutkan studi S2 atau S3. Proses seleksi LPDP dikenal sangat kompetitif dan ketat. Untuk membantu Anda bersiap, berikut adalah 5 langkah strategis yang terbukti meloloskan banyak awardee:</p><h3>1. Pahami Visi dan Karakter Calon Penerima Beasiswa LPDP</h3><p>LPDP mencari calon pemimpin masa depan yang memiliki komitmen kuat untuk kembali dan berkontribusi bagi Indonesia. Seluruh dokumen dan jawaban Anda selama wawancara harus sejalan dengan visi ini. Identifikasi kontribusi konkret apa yang bisa Anda berikan kepada masyarakat atau sektor industri Anda sekembalinya dari studi.</p><h3>2. Tulis Esai Kontribusi dengan Struktur yang Kuat</h3><p>Esai kontribusi bukan sekadar curahan hati atau daftar riwayat hidup. Buatlah esai yang terstruktur dengan memuat tiga poin utama:</p><ul><li><strong>Masalah Nyata:</strong> Deskripsikan masalah mendesak di Indonesia yang relevan dengan bidang keahlian Anda.</li><li><strong>Rencana Solusi:</strong> Jelaskan bagaimana studi yang Anda pilih akan membantu menyelesaikan masalah tersebut.</li><li><strong>Kontribusi Riil:</strong> Jelaskan peran konkret yang akan Anda ambil setelah lulus, baik jangka pendek maupun jangka panjang.</li></ul><h3>3. Dapatkan Surat Rekomendasi yang Kredibel</h3><p>Surat rekomendasi sebaiknya berasal dari dosen pembimbing akademis atau atasan langsung di tempat kerja yang benar-benar mengenal kompetensi dan karakter Anda. Mintalah surat rekomendasi jauh-jauh hari dan berikan mereka draf esai atau CV Anda agar rekomendasi yang ditulis bisa lebih spesifik dan berbobot.</p><h3>4. Lakukan Riset Universitas dan Program Studi Tujuan Secara Mendalam</h3><p>Jangan memilih universitas hanya berdasarkan reputasi global atau peringkat QS World saja. Pelajari kurikulum mata kuliah, daftar laboratorium penelitian, dan keahlian dosen pembimbing di universitas tersebut. Anda harus bisa menjelaskan mengapa universitas tersebut adalah tempat terbaik untuk mendukung rencana kontribusi Anda.</p><h3>5. Persiapkan Wawancara dengan Simulasi (Mock Interview)</h3><p>Wawancara adalah penentu akhir kelulusan Anda. Latihlah cara berbicara, bahasa tubuh, dan cara menjawab pertanyaan sulit seperti kelemahan diri atau rencana kontribusi yang kurang realistis. Lakukan simulasi berkali-kali bersama alumni LPDP atau rekan sejawat untuk mendapatkan umpan balik yang konstruktif.</p>\";}s:4:\"date\";s:19:\"2026-06-05T10:00:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:33:\"Budi Santoso (LPDP Awardee @ UCL)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop\";}}}}i:1;a:6:{s:2:\"id\";i:102;s:5:\"title\";a:1:{s:8:\"rendered\";s:63:\"Panduan Menulis Motivation Letter yang Menarik Perhatian Komite\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:127:\"Motivation letter adalah penentu kelulusan administrasi Anda. Simak struktur penulisan yang baik dan contoh praktisnya di sini.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:1908:\"<p>Motivation letter adalah salah satu dokumen paling krusial dalam aplikasi beasiswa. Dokumen satu halaman ini menjadi kesempatan pertama Anda untuk berkomunikasi langsung dengan komite seleksi dan meyakinkan mereka bahwa Anda adalah kandidat terbaik. Berikut adalah panduan langkah demi langkah menulis motivation letter yang memukau:</p><h3>1. Bagian Pendahuluan: Tuliskan Kalimat Pembuka (Hook) yang Menarik</h3><p>Hindari pembukaan klise seperti <em>\"Nama saya adalah X dan saya ingin melamar beasiswa Y...\"</em>. Cobalah mulai dengan cerita singkat tentang momen penting yang memicu ketertarikan Anda pada bidang studi tersebut. Misalnya, pengalaman kerja lapangan atau proyek penelitian yang membuka mata Anda terhadap tantangan di sektor tersebut.</p><h3>2. Bagian Isi: Hubungkan Latar Belakang Akademis dengan Tujuan Studi</h3><p>Pada paragraf berikutnya, jelaskan pencapaian akademis dan profesional Anda yang relevan. Ceritakan bagaimana latar belakang tersebut mempersiapkan Anda untuk mengambil program studi tujuan. Jelaskan juga mata kuliah spesifik di universitas target yang sangat ingin Anda pelajari dan bagaimana hal tersebut berkaitan langsung dengan karier impian Anda.</p><h3>3. Tunjukkan Mengapa Anda Memilih Universitas dan Negara Tersebut</h3><p>Tunjukkan bahwa Anda telah melakukan riset mendalam. Mengapa memilih Jerman dibanding Inggris? Mengapa memilih program Master di universitas ini bukan universitas lain? Hubungkan keunggulan fasilitas, budaya akademik, atau fokus riset universitas tersebut dengan rencana masa depan Anda.</p><h3>4. Bagian Penutup: Akhiri dengan Pernyataan Kontribusi yang Kuat</h3><p>Tutup surat motivasi Anda dengan merangkum kembali komitmen Anda. Jelaskan secara singkat bagaimana beasiswa ini akan bertindak sebagai batu loncatan yang membantu Anda memberikan dampak positif bagi komunitas, organisasi, atau negara asal Anda setelah lulus studi.</p>\";}s:4:\"date\";s:19:\"2026-06-04T14:30:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:40:\"Siti Aminah (Chevening Awardee @ Oxford)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=1200&auto=format&fit=crop\";}}}}i:2;a:6:{s:2:\"id\";i:103;s:5:\"title\";a:1:{s:8:\"rendered\";s:62:\"IELTS vs TOEFL iBT: Perbedaan Detail & Tips Memilih Tes Bahasa\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:132:\"Bingung memilih tes kecakapan bahasa Inggris untuk beasiswa? Cari tahu perbedaan format, sistem penilaian, dan kecocokannya di sini.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:2349:\"<p>Sertifikat kecakapan bahasa Inggris adalah persyaratan mutlak untuk sebagian besar beasiswa dalam dan luar negeri. Dua jenis tes yang paling populer dan diterima secara global adalah IELTS (International English Language Testing System) dan TOEFL iBT (Test of English as a Foreign Language internet-Based Test). Simak perbandingan mendalam berikut untuk menentukan pilihan Anda:</p><h3>1. Format dan Metode Pelaksanaan Tes</h3><p>Perbedaan terbesar terletak pada bagaimana tes diselenggarakan:</p><ul><li><strong>IELTS:</strong> Tersedia dalam format berbasis komputer dan kertas. Pada bagian Speaking, Anda akan melakukan wawancara tatap muka secara langsung dengan seorang penguji penutur asli (native speaker).</li><li><strong>TOEFL iBT:</strong> Seluruh tes dilakukan secara komputerisasi. Bahkan pada sesi Speaking, Anda akan berbicara menggunakan mikrofon dan rekaman suara Anda akan dinilai oleh sistem kombinasi AI dan penguji manusia.</li></ul><h3>2. Struktur Sesi Ujian</h3><p>Kedua tes menguji empat keterampilan utama, namun dengan pendekatan yang sedikit berbeda:</p><ul><li><strong>Listening:</strong> IELTS menggunakan aksen bahasa Inggris yang beragam (British, Australian, American) dengan tipe soal isian singkat dan pilihan ganda. TOEFL didominasi aksen American dengan tipe soal pilihan ganda berbasis rekaman kuliah akademis.</li><li><strong>Writing:</strong> IELTS mengharuskan Anda mendeskripsikan grafik/tabel di tugas pertama dan menulis esai argumentatif di tugas kedua. TOEFL menguji kemampuan integrasi (membaca, mendengarkan, lalu menulis rangkuman) dan esai diskusi akademis.</li></ul><h3>3. Sistem Penilaian (Skor)</h3><p>Sistem skor keduanya sangat berbeda. IELTS dinilai menggunakan skala Band Score dari 1.0 hingga 9.0 (dengan kenaikan per 0.5). Sementara itu, TOEFL iBT dinilai dengan rentang skor total dari 0 hingga 120 (masing-masing dari 4 sesi bernilai maksimum 30 poin).</p><h3>4. Negara dan Beasiswa Mana yang Harus Dipilih?</h3><p>Secara umum, IELTS sangat populer di Inggris, Australia, Selandia Baru, Kanada, dan Eropa. TOEFL iBT sangat dominan di Amerika Serikat. Namun saat ini, hampir semua universitas top dunia menerima keduanya. Pilihlah tes yang sesuai dengan kenyamanan Anda: apakah Anda lebih suka berbicara langsung dengan manusia (IELTS) atau berinteraksi penuh dengan komputer (TOEFL).</p>\";}s:4:\"date\";s:19:\"2026-06-01T09:15:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:40:\"Andi Wijaya (IELTS Trainer & Consultant)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:90:\"https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=1200&auto=format&fit=crop\";}}}}i:3;a:6:{s:2:\"id\";i:104;s:5:\"title\";a:1:{s:8:\"rendered\";s:55:\"Cara Menghubungi Calon Promotor Akademik di Luar Negeri\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:138:\"Untuk melamar beasiswa riset S2/S3, Anda membutuhkan persetujuan profesor. Pelajari etika menulis email dingin (cold email) agar direspon.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:2023:\"<p>Bagi pelamar beasiswa jalur riset (Master by Research atau PhD), mendapatkan supervisor atau promotor akademik adalah salah satu prasyarat wajib. Menghubungi profesor luar negeri yang belum pernah Anda kenal (disebut cold emailing) membutuhkan strategi khusus agar email Anda dibaca dan dibalas. Berikut panduannya:</p><h3>1. Lakukan Riset Mendalam Mengenai Profil Profesor</h3><p>Jangan mengirim email massal yang sama ke banyak profesor. Cari profesor yang memiliki minat penelitian yang selaras dengan proposal tesis atau disertasi Anda. Baca setidaknya 2 atau 3 jurnal ilmiah terbaru yang dipublikasikan oleh profesor tersebut agar Anda memahami fokus riset terkininya.</p><h3>2. Gunakan Subjek Email yang Jelas dan Profesional</h3><p>Subjek email harus langsung menjelaskan maksud Anda. Gunakan format yang ringkas seperti:<br><strong>\"Inquiry on PhD Supervision - [Nama Beasiswa / Bidang Riset]\"</strong> atau <strong>\"Prospective Research Student: [Nama Anda]\"</strong>. Hal ini meminimalkan risiko email Anda masuk ke folder spam atau diabaikan karena dikira iklan.</p><h3>3. Struktur Isi Email yang Ringkas dan Padat</h3><p>Tulis email dalam bahasa Inggris yang formal dengan bagian-bagian berikut:</p><ul><li><strong>Salam & Pengenalan:</strong> Perkenalkan diri, latar belakang pendidikan, dan IPK Anda secara singkat.</li><li><strong>Ketertarikan Riset:</strong> Jelaskan mengapa Anda tertarik pada riset beliau, sebutkan jurnal beliau yang Anda baca, dan hubungkan dengan rencana riset Anda.</li><li><strong>Rencana Pendanaan:</strong> Nyatakan bahwa Anda sedang atau akan melamar beasiswa (misalnya LPDP, MEXT, atau AAS) untuk mendanai studi Anda secara penuh.</li></ul><h3>4. Lampirkan CV Akademik dan Ringkasan Proposal Riset</h3><p>Lampirkan CV akademik (maksimal 2 halaman) yang menonjolkan IPK, publikasi ilmiah, dan pengalaman riset. Sertakan juga ringkasan draf proposal penelitian (Research Proposal) sebanyak 1-2 halaman saja. Jangan melampirkan berkas berukuran besar lainnya kecuali diminta.</p>\";}s:4:\"date\";s:19:\"2026-05-28T11:20:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:46:\"Dr. Ahmad Fauzi (Research Fellow @ Tokyo Tech)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1532094349884-543bc11b234d?q=80&w=1200&auto=format&fit=crop\";}}}}i:4;a:6:{s:2:\"id\";i:105;s:5:\"title\";a:1:{s:8:\"rendered\";s:62:\"Cara Menjawab Pertanyaan Wawancara Beasiswa dengan Metode STAR\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:124:\"Pelajari cara menyusun jawaban wawancara beasiswa secara sistematis, logis, dan profesional menggunakan kerangka kerja STAR.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:2130:\"<p>Tahap wawancara sering kali menjadi bagian yang paling menegangkan dalam seleksi beasiswa. Salah satu kesalahan umum kandidat adalah memberikan jawaban yang terlalu bertele-tele atau tidak fokus. Untuk mengatasinya, Anda bisa menggunakan metode STAR. Ini adalah kerangka kerja yang sangat efektif untuk menjawab pertanyaan berbasis perilaku (behavioral questions), seperti menceritakan pengalaman kepemimpinan atau cara mengatasi konflik.</p><h3>Mengenal Komponen Metode STAR</h3><p>STAR adalah singkatan dari empat elemen utama:</p><ul><li><strong>Situation (Situasi):</strong> Deskripsikan konteks atau latar belakang dari kejadian yang ingin Anda ceritakan secara singkat namun jelas.</li><li><strong>Task (Tugas):</strong> Jelaskan tanggung jawab atau tantangan utama yang harus diselesaikan dalam situasi tersebut.</li><li><strong>Action (Tindakan):</strong> Terangkan secara detail tindakan nyata apa yang Anda ambil untuk mengatasi masalah. Fokuskan pada peran Anda sendiri, bukan kelompok.</li><li><strong>Result (Hasil):</strong> Bagikan hasil akhir dari tindakan Anda. Sajikan data kuantitatif jika memungkinkan (misalnya: meningkatkan efisiensi sebesar 20%, menghemat waktu pendaftaran, dsb).</li></ul><h3>Contoh Penerapan Metode STAR</h3><p>Berikut adalah simulasi jawaban atas pertanyaan: <em>\"Ceritakan momen ketika Anda berhasil menunjukkan kemampuan kepemimpinan Anda.\"</em></p><p><strong>[Situation]</strong> \"Saat semester 6 kuliah S1, saya ditunjuk menjadi ketua panitia seminar nasional dengan target 500 peserta.\"</p><p><strong>[Task]</strong> \"Tiga minggu sebelum acara dimulai, jumlah pendaftar baru mencapai 150 orang karena promosi offline kami kurang efektif.\"</p><p><strong>[Action]</strong> \"Saya segera mereorganisasi tim humas dan mengalihkan fokus ke kampanye digital berbayar serta bekerja sama dengan 10 media partner kampus. Saya juga mengadakan kuis interaktif di Instagram untuk menarik audiens.\"</p><p><strong>[Result]</strong> \"Hasilnya, dalam waktu dua minggu, kami berhasil mendaftarkan 580 peserta (melebihi target awal sebesar 16%) dan acara berjalan sukses tanpa hambatan teknis.\"</p>\";}s:4:\"date\";s:19:\"2026-05-25T15:45:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:41:\"Diana Putri (AAS Awardee @ Melbourne Uni)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1200&auto=format&fit=crop\";}}}}i:5;a:6:{s:2:\"id\";i:106;s:5:\"title\";a:1:{s:8:\"rendered\";s:67:\"Timeline Persiapan Beasiswa Luar Negeri Sejak 1 Tahun Sebelum Apply\";}s:7:\"excerpt\";a:1:{s:8:\"rendered\";s:127:\"Persiapan yang terburu-buru adalah penyebab utama kegagalan beasiswa. Simak timeline aksi bulanan terbaik untuk kelolosan Anda.\";}s:7:\"content\";a:1:{s:8:\"rendered\";s:1997:\"<p>Mempersiapkan pendaftaran beasiswa dan universitas luar negeri bukanlah proses instan. Banyak dokumen seperti sertifikat bahasa, surat rekomendasi, dan esai memerlukan waktu berbulan-bulan untuk dipoles hingga matang. Untuk memaksimalkan peluang lolos, berikut adalah timeline ideal 12 bulan yang bisa Anda ikuti:</p><h3>Bulan 1 - 3: Riset Mendalam dan Menentukan Target</h3><p>Mulailah dengan membuat daftar target beasiswa (seperti LPDP, AAS, Chevening, MEXT) beserta persyaratannya. Tentukan pula 3 universitas dan jurusan tujuan. Di tahap ini, lakukan penilaian mandiri terhadap kemampuan bahasa Inggris Anda dengan mengikuti tes simulasi (prediction test).</p><h3>Bulan 4 - 6: Persiapan dan Tes Kecakapan Bahasa Inggris</h3><p>Gunakan waktu ini untuk belajar secara intensif untuk IELTS atau TOEFL. Jadwalkan tes resmi pada bulan ke-6. Mengambil tes lebih awal memberi Anda waktu cadangan untuk tes ulang seandainya skor pertama belum memenuhi syarat minimum universitas tujuan Anda.</p><h3>Bulan 7 - 9: Pembuatan Esai dan Menghubungi Penulis Rekomendasi</h3><p>Mulailah menyusun draf pertama motivation letter, esai kontribusi, atau proposal penelitian. Tulis beberapa versi dan mintalah koreksi dari mentor atau alumni. Secara bersamaan, hubungi dosen atau atasan Anda untuk meminta kesediaan mereka menulis surat rekomendasi.</p><h3>Bulan 10 - 11: Pendaftaran Universitas & Penerjemahan Dokumen</h3><p>Dapatkan Letter of Acceptance (LoA) dari universitas pilihan Anda dengan mendaftar langsung ke portal admisi kampus. Pastikan juga semua ijazah, transkrip nilai, dan dokumen pendukung lainnya telah diterjemahkan oleh penerjemah tersumpah (sworn translator).</p><h3>Bulan 12: Pengajuan Aplikasi Beasiswa & Latihan Wawancara</h3><p>Unggah seluruh dokumen yang telah dipersiapkan dengan teliti ke portal beasiswa tujuan. Jangan mengirimkan aplikasi mepet dengan batas waktu (deadline) untuk menghindari server lambat. Setelah submit, segera lakukan latihan wawancara secara intensif.</p>\";}s:4:\"date\";s:19:\"2026-05-20T09:00:00\";s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:1:{s:4:\"name\";s:38:\"Rian Kurnia (MEXT Awardee @ Kyoto Uni)\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:1:{s:10:\"source_url\";s:93:\"https://images.unsplash.com/photo-1506784983877-45594efa4cbe?q=80&w=1200&auto=format&fit=crop\";}}}}}',1783653763);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorit`
--

DROP TABLE IF EXISTS `favorit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favorit` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `beasiswa_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favorit_user_id_foreign` (`user_id`),
  KEY `favorit_beasiswa_id_foreign` (`beasiswa_id`),
  CONSTRAINT `favorit_beasiswa_id_foreign` FOREIGN KEY (`beasiswa_id`) REFERENCES `beasiswa` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favorit_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorit`
--

LOCK TABLES `favorit` WRITE;
/*!40000 ALTER TABLE `favorit` DISABLE KEYS */;
INSERT INTO `favorit` VALUES (1,3,1,'2026-07-09 04:06:16','2026-07-09 04:06:16');
/*!40000 ALTER TABLE `favorit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kelas_premium`
--

DROP TABLE IF EXISTS `kelas_premium`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelas_premium` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `konten_publik` text COLLATE utf8mb4_unicode_ci,
  `konten_premium` longtext COLLATE utf8mb4_unicode_ci,
  `file_materi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_zoom` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_rekaman` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kurikulum` json DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Lainnya',
  `rating` decimal(3,2) NOT NULL DEFAULT '4.50',
  `discount_percentage` int DEFAULT NULL,
  `discount_expiry` timestamp NULL DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '10 Jam',
  `lessons_count` int NOT NULL DEFAULT '8',
  `includes` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_premium`
--

LOCK TABLES `kelas_premium` WRITE;
/*!40000 ALTER TABLE `kelas_premium` DISABLE KEYS */;
INSERT INTO `kelas_premium` VALUES (1,'Mastering LPDP Essay Writing','Kelas intensif yang membahas strategi menyusun kontribusi esai dan esai rencana studi LPDP yang memikat hati para reviewer. Dilengkapi dengan sesi review esai satu per satu (one-on-one) dan template esai lolos seleksi.',150000.00,'https://picsum.photos/id/24/600/400','aktif','2026-07-09 01:12:01','2026-07-10 00:03:08','Pelajari cara menyusun kontribusi esai dan rencana studi LPDP yang memikat hati para reviewer bersama alumni awardee.','<h3>Selamat datang di Kelas Premium!</h3><p>Berikut adalah modul pembelajaran premium untuk menulis esai LPDP:</p><ul><li><strong>Modul 1:</strong> Membedah struktur esai yang disukai reviewer.</li><li><strong>Modul 2:</strong> Mengaitkan rencana studi dengan kontribusi konkret bagi Indonesia.</li><li><strong>Modul 3:</strong> Teknik self-editing dan penyelarasan esai dengan visi LPDP.</li></ul>','materi-kelas/lpdp_essay_guide.pdf','https://zoom.us/j/1234567890','https://www.youtube.com/embed/dQw4w9WgXcQ','\"[{\\\"judul\\\":\\\"Sesi 1: Bedah Logika & Esensi Esai LPDP\\\",\\\"materi\\\":\\\"Memahami kriteria penilaian juri dan kerangka penulisan esai.\\\"},{\\\"judul\\\":\\\"Sesi 2: Rencana Studi & Menjawab Masalah Riil\\\",\\\"materi\\\":\\\"Cara merumuskan kontribusi yang rasional dan aplikatif.\\\"},{\\\"judul\\\":\\\"Sesi 3: Review Esai One-on-One\\\",\\\"materi\\\":\\\"Sesi konsultasi langsung untuk menyempurnakan tulisan peserta.\\\"}]\"','Esai & Motivation Letter',4.85,20,'2026-07-11 01:12:01','12 Jam',6,'{\"certificate\": true, \"video_hours\": 12, \"lifetime_access\": true, \"practice_questions\": false, \"downloadable_materials\": true}'),(2,'IELTS Preparation Bootcamp (Target 7.0+)','Program bootcamp persiapan IELTS selama 4 minggu yang mencakup materi Listening, Reading, Writing, dan Speaking. Mentor berpengalaman akan membagikan rumus praktis, simulasi tes (mock test), dan materi eksklusif.',299000.00,'https://picsum.photos/id/180/600/400','aktif','2026-07-09 01:12:01','2026-07-10 00:03:08','Bootcamp intensif 4 minggu mencakup tips 4 pilar skill IELTS (Listening, Reading, Writing, Speaking) untuk target skor 7.0+.','<h3>Materi Premium IELTS Bootcamp</h3><p>Silakan ikuti instruksi belajar berikut:</p><ol><li>Unduh e-book Cambridge IELTS 18 di tab File Download.</li><li>Saksikan rekaman sesi writing task 1 & 2 untuk menguasai struktur esai.</li><li>Bergabunglah ke sesi zoom sesuai jadwal latihan speaking mingguan.</li></ol>','materi-kelas/cambridge_ielts_practice.pdf','https://zoom.us/j/9876543210','https://www.youtube.com/embed/dQw4w9WgXcQ','\"[{\\\"judul\\\":\\\"Minggu 1: Listening & Reading Strategies\\\",\\\"materi\\\":\\\"Trik menebak kata kunci dan pemindaian teks (scanning).\\\"},{\\\"judul\\\":\\\"Minggu 2: Writing Task 1 & 2 Deep Dive\\\",\\\"materi\\\":\\\"Menguasai struktur esai akademik dan deskripsi grafik.\\\"},{\\\"judul\\\":\\\"Minggu 3: Speaking Band 7.0+ Simulation\\\",\\\"materi\\\":\\\"Latihan kelancaran berbicara, kosakata, dan pelafalan.\\\"}]\"','Bahasa & Tes',4.92,15,'2026-07-14 01:12:01','32 Jam',16,'{\"certificate\": true, \"video_hours\": 32, \"lifetime_access\": true, \"practice_questions\": true, \"downloadable_materials\": true}'),(3,'Scholarship Interview Preparation & Simulation','Persiapkan diri Anda menghadapi wawancara beasiswa dalam dan luar negeri. Anda akan dilatih menyusun jawaban STAR method, etika wawancara, menghadapi pertanyaan jebakan, dan mengikuti mock interview interaktif.',125000.00,'https://picsum.photos/id/20/600/400','aktif','2026-07-09 01:12:01','2026-07-10 00:03:08','Kuasai teknik wawancara beasiswa menggunakan metode STAR dan latih kesiapan mental Anda dalam simulasi interaktif.','<h3>Panduan Menjawab Wawancara Premium</h3><p>Gunakan format STAR (Situation, Task, Action, Result) untuk setiap jawaban perilaku Anda:</p><ul><li><strong>Situation:</strong> Berikan konteks masalah yang terjadi.</li><li><strong>Task:</strong> Apa tugas atau peran Anda dalam masalah tersebut.</li><li><strong>Action:</strong> Langkah nyata yang Anda ambil untuk menyelesaikannya.</li><li><strong>Result:</strong> Hasil kuantitatif positif yang dicapai.</li></ul>','materi-kelas/interview_star_method.pdf','https://zoom.us/j/1122334455','https://www.youtube.com/embed/dQw4w9WgXcQ','\"[{\\\"judul\\\":\\\"Modul 1: Bedah Pertanyaan Klasik & Jebakan\\\",\\\"materi\\\":\\\"Cara menjawab kelemahan diri dan rencana pasca studi.\\\"},{\\\"judul\\\":\\\"Modul 2: Simulasi Wawancara (Mock Interview)\\\",\\\"materi\\\":\\\"Uji coba wawancara langsung dengan juri awardee beasiswa.\\\"}]\"','Interview',4.78,NULL,NULL,'8 Jam',4,'{\"certificate\": true, \"video_hours\": 8, \"lifetime_access\": false, \"practice_questions\": true, \"downloadable_materials\": true}'),(4,'Mentorship Beasiswa MEXT Jepang','Bimbingan intensif persiapan mendaftar beasiswa Monbukagakusho (MEXT). Kelas ini mengupas tuntas berkas administratif, tips memilih universitas/LoA di Jepang, serta pembahasan soal ujian tulis (Matematika dan Bahasa Inggris).',199000.00,'https://picsum.photos/id/1062/600/400','aktif','2026-07-09 01:12:01','2026-07-10 00:03:08','Mentorship eksklusif membahas berkas pendaftaran MEXT Jepang dan bedah bank soal ujian tulis.','<h3>Materi Mentorship MEXT Jepang</h3><p>Selamat bergabung! Di kelas ini, Anda mendapatkan akses latihan soal eksklusif:</p><ul><li>Unduh bank soal matematika MEXT (2018-2023) di tab File Download.</li><li>Saksikan rekaman penjelasan ujian tulis dari alumni Kyoto University.</li></ul>','materi-kelas/mext_math_past_papers.pdf','https://zoom.us/j/5566778899','https://www.youtube.com/embed/dQw4w9WgXcQ','\"[{\\\"judul\\\":\\\"Sesi 1: Seleksi Dokumen & Pengisian Formulir\\\",\\\"materi\\\":\\\"Strategi menulis lembar rencana riset (Field of Study).\\\"},{\\\"judul\\\":\\\"Sesi 2: Pembahasan Ujian Matematika & Inggris\\\",\\\"materi\\\":\\\"Pembahasan trik menjawab soal-soal ujian tahun lalu.\\\"}]\"','Dokumen Pendaftaran',4.88,10,'2026-07-10 01:12:01','16 Jam',8,'{\"certificate\": true, \"video_hours\": 16, \"lifetime_access\": true, \"practice_questions\": true, \"downloadable_materials\": true}');
/*!40000 ALTER TABLE `kelas_premium` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_06_08_111254_create_beasiswa_table',1),(5,'2026_06_08_111259_create_kelas_premium_table',1),(6,'2026_06_08_111303_create_favorit_table',1),(7,'2026_06_08_111308_create_transaksi_table',1),(8,'2026_06_09_142400_add_exclusive_fields_to_kelas_premium_table',1),(9,'2026_06_09_143900_create_notifikasi_table',1),(10,'2026_06_10_000001_update_kelas_premium_table',1),(11,'2026_06_10_000002_create_wishlist_table',1),(12,'2026_06_10_000003_create_promo_codes_table',1),(13,'2026_06_10_000004_update_transaksi_table',1),(14,'2026_07_09_204000_change_tipe_in_notifikasi_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifikasi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifikasi_user_id_foreign` (`user_id`),
  CONSTRAINT `notifikasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifikasi`
--

LOCK TABLES `notifikasi` WRITE;
/*!40000 ALTER TABLE `notifikasi` DISABLE KEYS */;
INSERT INTO `notifikasi` VALUES (1,3,'🛒 Kelas Ditambahkan ke Keranjang','Kelas \"IELTS Preparation Bootcamp (Target 7.0+)\" telah berhasil ditambahkan ke keranjang belanja Anda.','transaksi','http://127.0.0.1:8000/kelas/keranjang',0,'2026-07-09 05:04:03','2026-07-09 05:04:03'),(2,3,'⏳ Pembayaran Sedang Diverifikasi','Pembayaran multi-kelas sebesar Rp 333.890 sedang diverifikasi admin.','transaksi','http://127.0.0.1:8000/riwayat-transaksi',0,'2026-07-09 05:18:01','2026-07-09 05:18:01'),(3,3,'🛒 Kelas Ditambahkan ke Keranjang','Kelas \"Mastering LPDP Essay Writing\" telah berhasil ditambahkan ke keranjang belanja Anda.','transaksi','http://127.0.0.1:8000/kelas/keranjang',0,'2026-07-09 05:31:17','2026-07-09 05:31:17'),(4,3,'⏳ Pembayaran Sedang Diverifikasi','Pembayaran multi-kelas sebesar Rp 168.500 sedang diverifikasi admin.','transaksi','http://127.0.0.1:8000/riwayat-transaksi',0,'2026-07-09 05:31:50','2026-07-09 05:31:50'),(5,3,'✅ Pembayaran Diverifikasi!','Pembayaran kelas Mastering LPDP Essay Writing telah dikonfirmasi. Kamu sekarang bisa mengakses materi.','transaksi','/kelas/1',0,'2026-07-09 06:22:46','2026-07-09 06:22:46'),(6,3,'✅ Pembayaran Diverifikasi!','Pembayaran kelas IELTS Preparation Bootcamp (Target 7.0+) telah dikonfirmasi. Kamu sekarang bisa mengakses materi.','transaksi','/kelas/2',0,'2026-07-09 06:22:57','2026-07-09 06:22:57'),(7,1,'👤 Pendaftaran Mahasiswa Baru','Pengguna baru bernama \"Fahmi Rizki Yuviyanto\" (fahmi.1783604942@example.com) telah mendaftar di platform.','sistem','http://127.0.0.1:8000/admin/pengguna',1,'2026-07-09 06:49:03','2026-07-09 06:51:42');
/*!40000 ALTER TABLE `notifikasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promo_codes`
--

DROP TABLE IF EXISTS `promo_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `promo_codes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('percent','nominal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(12,2) NOT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `promo_codes_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promo_codes`
--

LOCK TABLES `promo_codes` WRITE;
/*!40000 ALTER TABLE `promo_codes` DISABLE KEYS */;
INSERT INTO `promo_codes` VALUES (1,'PROMO10','percent',10.00,'2026-08-09 01:12:01','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01'),(2,'DAPAT50K','nominal',50000.00,'2026-08-09 01:12:01','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01'),(3,'FINDSHIP20','percent',20.00,'2026-08-09 01:12:01','aktif','2026-07-09 01:12:01','2026-07-09 01:12:01');
/*!40000 ALTER TABLE `promo_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('DtS7Xrp55DRIc1sQQMIj3HttNB7L1w8puDaUwynH',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJzRTZzdG9HN3EyQksyaER3NExEdzhMRmpEcVhVRlhvOWE2M1pvZ2F6IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC93b3JkcHJlc3NcL2FydGlrZWwiLCJyb3V0ZSI6ImFydGlrZWwuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW5cL3BlbmdndW5hIn19',1783652559);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaksi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `kelas_id` bigint unsigned NOT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('menunggu','berhasil','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `service_fee` decimal(12,2) NOT NULL DEFAULT '0.00',
  `tax_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `total_amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `transaksi_transaction_id_unique` (`transaction_id`),
  KEY `transaksi_user_id_foreign` (`user_id`),
  KEY `transaksi_kelas_id_foreign` (`kelas_id`),
  CONSTRAINT `transaksi_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas_premium` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transaksi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (1,3,2,'storage/bukti-bayar/ciKZECG5oFSYC5BJBrFHzQCOdbqlu4PILifbDcJi.jpg','berhasil','2026-07-09 05:18:01','2026-07-09 06:22:57','TX-20260709-MVO4GR','bank',0.00,2000.00,32890.00,333890.00),(2,3,1,'storage/bukti-bayar/u3UIfpS6PYrbVbxJnzFV8kXGuMa3csI7MKuK9txc.jpg','berhasil','2026-07-09 05:31:50','2026-07-09 06:22:46','TX-20260709-IHS91I','qris',0.00,2000.00,16500.00,168500.00);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('mahasiswa','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mahasiswa',
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipk` decimal(3,2) DEFAULT NULL,
  `asal_kampus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin FindShip','admin@findship.com',NULL,'$2y$12$Q0jdsHJs7AWp3YYs/Zvig.koemNppwd994Bbsv87SZCeo444nwELS','admin',NULL,NULL,NULL,'aktif',NULL,'2026-07-09 01:12:00','2026-07-09 01:12:00'),(2,'Budi Pratama','budi@findship.com',NULL,'$2y$12$LygOfyyTA6CZEXDAiA5Zo.lxCR.Iq7pzMYYmcr8bLipcPCQz3VMqm','mahasiswa','Teknik Informatika',3.45,'Universitas Indonesia','aktif',NULL,'2026-07-09 01:12:01','2026-07-09 01:12:01'),(3,'Siti Nurhaliza','siti@findship.com',NULL,'$2y$12$JjAkhg6WtBm6dROL8hkcDOR9x/Mbb8TIgavv1Fc5CQCA3fUb2Uo1K','mahasiswa','Sastra Inggris',3.75,'Universitas Gadjah Mada','aktif',NULL,'2026-07-09 01:12:01','2026-07-09 01:12:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `kelas_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlist_user_id_foreign` (`user_id`),
  KEY `wishlist_kelas_id_foreign` (`kelas_id`),
  CONSTRAINT `wishlist_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas_premium` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-10 14:10:46
