<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function showLoginForm() {
        return view("auth.login");
    }

    public function showRegistrationForm() {
        return view("auth.register");
    }
    public function store() {
        $validated = request()->validate([
            "name" => "nullable|string|max:40",
            "email" => "required|email",
            "password" => "required|min:6|confirmed",
            "phone" => "nullable|regex:/^0[0-9]{9,10}$/",
        ]);

        User::create([
            "name"=> $validated["name"],
            "email"=> $validated["email"],
            "phone"=> $validated["phone"],
            "password"=> Hash::make($validated["password"]),
        ]);

        return redirect()->route("home")->with("success", "Đăng ký tài khoản thành công!");
    }

    public function authenticate() {
        $validated = request()->validate([
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->intended(route("home"))->with("success", "Đăng nhập thành công!");
        }

        return redirect()->route("login")->withErrors([
            "email" => "Email hoặc mật khẩu không đúng.",
        ])->onlyInput("email");
    }

    public function logout() {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route("home")->with("success", "Đăng xuất thành công!");
    }
}
