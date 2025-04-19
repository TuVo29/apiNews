<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControllerAdmin extends Controller
{
    // Lấy danh sách tất cả người dùng
    public function index()
    {
        $users = User::latest()->get();
        return response()->json($users);
    }

    // Lấy thông tin chi tiết một người dùng
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Cập nhật thông tin người dùng
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id",
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:user,admin',
        ]);

        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return response()->json([
            'message' => 'Cập nhật người dùng thành công',
            'user' => $user,
        ]);
    }

    // Xoá người dùng
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'Đã xoá người dùng thành công'
        ]);
    }


    // Thêm mới người dùng
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:user,admin',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), // Mã hoá mật khẩu
            'role' => $validated['role'],
        ]);

        return response()->json([
            'message' => 'Tạo người dùng mới thành công',
            'user' => $user,
        ], 201);
    }
}