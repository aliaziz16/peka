<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BeritaController extends Controller
{
    public function berita()
    {
        $posts = Post::latest()->paginate(6); // Sesuaikan jumlah per halaman
        return view('blog.berita', compact('posts'));
    }

    public function isiBerita()
    {
        return view('blog.isi-berita');
    }
    public function sejarah()
    {
        return view('blog.sejarah');
    }
}
