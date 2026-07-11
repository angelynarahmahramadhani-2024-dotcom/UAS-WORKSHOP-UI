<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Beasiswa;
use App\Models\KelasPremium;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Users (Admin & Student)
        User::create([
            'name' => 'Admin FindShip',
            'email' => 'admin@findship.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'status' => 'aktif',
        ]);

        User::create([
            'name' => 'Budi Pratama',
            'email' => 'budi@findship.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'jurusan' => 'Teknik Informatika',
            'ipk' => 3.45,
            'asal_kampus' => 'Universitas Indonesia',
            'status' => 'aktif',
        ]);

        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@findship.com',
            'password' => Hash::make('password'),
            'role' => 'mahasiswa',
            'jurusan' => 'Sastra Inggris',
            'ipk' => 3.75,
            'asal_kampus' => 'Universitas Gadjah Mada',
            'status' => 'aktif',
        ]);

        // 2. Seed Scholarships (Beasiswa)
        $beasiswas = [
            [
                'judul' => 'Beasiswa LPDP (Lembaga Pengelola Dana Pendidikan)',
                'penyelenggara' => 'Kementerian Keuangan RI',
                'kategori' => 'luar negeri',
                'jenjang' => 'S2',
                'jurusan' => 'Semua Jurusan',
                'min_ipk' => 3.25,
                'deadline' => '2026-07-25',
                'deskripsi' => 'Beasiswa penuh dari Pemerintah Indonesia untuk melanjutkan studi Magister (S2) dan Doktor (S3) di universitas terbaik dunia. Mencakup biaya kuliah penuh, tunjangan hidup bulanan, asuransi kesehatan, biaya visa, dan tiket pesawat PP.',
                'link_resmi' => 'https://lpdp.kemenkeu.go.id',
                'status' => 'aktif',
            ],
            [
                'judul' => 'Beasiswa Unggulan Kemendikbudristek',
                'penyelenggara' => 'Kementerian Pendidikan dan Kebudayaan RI',
                'kategori' => 'dalam negeri',
                'jenjang' => 'S1',
                'jurusan' => 'Semua Jurusan',
                'min_ipk' => 3.00,
                'deadline' => '2026-08-15',
                'deskripsi' => 'Program beasiswa dari Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi untuk mendukung pendidikan tinggi di Indonesia bagi mahasiswa berprestasi. Mencakup biaya kuliah UKT, biaya hidup bulanan, dan bantuan biaya buku.',
                'link_resmi' => 'https://beasiswaunggulan.kemdikbud.go.id',
                'status' => 'aktif',
            ],
            [
                'judul' => 'Djarum Beasiswa Plus',
                'penyelenggara' => 'Djarum Foundation',
                'kategori' => 'dalam negeri',
                'jenjang' => 'S1',
                'jurusan' => 'Semua Jurusan',
                'min_ipk' => 3.00,
                'deadline' => '2026-06-30',
                'deskripsi' => 'Beasiswa prestasi yang diberikan kepada mahasiswa S1 semester 4. Selain bantuan finansial sebesar Rp12.000.000 selama satu tahun, para Beswan Djarum juga mendapatkan pelatihan soft skills yang intensif seperti Character Building dan Leadership.',
                'link_resmi' => 'https://djarumbeasiswaplus.org',
                'status' => 'aktif',
            ],
            [
                'judul' => 'Monbukagakusho (MEXT) Japan Scholarship',
                'penyelenggara' => 'Pemerintah Jepang',
                'kategori' => 'luar negeri',
                'jenjang' => 'S1',
                'jurusan' => 'Teknik Informatika',
                'min_ipk' => 3.20,
                'deadline' => '2026-09-10',
                'deskripsi' => 'Program beasiswa penuh dari Kementerian Pendidikan, Budaya, Olahraga, Sains, dan Teknologi Jepang (MEXT) untuk lulusan SMA/SMK/sederajat guna melanjutkan studi D3/S1 di Jepang. Bebas biaya kuliah, tunjangan bulanan, serta tiket pesawat kelas ekonomi PP.',
                'link_resmi' => 'https://www.id.emb-japan.go.jp/sch.html',
                'status' => 'aktif',
            ],
            [
                'judul' => 'Chevening Scholarship UK',
                'penyelenggara' => 'Pemerintah Britania Raya',
                'kategori' => 'luar negeri',
                'jenjang' => 'S2',
                'jurusan' => 'Politik',
                'min_ipk' => 3.30,
                'deadline' => '2026-11-05',
                'deskripsi' => 'Beasiswa global Pemerintah Inggris yang didanai oleh Foreign, Commonwealth & Development Office (FCDO). Beasiswa ini diberikan kepada calon pemimpin masa depan untuk menempuh studi magister satu tahun di universitas-universitas ternama Inggris.',
                'link_resmi' => 'https://www.chevening.org/scholarship/indonesia/',
                'status' => 'aktif',
            ],
            [
                'judul' => 'Beasiswa KIP Kuliah (Kartu Indonesia Pintar)',
                'penyelenggara' => 'Pemerintah RI',
                'kategori' => 'dalam negeri',
                'jenjang' => 'S1',
                'jurusan' => 'Semua Jurusan',
                'min_ipk' => 2.50,
                'deadline' => '2026-08-31',
                'deskripsi' => 'Program bantuan biaya pendidikan dari Pemerintah RI untuk lulusan SMA atau sederajat yang memiliki potensi akademik baik tetapi memiliki keterbatasan ekonomi. Memberikan pembebasan biaya kuliah dan bantuan biaya hidup bulanan.',
                'link_resmi' => 'https://kip-kuliah.kemdikbud.go.id',
                'status' => 'aktif',
            ],
            [
                'judul' => 'KAIST International Student Scholarship',
                'penyelenggara' => 'KAIST (Korea Advanced Institute of Science & Technology)',
                'kategori' => 'luar negeri',
                'jenjang' => 'S1',
                'jurusan' => 'Teknik',
                'min_ipk' => 3.00,
                'deadline' => '2026-08-05',
                'deskripsi' => 'Beasiswa penuh dari salah satu universitas sains dan teknologi terkemuka di Korea Selatan. Beasiswa mencakup pembebasan biaya kuliah 100% untuk 8 semester, tunjangan hidup KRW 350.000 per bulan, dan asuransi kesehatan nasional Korea.',
                'link_resmi' => 'https://admission.kaist.ac.kr',
                'status' => 'aktif',
            ],
            [
                'judul' => 'Erasmus Mundus Joint Master (EMJM)',
                'penyelenggara' => 'Uni Eropa',
                'kategori' => 'luar negeri',
                'jenjang' => 'S2',
                'jurusan' => 'Semua Jurusan',
                'min_ipk' => 3.40,
                'deadline' => '2026-10-30',
                'deskripsi' => 'Program beasiswa prestigius yang didanai oleh Uni Eropa. Mahasiswa terpilih akan belajar di minimal dua negara Eropa yang berbeda dan mendapatkan gelar ganda (joint/multiple degree) setelah lulus. Mencakup seluruh biaya kuliah dan biaya perjalanan.',
                'link_resmi' => 'https://ec.europa.eu/programmes/erasmus-plus/opportunities/individuals/students/erasmus-mundus-joint-master-degrees_en',
                'status' => 'aktif',
            ]
        ];

        foreach ($beasiswas as $beasiswa) {
            Beasiswa::create($beasiswa);
        }

        // 3. Seed Premium Classes (Kelas Premium)
        $kelas = [
            [
                'judul' => 'Mastering LPDP Essay Writing',
                'deskripsi' => 'Kelas intensif yang membahas strategi menyusun kontribusi esai dan esai rencana studi LPDP yang memikat hati para reviewer. Dilengkapi dengan sesi review esai satu per satu (one-on-one) dan template esai lolos seleksi.',
                'konten_publik' => 'Pelajari cara menyusun kontribusi esai dan rencana studi LPDP yang memikat hati para reviewer bersama alumni awardee.',
                'konten_premium' => '<h3>Selamat datang di Kelas Premium!</h3><p>Berikut adalah modul pembelajaran premium untuk menulis esai LPDP:</p><ul><li><strong>Modul 1:</strong> Membedah struktur esai yang disukai reviewer.</li><li><strong>Modul 2:</strong> Mengaitkan rencana studi dengan kontribusi konkret bagi Indonesia.</li><li><strong>Modul 3:</strong> Teknik self-editing dan penyelarasan esai dengan visi LPDP.</li></ul>',
                'harga' => 150000.00,
                'thumbnail' => 'https://picsum.photos/id/24/600/400',
                'file_materi' => 'materi-kelas/lpdp_essay_guide.pdf',
                'link_zoom' => 'https://zoom.us/j/1234567890',
                'link_rekaman' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'kurikulum' => json_encode([
                    ['judul' => 'Sesi 1: Bedah Logika & Esensi Esai LPDP', 'materi' => 'Memahami kriteria penilaian juri dan kerangka penulisan esai.'],
                    ['judul' => 'Sesi 2: Rencana Studi & Menjawab Masalah Riil', 'materi' => 'Cara merumuskan kontribusi yang rasional dan aplikatif.'],
                    ['judul' => 'Sesi 3: Review Esai One-on-One', 'materi' => 'Sesi konsultasi langsung untuk menyempurnakan tulisan peserta.']
                ]),
                'status' => 'aktif',
                'kategori' => 'Esai & Motivation Letter',
                'rating' => 4.85,
                'discount_percentage' => 20,
                'discount_expiry' => now()->addDays(2),
                'duration' => '12 Jam',
                'lessons_count' => 6,
                'includes' => [
                    'video_hours' => 12,
                    'downloadable_materials' => true,
                    'practice_questions' => false,
                    'certificate' => true,
                    'lifetime_access' => true
                ],
            ],
            [
                'judul' => 'IELTS Preparation Bootcamp (Target 7.0+)',
                'deskripsi' => 'Program bootcamp persiapan IELTS selama 4 minggu yang mencakup materi Listening, Reading, Writing, dan Speaking. Mentor berpengalaman akan membagikan rumus praktis, simulasi tes (mock test), dan materi eksklusif.',
                'konten_publik' => 'Bootcamp intensif 4 minggu mencakup tips 4 pilar skill IELTS (Listening, Reading, Writing, Speaking) untuk target skor 7.0+.',
                'konten_premium' => '<h3>Materi Premium IELTS Bootcamp</h3><p>Silakan ikuti instruksi belajar berikut:</p><ol><li>Unduh e-book Cambridge IELTS 18 di tab File Download.</li><li>Saksikan rekaman sesi writing task 1 & 2 untuk menguasai struktur esai.</li><li>Bergabunglah ke sesi zoom sesuai jadwal latihan speaking mingguan.</li></ol>',
                'harga' => 299000.00,
                'thumbnail' => 'https://picsum.photos/id/180/600/400',
                'file_materi' => 'materi-kelas/cambridge_ielts_practice.pdf',
                'link_zoom' => 'https://zoom.us/j/9876543210',
                'link_rekaman' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'kurikulum' => json_encode([
                    ['judul' => 'Minggu 1: Listening & Reading Strategies', 'materi' => 'Trik menebak kata kunci dan pemindaian teks (scanning).'],
                    ['judul' => 'Minggu 2: Writing Task 1 & 2 Deep Dive', 'materi' => 'Menguasai struktur esai akademik dan deskripsi grafik.'],
                    ['judul' => 'Minggu 3: Speaking Band 7.0+ Simulation', 'materi' => 'Latihan kelancaran berbicara, kosakata, dan pelafalan.']
                ]),
                'status' => 'aktif',
                'kategori' => 'Bahasa & Tes',
                'rating' => 4.92,
                'discount_percentage' => 15,
                'discount_expiry' => now()->addDays(5),
                'duration' => '32 Jam',
                'lessons_count' => 16,
                'includes' => [
                    'video_hours' => 32,
                    'downloadable_materials' => true,
                    'practice_questions' => true,
                    'certificate' => true,
                    'lifetime_access' => true
                ],
            ],
            [
                'judul' => 'Scholarship Interview Preparation & Simulation',
                'deskripsi' => 'Persiapkan diri Anda menghadapi wawancara beasiswa dalam dan luar negeri. Anda akan dilatih menyusun jawaban STAR method, etika wawancara, menghadapi pertanyaan jebakan, dan mengikuti mock interview interaktif.',
                'konten_publik' => 'Kuasai teknik wawancara beasiswa menggunakan metode STAR dan latih kesiapan mental Anda dalam simulasi interaktif.',
                'konten_premium' => '<h3>Panduan Menjawab Wawancara Premium</h3><p>Gunakan format STAR (Situation, Task, Action, Result) untuk setiap jawaban perilaku Anda:</p><ul><li><strong>Situation:</strong> Berikan konteks masalah yang terjadi.</li><li><strong>Task:</strong> Apa tugas atau peran Anda dalam masalah tersebut.</li><li><strong>Action:</strong> Langkah nyata yang Anda ambil untuk menyelesaikannya.</li><li><strong>Result:</strong> Hasil kuantitatif positif yang dicapai.</li></ul>',
                'harga' => 125000.00,
                'thumbnail' => 'https://picsum.photos/id/357/600/400',
                'file_materi' => 'materi-kelas/interview_star_method.pdf',
                'link_zoom' => 'https://zoom.us/j/1122334455',
                'link_rekaman' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'kurikulum' => json_encode([
                    ['judul' => 'Modul 1: Bedah Pertanyaan Klasik & Jebakan', 'materi' => 'Cara menjawab kelemahan diri dan rencana pasca studi.'],
                    ['judul' => 'Modul 2: Simulasi Wawancara (Mock Interview)', 'materi' => 'Uji coba wawancara langsung dengan juri awardee beasiswa.']
                ]),
                'status' => 'aktif',
                'kategori' => 'Interview',
                'rating' => 4.78,
                'discount_percentage' => null,
                'discount_expiry' => null,
                'duration' => '8 Jam',
                'lessons_count' => 4,
                'includes' => [
                    'video_hours' => 8,
                    'downloadable_materials' => true,
                    'practice_questions' => true,
                    'certificate' => true,
                    'lifetime_access' => false
                ],
            ],
            [
                'judul' => 'Mentorship Beasiswa MEXT Jepang',
                'deskripsi' => 'Bimbingan intensif persiapan mendaftar beasiswa Monbukagakusho (MEXT). Kelas ini mengupas tuntas berkas administratif, tips memilih universitas/LoA di Jepang, serta pembahasan soal ujian tulis (Matematika dan Bahasa Inggris).',
                'konten_publik' => 'Mentorship eksklusif membahas berkas pendaftaran MEXT Jepang dan bedah bank soal ujian tulis.',
                'konten_premium' => '<h3>Materi Mentorship MEXT Jepang</h3><p>Selamat bergabung! Di kelas ini, Anda mendapatkan akses latihan soal eksklusif:</p><ul><li>Unduh bank soal matematika MEXT (2018-2023) di tab File Download.</li><li>Saksikan rekaman penjelasan ujian tulis dari alumni Kyoto University.</li></ul>',
                'harga' => 199000.00,
                'thumbnail' => 'https://picsum.photos/id/1062/600/400',
                'file_materi' => 'materi-kelas/mext_math_past_papers.pdf',
                'link_zoom' => 'https://zoom.us/j/5566778899',
                'link_rekaman' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'kurikulum' => json_encode([
                    ['judul' => 'Sesi 1: Seleksi Dokumen & Pengisian Formulir', 'materi' => 'Strategi menulis lembar rencana riset (Field of Study).'],
                    ['judul' => 'Sesi 2: Pembahasan Ujian Matematika & Inggris', 'materi' => 'Pembahasan trik menjawab soal-soal ujian tahun lalu.']
                ]),
                'status' => 'aktif',
                'kategori' => 'Dokumen Pendaftaran',
                'rating' => 4.88,
                'discount_percentage' => 10,
                'discount_expiry' => now()->addDays(1),
                'duration' => '16 Jam',
                'lessons_count' => 8,
                'includes' => [
                    'video_hours' => 16,
                    'downloadable_materials' => true,
                    'practice_questions' => true,
                    'certificate' => true,
                    'lifetime_access' => true
                ],
            ]
        ];

        foreach ($kelas as $k) {
            $includesVal = $k['includes'];
            unset($k['includes']);
            $created = KelasPremium::create($k);
            $created->update(['includes' => $includesVal]);
        }

        // 4. Seed Promo Codes (Vouchers)
        \App\Models\PromoCode::create([
            'code' => 'PROMO10',
            'type' => 'percent',
            'value' => 10,
            'expiry_date' => now()->addMonth(),
            'status' => 'aktif',
        ]);

        \App\Models\PromoCode::create([
            'code' => 'DAPAT50K',
            'type' => 'nominal',
            'value' => 50000,
            'expiry_date' => now()->addMonth(),
            'status' => 'aktif',
        ]);

        \App\Models\PromoCode::create([
            'code' => 'FINDSHIP20',
            'type' => 'percent',
            'value' => 20,
            'expiry_date' => now()->addMonth(),
            'status' => 'aktif',
        ]);

        // 5. Seed Articles (Artikel)
        $artikels = [
            [
                'title' => '5 Langkah Strategis Lolos Beasiswa LPDP 2026',
                'slug' => '5-langkah-strategis-lolos-beasiswa-lpdp-2026',
                'excerpt' => 'Ingin lolos beasiswa LPDP? Pelajari strategi jitu menyusun esai kontribusi dan menghadapi wawancara dari alumni sukses.',
                'content' => '<p>Beasiswa Lembaga Pengelola Dana Pendidikan (LPDP) adalah salah satu beasiswa paling populer dan bergengsi bagi mahasiswa Indonesia yang ingin melanjutkan studi S2 atau S3. Proses seleksi LPDP dikenal sangat kompetitif dan ketat. Untuk membantu Anda bersiap, berikut adalah 5 langkah strategis yang terbukti meloloskan banyak awardee:</p><h3>1. Pahami Visi dan Karakter Calon Penerima Beasiswa LPDP</h3><p>LPDP mencari calon pemimpin masa depan yang memiliki komitmen kuat untuk kembali dan berkontribusi bagi Indonesia. Seluruh dokumen dan jawaban Anda selama wawancara harus sejalan dengan visi ini. Identifikasi kontribusi konkret apa yang bisa Anda berikan kepada masyarakat atau sektor industri Anda sekembalinya dari studi.</p><h3>2. Tulis Esai Kontribusi dengan Struktur yang Kuat</h3><p>Esai kontribusi bukan sekadar curahan hati atau daftar riwayat hidup. Buatlah esai yang terstruktur dengan memuat tiga poin utama:</p><ul><li><strong>Masalah Nyata:</strong> Deskripsikan masalah mendesak di Indonesia yang relevan dengan bidang keahlian Anda.</li><li><strong>Rencana Solusi:</strong> Jelaskan bagaimana studi yang Anda pilih akan membantu menyelesaikan masalah tersebut.</li><li><strong>Kontribusi Riil:</strong> Jelaskan peran konkret yang akan Anda ambil setelah lulus, baik jangka pendek maupun jangka panjang.</li></ul><h3>3. Dapatkan Surat Rekomendasi yang Kredibel</h3><p>Surat rekomendasi sebaiknya berasal dari dosen pembimbing akademis atau atasan langsung di tempat kerja yang benar-benar mengenal kompetensi dan karakter Anda. Mintalah surat rekomendasi jauh-jauh hari dan berikan mereka draf esai atau CV Anda agar rekomendasi yang ditulis bisa lebih spesifik dan berbobot.</p><h3>4. Lakukan Riset Universitas dan Program Studi Tujuan Secara Mendalam</h3><p>Jangan memilih universitas hanya berdasarkan reputasi global atau peringkat QS World saja. Pelajari kurikulum mata kuliah, daftar laboratorium penelitian, dan keahlian dosen pembimbing di universitas tersebut. Anda harus bisa menjelaskan mengapa universitas tersebut adalah tempat terbaik untuk mendukung rencana kontribusi Anda.</p><h3>5. Persiapkan Wawancara dengan Simulasi (Mock Interview)</h3><p>Wawancara adalah penentu akhir kelulusan Anda. Latihlah cara berbicara, bahasa tubuh, dan cara menjawab pertanyaan sulit seperti kelemahan diri atau rencana kontribusi yang kurang realistis. Lakukan simulasi berkali-kali bersama alumni LPDP atau rekan sejawat untuk mendapatkan umpan balik yang konstruktif.</p>',
                'author' => 'Budi Santoso (LPDP Awardee @ UCL)',
                'thumbnail' => 'https://picsum.photos/id/24/600/400',
                'created_at' => '2026-06-05 10:00:00',
                'updated_at' => '2026-06-05 10:00:00',
            ],
            [
                'title' => 'Panduan Menulis Motivation Letter yang Menarik Perhatian Komite',
                'slug' => 'panduan-menulis-motivation-letter-yang-menarik-perhatian-komite',
                'excerpt' => 'Motivation letter adalah penentu kelulusan administrasi Anda. Simak struktur penulisan yang baik dan contoh praktisnya di sini.',
                'content' => '<p>Motivation letter adalah salah satu dokumen paling krusial dalam aplikasi beasiswa. Dokumen satu halaman ini menjadi kesempatan pertama Anda untuk berkomunikasi langsung dengan komite seleksi dan meyakinkan mereka bahwa Anda adalah kandidat terbaik. Berikut adalah panduan langkah demi langkah menulis motivation letter yang memukau:</p><h3>1. Bagian Pendahuluan: Tuliskan Kalimat Pembuka (Hook) yang Menarik</h3><p>Hindari pembukaan klise seperti <em>"Nama saya adalah X dan saya ingin melamar beasiswa Y..."</em>. Cobalah mulai dengan cerita singkat tentang momen penting yang memicu ketertarikan Anda pada bidang studi tersebut. Misalnya, pengalaman kerja lapangan atau proyek penelitian yang membuka mata Anda terhadap tantangan di sektor tersebut.</p><h3>2. Bagian Isi: Hubungkan Latar Belakang Akademis dengan Tujuan Studi</h3><p>Pada paragraf berikutnya, jelaskan pencapaian akademis dan profesional Anda yang relevan. Ceritakan bagaimana latar belakang tersebut mempersiapkan Anda untuk mengambil program studi tujuan. Jelaskan juga mata kuliah spesifik di universitas target yang sangat ingin Anda pelajari dan bagaimana hal tersebut berkaitan langsung dengan karier impian Anda.</p><h3>3. Tunjukkan Mengapa Anda Memilih Universitas dan Negara Tersebut</h3><p>Tunjukkan bahwa Anda telah melakukan riset mendalam. Mengapa memilih Jerman dibanding Inggris? Mengapa memilih program Master di universitas ini bukan universitas lain? Hubungkan keunggulan fasilitas, budaya akademik, atau fokus riset universitas tersebut dengan rencana masa depan Anda.</p><h3>4. Bagian Penutup: Akhiri dengan Pernyataan Kontribusi yang Kuat</h3><p>Tutup surat motivasi Anda dengan merangkum kembali komitmen Anda. Jelaskan secara singkat bagaimana beasiswa ini akan bertindak as batu loncatan yang membantu Anda memberikan dampak positif bagi komunitas, organisasi, atau negara asal Anda setelah lulus studi.</p>',
                'author' => 'Siti Aminah (Chevening Awardee @ Oxford)',
                'thumbnail' => 'https://picsum.photos/id/24/600/400',
                'created_at' => '2026-06-04 14:30:00',
                'updated_at' => '2026-06-04 14:30:00',
            ],
            [
                'title' => 'IELTS vs TOEFL iBT: Perbedaan Detail & Tips Memilih Tes Bahasa',
                'slug' => 'ielts-vs-toefl-ibt-perbedaan-detail-tips-memilih-tes-bahasa',
                'excerpt' => 'Bingung memilih tes kecakapan bahasa Inggris untuk beasiswa? Cari tahu perbedaan format, sistem penilaian, dan kecocokannya di sini.',
                'content' => '<p>Sertifikat kecakapan bahasa Inggris adalah persyaratan mutlak untuk sebagian besar beasiswa dalam dan luar negeri. Dua jenis tes yang paling populer dan diterima secara global adalah IELTS (International English Language Testing System) dan TOEFL iBT (Test of English as a Foreign Language internet-Based Test). Simak perbandingan mendalam berikut untuk menentukan pilihan Anda:</p><h3>1. Format dan Metode Pelaksanaan Tes</h3><p>Perbedaan terbesar terletak pada bagaimana tes diselenggarakan:</p><ul><li><strong>IELTS:</strong> Tersedia dalam format berbasis komputer dan kertas. Pada bagian Speaking, Anda akan melakukan wawancara tatap muka secara langsung dengan seorang penguji penutur asli (native speaker).</li><li><strong>TOEFL iBT:</strong> Seluruh tes dilakukan secara komputerisasi. Bahkan pada sesi Speaking, Anda akan berbicara menggunakan mikrofon dan rekaman suara Anda akan dinilai oleh sistem kombinasi AI dan penguji manusia.</li></ul><h3>2. Struktur Sesi Ujian</h3><p>Kedua tes menguji empat keterampilan utama, namun dengan pendekatan yang sedikit berbeda:</p><ul><li><strong>Listening:</strong> IELTS menggunakan aksen bahasa Inggris yang beragam (British, Australian, American) dengan tipe soal isian singkat dan pilihan ganda. TOEFL didominasi aksen American dengan tipe soal pilihan ganda berbasis rekaman kuliah akademis.</li><li><strong>Writing:</strong> IELTS mengharuskan Anda mendeskripsikan grafik/tabel di tugas pertama dan menulis esai argumentatif di tugas kedua. TOEFL menguji kemampuan integrasi (membaca, mendengarkan, lalu menulis rangkuman) dan esai diskusi akademis.</li></ul><h3>3. Sistem Penilaian (Skor)</h3><p>Sistem skor keduanya sangat berbeda. IELTS dinilai menggunakan skala Band Score dari 1.0 hingga 9.0 (dengan kenaikan per 0.5). Sementara itu, TOEFL iBT dinilai dengan rentang skor total dari 0 hingga 120 (masing-masing dari 4 sesi bernilai maksimum 30 poin).</p><h3>4. Negara dan Beasiswa Mana yang Harus Dipilih?</h3><p>Secara umum, IELTS sangat populer di Inggris, Australia, Selandia Baru, Kanada, dan Eropa. TOEFL iBT sangat dominan di Amerika Serikat. Namun saat ini, hampir semua universitas top dunia menerima keduanya. Pilihlah tes yang sesuai dengan kenyamanan Anda: apakah Anda lebih suka berbicara langsung dengan manusia (IELTS) or berinteraksi penuh dengan komputer (TOEFL).</p>',
                'author' => 'Andi Wijaya (IELTS Trainer & Consultant)',
                'thumbnail' => 'https://picsum.photos/id/24/600/400',
                'created_at' => '2026-06-01 09:15:00',
                'updated_at' => '2026-06-01 09:15:00',
            ],
            [
                'title' => 'Cara Menghubungi Calon Promotor Akademik di Luar Negeri',
                'slug' => 'cara-menghubungi-calon-promotor-akademik-di-luar-negeri',
                'excerpt' => 'Untuk melamar beasiswa riset S2/S3, Anda membutuhkan persetujuan profesor. Pelajari etika menulis email dingin (cold email) agar direspon.',
                'content' => '<p>Bagi pelamar beasiswa jalur riset (Master by Research atau PhD), mendapatkan supervisor atau promotor akademik adalah salah satu prasyarat wajib. Menghubungi profesor luar negeri yang belum pernah Anda kenal (disebut cold emailing) membutuhkan strategi khusus agar email Anda dibaca dan dibalas. Berikut panduannya:</p><h3>1. Lakukan Riset Mendalam Mengenai Profil Profesor</h3><p>Jangan mengirim email massal yang sama ke banyak profesor. Cari profesor yang memiliki minat penelitian yang selaras dengan proposal tesis atau disertasi Anda. Baca setidaknya 2 atau 3 jurnal ilmiah terbaru yang dipublikasikan oleh profesor tersebut agar Anda memahami fokus riset terkininya.</p><h3>2. Gunakan Subjek Email yang Jelas dan Profesional</h3><p>Subjek email harus langsung menjelaskan maksud Anda. Gunakan format yang ringkas seperti:<br><strong>"Inquiry on PhD Supervision - [Nama Beasiswa / Bidang Riset]"</strong> atau <strong>"Prospective Research Student: [Nama Anda]"</strong>. Hal ini meminimalkan risiko email Anda masuk ke folder spam atau diabaikan karena dikira iklan.</p><h3>3. Struktur Isi Email yang Ringkas dan Padat</h3><p>Tulis email dalam bahasa Inggris yang formal dengan bagian-bagian berikut:</p><ul><li><strong>Salam & Pengenalan:</strong> Perkenalkan diri, latar belakang pendidikan, dan IPK Anda secara singkat.</li><li><strong>Ketertarikan Riset:</strong> Jelaskan mengapa Anda tertarik pada riset beliau, sebutkan jurnal beliau yang Anda baca, dan hubungkan dengan rencana riset Anda.</li><li><strong>Rencana Pendanaan:</strong> Nyatakan bahwa Anda sedang atau akan melamar beasiswa (misalnya LPDP, MEXT, atau AAS) untuk mendanai studi Anda secara penuh.</li></ul><h3>4. Lampirkan CV Akademik dan Ringkasan Proposal Riset</h3><p>Lampirkan CV akademik (maksimal 2 halaman) yang menonjolkan IPK, publikasi ilmiah, dan pengalaman riset. Sertakan juga ringkasan draf proposal penelitian (Research Proposal) sebanyak 1-2 halaman saja. Jangan melampirkan berkas berukuran besar lainnya kecuali diminta.</p>',
                'author' => 'Dr. Ahmad Fauzi (Research Fellow @ Tokyo Tech)',
                'thumbnail' => 'https://picsum.photos/id/24/600/400',
                'created_at' => '2026-05-28 11:20:00',
                'updated_at' => '2026-05-28 11:20:00',
            ],
            [
                'title' => 'Cara Menjawab Pertanyaan Wawancara Beasiswa dengan Metode STAR',
                'slug' => 'cara-menjawab-pertanyaan-wawancara-beasiswa-dengan-metode-star',
                'excerpt' => 'Pelajari cara menyusun jawaban wawancara beasiswa secara sistematis, logis, dan profesional menggunakan kerangka kerja STAR.',
                'content' => '<p>Tahap wawancara sering kali menjadi bagian yang paling menegangkan dalam seleksi beasiswa. Salah satu kesalahan umum kandidat adalah memberikan jawaban yang terlalu bertele-tele atau tidak fokus. Untuk mengatasinya, Anda bisa menggunakan metode STAR. Ini adalah kerangka kerja yang sangat efektif untuk menjawab pertanyaan berbasis perilaku (behavioral questions), seperti menceritakan pengalaman kepemimpinan atau cara mengatasi konflik.</p><h3>Mengenal Komponen Metode STAR</h3><p>STAR adalah singkatan dari empat elemen utama:</p><ul><li><strong>Situation (Situasi):</strong> Deskripsikan konteks atau latar belakang dari kejadian yang ingin Anda ceritakan secara singkat namun jelas.</li><li><strong>Task (Tugas):</strong> Jelaskan tanggung jawab atau tantangan utama yang harus diselesaikan dalam situasi tersebut.</li><li><strong>Action (Tindakan):</strong> Terangkan secara detail tindakan nyata apa yang Anda ambil untuk mengatasi masalah. Fokuskan pada peran Anda sendiri, bukan kelompok.</li><li><strong>Result (Hasil):</strong> Bagikan hasil akhir dari tindakan Anda. Sajikan data kuantitatif jika memungkinkan (misalnya: meningkatkan efisiensi sebesar 20%, menghemat waktu pendaftaran, dsb).</li></ul><h3>Contoh Penerapan Metode STAR</h3><p>Berikut adalah simulasi jawaban atas pertanyaan: <em>"Ceritakan momen ketika Anda berhasil menunjukkan kemampuan kepemimpinan Anda."</em></p><p><strong>[Situation]</strong> "Saat semester 6 kuliah S1, saya ditunjuk menjadi ketua panitia seminar nasional dengan target 500 peserta."</p><p><strong>[Task]</strong> "Tiga minggu sebelum acara dimulai, jumlah pendaftar baru mencapai 150 orang karena promosi offline kami kurang efektif."</p><p><strong>[Action]</strong> "Saya segera mereorganisasi tim humas dan mengalihkan fokus ke kampanye digital berbayar serta bekerja sama dengan 10 media partner kampus. Saya juga mengadakan kuis interaktif di Instagram untuk menarik audiens."</p><p><strong>[Result]</strong> "Hasilnya, dalam waktu dua minggu, kami berhasil mendaftarkan 580 peserta (melebihi target awal sebesar 16%) dan acara berjalan sukses tanpa hambatan teknis."</p>',
                'author' => 'Diana Putri (AAS Awardee @ Melbourne Uni)',
                'thumbnail' => 'https://picsum.photos/id/24/600/400',
                'created_at' => '2026-05-25 15:45:00',
                'updated_at' => '2026-05-25 15:45:00',
            ],
            [
                'title' => 'Timeline Persiapan Beasiswa Luar Negeri Sejak 1 Tahun Sebelum Apply',
                'slug' => 'timeline-persiapan-beasiswa-luar-negeri-sejak-1-tahun-sebelum-apply',
                'excerpt' => 'Persiapan yang terburu-buru adalah penyebab utama kegagalan beasiswa. Simak timeline aksi bulanan terbaik untuk kelolosan Anda.',
                'content' => '<p>Mempersiapkan pendaftaran beasiswa dan universitas luar negeri bukanlah proses instan. Banyak dokumen seperti sertifikat bahasa, surat rekomendasi, dan esai memerlukan waktu berbulan-bulan untuk dipoles hingga matang. Untuk memaksimalkan peluang lolos, berikut adalah timeline ideal 12 bulan yang bisa Anda ikuti:</p><h3>Bulan 1 - 3: Riset Mendalam dan Menentukan Target</h3><p>Mulailah dengan membuat daftar target beasiswa (seperti LPDP, AAS, Chevening, MEXT) beserta persyaratannya. Tentukan pula 3 universitas dan jurusan tujuan. Di tahap ini, lakukan penilaian mandiri terhadap kemampuan bahasa Inggris Anda dengan mengikuti tes simulasi (prediction test).</p><h3>Bulan 4 - 6: Persiapan dan Tes Kecakapan Bahasa Inggris</h3><p>Gunakan waktu ini untuk belajar secara intensif untuk IELTS atau TOEFL. Jadwalkan tes resmi pada bulan ke-6. Mengambil tes lebih awal memberi Anda waktu cadangan untuk tes ulang seandainya skor pertama belum memenuhi syarat minimum universitas tujuan Anda.</p><h3>Bulan 7 - 9: Pembuatan Esai dan Menghubungi Penulis Rekomendasi</h3><p>Mulailah menyusun draf pertama motivation letter, esai kontribusi, atau proposal penelitian. Tulis beberapa versi dan mintalah koreksi dari mentor atau alumni. Secara bersamaan, hubungi dosen atau atasan Anda untuk meminta kesediaan mereka menulis surat rekomendasi.</p><h3>Bulan 10 - 11: Pendaftaran Universitas & Penerjemahan Dokumen</h3><p>Dapatkan Letter of Acceptance (LoA) dari universitas pilihan Anda dengan mendaftar langsung ke portal admisi kampus. Pastikan juga semua ijazah, transkrip nilai, dan dokumen pendukung lainnya telah diterjemahkan oleh penerjemah tersumpah (sworn translator).</p><h3>Bulan 12: Pengajuan Aplikasi Beasiswa & Latihan Wawancara</h3><p>Unggah seluruh dokumen yang telah dipersiapkan dengan teliti ke portal beasiswa tujuan. Jangan mengirimkan aplikasi mepet dengan batas waktu (deadline) untuk menghindari server lambat. Setelah submit, segera lakukan latihan wawancara secara intensif.</p>',
                'author' => 'Rian Kurnia (MEXT Awardee @ Kyoto Uni)',
                'thumbnail' => 'https://picsum.photos/id/24/600/400',
                'created_at' => '2026-05-20 09:00:00',
                'updated_at' => '2026-05-20 09:00:00',
            ]
        ];

        foreach ($artikels as $art) {
            \App\Models\Artikel::create($art);
        }
    }
}
