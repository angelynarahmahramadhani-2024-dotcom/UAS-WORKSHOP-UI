<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class AdminBeasiswaController extends Controller
{
    public function index()
    {
        $scholarships = Beasiswa::orderBy('deadline', 'asc')->paginate(10);
        return view('admin.beasiswa.index', compact('scholarships'));
    }

    public function create()
    {
        return view('admin.beasiswa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'kategori' => 'required|in:dalam negeri,luar negeri',
            'jenjang' => 'required|string|max:50',
            'jurusan' => 'required|string|max:255',
            'min_ipk' => 'nullable|numeric|between:0.00,4.00',
            'deadline' => 'required|date',
            'deskripsi' => 'required|string',
            'link_resmi' => 'nullable|url|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $beasiswa = Beasiswa::create($data);

        // Send notification to matching active student users (limited to latest 100)
        $query = \App\Models\User::where('status', 'aktif')
            ->where('role', 'mahasiswa');

        // Match IPK
        if ($beasiswa->min_ipk) {
            $query->where(function($q) use ($beasiswa) {
                $q->where('ipk', '>=', $beasiswa->min_ipk)
                  ->orWhereNull('ipk');
            });
        }

        // Match Jurusan
        if ($beasiswa->jurusan && stripos($beasiswa->jurusan, 'Semua') === false) {
            $query->where(function($q) use ($beasiswa) {
                $q->where('jurusan', 'LIKE', '%' . $beasiswa->jurusan . '%')
                  ->orWhereNull('jurusan');
            });
        }

        $users = $query->latest()->limit(100)->pluck('id');

        foreach ($users as $userId) {
            \App\Models\Notifikasi::kirim(
                $userId,
                '🎓 Beasiswa Baru Tersedia!',
                $beasiswa->judul . ' dari ' . $beasiswa->penyelenggara . ' baru saja ditambahkan. Cek sekarang!',
                'beasiswa_baru',
                '/scholarships/' . $beasiswa->id
            );
        }

        return redirect()->route('admin.beasiswa.index')->with('status', 'Beasiswa berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $scholarship = Beasiswa::findOrFail($id);
        return view('admin.beasiswa.edit', compact('scholarship'));
    }

    public function update(Request $request, int $id)
    {
        $scholarship = Beasiswa::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'penyelenggara' => 'required|string|max:255',
            'kategori' => 'required|in:dalam negeri,luar negeri',
            'jenjang' => 'required|string|max:50',
            'jurusan' => 'required|string|max:255',
            'min_ipk' => 'nullable|numeric|between:0.00,4.00',
            'deadline' => 'required|date',
            'deskripsi' => 'required|string',
            'link_resmi' => 'nullable|url|max:255',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $scholarship->update($data);

        // Send notification to matching active student users (limited to latest 100)
        $query = \App\Models\User::where('status', 'aktif')
            ->where('role', 'mahasiswa');

        // Match IPK
        if ($scholarship->min_ipk) {
            $query->where(function($q) use ($scholarship) {
                $q->where('ipk', '>=', $scholarship->min_ipk)
                  ->orWhereNull('ipk');
            });
        }

        // Match Jurusan
        if ($scholarship->jurusan && stripos($scholarship->jurusan, 'Semua') === false) {
            $query->where(function($q) use ($scholarship) {
                $q->where('jurusan', 'LIKE', '%' . $scholarship->jurusan . '%')
                  ->orWhereNull('jurusan');
            });
        }

        $users = $query->latest()->limit(100)->pluck('id');

        foreach ($users as $userId) {
            \App\Models\Notifikasi::kirim(
                $userId,
                '📝 Beasiswa Diperbarui!',
                'Informasi beasiswa ' . $scholarship->judul . ' telah diperbarui oleh admin. Silakan cek detail terbarunya!',
                'info',
                '/scholarships/' . $scholarship->id
            );
        }

        return redirect()->route('admin.beasiswa.index')->with('status', 'Beasiswa berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $scholarship = Beasiswa::findOrFail($id);
        $scholarship->delete();

        return redirect()->route('admin.beasiswa.index')->with('status', 'Beasiswa berhasil dihapus.');
    }
}
