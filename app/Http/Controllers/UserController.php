<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\SimbatApi;
use App\Models\Checkup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate($request->unit ?? 10);
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);

            User::create($data);

            return to_route('user.index')->with('success', 'User berhasil ditambahkan');
        } catch (\Throwable $th) {
            return to_route('user.index')->with('error', 'User gagal ditambahkan');
        }
    }

    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }
    public function dashboard()
    {
        $drugTopSell = SimbatApi::getDrugTopSell();
        $user = Auth::user();
        $pemeriksaan = Checkup::whereDate('created_at', now())->count();
        $inap = Checkup::whereQueued(false)->whereStatus('menunggu')->count();
        return view('pages.user.dashboard', compact('user', 'pemeriksaan', 'inap', 'drugTopSell'));
    }
    public function profile()
    {
        $user = Auth::user();
        return view('pages.user.profile', compact('user'));
    }
    public function profileEdit()
    {
        $user = Auth::user();
        return view('pages.user.profileEdit', compact('user'));
    }
    public function profileUpdate(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->update($request->only(['specialization', 'name']));
        return to_route('profile')->with('success', 'Berhasil mengubah profile');
    }

    public function update(Request $request, User $user)
    {
        try {
            $user->update($request->all);
            return to_route('user.index')->with('success', 'Berhasil mengubah data user');
        } catch (\Throwable $th) {
            return to_route('user.index')->with('error', 'Gagal mengubah data user');
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return to_route('user.index')->with('success', 'Berhasil menghapus data user');
        } catch (\Throwable $th) {
            return to_route('user.index')->with('error', 'Gagal menghapus data user');
        }
    }
}
