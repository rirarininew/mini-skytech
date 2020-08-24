<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create()
    {
        return view ('users.adduser');
    }

    public function store(Request $request)
    {

       User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

       return redirect('home/user')->with('success', 'selamat data berhasil ditambah!');
    }

    public function update(Request $request, $Post)
    {
        User::where('id', $Post)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

         return redirect('home/user')->with('Success', 'data berhasil diupdate');
    }

    public function edit(User $Post)
    {
        return view ('users.edituser', compact('Post'));
    }

    public function status(Request $request, $Post)
    {
        User::where('id', $Post)->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
}
