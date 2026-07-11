<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display list of blog posts.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = Artikel::latest();
        
        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
        }
        
        $posts = $query->paginate(9)->withQueryString();

        return view('blog.index', compact('posts', 'search'));
    }

    /**
     * Display detailed content of a blog post.
     */
    public function show($idOrSlug)
    {
        $post = Artikel::where('id', $idOrSlug)
            ->orWhere('slug', $idOrSlug)
            ->first();

        if (!$post) {
            abort(404, 'Artikel tidak ditemukan.');
        }

        return view('blog.show', compact('post'));
    }
}

