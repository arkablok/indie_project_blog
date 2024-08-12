<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = User::latest()->paginate(5);

        return view('admin.dashboard', compact('users'));
    }

    public function see(){
        return view('admin.view-image');
    }

    public function makeAdmin($id)
    {
        $user = User::findOrFail($id); // Menemukan user berdasarkan ID

        $user->is_admin = true; // Mengatur is_admin menjadi true (1) untuk menandai sebagai admin
        $user->save(); // Menyimpan perubahan

        return redirect()->back()->with('success', 'User berhasil dijadikan admin!');
    }

    // Method untuk menghapus status admin dari user
    public function removeAdmin($id)
    {
        if ($id != 1) { // Misalnya, ID 1 adalah pengguna yang tidak dapat dihapus dari status admin
            $user = User::findOrFail($id); // Menemukan user berdasarkan ID

            $user->is_admin = false; // Mengatur is_admin menjadi false (0) untuk menghapus status admin
            $user->save(); // Menyimpan perubahan

            $text = 'User berhasil diremove sebagai admin!';
    
            return redirect()->back()->with('success', $text);
        } else {
            return redirect()->back()->with('error', 'User tidak dapat diremove dari status admin');
        }
    }
}
