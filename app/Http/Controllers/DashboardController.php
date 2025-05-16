<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            $adminUsers = User::where('role_id', 1)->get();
            $penugasUsers = User::where('role_id', 2)->get();
            $pelaksanaUsers = User::where('role_id', 3)->get();
            $todos = Todo::all();
            $roles = Role::withCount('users')->get();
            
            return view('user.admin.dashboard', compact('adminUsers', 'penugasUsers', 'pelaksanaUsers', 'todos', 'roles'));
        } elseif ($user->isPenugas()) {
            return view('user.penugas.dashboard');
        } elseif ($user->isPelaksana()) {
            return view('user.pelaksana.dashboard');
        }

        // Fallback for users without a role
        return redirect()->route('login');
    }

   
}
