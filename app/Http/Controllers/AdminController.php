<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function store(Request $request) {
        $request->validate([
         'nama' => 'required',
         'email' => 'required|email',
         'password' => 'required',
         'jabatan' => 'required',
         'role_id' => 'required|numeric',
     ]);

     $user = new User();
     $user->name = $request->input('nama');
     $user->email = $request->input('email');
     $user->password = Hash::make($request->input('password'));
     $user->jabatan = $request->input('jabatan');
     $user->role_id = $request->input('role_id');
     $user->save();

     return redirect()->action([DashboardController::class, 'index']);
 }
}
