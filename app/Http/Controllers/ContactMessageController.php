<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($data);

        return redirect()->back()->with('status', 'Message sent — the admin will review it.');
    }

    // Admin index to view messages
    public function adminIndex()
    {
        $messages = ContactMessage::orderBy('created_at','desc')->paginate(20);
        return view('admin.messages.index', compact('messages'));
    }

    public function destroy($id)
    {
        $m = ContactMessage::find($id);
        if (! $m) {
            return redirect()->route('admin.messages.index')->with('status','Message not found');
        }
        $m->delete();
        return redirect()->route('admin.messages.index')->with('status','Message deleted');
    }
}
