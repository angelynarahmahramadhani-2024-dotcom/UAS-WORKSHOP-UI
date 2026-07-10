- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: findship
-- ------------------------------------------------------
-- Server version	8.0.42
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beasiswa`
--

LOCK TABLES `beasiswa` WRITE;
/*!40000 ALTER TABLE `beasiswa` DISABLE KEYS */;
INSERT INTO `beasiswa` VALUES (1,'Beasiswa LPDP (Lembaga Pengelola Dana Pendidikan)','Kementerian Keuangan RI','luar negeri','S2','Semua Jurusan',3.25,'2026-07-25','Beasiswa penuh dari Pemerintah Indonesia untuk melanjutkan studi Magister (S2) dan Doktor (S3) di universitas terbaik dunia. Mencakup biaya kuliah penuh, tunjangan hidup bulanan, asuransi kesehatan, biaya visa, dan tiket pesawat PP.','https://lpdp.kemenkeu.go.id','aktif','2026-06-09 00:26:30','2026-06-09 00:26:30'),(2,'Beasiswa Unggulan Kemendikbudristek','Kementerian Pendidikan dan Kebudayaan RI','dalam negeri','S1','Semua Jurusan',3.00,'2026-08-15','Program beasiswa dari Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi untuk mendukung pendidikan tinggi di Indonesia bagi mahasiswa berprestasi. Mencakup biaya kuliah UKT, biaya hidup bulanan, dan bantuan biaya buku.','https://beasiswaunggulan.kemdikbud.go.id','aktif','2026-06-09 00:26:30','2026-06-09 00:26:30'),(3,'Djarum Beasiswa Plus','Djarum Foundation','dalam negeri','S1','Semua Jurusan',3.00,'2026-06-30','Beasiswa prestasi yang diberikan kepada mahasiswa S1 semester 4. Selain bantuan finansial sebesar Rp12.000.000 selama satu tahun, para Beswan Djarum juga mendapatkan pelatihan soft skills yang intensif seperti Character Building dan Leadership.','https://djarumbeasiswaplus.org','aktif','2026-06-09 00:26:30','2026-06-09 00:26:30'),(4,'Monbukagakusho (MEXT) Japan Scholarship','Pemerintah Jepang','luar negeri','S1','Teknik Informatika',3.20,'2026-09-10','Program beasiswa penuh dari Kementerian Pendidikan, Budaya, Olahraga, Sains, dan Teknologi Jepang (MEXT) untuk lulusan SMA/SMK/sederajat guna melanjutkan studi D3/S1 di Jepang. Bebas biaya kuliah, tunjangan bulanan, serta tiket pesawat kelas ekonomi PP.','https://www.id.emb-japan.go.jp/sch.html','aktif','2026-06-09 00:26:30','2026-06-09 00:26:30'),(5,'Chevening Scholarship UK','Pemerintah Britania Raya','luar negeri','S2','Politik',3.30,'2026-11-05','Beasiswa global Pemerintah Inggris yang didanai oleh Foreign, Commonwealth & Development Office (FCDO). Beasiswa ini diberikan kepada calon pemimpin masa depan untuk menempuh studi magister satu tahun di universitas-universitas ternama Inggris.','https://www.chevening.org/scholarship/indonesia/','aktif','2026-06-09 00:26:30','2026-06-09 00:26:30'),(6,'Beasiswa KIP Kuliah (Kartu Indonesia Pintar)','Pemerintah RI','dalam negeri','S1','Semua Jurusan',2.50,'2026-08-31','Program bantuan biaya pendidikan dari Pemerintah RI untuk lulusan SMA atau sederajat yang memiliki potensi akademik baik tetapi memiliki keterbatasan ekonomi. Memberikan pembebasan biaya kuliah dan bantuan biaya hidup bulanan.','https://kip-kuliah.kemdikbud.go.id','aktif','2026-06-09 00:26:30','2026-06-09 00:26:30'),(7,'KAIST International Student Scholarship','KAIST (Korea Advanced Institute of Science & Technology)','luar negeri','S1','Teknik',3.00,'2026-08-05','Beasiswa penuh dari salah satu universitas sains dan teknologi terkemuka di Korea Selatan. Beasiswa mencakup pembebasan biaya kuliah 100% untuk 8 semester, tunjangan hidup KRW 350.000 per bulan, dan asuransi kesehatan nasional Korea.','https://admission.kaist.ac.kr','aktif','2026-06-09 00:26:31','2026-06-09 00:26:31'),(8,'Erasmus Mundus Joint Master (EMJM)','Uni Eropa','luar negeri','S2','Semua Jurusan',3.40,'2026-10-30','Program beasiswa prestigius yang didanai oleh Uni Eropa. Mahasiswa terpilih akan belajar di minimal dua negara Eropa yang berbeda dan mendapatkan gelar ganda (joint/multiple degree) setelah lulus. Mencakup seluruh biaya kuliah dan biaya perjalanan.','https://ec.europa.eu/programmes/erasmus-plus/opportunities/individuals/students/erasmus-mundus-joint-master-degrees_en','aktif','2026-06-09 00:26:31','2026-06-09 00:26:31'),(9,'Beasiswa Unggulan 2026-2027','Kemendikbud','dalam negeri','D4','Semua Jurusan',3.50,'2026-06-11','Beasiswa Unggulan adalah program bantuan biaya pendidikan dari pemerintah Indonesia melalui Pusat Layanan Pembiayaan Pendidikan (Puslapdik) Kementerian Pendidikan Dasar dan Menengah (Kemendikdasmen). Beasiswa ini ditujukan bagi masyarakat berprestasi serta pegawai kementerian untuk melanjutkan studi jenjang Diploma IV/Sarjana (S1), Magister (S2), dan Doktor (S3) di dalam atau luar negeri.Program Beasiswa Unggulan secara umum dibagi menjadi beberapa kategori, yaitu:Masyarakat Berprestasi: Diperuntukkan bagi individu yang memiliki kemampuan intelektual, emosional, dan spiritual untuk melanjutkan pendidikan di perguruan tinggi.Penyandang Disabilitas: Ditujukan khusus bagi penyandang disabilitas (fisik, intelektual, mental, atau sensorik) yang ingin melanjutkan pendidikan pada jenjang magister dan doktor di perguruan tinggi dalam negeri.Pegawai Kemendikdasmen: Diberikan bagi Pegawai Negeri Sipil (PNS) di lingkungan kementerian terkait untuk meningkatkan kompetensi dan kualifikasi pendidikannya.Komponen Beasiswa yang DiberikanPenerima beasiswa (awardee) akan mendapatkan bantuan yang meliputi:Biaya Pendidikan: Pembayaran Uang Kuliah Tunggal (UKT) / tuition fee penuh hingga lulus.Biaya Hidup: Bantuan dana untuk mendukung kebutuhan sehari-hari.Biaya Buku: Bantuan dana penunjang pembelian buku (khusus skema tertentu).Persyaratan UmumUntuk dapat mendaftar Beasiswa Unggulan Masyarakat Berprestasi, terdapat beberapa syarat pokok yang harus dipenuhi:Merupakan Warga Negara Indonesia (WNI).Telah diterima atau memiliki surat tanda diterima (LoA) di perguruan tinggi dengan akreditasi institusi dan program studi minimal B/Baik Sekali (untuk kampus dalam negeri) atau yang diakui pemerintah (untuk kampus luar negeri).Memiliki prestasi akademik maupun non-akademik tingkat nasional atau internasional.Tidak sedang menerima beasiswa dari sumber lain (APBN/APBD) yang sejenis.Pendaftaran dan pengiriman berkas dilakukan secara daring melalui Portal Resmi Beasiswa Unggulan. Anda dapat memantau jadwal pendaftaran yang biasanya dibuka pada pertengahan tahun.','https://beasiswaunggulan.kemendikdasmen.go.id/','aktif','2026-06-09 00:48:12','2026-06-09 00:48:12');
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
INSERT INTO `cache` VALUES ('laravel-cache-wordpress_posts_page_1_limit_10','a:6:{i:0;a:26:{s:2:\"id\";i:15;s:4:\"date\";s:19:\"2026-07-01T06:46:11\";s:8:\"date_gmt\";s:19:\"2026-07-01T06:46:11\";s:4:\"guid\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"modified\";s:19:\"2026-07-01T06:46:11\";s:12:\"modified_gmt\";s:19:\"2026-07-01T06:46:11\";s:4:\"slug\";s:60:\"dokumen-penting-yang-harus-disiapkan-sebelum-daftar-beasiswa\";s:6:\"status\";s:7:\"publish\";s:4:\"type\";s:4:\"post\";s:4:\"link\";s:92:\"http://wordpress-findship.test/dokumen-penting-yang-harus-disiapkan-sebelum-daftar-beasiswa/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:60:\"Dokumen Penting yang Harus Disiapkan Sebelum Daftar Beasiswa\";}s:7:\"content\";a:2:{s:8:\"rendered\";s:1788:\"<h2>Checklist Dokumen Beasiswa yang Wajib Disiapkan</h2>\n<p>Salah satu alasan terbesar gagalnya pendaftaran beasiswa bukan karena kurang pintar, tapi karena dokumen yang tidak lengkap atau tidak sesuai syarat. Berikut panduan lengkap dokumen yang harus kamu siapkan.</p>\n<h2>Dokumen Akademik</h2>\n<ul>\n<li><strong>Ijazah dan Transkrip Nilai</strong> &#8211; Legalisir dan terjemahan tersumpah (untuk beasiswa luar negeri)</li>\n<li><strong>Sertifikat Bahasa</strong> &#8211; TOEFL/IELTS untuk beasiswa luar negeri, atau UKBI untuk beberapa beasiswa dalam negeri</li>\n<li><strong>Surat Keterangan Lulus</strong> &#8211; Jika belum wisuda saat mendaftar</li>\n</ul>\n<h2>Dokumen Pribadi</h2>\n<ul>\n<li><strong>KTP dan Kartu Keluarga</strong> &#8211; Fotokopi yang masih berlaku</li>\n<li><strong>Paspor</strong> &#8211; Pastikan masa berlaku minimal 2 tahun untuk beasiswa luar negeri</li>\n<li><strong>Foto Terbaru</strong> &#8211; Biasanya format formal dengan latar belakang tertentu</li>\n</ul>\n<h2>Dokumen Pendukung</h2>\n<ul>\n<li><strong>Curriculum Vitae (CV)</strong> &#8211; Maksimal 2 halaman, format ATS-friendly</li>\n<li><strong>Motivation Letter</strong> &#8211; Disesuaikan untuk setiap beasiswa</li>\n<li><strong>Surat Rekomendasi</strong> &#8211; Dari dosen, atasan, atau tokoh terkemuka</li>\n<li><strong>Personal Statement</strong> &#8211; Beberapa beasiswa meminta ini terpisah dari motivation letter</li>\n<li><strong>Research Proposal</strong> &#8211; Khusus untuk S3 atau beasiswa riset</li>\n</ul>\n<h2>Tips Mengelola Dokumen</h2>\n<p>Buat folder digital terorganisir untuk setiap beasiswa yang kamu lamar. Simpan dalam format PDF dan backup di cloud storage. Selalu cek deadline pengumpulan dokumen!</p>\n<p>Mulai cari beasiswa yang sesuai dengan profilmu di FindShip sekarang!</p>\n\";s:9:\"protected\";b:0;}s:7:\"excerpt\";a:2:{s:8:\"rendered\";s:163:\"<p>Jangan sampai gagal karena dokumen tidak lengkap! Simak checklist lengkap dokumen yang wajib disiapkan sebelum mendaftar beasiswa dalam maupun luar negeri.</p>\n\";s:9:\"protected\";b:0;}s:6:\"author\";i:1;s:14:\"featured_media\";i:21;s:14:\"comment_status\";s:4:\"open\";s:11:\"ping_status\";s:4:\"open\";s:6:\"sticky\";b:0;s:8:\"template\";s:0:\"\";s:6:\"format\";s:8:\"standard\";s:4:\"meta\";a:1:{s:9:\"footnotes\";s:0:\"\";}s:10:\"categories\";a:0:{}s:4:\"tags\";a:0:{}s:10:\"class_list\";a:7:{i:0;s:7:\"post-15\";i:1;s:4:\"post\";i:2;s:9:\"type-post\";i:3;s:14:\"status-publish\";i:4;s:15:\"format-standard\";i:5;s:18:\"has-post-thumbnail\";i:6;s:6:\"hentry\";}s:6:\"_links\";a:10:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/posts/15\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/posts\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:55:\"http://wordpress-findship.test/wp-json/wp/v2/types/post\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=15\";}}s:15:\"version-history\";a:1:{i:0;a:2:{s:5:\"count\";i:0;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/posts/15/revisions\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/21\";}}s:13:\"wp:attachment\";a:1:{i:0;a:1:{s:4:\"href\";s:60:\"http://wordpress-findship.test/wp-json/wp/v2/media?parent=15\";}}s:7:\"wp:term\";a:2:{i:0;a:3:{s:8:\"taxonomy\";s:8:\"category\";s:10:\"embeddable\";b:1;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/categories?post=15\";}i:1;a:3:{s:8:\"taxonomy\";s:8:\"post_tag\";s:10:\"embeddable\";b:1;s:4:\"href\";s:57:\"http://wordpress-findship.test/wp-json/wp/v2/tags?post=15\";}}s:6:\"curies\";a:1:{i:0;a:3:{s:4:\"name\";s:2:\"wp\";s:4:\"href\";s:23:\"https://api.w.org/{rel}\";s:9:\"templated\";b:1;}}}s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:8:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"Admin\";s:3:\"url\";s:21:\"http://localhost:8000\";s:11:\"description\";s:0:\"\";s:4:\"link\";s:44:\"http://wordpress-findship.test/author/admin/\";s:4:\"slug\";s:5:\"admin\";s:11:\"avatar_urls\";a:3:{i:24;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=24&d=mm&r=g\";i:48;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=48&d=mm&r=g\";i:96;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=96&d=mm&r=g\";}s:6:\"_links\";a:2:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/users\";}}}}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:15:{s:2:\"id\";i:21;s:4:\"date\";s:19:\"2026-07-01T07:05:47\";s:4:\"slug\";s:16:\"dokumen-beasiswa\";s:4:\"type\";s:10:\"attachment\";s:4:\"link\";s:48:\"http://wordpress-findship.test/dokumen-beasiswa/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:16:\"dokumen-beasiswa\";}s:6:\"author\";i:1;s:14:\"featured_media\";i:0;s:7:\"caption\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"alt_text\";s:0:\"\";s:10:\"media_type\";s:5:\"image\";s:9:\"mime_type\";s:10:\"image/jpeg\";s:13:\"media_details\";a:0:{}s:10:\"source_url\";s:78:\"http://wordpress-findship.test/wp-content/uploads/2026/07/dokumen-beasiswa.jpg\";s:6:\"_links\";a:5:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/21\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/media\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/types/attachment\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=21\";}}}}}}}i:1;a:26:{s:2:\"id\";i:14;s:4:\"date\";s:19:\"2026-07-01T06:45:14\";s:8:\"date_gmt\";s:19:\"2026-07-01T06:45:14\";s:4:\"guid\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"modified\";s:19:\"2026-07-01T06:45:14\";s:12:\"modified_gmt\";s:19:\"2026-07-01T06:45:14\";s:4:\"slug\";s:75:\"cara-persiapkan-wawancara-beasiswa-agar-tidak-gugup-dan-tampil-percaya-diri\";s:6:\"status\";s:7:\"publish\";s:4:\"type\";s:4:\"post\";s:4:\"link\";s:107:\"http://wordpress-findship.test/cara-persiapkan-wawancara-beasiswa-agar-tidak-gugup-dan-tampil-percaya-diri/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:75:\"Cara Persiapkan Wawancara Beasiswa agar Tidak Gugup dan Tampil Percaya Diri\";}s:7:\"content\";a:2:{s:8:\"rendered\";s:1693:\"<h2>Menghadapi Wawancara Beasiswa dengan Percaya Diri</h2>\n<p>Wawancara beasiswa seringkali menjadi tahap yang paling ditakuti. Namun dengan persiapan yang tepat, kamu bisa tampil maksimal dan meyakinkan para interviewer.</p>\n<h2>Pertanyaan Umum dalam Wawancara Beasiswa</h2>\n<h3>1. Ceritakan tentang diri kamu</h3>\n<p>Siapkan perkenalan singkat 2-3 menit yang mencakup latar belakang, pencapaian, dan motivasi melamar beasiswa ini. Latihan hingga terasa natural.</p>\n<h3>2. Mengapa kamu layak mendapat beasiswa ini?</h3>\n<p>Jawab dengan spesifik. Sebutkan pencapaian akademik, kontribusi sosial, dan rencana masa depan yang selaras dengan tujuan pemberi beasiswa.</p>\n<h3>3. Apa rencana kamu setelah lulus?</h3>\n<p>Tunjukkan bahwa kamu sudah punya rencana yang matang dan realistis. Pemberi beasiswa ingin memastikan investasi mereka memberikan dampak nyata.</p>\n<h3>4. Apa kelemahan terbesar kamu?</h3>\n<p>Jawab dengan jujur namun sertakan langkah konkret yang kamu lakukan untuk memperbaiki kelemahan tersebut.</p>\n<h2>Tips Sukses Wawancara</h2>\n<ul>\n<li><strong>Riset mendalam</strong> tentang pemberi beasiswa dan programnya</li>\n<li><strong>Latihan mock interview</strong> dengan teman atau mentor</li>\n<li><strong>Berpakaian profesional</strong> dan datang tepat waktu</li>\n<li><strong>Bawa dokumen cadangan</strong> untuk referensi jika diperlukan</li>\n<li><strong>Jaga kontak mata</strong> dan bahasa tubuh yang positif</li>\n</ul>\n<h2>Hari H Wawancara</h2>\n<p>Tidur cukup malam sebelumnya, sarapan, dan tiba 15 menit lebih awal. Tarik napas dalam-dalam dan ingat bahwa para interviewer ingin kamu berhasil.</p>\n<p>Temukan beasiswa impianmu dan persiapkan dirimu bersama FindShip!</p>\n\";s:9:\"protected\";b:0;}s:7:\"excerpt\";a:2:{s:8:\"rendered\";s:161:\"<p>Wawancara beasiswa adalah tahap yang paling menegangkan. Pelajari teknik persiapan, pertanyaan yang sering muncul, dan cara menjawab dengan percaya diri.</p>\n\";s:9:\"protected\";b:0;}s:6:\"author\";i:1;s:14:\"featured_media\";i:20;s:14:\"comment_status\";s:4:\"open\";s:11:\"ping_status\";s:4:\"open\";s:6:\"sticky\";b:0;s:8:\"template\";s:0:\"\";s:6:\"format\";s:8:\"standard\";s:4:\"meta\";a:1:{s:9:\"footnotes\";s:0:\"\";}s:10:\"categories\";a:0:{}s:4:\"tags\";a:0:{}s:10:\"class_list\";a:7:{i:0;s:7:\"post-14\";i:1;s:4:\"post\";i:2;s:9:\"type-post\";i:3;s:14:\"status-publish\";i:4;s:15:\"format-standard\";i:5;s:18:\"has-post-thumbnail\";i:6;s:6:\"hentry\";}s:6:\"_links\";a:10:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/posts/14\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/posts\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:55:\"http://wordpress-findship.test/wp-json/wp/v2/types/post\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=14\";}}s:15:\"version-history\";a:1:{i:0;a:2:{s:5:\"count\";i:0;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/posts/14/revisions\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/20\";}}s:13:\"wp:attachment\";a:1:{i:0;a:1:{s:4:\"href\";s:60:\"http://wordpress-findship.test/wp-json/wp/v2/media?parent=14\";}}s:7:\"wp:term\";a:2:{i:0;a:3:{s:8:\"taxonomy\";s:8:\"category\";s:10:\"embeddable\";b:1;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/categories?post=14\";}i:1;a:3:{s:8:\"taxonomy\";s:8:\"post_tag\";s:10:\"embeddable\";b:1;s:4:\"href\";s:57:\"http://wordpress-findship.test/wp-json/wp/v2/tags?post=14\";}}s:6:\"curies\";a:1:{i:0;a:3:{s:4:\"name\";s:2:\"wp\";s:4:\"href\";s:23:\"https://api.w.org/{rel}\";s:9:\"templated\";b:1;}}}s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:8:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"Admin\";s:3:\"url\";s:21:\"http://localhost:8000\";s:11:\"description\";s:0:\"\";s:4:\"link\";s:44:\"http://wordpress-findship.test/author/admin/\";s:4:\"slug\";s:5:\"admin\";s:11:\"avatar_urls\";a:3:{i:24;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=24&d=mm&r=g\";i:48;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=48&d=mm&r=g\";i:96;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=96&d=mm&r=g\";}s:6:\"_links\";a:2:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/users\";}}}}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:15:{s:2:\"id\";i:20;s:4:\"date\";s:19:\"2026-07-01T07:05:47\";s:4:\"slug\";s:18:\"wawancara-beasiswa\";s:4:\"type\";s:10:\"attachment\";s:4:\"link\";s:50:\"http://wordpress-findship.test/wawancara-beasiswa/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:18:\"wawancara-beasiswa\";}s:6:\"author\";i:1;s:14:\"featured_media\";i:0;s:7:\"caption\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"alt_text\";s:0:\"\";s:10:\"media_type\";s:5:\"image\";s:9:\"mime_type\";s:10:\"image/jpeg\";s:13:\"media_details\";a:0:{}s:10:\"source_url\";s:80:\"http://wordpress-findship.test/wp-content/uploads/2026/07/wawancara-beasiswa.jpg\";s:6:\"_links\";a:5:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/20\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/media\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/types/attachment\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=20\";}}}}}}}i:2;a:26:{s:2:\"id\";i:13;s:4:\"date\";s:19:\"2026-07-01T06:44:51\";s:8:\"date_gmt\";s:19:\"2026-07-01T06:44:51\";s:4:\"guid\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"modified\";s:19:\"2026-07-01T06:44:51\";s:12:\"modified_gmt\";s:19:\"2026-07-01T06:44:51\";s:4:\"slug\";s:54:\"10-beasiswa-luar-negeri-fully-funded-yang-buka-di-2026\";s:6:\"status\";s:7:\"publish\";s:4:\"type\";s:4:\"post\";s:4:\"link\";s:86:\"http://wordpress-findship.test/10-beasiswa-luar-negeri-fully-funded-yang-buka-di-2026/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:54:\"10 Beasiswa Luar Negeri Fully Funded yang Buka di 2026\";}s:7:\"content\";a:2:{s:8:\"rendered\";s:1925:\"<h2>Beasiswa Fully Funded Terbaik 2026</h2>\n<p>Mendapatkan beasiswa fully funded adalah impian banyak pelajar Indonesia. Berikut adalah 10 beasiswa internasional terbaik yang wajib kamu coba di tahun 2026.</p>\n<h3>1. Beasiswa Chevening (Inggris)</h3>\n<p>Beasiswa bergengsi dari pemerintah Inggris untuk jenjang S2. Mencakup biaya kuliah penuh, biaya hidup, dan tiket pesawat. Deadline biasanya Oktober-November.</p>\n<h3>2. DAAD Scholarship (Jerman)</h3>\n<p>Beasiswa dari pemerintah Jerman untuk S2 dan S3. Tersedia dalam bahasa Inggris maupun Jerman. Sangat cocok untuk bidang teknik dan sains.</p>\n<h3>3. Australia Awards</h3>\n<p>Beasiswa dari pemerintah Australia yang sangat populer di kalangan mahasiswa Indonesia. Mencakup semua jenjang dengan fasilitas lengkap.</p>\n<h3>4. MEXT Scholarship (Jepang)</h3>\n<p>Beasiswa dari pemerintah Jepang untuk S1, S2, dan S3. Memberikan kesempatan belajar sambil mengenal budaya Jepang.</p>\n<h3>5. Erasmus Mundus (Eropa)</h3>\n<p>Program beasiswa dari Uni Eropa yang memungkinkan kamu belajar di beberapa universitas berbeda di Eropa dalam satu program.</p>\n<h3>6. Fulbright (Amerika Serikat)</h3>\n<p>Beasiswa dari pemerintah AS untuk S2 dan S3. Salah satu beasiswa paling kompetitif namun paling bergengsi di dunia.</p>\n<h3>7. New Zealand ASEAN Scholar Award</h3>\n<p>Beasiswa dari pemerintah Selandia Baru khusus untuk negara ASEAN termasuk Indonesia.</p>\n<h3>8. Beasiswa Turki (YTB)</h3>\n<p>Beasiswa dari pemerintah Turki untuk semua jenjang dengan fasilitas lengkap termasuk kursus bahasa Turki gratis.</p>\n<h3>9. Korean Government Scholarship (KGSP)</h3>\n<p>Beasiswa dari pemerintah Korea Selatan untuk S1, S2, dan S3 dengan fasilitas yang sangat lengkap.</p>\n<h3>10. Beasiswa LPDP</h3>\n<p>Beasiswa terbesar dari pemerintah Indonesia untuk studi di dalam dan luar negeri. Terbuka untuk semua bidang studi.</p>\n<p>Cari informasi lengkap semua beasiswa ini di platform FindShip!</p>\n\";s:9:\"protected\";b:0;}s:7:\"excerpt\";a:2:{s:8:\"rendered\";s:161:\"<p>Daftar beasiswa fully funded paling bergengsi di dunia yang masih membuka pendaftaran di tahun 2026. Mulai dari Chevening, DAAD, hingga Australia Awards.</p>\n\";s:9:\"protected\";b:0;}s:6:\"author\";i:1;s:14:\"featured_media\";i:19;s:14:\"comment_status\";s:4:\"open\";s:11:\"ping_status\";s:4:\"open\";s:6:\"sticky\";b:0;s:8:\"template\";s:0:\"\";s:6:\"format\";s:8:\"standard\";s:4:\"meta\";a:1:{s:9:\"footnotes\";s:0:\"\";}s:10:\"categories\";a:0:{}s:4:\"tags\";a:0:{}s:10:\"class_list\";a:7:{i:0;s:7:\"post-13\";i:1;s:4:\"post\";i:2;s:9:\"type-post\";i:3;s:14:\"status-publish\";i:4;s:15:\"format-standard\";i:5;s:18:\"has-post-thumbnail\";i:6;s:6:\"hentry\";}s:6:\"_links\";a:10:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/posts/13\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/posts\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:55:\"http://wordpress-findship.test/wp-json/wp/v2/types/post\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=13\";}}s:15:\"version-history\";a:1:{i:0;a:2:{s:5:\"count\";i:0;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/posts/13/revisions\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/19\";}}s:13:\"wp:attachment\";a:1:{i:0;a:1:{s:4:\"href\";s:60:\"http://wordpress-findship.test/wp-json/wp/v2/media?parent=13\";}}s:7:\"wp:term\";a:2:{i:0;a:3:{s:8:\"taxonomy\";s:8:\"category\";s:10:\"embeddable\";b:1;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/categories?post=13\";}i:1;a:3:{s:8:\"taxonomy\";s:8:\"post_tag\";s:10:\"embeddable\";b:1;s:4:\"href\";s:57:\"http://wordpress-findship.test/wp-json/wp/v2/tags?post=13\";}}s:6:\"curies\";a:1:{i:0;a:3:{s:4:\"name\";s:2:\"wp\";s:4:\"href\";s:23:\"https://api.w.org/{rel}\";s:9:\"templated\";b:1;}}}s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:8:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"Admin\";s:3:\"url\";s:21:\"http://localhost:8000\";s:11:\"description\";s:0:\"\";s:4:\"link\";s:44:\"http://wordpress-findship.test/author/admin/\";s:4:\"slug\";s:5:\"admin\";s:11:\"avatar_urls\";a:3:{i:24;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=24&d=mm&r=g\";i:48;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=48&d=mm&r=g\";i:96;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=96&d=mm&r=g\";}s:6:\"_links\";a:2:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/users\";}}}}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:15:{s:2:\"id\";i:19;s:4:\"date\";s:19:\"2026-07-01T07:05:47\";s:4:\"slug\";s:20:\"beasiswa-luar-negeri\";s:4:\"type\";s:10:\"attachment\";s:4:\"link\";s:52:\"http://wordpress-findship.test/beasiswa-luar-negeri/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:20:\"beasiswa-luar-negeri\";}s:6:\"author\";i:1;s:14:\"featured_media\";i:0;s:7:\"caption\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"alt_text\";s:0:\"\";s:10:\"media_type\";s:5:\"image\";s:9:\"mime_type\";s:10:\"image/jpeg\";s:13:\"media_details\";a:0:{}s:10:\"source_url\";s:82:\"http://wordpress-findship.test/wp-content/uploads/2026/07/beasiswa-luar-negeri.jpg\";s:6:\"_links\";a:5:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/19\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/media\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/types/attachment\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=19\";}}}}}}}i:3;a:26:{s:2:\"id\";i:12;s:4:\"date\";s:19:\"2026-07-01T06:44:30\";s:8:\"date_gmt\";s:19:\"2026-07-01T06:44:30\";s:4:\"guid\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"modified\";s:19:\"2026-07-01T06:44:30\";s:12:\"modified_gmt\";s:19:\"2026-07-01T06:44:30\";s:4:\"slug\";s:63:\"panduan-lengkap-menulis-motivation-letter-beasiswa-yang-memukau\";s:6:\"status\";s:7:\"publish\";s:4:\"type\";s:4:\"post\";s:4:\"link\";s:95:\"http://wordpress-findship.test/panduan-lengkap-menulis-motivation-letter-beasiswa-yang-memukau/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:63:\"Panduan Lengkap Menulis Motivation Letter Beasiswa yang Memukau\";}s:7:\"content\";a:2:{s:8:\"rendered\";s:1531:\"<h2>Mengapa Motivation Letter Sangat Penting?</h2>\n<p>Motivation letter atau surat motivasi adalah kesempatanmu untuk berbicara langsung kepada komite seleksi beasiswa. Dokumen ini menentukan apakah kamu layak dipanggil ke tahap berikutnya.</p>\n<h2>Struktur Motivation Letter yang Ideal</h2>\n<h3>1. Pembuka yang Kuat</h3>\n<p>Mulai dengan kalimat yang langsung menarik perhatian. Hindari pembuka klise seperti &#8216;Saya menulis surat ini untuk&#8230;&#8217; Gantikan dengan pengalaman atau fakta yang relevan.</p>\n<h3>2. Latar Belakang Akademik dan Profesional</h3>\n<p>Ceritakan perjalanan akademikmu secara ringkas namun berkesan. Fokus pada pencapaian yang relevan dengan program yang kamu lamar.</p>\n<h3>3. Alasan Memilih Program Ini</h3>\n<p>Tunjukkan bahwa kamu sudah melakukan riset mendalam tentang program tersebut. Sebutkan nama profesor, mata kuliah, atau riset yang menarik minatmu.</p>\n<h3>4. Rencana Kontribusi Pasca Studi</h3>\n<p>Jelaskan bagaimana ilmu yang kamu peroleh akan diaplikasikan untuk memberikan dampak positif, terutama bagi Indonesia.</p>\n<h3>5. Penutup yang Berkesan</h3>\n<p>Tutup dengan pernyataan keyakinan diri dan ucapan terima kasih yang tulus. Tunjukkan antusiasme yang genuine.</p>\n<h2>Tips Tambahan</h2>\n<ul>\n<li>Tulis dalam bahasa yang diminta (Indonesia atau Inggris)</li>\n<li>Panjang ideal: 500-800 kata</li>\n<li>Minta orang lain untuk proofread</li>\n<li>Sesuaikan untuk setiap beasiswa yang kamu lamar</li>\n</ul>\n<p>Temukan beasiswa yang cocok untuk kamu di FindShip dan raih impianmu!</p>\n\";s:9:\"protected\";b:0;}s:7:\"excerpt\";a:2:{s:8:\"rendered\";s:168:\"<p>Motivation letter adalah kunci utama seleksi beasiswa. Pelajari struktur, tips penulisan, dan contoh kalimat pembuka yang kuat untuk menarik perhatian reviewer.</p>\n\";s:9:\"protected\";b:0;}s:6:\"author\";i:1;s:14:\"featured_media\";i:18;s:14:\"comment_status\";s:4:\"open\";s:11:\"ping_status\";s:4:\"open\";s:6:\"sticky\";b:0;s:8:\"template\";s:0:\"\";s:6:\"format\";s:8:\"standard\";s:4:\"meta\";a:1:{s:9:\"footnotes\";s:0:\"\";}s:10:\"categories\";a:0:{}s:4:\"tags\";a:0:{}s:10:\"class_list\";a:7:{i:0;s:7:\"post-12\";i:1;s:4:\"post\";i:2;s:9:\"type-post\";i:3;s:14:\"status-publish\";i:4;s:15:\"format-standard\";i:5;s:18:\"has-post-thumbnail\";i:6;s:6:\"hentry\";}s:6:\"_links\";a:10:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/posts/12\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/posts\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:55:\"http://wordpress-findship.test/wp-json/wp/v2/types/post\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=12\";}}s:15:\"version-history\";a:1:{i:0;a:2:{s:5:\"count\";i:0;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/posts/12/revisions\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/18\";}}s:13:\"wp:attachment\";a:1:{i:0;a:1:{s:4:\"href\";s:60:\"http://wordpress-findship.test/wp-json/wp/v2/media?parent=12\";}}s:7:\"wp:term\";a:2:{i:0;a:3:{s:8:\"taxonomy\";s:8:\"category\";s:10:\"embeddable\";b:1;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/categories?post=12\";}i:1;a:3:{s:8:\"taxonomy\";s:8:\"post_tag\";s:10:\"embeddable\";b:1;s:4:\"href\";s:57:\"http://wordpress-findship.test/wp-json/wp/v2/tags?post=12\";}}s:6:\"curies\";a:1:{i:0;a:3:{s:4:\"name\";s:2:\"wp\";s:4:\"href\";s:23:\"https://api.w.org/{rel}\";s:9:\"templated\";b:1;}}}s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:8:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"Admin\";s:3:\"url\";s:21:\"http://localhost:8000\";s:11:\"description\";s:0:\"\";s:4:\"link\";s:44:\"http://wordpress-findship.test/author/admin/\";s:4:\"slug\";s:5:\"admin\";s:11:\"avatar_urls\";a:3:{i:24;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=24&d=mm&r=g\";i:48;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=48&d=mm&r=g\";i:96;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=96&d=mm&r=g\";}s:6:\"_links\";a:2:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/users\";}}}}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:15:{s:2:\"id\";i:18;s:4:\"date\";s:19:\"2026-07-01T07:05:47\";s:4:\"slug\";s:17:\"motivation-letter\";s:4:\"type\";s:10:\"attachment\";s:4:\"link\";s:49:\"http://wordpress-findship.test/motivation-letter/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:17:\"motivation-letter\";}s:6:\"author\";i:1;s:14:\"featured_media\";i:0;s:7:\"caption\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"alt_text\";s:0:\"\";s:10:\"media_type\";s:5:\"image\";s:9:\"mime_type\";s:10:\"image/jpeg\";s:13:\"media_details\";a:0:{}s:10:\"source_url\";s:79:\"http://wordpress-findship.test/wp-content/uploads/2026/07/motivation-letter.jpg\";s:6:\"_links\";a:5:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/18\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/media\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/types/attachment\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=18\";}}}}}}}i:4;a:26:{s:2:\"id\";i:11;s:4:\"date\";s:19:\"2026-07-01T06:44:03\";s:8:\"date_gmt\";s:19:\"2026-07-01T06:44:03\";s:4:\"guid\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"modified\";s:19:\"2026-07-01T06:44:03\";s:12:\"modified_gmt\";s:19:\"2026-07-01T06:44:03\";s:4:\"slug\";s:45:\"5-tips-ampuh-lolos-seleksi-beasiswa-lpdp-2026\";s:6:\"status\";s:7:\"publish\";s:4:\"type\";s:4:\"post\";s:4:\"link\";s:77:\"http://wordpress-findship.test/5-tips-ampuh-lolos-seleksi-beasiswa-lpdp-2026/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:45:\"5 Tips Ampuh Lolos Seleksi Beasiswa LPDP 2026\";}s:7:\"content\";a:2:{s:8:\"rendered\";s:1402:\"<h2>Apa Itu Beasiswa LPDP?</h2>\n<p>Beasiswa LPDP (Lembaga Pengelola Dana Pendidikan) adalah beasiswa bergengsi dari pemerintah Indonesia yang mendanai pendidikan pascasarjana di dalam dan luar negeri. Ribuan pelamar bersaing setiap tahunnya untuk mendapatkan kesempatan emas ini.</p>\n<h2>5 Tips Lolos Beasiswa LPDP</h2>\n<h3>1. Pahami Visi dan Misi LPDP</h3>\n<p>LPDP mencari calon pemimpin masa depan yang berkomitmen kembali ke Indonesia. Tunjukkan dalam esai kamu bagaimana rencana studimu berkontribusi untuk kemajuan bangsa.</p>\n<h3>2. Tulis Esai yang Personal dan Spesifik</h3>\n<p>Hindari esai yang generik. Ceritakan pengalaman nyata yang membentuk motivasimu, dan hubungkan dengan rencana kontribusi yang konkret setelah lulus.</p>\n<h3>3. Persiapkan Dokumen dengan Teliti</h3>\n<p>Pastikan semua dokumen lengkap: ijazah, transkrip nilai, surat rekomendasi, dan sertifikat bahasa. Periksa ulang sebelum submit.</p>\n<h3>4. Latihan Wawancara Intensif</h3>\n<p>Wawancara LPDP menguji komitmen dan visi kamu. Latihan dengan teman atau mentor, dan siapkan jawaban untuk pertanyaan tentang rencana studi dan kontribusi pasca-lulus.</p>\n<h3>5. Aktif di Kegiatan Sosial dan Kepemimpinan</h3>\n<p>LPDP sangat menghargai rekam jejak kepemimpinan dan kontribusi sosial. Dokumentasikan semua pengalamanmu dengan baik.</p>\n<p>Daftarkan diri kamu sekarang dan temukan beasiswa yang tepat di platform FindShip!</p>\n\";s:9:\"protected\";b:0;}s:7:\"excerpt\";a:2:{s:8:\"rendered\";s:149:\"<p>Ingin lolos beasiswa LPDP? Pelajari 5 strategi jitu yang digunakan para awardee sukses, mulai dari penulisan esai hingga persiapan wawancara.</p>\n\";s:9:\"protected\";b:0;}s:6:\"author\";i:1;s:14:\"featured_media\";i:17;s:14:\"comment_status\";s:4:\"open\";s:11:\"ping_status\";s:4:\"open\";s:6:\"sticky\";b:0;s:8:\"template\";s:0:\"\";s:6:\"format\";s:8:\"standard\";s:4:\"meta\";a:1:{s:9:\"footnotes\";s:0:\"\";}s:10:\"categories\";a:0:{}s:4:\"tags\";a:0:{}s:10:\"class_list\";a:7:{i:0;s:7:\"post-11\";i:1;s:4:\"post\";i:2;s:9:\"type-post\";i:3;s:14:\"status-publish\";i:4;s:15:\"format-standard\";i:5;s:18:\"has-post-thumbnail\";i:6;s:6:\"hentry\";}s:6:\"_links\";a:10:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/posts/11\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/posts\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:55:\"http://wordpress-findship.test/wp-json/wp/v2/types/post\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=11\";}}s:15:\"version-history\";a:1:{i:0;a:2:{s:5:\"count\";i:0;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/posts/11/revisions\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/17\";}}s:13:\"wp:attachment\";a:1:{i:0;a:1:{s:4:\"href\";s:60:\"http://wordpress-findship.test/wp-json/wp/v2/media?parent=11\";}}s:7:\"wp:term\";a:2:{i:0;a:3:{s:8:\"taxonomy\";s:8:\"category\";s:10:\"embeddable\";b:1;s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/categories?post=11\";}i:1;a:3:{s:8:\"taxonomy\";s:8:\"post_tag\";s:10:\"embeddable\";b:1;s:4:\"href\";s:57:\"http://wordpress-findship.test/wp-json/wp/v2/tags?post=11\";}}s:6:\"curies\";a:1:{i:0;a:3:{s:4:\"name\";s:2:\"wp\";s:4:\"href\";s:23:\"https://api.w.org/{rel}\";s:9:\"templated\";b:1;}}}s:9:\"_embedded\";a:2:{s:6:\"author\";a:1:{i:0;a:8:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"Admin\";s:3:\"url\";s:21:\"http://localhost:8000\";s:11:\"description\";s:0:\"\";s:4:\"link\";s:44:\"http://wordpress-findship.test/author/admin/\";s:4:\"slug\";s:5:\"admin\";s:11:\"avatar_urls\";a:3:{i:24;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=24&d=mm&r=g\";i:48;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=48&d=mm&r=g\";i:96;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=96&d=mm&r=g\";}s:6:\"_links\";a:2:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/users\";}}}}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:15:{s:2:\"id\";i:17;s:4:\"date\";s:19:\"2026-07-01T07:05:47\";s:4:\"slug\";s:9:\"lpdp-tips\";s:4:\"type\";s:10:\"attachment\";s:4:\"link\";s:41:\"http://wordpress-findship.test/lpdp-tips/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:9:\"lpdp-tips\";}s:6:\"author\";i:1;s:14:\"featured_media\";i:0;s:7:\"caption\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"alt_text\";s:0:\"\";s:10:\"media_type\";s:5:\"image\";s:9:\"mime_type\";s:10:\"image/jpeg\";s:13:\"media_details\";a:0:{}s:10:\"source_url\";s:71:\"http://wordpress-findship.test/wp-content/uploads/2026/07/lpdp-tips.jpg\";s:6:\"_links\";a:5:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:53:\"http://wordpress-findship.test/wp-json/wp/v2/media/17\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/media\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/types/attachment\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=17\";}}}}}}}i:5;a:26:{s:2:\"id\";i:6;s:4:\"date\";s:19:\"2026-07-01T05:26:47\";s:8:\"date_gmt\";s:19:\"2026-07-01T05:26:47\";s:4:\"guid\";a:1:{s:8:\"rendered\";s:26:\"http://localhost:8000/?p=6\";}s:8:\"modified\";s:19:\"2026-07-01T05:26:47\";s:12:\"modified_gmt\";s:19:\"2026-07-01T05:26:47\";s:4:\"slug\";s:32:\"beasiswa-glow-and-lovely-bintang\";s:6:\"status\";s:7:\"publish\";s:4:\"type\";s:4:\"post\";s:4:\"link\";s:64:\"http://wordpress-findship.test/beasiswa-glow-and-lovely-bintang/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:32:\"BEASISWA GLOW AND LOVELY BINTANG\";}s:7:\"content\";a:2:{s:8:\"rendered\";s:2420:\"\n<h3 class=\"wp-block-heading\">Pendaftaran <strong>Glow &amp; Lovely Bintang Beasiswa 2026</strong> memberikan bantuan dana pendidikan hingga <strong>Rp 17.500.000</strong>, laptop gratis, dan program pengembangan kapasitas. Pendaftaran program tahun 2026 ini telah diperpanjang hingga <strong>30 Juni 2026</strong>. [<a href=\"https://luarkampus.id/kelas/87\">1</a>, <a href=\"https://hoshizora.org/jangan-lewatkan-pendaftaran-glow-lovely-bintang-beasiswa-2026-diperpanjang-hingga-30-juni-2026/\">2</a>, <a href=\"https://www.instagram.com/reel/DYenzu0ppAn/\">3</a>]</h3>\n\n\n\n<p class=\"wp-block-paragraph\">Berikut adalah rincian program beasiswa yang ditawarkan:</p>\n\n\n\n<p class=\"wp-block-paragraph\">Kriteria Penerima Beasiswa</p>\n\n\n\n<p class=\"wp-block-paragraph\"><a href=\"https://hoshizora.org/glow-lovely-bintang-beasiswa/#accordion-item-program-reguler\"><strong>Program Reguler</strong></a></p>\n\n\n\n<ol class=\"wp-block-list\">\n<li>Siswi kelas 12 atau lulusan SMA/SMK/MAN/MAS/sederajat 3 tahun terakhir (2026, 2025, 2024) yang dapat mendaftar seleksi masuk PTN tahun 2026</li>\n\n\n\n<li>Merupakan Warga Negara Indonesia (WNI) dan berasal dari berbagai provinsi di Indonesia</li>\n\n\n\n<li>Lolos seleksi PTN dengan akreditasi minimal B pada tahun ajaran 2026/2027 melalui jalur: (1) SNMPTN / SNMPN / SPAN PTKIN / SNBP;┬á<strong>atau</strong>┬á(2) SBMPTN / SBMPN / UM PTKIN / SNBT</li>\n\n\n\n<li>Memiliki potensi akademik dan non-akademik dibuktikan dengan fotokopi atau┬á<em>scan</em>┬ápiagam prestasi lomba (jika ada).</li>\n\n\n\n<li>Memiliki rencana studi di PTN yang diinginkan dan gagasan untuk berkontribusi kepada masyarakat</li>\n\n\n\n<li>Berkomitmen untuk menyelesaikan studi di universitas atau perguruan tinggi terpilih</li>\n</ol>\n\n\n\n<p class=\"wp-block-paragraph\"><a href=\"https://hoshizora.org/glow-lovely-bintang-beasiswa/#accordion-item-program-partial\"><strong>Program Partial</strong></a></p>\n\n\n\n<h3 class=\"wp-block-heading\">Mekanisme Seleksi</h3>\n\n\n\n<p class=\"wp-block-paragraph\">Rangkaian seleksi Glow &amp; Lovely Bintang Beasiswa meliputi tahap seleksi berkas dan esai, seleksi wawancara daring, serta seleksi&nbsp;<em>home visit</em>&nbsp;daring.&nbsp;</p>\n\n\n\n<h3 class=\"wp-block-heading\"><strong>Syarat dan Ketentuan┬á</strong></h3>\n\n\n\n<p class=\"wp-block-paragraph\">Untuk mengakses informasi syarat dan ketentuan lebih lanjut mengenai pendaftaran Glow &amp; Lovely Bintang Beasiswa 2026, kunjungi laman berikut:&nbsp;</p>\n\";s:9:\"protected\";b:0;}s:7:\"excerpt\";a:2:{s:8:\"rendered\";s:433:\"<p>Pendaftaran Glow &amp; Lovely Bintang Beasiswa 2026 memberikan bantuan dana pendidikan hingga Rp 17.500.000, laptop gratis, dan program pengembangan kapasitas. Pendaftaran program tahun 2026 ini telah diperpanjang hingga 30 Juni 2026. [1, 2, 3] Berikut adalah rincian program beasiswa yang ditawarkan: Kriteria Penerima Beasiswa Program Reguler Program Partial Mekanisme Seleksi Rangkaian seleksi Glow &amp; Lovely [&hellip;]</p>\n\";s:9:\"protected\";b:0;}s:6:\"author\";i:1;s:14:\"featured_media\";i:8;s:14:\"comment_status\";s:4:\"open\";s:11:\"ping_status\";s:4:\"open\";s:6:\"sticky\";b:0;s:8:\"template\";s:0:\"\";s:6:\"format\";s:8:\"standard\";s:4:\"meta\";a:1:{s:9:\"footnotes\";s:0:\"\";}s:10:\"categories\";a:1:{i:0;i:1;}s:4:\"tags\";a:0:{}s:10:\"class_list\";a:8:{i:0;s:6:\"post-6\";i:1;s:4:\"post\";i:2;s:9:\"type-post\";i:3;s:14:\"status-publish\";i:4;s:15:\"format-standard\";i:5;s:18:\"has-post-thumbnail\";i:6;s:6:\"hentry\";i:7;s:24:\"category-tak-berkategori\";}s:6:\"_links\";a:11:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/posts/6\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/posts\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:55:\"http://wordpress-findship.test/wp-json/wp/v2/types/post\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:60:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=6\";}}s:15:\"version-history\";a:1:{i:0;a:2:{s:5:\"count\";i:1;s:4:\"href\";s:62:\"http://wordpress-findship.test/wp-json/wp/v2/posts/6/revisions\";}}s:19:\"predecessor-version\";a:1:{i:0;a:2:{s:2:\"id\";i:9;s:4:\"href\";s:64:\"http://wordpress-findship.test/wp-json/wp/v2/posts/6/revisions/9\";}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/media/8\";}}s:13:\"wp:attachment\";a:1:{i:0;a:1:{s:4:\"href\";s:59:\"http://wordpress-findship.test/wp-json/wp/v2/media?parent=6\";}}s:7:\"wp:term\";a:2:{i:0;a:3:{s:8:\"taxonomy\";s:8:\"category\";s:10:\"embeddable\";b:1;s:4:\"href\";s:62:\"http://wordpress-findship.test/wp-json/wp/v2/categories?post=6\";}i:1;a:3:{s:8:\"taxonomy\";s:8:\"post_tag\";s:10:\"embeddable\";b:1;s:4:\"href\";s:56:\"http://wordpress-findship.test/wp-json/wp/v2/tags?post=6\";}}s:6:\"curies\";a:1:{i:0;a:3:{s:4:\"name\";s:2:\"wp\";s:4:\"href\";s:23:\"https://api.w.org/{rel}\";s:9:\"templated\";b:1;}}}s:9:\"_embedded\";a:3:{s:6:\"author\";a:1:{i:0;a:8:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"Admin\";s:3:\"url\";s:21:\"http://localhost:8000\";s:11:\"description\";s:0:\"\";s:4:\"link\";s:44:\"http://wordpress-findship.test/author/admin/\";s:4:\"slug\";s:5:\"admin\";s:11:\"avatar_urls\";a:3:{i:24;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=24&d=mm&r=g\";i:48;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=48&d=mm&r=g\";i:96;s:113:\"https://secure.gravatar.com/avatar/2c2c7767a6a19121570abe365d324e1a12cfc5114249a4ea007b0b9ae397b42e?s=96&d=mm&r=g\";}s:6:\"_links\";a:2:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/users\";}}}}}s:16:\"wp:featuredmedia\";a:1:{i:0;a:15:{s:2:\"id\";i:8;s:4:\"date\";s:19:\"2026-07-01T05:25:00\";s:4:\"slug\";s:15:\"glow-and-lovely\";s:4:\"type\";s:10:\"attachment\";s:4:\"link\";s:80:\"http://wordpress-findship.test/beasiswa-glow-and-lovely-bintang/glow-and-lovely/\";s:5:\"title\";a:1:{s:8:\"rendered\";s:15:\"glow and lovely\";}s:6:\"author\";i:1;s:14:\"featured_media\";i:0;s:7:\"caption\";a:1:{s:8:\"rendered\";s:0:\"\";}s:8:\"alt_text\";s:0:\"\";s:10:\"media_type\";s:5:\"image\";s:9:\"mime_type\";s:9:\"image/png\";s:13:\"media_details\";a:6:{s:5:\"width\";i:631;s:6:\"height\";i:331;s:4:\"file\";s:27:\"2026/07/glow-and-lovely.png\";s:8:\"filesize\";i:144094;s:5:\"sizes\";a:3:{s:6:\"medium\";a:6:{s:4:\"file\";s:27:\"glow-and-lovely-300x157.png\";s:5:\"width\";i:300;s:6:\"height\";i:157;s:8:\"filesize\";i:52575;s:9:\"mime_type\";s:9:\"image/png\";s:10:\"source_url\";s:85:\"http://wordpress-findship.test/wp-content/uploads/2026/07/glow-and-lovely-300x157.png\";}s:9:\"thumbnail\";a:6:{s:4:\"file\";s:27:\"glow-and-lovely-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:8:\"filesize\";i:33708;s:9:\"mime_type\";s:9:\"image/png\";s:10:\"source_url\";s:85:\"http://wordpress-findship.test/wp-content/uploads/2026/07/glow-and-lovely-150x150.png\";}s:4:\"full\";a:5:{s:4:\"file\";s:19:\"glow-and-lovely.png\";s:5:\"width\";i:631;s:6:\"height\";i:331;s:9:\"mime_type\";s:9:\"image/png\";s:10:\"source_url\";s:77:\"http://wordpress-findship.test/wp-content/uploads/2026/07/glow-and-lovely.png\";}}s:10:\"image_meta\";a:13:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}s:3:\"alt\";s:0:\"\";}}s:10:\"source_url\";s:77:\"http://wordpress-findship.test/wp-content/uploads/2026/07/glow-and-lovely.png\";s:6:\"_links\";a:7:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/media/8\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:50:\"http://wordpress-findship.test/wp-json/wp/v2/media\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:61:\"http://wordpress-findship.test/wp-json/wp/v2/types/attachment\";}}s:6:\"author\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/users/1\";}}s:7:\"replies\";a:1:{i:0;a:2:{s:10:\"embeddable\";b:1;s:4:\"href\";s:60:\"http://wordpress-findship.test/wp-json/wp/v2/comments?post=8\";}}s:14:\"wp:attached-to\";a:1:{i:0;a:4:{s:10:\"embeddable\";b:1;s:9:\"post_type\";s:4:\"post\";s:2:\"id\";i:6;s:4:\"href\";s:52:\"http://wordpress-findship.test/wp-json/wp/v2/posts/6\";}}s:6:\"curies\";a:1:{i:0;a:3:{s:4:\"name\";s:2:\"wp\";s:4:\"href\";s:23:\"https://api.w.org/{rel}\";s:9:\"templated\";b:1;}}}}}s:7:\"wp:term\";a:2:{i:0;a:1:{i:0;a:6:{s:2:\"id\";i:1;s:4:\"link\";s:56:\"http://wordpress-findship.test/category/tak-berkategori/\";s:4:\"name\";s:15:\"Tak Berkategori\";s:4:\"slug\";s:15:\"tak-berkategori\";s:8:\"taxonomy\";s:8:\"category\";s:6:\"_links\";a:5:{s:4:\"self\";a:1:{i:0;a:2:{s:4:\"href\";s:57:\"http://wordpress-findship.test/wp-json/wp/v2/categories/1\";s:11:\"targetHints\";a:1:{s:5:\"allow\";a:1:{i:0;s:3:\"GET\";}}}}s:10:\"collection\";a:1:{i:0;a:1:{s:4:\"href\";s:55:\"http://wordpress-findship.test/wp-json/wp/v2/categories\";}}s:5:\"about\";a:1:{i:0;a:1:{s:4:\"href\";s:64:\"http://wordpress-findship.test/wp-json/wp/v2/taxonomies/category\";}}s:12:\"wp:post_type\";a:1:{i:0;a:1:{s:4:\"href\";s:63:\"http://wordpress-findship.test/wp-json/wp/v2/posts?categories=1\";}}s:6:\"curies\";a:1:{i:0;a:3:{s:4:\"name\";s:2:\"wp\";s:4:\"href\";s:23:\"https://api.w.org/{rel}\";s:9:\"templated\";b:1;}}}}}i:1;a:0:{}}}}}',1782892133);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorit`
--

