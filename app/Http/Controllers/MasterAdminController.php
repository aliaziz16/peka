<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterAdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('dashboard.master', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => trim($request->name),
            'email' => strtolower(trim($request->email)),
            'password' => 'required|min:6',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'approved',
        ]);

        return back()->with('success', 'Admin berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $id,
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Admin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Admin::destroy($id);
        return back()->with('success', 'Admin berhasil dihapus.');
    }

    public function approve($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update(['status' => 'approved']);
        return back()->with('success', 'Admin disetujui.');
    }

    public function reject($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update(['status' => 'rejected']);
        return back()->with('success', 'Admin ditolak.');
    }
}
