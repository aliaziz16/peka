<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departments = Departement::all();
        return view('blog.department', compact('departments'));
    }
    public function show($id)
    {
        $department = Departement::findOrFail($id);
        return view('departments.show', compact('department'));
    }
}
