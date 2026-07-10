<?php

namespace App\Console\Commands;

use App\Models\Beasiswa;
use App\Models\Favorit;
use App\Models\Notifikasi;
use Illuminate\Console\Command;

class CekDeadlineBeasiswa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beasiswa:cek-deadline';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check scholarship deadlines and notify users who favorited them (H-7 and H-3).';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $today = today();
        
        $beasiswaH7 = Beasiswa::whereDate('deadline', $today->copy()->addDays(7))->get();
        $beasiswaH3 = Beasiswa::whereDate('deadline', $today->copy()->addDays(3))->get();
        $beasiswaH1 = Beasiswa::whereDate('deadline', $today->copy()->addDays(1))->get();

        // Process H-7
        foreach ($beasiswaH7 as $b) {
            $userIds = Favorit::where('beasiswa_id', $b->id)->pluck('user_id');
            foreach ($userIds as $userId) {
                $sudahAda = Notifikasi::where('user_id', $userId)
                    ->where('tipe', 'deadline')
                    ->where('url', '/scholarships/' . $b->id)
                    ->whereDate('created_at', $today)
                    ->exists();

                if (!$sudahAda) {
                    Notifikasi::kirim(
                        $userId,
                        '⏰ Deadline 7 hari lagi!',
                        'Beasiswa ' . $b->judul . ' akan ditutup dalam 7 hari. Segera siapkan dokumenmu!',
                        'deadline',
                        '/scholarships/' . $b->id
                    );
                }
            }
        }

        // Process H-3
        foreach ($beasiswaH3 as $b) {
            $userIds = Favorit::where('beasiswa_id', $b->id)->pluck('user_id');
            foreach ($userIds as $userId) {
                $sudahAda = Notifikasi::where('user_id', $userId)
                    ->where('tipe', 'deadline')
                    ->where('url', '/scholarships/' . $b->id)
                    ->whereDate('created_at', $today)
                    ->exists();

                if (!$sudahAda) {
                    Notifikasi::kirim(
                        $userId,
                        '⏰ Deadline 3 hari lagi!',
                        'Beasiswa ' . $b->judul . ' akan ditutup dalam 3 hari. Segera selesaikan pendaftaranmu!',
                        'deadline',
                        '/scholarships/' . $b->id
                    );
                }
            }
        }

        // Process H-1
        foreach ($beasiswaH1 as $b) {
            $userIds = Favorit::where('beasiswa_id', $b->id)->pluck('user_id');
            foreach ($userIds as $userId) {
                $sudahAda = Notifikasi::where('user_id', $userId)
                    ->where('tipe', 'deadline')
                    ->where('url', '/scholarships/' . $b->id)
                    ->whereDate('created_at', $today)
                    ->exists();

                if (!$sudahAda) {
                    Notifikasi::kirim(
                        $userId,
                        '🚨 Deadline BESOK!',
                        'Beasiswa ' . $b->judul . ' akan ditutup BESOK. Jangan lewatkan kesempatan ini, kirim pendaftaranmu sekarang!',
                        'deadline',
                        '/scholarships/' . $b->id
                    );
                }
            }
        }

        $this->info('Pemeriksaan deadline beasiswa selesai.');
    }
}
