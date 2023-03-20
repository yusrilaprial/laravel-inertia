<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('updated_at', 'desc')->get();
        $title = 'Users Page';
        return Inertia::render('User/Index', ['users' => $users, 'title' => $title]);
    }

    public function show(User $user)
    {
        // $user = User::findOrFail($id);
        $title = 'Detail User';
        $user->created = Carbon::parse($user->created_at)->format('Y-m-d H:i:s');
        return Inertia::render('User/Detail', ['user' => $user, 'title' => $title]);
    }

    public function create()
    {
        $title = 'Register User';
        return Inertia::render('User/Register', ['title' => $title]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|min:6',
            'valid_password' => 'required|min:6|same:password',
        ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);

        $post = $request->all();
        $post['password'] = Hash::make($request->password);
        User::create($post);

        return to_route('user.index')->with(['status' => 'success', 'message' => 'User created successfully.']);
    }
    public function edit()
    {
        $title = 'Edit User';
        return Inertia::render('User/Register', ['title' => $title]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|min:6',
            'valid_password' => 'required|min:6|same:password',
        ]);

        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password)
        // ]);

        $post = $request->all();
        $post['password'] = Hash::make($request->password);
        User::create($post);

        return to_route('user.index')->with(['status' => 'success', 'message' => 'User created successfully.']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return to_route('user.index')->with(['status' => 'errors', 'message' => 'Delete user successfully.']);
    }
}
