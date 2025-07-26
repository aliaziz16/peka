<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{

    public function index()
    {
        $leaders_ipnu = Leader::where('position', 'Ketua IPNU')->get();
        $leaders_ippnu = Leader::where('position', 'Ketua IPPNU')->get();

        return view('home', compact('leaders_ipnu', 'leaders_ippnu'));
    }
}
