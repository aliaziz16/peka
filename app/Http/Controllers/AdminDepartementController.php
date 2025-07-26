<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::latest()->paginate(10);
        return view('admin.departements.index', compact('departements'));
    }

    public function create()
    {
        return view('admin.departements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'program_work' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('departements', 'public');
        }

        Departement::create($validated);

        return redirect()->route('admin.departements.index')->with('success', 'Departemen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        return view('admin.departements.edit', compact('departement'));
    }

    public function update(Request $request, $id)
    {
        $departement = Departement::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'program_work' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($departement->image) {
                Storage::disk('public')->delete($departement->image);
            }
            $validated['image'] = $request->file('image')->store('departements', 'public');
        }

        $departement->update($validated);

        return redirect()->route('admin.departements.index')->with('success', 'Departemen berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $departement = Departement::findOrFail($id);
        
        // Delete image if exists
        if ($departement->image) {
            Storage::disk('public')->delete($departement->image);
        }

        $departement->delete();
        return redirect()->route('admin.departements.index')->with('success', 'Departemen berhasil dihapus.');
    }
}