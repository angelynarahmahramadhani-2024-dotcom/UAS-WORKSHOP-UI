<?php

namespace App\Http\Controllers;

use App\Models\KelasPremium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKelasController extends Controller
{
    public function index()
    {
        $classes = KelasPremium::orderBy('id', 'desc')->paginate(10);
        return view('admin.kelas.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'konten_publik' => 'nullable|string',
            'konten_premium' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|url|max:255',
            'status' => 'required|in:aktif,nonaktif',
            'link_zoom' => 'nullable|url|max:500',
            'link_rekaman' => 'nullable|url|max:500',
            'file_materi' => 'nullable|file|mimes:pdf|max:10240',
            'kurikulum' => 'nullable|string',
        ]);

        if ($request->filled('kurikulum')) {
            $decoded = json_decode($request->input('kurikulum'), true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $data['kurikulum'] = $decoded;
            } else {
                return back()->withErrors(['kurikulum' => 'Format kurikulum harus berupa JSON yang valid.'])->withInput();
            }
        }

        if ($request->hasFile('file_materi')) {
            $path = $request->file('file_materi')->store('materi-kelas', 'public');
            $data['file_materi'] = 'storage/' . $path;
        }

        KelasPremium::create($data);

        return redirect()->route('admin.kelas.index')->with('status', 'Kelas premium berhasil ditambahkan.');
    }

    public function edit(int $id)
    {
        $class = KelasPremium::findOrFail($id);
        return view('admin.kelas.edit', compact('class'));
    }

    public function update(Request $request, int $id)
    {
        $class = KelasPremium::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'konten_publik' => 'nullable|string',
            'konten_premium' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'thumbnail' => 'nullable|url|max:255',
            'status' => 'required|in:aktif,nonaktif',
            'link_zoom' => 'nullable|url|max:500',
            'link_rekaman' => 'nullable|url|max:500',
            'file_materi' => 'nullable|file|mimes:pdf|max:10240',
            'kurikulum' => 'nullable|string',
        ]);

        if ($request->filled('kurikulum')) {
            $decoded = json_decode($request->input('kurikulum'), true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $data['kurikulum'] = $decoded;
            } else {
                return back()->withErrors(['kurikulum' => 'Format kurikulum harus berupa JSON yang valid.'])->withInput();
            }
        } else {
            $data['kurikulum'] = null;
        }

        if ($request->hasFile('file_materi')) {
            if ($class->file_materi) {
                $oldPath = str_replace('storage/', '', $class->file_materi);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('file_materi')->store('materi-kelas', 'public');
            $data['file_materi'] = 'storage/' . $path;
        }

        $class->update($data);

        return redirect()->route('admin.kelas.index')->with('status', 'Kelas premium berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $class = KelasPremium::findOrFail($id);
        $class->delete();

        return redirect()->route('admin.kelas.index')->with('status', 'Kelas premium berhasil dihapus.');
    }
}
