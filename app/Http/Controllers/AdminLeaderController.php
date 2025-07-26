<?php

namespace App\Http\Controllers;

use App\Models\Leader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::latest()->paginate(10);
        return view('admin.leaders.index', compact('leaders'));
    }

    public function create()
    {
        return view('admin.leaders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('leaders', 'public');
        }

        Leader::create($validated);

        return redirect()->route('admin.leaders.index')->with('success', 'Leader berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $leader = Leader::findOrFail($id);
        return view('admin.leaders.edit', compact('leader'));
    }

    public function update(Request $request, $id)
    {
        $leader = Leader::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($leader->photo) {
                Storage::disk('public')->delete($leader->photo);
            }
            $validated['photo'] = $request->file('photo')->store('leaders', 'public');
        }

        $leader->update($validated);

        return redirect()->route('admin.leaders.index')->with('success', 'Leader berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $leader = Leader::findOrFail($id);
        
        // Delete photo if exists
        if ($leader->photo) {
            Storage::disk('public')->delete($leader->photo);
        }

        $leader->delete();
        return redirect()->route('admin.leaders.index')->with('success', 'Leader berhasil dihapus.');
    }
}