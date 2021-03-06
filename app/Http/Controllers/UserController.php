<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Dotenv\Validator;
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
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

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
            'level' => 'required|in:Admin,Perawat',
            'profil' => 'image',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($request->file('profil')) {
            $file = $request->file('profil');
            $dt = Carbon::now();
            $acak = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
            $request->file('profil')->move("images/user", $fileName);
            $profil = $fileName;
        } else {
            $profil = NULL;
        }

        User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'level' => $request->input('level'),
            'password' => bcrypt(($request->input('password'))),
            'profil' => $profil
        ]);

        return redirect()->route('user.index')->with('success', 'User Berhasil Terdaftar!');
    }

    public function show($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = User::findOrFail($id);

        return view('auth.show', compact('datas'));
    }

    public function edit($id)
    {
        if (Auth::user()->level != 'Admin') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini');
            return redirect()->to('/');
        }

        $datas = User::findOrFail($id);

        return view('auth.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $user_data = User::findOrFail($id);

        if ($request->file('profil')) {
            $file = $request->file('profil');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
            $request->file('profil')->move("images/user", $fileName);
            $user_data->profil = $fileName;
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
