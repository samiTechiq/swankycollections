<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(): View
    {
        $chats = Contact::latest()->paginate(15);
        return view('admins.messages.index', compact('chats'));
    }

    public function destroy(string $id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->back();
    }
}
