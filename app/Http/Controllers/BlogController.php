<?php

namespace App\Http\Controllers;

use App\Services\WordPressService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected WordPressService $wpService;

    public function __construct(WordPressService $wpService)
    {
        $this->wpService = $wpService;
    }

    /**
     * Display list of blog posts.
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $posts = $this->wpService->getPosts(10, $page);

        return view('blog.index', compact('posts', 'page'));
    }

    /**
     * Display detailed content of a blog post.
     */
    public function show(int $id)
    {
        $post = $this->wpService->getPost($id);

        if (!$post) {
            abort(404, 'Artikel tidak ditemukan.');
        }

        return view('blog.show', compact('post'));
    }
}
