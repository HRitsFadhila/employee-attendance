<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request){
        $users = User::with('roles')
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
                });
            })
            ->latest()
            ->paginate(5)
            ->withQueryString();
        return Inertia::render('Users/index', [
            'users' => $users,
            'filters' => [
                'search' => $request->search,
            ],
        ]);
    }
    public function create()
    {
        return Inertia::render('Users/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('users.index')->with('success', 'add user successfully');
    }

    public function edit(User $user)
    {
        return Inertia::render('Users/edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'min:8', 'confirmed']
        ]);
        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];
        if($request->filled('password')){
            $data['password'] = Hash::make($validated['password']);
        };
        $user->update($data);
        return redirect()->route('users.index')->with('success', 'user updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'user has been successfully deleted');
    }
}
