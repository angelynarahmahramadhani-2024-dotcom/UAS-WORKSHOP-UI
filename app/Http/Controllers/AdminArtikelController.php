<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Artikel::orderBy('id', 'desc')->paginate(10);
        return view('admin.artikel.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'thumbnail_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'thumbnail_url' => 'nullable|url|max:255',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(4);

        if ($request->hasFile('thumbnail_file')) {
            $path = $request->file('thumbnail_file')->store('artikel-thumbnails', 'public');
            $data['thumbnail'] = 'storage/' . $path;
        } elseif ($request->filled('thumbnail_url')) {
            $data['thumbnail'] = $request->input('thumbnail_url');
        } else {
            $data['thumbnail'] = 'https://picsum.photos/id/24/600/400'; // Default fallback
        }

        // Clean up input keys
        unset($data['thumbnail_file']);
        unset($data['thumbnail_url']);

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('status', 'Artikel baru berhasil diterbitkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $article = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $article = Artikel::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'thumbnail_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'thumbnail_url' => 'nullable|url|max:255',
        ]);

        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(4);

        if ($request->hasFile('thumbnail_file')) {
            // Delete old file if exists
            if ($article->thumbnail && !str_starts_with($article->thumbnail, 'http')) {
                $oldPath = str_replace('storage/', '', $article->thumbnail);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('thumbnail_file')->store('artikel-thumbnails', 'public');
            $data['thumbnail'] = 'storage/' . $path;
        } elseif ($request->filled('thumbnail_url')) {
            $data['thumbnail'] = $request->input('thumbnail_url');
        }

        // Clean up input keys
        unset($data['thumbnail_file']);
        unset($data['thumbnail_url']);

        $article->update($data);

        return redirect()->route('admin.artikel.index')->with('status', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $article = Artikel::findOrFail($id);

        if ($article->thumbnail && !str_starts_with($article->thumbnail, 'http')) {
            $oldPath = str_replace('storage/', '', $article->thumbnail);
            Storage::disk('public')->delete($oldPath);
        }

        $article->delete();

        return redirect()->route('admin.artikel.index')->with('status', 'Artikel berhasil dihapus.');
    }
}
