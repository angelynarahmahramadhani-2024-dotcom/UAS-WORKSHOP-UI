<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class WordPressPost extends Command
{
    protected $signature = 'wp:post
                            {action : Aksi yang ingin dilakukan: list, create, update, delete, attach-images}
                            {--id= : ID post WordPress (untuk update/delete)}
                            {--title= : Judul artikel}
                            {--content= : Isi konten artikel}
                            {--excerpt= : Ringkasan artikel}
                            {--status=publish : Status: publish, draft, private}
                            {--author=1 : ID author WordPress}';

    protected $description = 'Kelola artikel WordPress langsung dari terminal (tanpa buka WP Admin)';

    // Nama database WordPress
    protected string $wpDb = 'wordpress_findship';

    public function handle(): void
    {
        $action = $this->argument('action');

        match ($action) {
            'list'          => $this->listPosts(),
            'create'        => $this->createPost(),
            'update'        => $this->updatePost(),
            'delete'        => $this->deletePost(),
            'attach-images' => $this->attachImages(),
            default         => $this->error("Aksi tidak dikenal. Gunakan: list, create, update, delete, attach-images"),
        };
    }

    // ─── LIST ────────────────────────────────────────────────────────────────
    private function listPosts(): void
    {
        $posts = DB::connection('wordpress')->table('wp_posts')
            ->where('post_type', 'post')
            ->whereIn('post_status', ['publish', 'draft'])
            ->orderByDesc('post_date')
            ->get(['ID', 'post_title', 'post_status', 'post_date']);

        if ($posts->isEmpty()) {
            $this->warn('Belum ada artikel di WordPress.');
            return;
        }

        $this->table(
            ['ID', 'Judul', 'Status', 'Tanggal'],
            $posts->map(fn($p) => [$p->ID, $p->post_title, $p->post_status, $p->post_date])->toArray()
        );
    }

    // ─── CREATE ───────────────────────────────────────────────────────────────
    private function createPost(): void
    {
        $title   = $this->option('title')   ?? $this->ask('Judul artikel');
        $content = $this->option('content') ?? $this->ask('Isi konten artikel');
        $excerpt = $this->option('excerpt') ?? $this->ask('Ringkasan (excerpt)', '');
        $status  = $this->option('status');
        $author  = $this->option('author');

        $slug = \Str::slug($title);
        $now  = now()->format('Y-m-d H:i:s');

        $id = DB::connection('wordpress')->table('wp_posts')->insertGetId([
            'post_author'           => $author,
            'post_date'             => $now,
            'post_date_gmt'         => $now,
            'post_content'          => $content,
            'post_title'            => $title,
            'post_excerpt'          => $excerpt,
            'post_status'           => $status,
            'comment_status'        => 'open',
            'ping_status'           => 'open',
            'post_name'             => $slug,
            'post_modified'         => $now,
            'post_modified_gmt'     => $now,
            'post_type'             => 'post',
            'to_ping'               => '',
            'pinged'                => '',
            'post_content_filtered' => '',
        ]);

        $this->info("✅ Artikel berhasil dibuat! ID: $id");
        $this->line("   Judul : $title");
        $this->line("   Status: $status");
        $this->line("   URL   : http://wordpress-findship.test/?p=$id");
    }

    // ─── UPDATE ───────────────────────────────────────────────────────────────
    private function updatePost(): void
    {
        $id = $this->option('id') ?? $this->ask('ID artikel yang ingin diupdate');

        $post = DB::connection('wordpress')->table('wp_posts')->find($id);

        if (!$post) {
            $this->error("Artikel dengan ID $id tidak ditemukan.");
            return;
        }

        $this->line("Artikel saat ini: <fg=yellow>{$post->post_title}</>");

        $data = array_filter([
            'post_title'        => $this->option('title')   ?? null,
            'post_content'      => $this->option('content') ?? null,
            'post_excerpt'      => $this->option('excerpt') ?? null,
            'post_status'       => $this->option('status') !== 'publish' ? $this->option('status') : null,
            'post_modified'     => now()->format('Y-m-d H:i:s'),
            'post_modified_gmt' => now()->format('Y-m-d H:i:s'),
        ]);

        if (count($data) <= 2) {
            // hanya timestamp, tidak ada perubahan nyata
            $this->warn('Tidak ada field yang diubah. Gunakan --title, --content, --excerpt, atau --status.');
            return;
        }

        DB::connection('wordpress')->table('wp_posts')->where('ID', $id)->update($data);

        $this->info("✅ Artikel ID $id berhasil diupdate!");
    }

    // ─── DELETE ───────────────────────────────────────────────────────────────
    private function deletePost(): void
    {
        $id = $this->option('id') ?? $this->ask('ID artikel yang ingin dihapus');

        $post = DB::connection('wordpress')->table('wp_posts')->find($id);

        if (!$post) {
            $this->error("Artikel dengan ID $id tidak ditemukan.");
            return;
        }

        if ($this->confirm("Hapus artikel \"$post->post_title\"? Tindakan ini tidak bisa dibatalkan.")) {
            DB::connection('wordpress')->table('wp_posts')->where('ID', $id)->delete();
            DB::connection('wordpress')->table('wp_postmeta')->where('post_id', $id)->delete();
            $this->info("✅ Artikel ID $id berhasil dihapus.");
        } else {
            $this->line('Dibatalkan.');
        }
    }

    private function attachImages(): void
    {
        $mappings = [
            11 => ['title' => 'lpdp-tips', 'file' => 'lpdp-tips.jpg'],
            12 => ['title' => 'motivation-letter', 'file' => 'motivation-letter.jpg'],
            13 => ['title' => 'beasiswa-luar-negeri', 'file' => 'beasiswa-luar-negeri.jpg'],
            14 => ['title' => 'wawancara-beasiswa', 'file' => 'wawancara-beasiswa.jpg'],
            15 => ['title' => 'dokumen-beasiswa', 'file' => 'dokumen-beasiswa.jpg'],
        ];

        foreach ($mappings as $postId => $info) {
            $file = $info['file'];
            $title = $info['title'];
            $guid = 'http://wordpress-findship.test/wp-content/uploads/2026/07/' . $file;
            $now = now()->format('Y-m-d H:i:s');

            // Cek jika lampiran sudah ada
            $att = DB::connection('wordpress')->table('wp_posts')
                ->where('post_type', 'attachment')
                ->where('guid', $guid)
                ->first();

            if (!$att) {
                // Insert attachment post
                $attId = DB::connection('wordpress')->table('wp_posts')->insertGetId([
                    'post_author'           => 1,
                    'post_date'             => $now,
                    'post_date_gmt'         => $now,
                    'post_content'          => '',
                    'post_title'            => $title,
                    'post_excerpt'          => '',
                    'post_status'           => 'inherit',
                    'comment_status'        => 'open',
                    'ping_status'           => 'closed',
                    'post_name'             => $title,
                    'post_modified'         => $now,
                    'post_modified_gmt'     => $now,
                    'post_type'             => 'attachment',
                    'post_mime_type'        => 'image/jpeg',
                    'guid'                  => $guid,
                    'to_ping'               => '',
                    'pinged'                => '',
                    'post_content_filtered' => '',
                ]);
                $this->info("Created attachment ID $attId for $file");
            } else {
                $attId = $att->ID;
                $this->line("Found existing attachment ID $attId for $file");
            }

            // Set metadata lampiran
            $metaAttached = DB::connection('wordpress')->table('wp_postmeta')
                ->where('post_id', $attId)
                ->where('meta_key', '_wp_attached_file')
                ->first();

            if (!$metaAttached) {
                DB::connection('wordpress')->table('wp_postmeta')->insert([
                    'post_id' => $attId,
                    'meta_key' => '_wp_attached_file',
                    'meta_value' => '2026/07/' . $file
                ]);
            }

            // Hubungkan lampiran ke postingan (featured image)
            $metaThumbnail = DB::connection('wordpress')->table('wp_postmeta')
                ->where('post_id', $postId)
                ->where('meta_key', '_thumbnail_id')
                ->first();

            if (!$metaThumbnail) {
                DB::connection('wordpress')->table('wp_postmeta')->insert([
                    'post_id' => $postId,
                    'meta_key' => '_thumbnail_id',
                    'meta_value' => $attId
                ]);
                $this->info("Linked post $postId to attachment $attId");
            } else {
                DB::connection('wordpress')->table('wp_postmeta')
                    ->where('post_id', $postId)
                    ->where('meta_key', '_thumbnail_id')
                    ->update(['meta_value' => $attId]);
                $this->line("Updated link for post $postId to attachment $attId");
            }
        }
    }
}

