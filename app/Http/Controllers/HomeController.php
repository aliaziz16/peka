<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Leader;
use App\Models\Quote;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $departments = Departement::all();
        $ipnu = Leader::where('position', 'IPNU')->get();
        $ippnu = Leader::where('position', 'IPPNU')->get();
        $quotes = Quote::latest()->take(5)->get();
        $posts = Post::latest()->take(6)->get();
        $leaders_ipnu = Leader::where('position', 'Ketua IPNU')->get();
        $leaders_ippnu = Leader::where('position', 'Ketua IPPNU')->get();
        $sejarah = Post::where('slug', 'sejarah-pimpinan-komisariat-pk-ipnu-ippnu-unwaha')->first();
        return view('home', compact(
            'departments',
            'ipnu',
            'ippnu',
            'quotes',
            'posts',
            'leaders_ipnu',
            'leaders_ippnu',
            'sejarah'
        ));
    }
}
