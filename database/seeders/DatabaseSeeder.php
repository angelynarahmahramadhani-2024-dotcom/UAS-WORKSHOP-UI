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
                'thumbnail' => 'https://picsum.photos/id/20/600/400',
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
    }
}