LOCK TABLES `favorit` WRITE;
/*!40000 ALTER TABLE `favorit` DISABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelas_premium`
--

LOCK TABLES `kelas_premium` WRITE;
/*!40000 ALTER TABLE `kelas_premium` DISABLE KEYS */;
INSERT INTO `kelas_premium` VALUES (1,'Mastering LPDP Essay Writing','Kelas intensif yang membahas strategi menyusun kontribusi esai dan esai rencana studi LPDP yang memikat hati para reviewer. Dilengkapi dengan sesi review esai satu per satu (one-on-one) dan template esai lolos seleksi.',150000.00,'https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=600&auto=format&fit=crop','aktif','2026-06-09 00:26:31','2026-06-09 00:26:31','Pelajari cara menyusun kontribusi esai dan rencana studi LPDP yang memikat hati para reviewer bersama alumni awardee.','<h3>Selamat datang di Kelas Premium!</h3><p>Berikut adalah modul pembelajaran premium untuk menulis esai LPDP:</p><ul><li><strong>Modul 1:</strong> Membedah struktur esai yang disukai reviewer.</li><li><strong>Modul 2:</strong> Mengaitkan rencana studi dengan kontribusi konkret bagi Indonesia.</li><li><strong>Modul 3:</strong> Teknik self-editing dan penyelarasan esai dengan visi LPDP.</li></ul>','materi-kelas/lpdp_essay_guide.pdf','https://zoom.us/j/1234567890','https://www.youtube.com/embed/dQw4w9WgXcQ','[{\"judul\": \"Sesi 1: Bedah Logika & Esensi Esai LPDP\", \"materi\": \"Memahami kriteria penilaian juri dan kerangka penulisan esai.\"}, {\"judul\": \"Sesi 2: Rencana Studi & Menjawab Masalah Riil\", \"materi\": \"Cara merumuskan kontribusi yang rasional dan aplikatif.\"}, {\"judul\": \"Sesi 3: Review Esai One-on-One\", \"materi\": \"Sesi konsultasi langsung untuk menyempurnakan tulisan peserta.\"}]'),(2,'IELTS Preparation Bootcamp (Target 7.0+)','Program bootcamp persiapan IELTS selama 4 minggu yang mencakup materi Listening, Reading, Writing, dan Speaking. Mentor berpengalaman akan membagikan rumus praktis, simulasi tes (mock test), dan materi eksklusif.',299000.00,'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?q=80&w=600&auto=format&fit=crop','aktif','2026-06-09 00:26:31','2026-06-09 00:26:31','Bootcamp intensif 4 minggu mencakup tips 4 pilar skill IELTS (Listening, Reading, Writing, Speaking) untuk target skor 7.0+.','<h3>Materi Premium IELTS Bootcamp</h3><p>Silakan ikuti instruksi belajar berikut:</p><ol><li>Unduh e-book Cambridge IELTS 18 di tab File Download.</li><li>Saksikan rekaman sesi writing task 1 & 2 untuk menguasai struktur esai.</li><li>Bergabunglah ke sesi zoom sesuai jadwal latihan speaking mingguan.</li></ol>','materi-kelas/cambridge_ielts_practice.pdf','https://zoom.us/j/9876543210','https://www.youtube.com/embed/dQw4w9WgXcQ','[{\"judul\": \"Minggu 1: Listening & Reading Strategies\", \"materi\": \"Trik menebak kata kunci dan pemindaian teks (scanning).\"}, {\"judul\": \"Minggu 2: Writing Task 1 & 2 Deep Dive\", \"materi\": \"Menguasai struktur esai akademik dan deskripsi grafik.\"}, {\"judul\": \"Minggu 3: Speaking Band 7.0+ Simulation\", \"materi\": \"Latihan kelancaran berbicara, kosakata, dan pelafalan.\"}]'),(3,'Scholarship Interview Preparation & Simulation','Persiapkan diri Anda menghadapi wawancara beasiswa dalam dan luar negeri. Anda akan dilatih menyusun jawaban STAR method, etika wawancara, menghadapi pertanyaan jebakan, dan mengikuti mock interview interaktif.',125000.00,'https://images.unsplash.com/photo-1521791136364-728685c05310?q=80&w=600&auto=format&fit=crop','aktif','2026-06-09 00:26:31','2026-06-09 00:26:31','Kuasai teknik wawancara beasiswa menggunakan metode STAR dan latih kesiapan mental Anda dalam simulasi interaktif.','<h3>Panduan Menjawab Wawancara Premium</h3><p>Gunakan format STAR (Situation, Task, Action, Result) untuk setiap jawaban perilaku Anda:</p><ul><li><strong>Situation:</strong> Berikan konteks masalah yang terjadi.</li><li><strong>Task:</strong> Apa tugas atau peran Anda dalam masalah tersebut.</li><li><strong>Action:</strong> Langkah nyata yang Anda ambil untuk menyelesaikannya.</li><li><strong>Result:</strong> Hasil kuantitatif positif yang dicapai.</li></ul>','materi-kelas/interview_star_method.pdf','https://zoom.us/j/1122334455','https://www.youtube.com/embed/dQw4w9WgXcQ','[{\"judul\": \"Modul 1: Bedah Pertanyaan Klasik & Jebakan\", \"materi\": \"Cara menjawab kelemahan diri dan rencana pasca studi.\"}, {\"judul\": \"Modul 2: Simulasi Wawancara (Mock Interview)\", \"materi\": \"Uji coba wawancara langsung dengan juri awardee beasiswa.\"}]'),(4,'Mentorship Beasiswa MEXT Jepang','Bimbingan intensif persiapan mendaftar beasiswa Monbukagakusho (MEXT). Kelas ini mengupas tuntas berkas administratif, tips memilih universitas/LoA di Jepang, serta pembahasan soal ujian tulis (Matematika dan Bahasa Inggris).',199000.00,'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=600&auto=format&fit=crop','aktif','2026-06-09 00:26:31','2026-06-09 00:26:31','Mentorship eksklusif membahas berkas pendaftaran MEXT Jepang dan bedah bank soal ujian tulis.','<h3>Materi Mentorship MEXT Jepang</h3><p>Selamat bergabung! Di kelas ini, Anda mendapatkan akses latihan soal eksklusif:</p><ul><li>Unduh bank soal matematika MEXT (2018-2023) di tab File Download.</li><li>Saksikan rekaman penjelasan ujian tulis dari alumni Kyoto University.</li></ul>','materi-kelas/mext_math_past_papers.pdf','https://zoom.us/j/5566778899','https://www.youtube.com/embed/dQw4w9WgXcQ','[{\"judul\": \"Sesi 1: Seleksi Dokumen & Pengisian Formulir\", \"materi\": \"Strategi menulis lembar rencana riset (Field of Study).\"}, {\"judul\": \"Sesi 2: Pembahasan Ujian Matematika & Inggris\", \"materi\": \"Pembahasan trik menjawab soal-soal ujian tahun lalu.\"}]');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_06_08_111254_create_beasiswa_table',1),(5,'2026_06_08_111259_create_kelas_premium_table',1),(6,'2026_06_08_111303_create_favorit_table',1),(7,'2026_06_08_111308_create_transaksi_table',1),(8,'2026_06_09_142400_add_exclusive_fields_to_kelas_premium_table',1),(9,'2026_06_09_143900_create_notifikasi_table',2);
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
  `tipe` enum('deadline','transaksi','beasiswa_baru','akun','info') COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifikasi_user_id_foreign` (`user_id`),
  CONSTRAINT `notifikasi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifikasi`
--

LOCK TABLES `notifikasi` WRITE;
/*!40000 ALTER TABLE `notifikasi` DISABLE KEYS */;
INSERT INTO `notifikasi` VALUES (1,2,'≡ƒÄô Beasiswa Baru Tersedia!','Beasiswa Unggulan 2026-2027 dari Kemendikbud baru saja ditambahkan. Cek sekarang!','beasiswa_baru','/scholarships/9',1,'2026-06-09 00:48:12','2026-06-09 00:48:43'),(2,3,'≡ƒÄô Beasiswa Baru Tersedia!','Beasiswa Unggulan 2026-2027 dari Kemendikbud baru saja ditambahkan. Cek sekarang!','beasiswa_baru','/scholarships/9',0,'2026-06-09 00:48:12','2026-06-09 00:48:12'),(3,2,'Γ£à Pembayaran Diverifikasi!','Pembayaran kelas Mastering LPDP Essay Writing telah dikonfirmasi. Kamu sekarang bisa mengakses materi.','transaksi','/kelas/1',0,'2026-06-10 00:21:30','2026-06-10 00:21:30'),(4,2,'≡ƒöÆ Akun Dinonaktifkan','Akun FindShip kamu telah dinonaktifkan oleh admin. Hubungi kami jika ada pertanyaan.','akun',NULL,0,'2026-06-10 00:22:58','2026-06-10 00:22:58'),(5,2,'≡ƒöÆ Akun Dinonaktifkan','Akun FindShip kamu telah dinonaktifkan oleh admin. Hubungi kami jika ada pertanyaan.','akun',NULL,0,'2026-06-11 17:28:54','2026-06-11 17:28:54');
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
INSERT INTO `sessions` VALUES ('6SSEiK3DeG5pGhvaTaTN3V8iAhA5qOcPwmjqFXU7',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0','eyJfdG9rZW4iOiI4TXhvWU12dm5vQ1FrSFg0Y2F2UnZWdUl2cjhVdVV5cVpJcGZqc3R5IiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImFkbWluLmRhc2hib2FyZCJ9LCJ1cmwiOltdLCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=',1781076318),('jru583g9rBkBmFnKc42TS4XRI9VokZdRspQzObGL',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0','eyJfdG9rZW4iOiJ3c3NGVTk1eHNCcTZwYk43Vnd6NElvU2FsOHNuWm9BaU9aRGIxSGdMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1781223330),('lBuY4TiTUZzrq0MoYDfoxnVRIeEcGPVH0qGRflry',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0','eyJfdG9rZW4iOiJLUHByUTViS041ZDgyYnBTbHNJZG1NTFlmWDdvcXdSOEw2eks3UTI2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC93b3JkcHJlc3NcL2FydGlrZWwiLCJyb3V0ZSI6ImFydGlrZWwuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1782890333),('Sb4c0aNKMxjcmVKQiqPwURKMAKHnrhpqOcl3lrgs',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiIyN2o0TndoRkRtNGZPSUpsUTlvVzFpOUYxaEtuTjkzYjZpSjVkVFpLIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2xvZ2luIiwicm91dGUiOiJsb2dpbiJ9fQ==',1781224174),('U77EZeb5Itf2nx00byi1i0wRBbHm8S5y6fbmMDUy',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ0dXEzSzhCZ1RGb0pkOTM0YVFmUDFOb2JtNzJrSHF5TXZHWTVZNTh6IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hcnRpa2VsIiwicm91dGUiOiJhcnRpa2VsLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1781754721);
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
  PRIMARY KEY (`id`),
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
INSERT INTO `transaksi` VALUES (1,2,3,'storage/bukti-bayar/X1v0A3bUXoXhAqcfO0rmdL8Zd18i90PvF2z6JJxD.jpg','berhasil','2026-06-09 00:33:36','2026-06-09 00:34:08'),(2,2,1,'storage/bukti-bayar/s2nc0IMZSStboV4D42PwfOI0nOI3PpkMTIAGqEFE.jpg','berhasil','2026-06-10 00:16:21','2026-06-10 00:21:30');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin FindShip','admin@findship.com',NULL,'$2y$12$IrP21b7FgC.J73Ju7iQxiOMMSPePHEcQAr7ioibqDHHALNQiYnWzq','admin',NULL,NULL,NULL,'aktif',NULL,'2026-06-09 00:26:30','2026-06-09 00:26:30'),(2,'Budi Pratama','budi@findship.com',NULL,'$2y$12$y22EbGoD1eWD30sZ/3aLmeeL2jf.v5EVnGl4Xd5X238ggoNObEWNe','mahasiswa','Teknik Informatika',3.45,'Universitas Indonesia','nonaktif',NULL,'2026-06-09 00:26:30','2026-06-11 17:28:54'),(3,'Siti Nurhaliza','siti@findship.com',NULL,'$2y$12$Ae1AJgLnYZVpZpilwzhJOOxN.ThqmeeX4anftUTuPbxJVc8iUYaIS','mahasiswa','Sastra Inggris',3.75,'Universitas Gadjah Mada','aktif',NULL,'2026-06-09 00:26:30','2026-06-09 00:26:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-03 13:50:38

