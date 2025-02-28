<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            User::create($request->all());
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            return abort(400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.user.edit', compact('user'));
    }
    public function dashboard()
    {
        return view('pages.user.dashboard');
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $user->update($request->all);
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            return abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('user.index');
        } catch (\Throwable $th) {
            return abort(400);
        }
    }
}
