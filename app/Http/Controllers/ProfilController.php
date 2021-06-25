<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index');
    }

    public function edit(Request $request)
    {
        return view('profil.edit', [
            'user' => $request->user()
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $request->user()->update(
            $request->all()
        );
        // $id = Auth::user()->id;
        // $user_data = User::findOrFail($id);

        // if ($request->file('gambar')) {
        //     $file = $request->file('gambar');
        //     $dt = Carbon::now();
        //     $acak  = $file->getClientOriginalExtension();
        //     $fileName = rand(11111, 99999) . '-' . $dt->format('Y-m-d-H-i-s') . '.' . $acak;
        //     $request->file('gambar')->move("images/user", $fileName);
        //     $user_data->gambar = $fileName;
        // }

        // $user_data->name = $request->input('name');
        // $user_data->username = $request->input('username');
        // $user_data->email = $request->input('email');
        // if ($request->input('password')) {
        //     $user_data->level = $request->input('level');
        // }

        // if ($request->input('password')) {
        //     $user_data->password = bcrypt(($request->input('password')));
        // }

        // $user_data->update();

        return redirect()->to('profil.index')->with('success', 'Profil Berhasil Diupdate!');
    }
}
