<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = User::get();
        return view('auth.user', compact('datas'));
    }

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $count = User::where('username', $request->input('username'))->count();

        if ($count > 0) {
            Alert::error('Oopss..', 'User Sudah Ada!');
            return redirect()->to('user');
        }

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
            $request->file('gambar')->move("images/user", $fileName);
            $gambar = $fileName;
        } else {
            $gambar = NULL;
        }

        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'level' => $request->input('level'),
            'password' => bcrypt(($request->input('password'))),
            'gambar' => $gambar
        ]);

        return redirect()->route('user.index')->with('success', 'User Berhasil Terdaftar!');
    }

    public function show($id)
    {
        $datas = User::findOrFail($id);

        return view('auth.show', compact('datas'));
    }

    public function edit($id)
    {
        $datas = User::findOrFail($id);

        return view('auth.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $user_data = User::findOrFail($id);

        if ($request->file('gambar')) {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
            $request->file('gambar')->move("images/user", $fileName);
            $user_data->gambar = $fileName;
        }

        $user_data->name = $request->input('name');
        $user_data->email = $request->input('email');
        if ($request->input('password')) {
            $user_data->level = $request->input('level');
        }

        if ($request->input('password')) {
            $user_data->password = bcrypt(($request->input('password')));
        }

        $user_data->update();

        return redirect()->to('user')->with('success', 'User Berhasil Diupdate!');
    }

    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['status' => 'User Berhasil Terhapus!']);
    }
}
