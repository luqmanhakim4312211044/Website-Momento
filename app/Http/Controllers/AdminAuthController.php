<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Tolak input kosong, bukan teks (misalnya array), atau berukuran tidak wajar.
        if (!is_string($username) || !is_string($password)
            || $username === '' || $password === ''
            || strlen($username) > 100 || strlen($password) > 255) {
            return back()->with('error', 'Username atau password salah');
        }

        $admin = Admin::where('username', $username)->first();

        if ($admin && password_verify($password, $admin->password)) {
            $request->session()->regenerate();
            Session::put('admin_logged_in', true);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
