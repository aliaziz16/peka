<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MasterAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = MasterAdmin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session([
                'master_admin_id' => $admin->id,
                'nama_master_admin' => $admin->name // ini baris tambahan
            ]);

            return redirect()->route('dashboard.master'); // sesuaikan dengan route dashboard kamu
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout()
    {
        session()->forget('master_admin_id');
        return redirect()->route('master.login');
    }
}
