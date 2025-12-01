<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');

        $query = User::select('id','name','email','created_at','is_admin')
            ->orderBy('created_at','desc');

        if ($q) {
            $query->where(function($w) use ($q) {
                $w->where('name', 'like', "%{$q}%")
                  ->orWhere('email', 'like', "%{$q}%");
            });
        }

        $users = $query->paginate(15)->withQueryString();

        return view('admin.users.index', compact('users','q'));
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if (! $user) {
            return redirect()->route('admin.users.index')->with('status','User not found');
        }
        // Prevent deleting self
        if ($request->user()->id === $user->id) {
            return redirect()->route('admin.users.index')->with('status','You cannot delete yourself');
        }

        $user->tokens()->delete();
        $user->delete();

        return redirect()->route('admin.users.index')->with('status','User deleted');
    }

    /**
     * Toggle admin flag for a user (promote/demote).
     */
    public function toggleAdmin(Request $request, $id)
    {
        $user = User::find($id);
        if (! $user) {
            return redirect()->route('admin.users.index')->with('status','User not found');
        }

        // Prevent demoting/changing own admin status via UI.
        if ($request->user()->id === $user->id) {
            return redirect()->route('admin.users.index')->with('status','You cannot change your own admin status');
        }

        $user->is_admin = ! $user->is_admin;
        $user->save();

        $msg = $user->is_admin ? 'User promoted to admin' : 'User demoted from admin';
        return redirect()->route('admin.users.index')->with('status', $msg);
    }
}
