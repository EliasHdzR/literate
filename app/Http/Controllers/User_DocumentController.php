<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User_DocumentController extends Controller
{
    public function index() {
        $userDoc = User_Document::latest()->paginate(10);
        return view('userDoc.index', compact('userDoc'));
    }

    public function create() { return view('userDoc.create'); }

    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required',
            'document_id' => 'required',
        ]);

        User_Document::create($validated);

        return redirect()->route('userDoc.index')->with('success', 'documento firmado agregado exitosamente');
    }

    public function edit(User_Document $userD) {
        return view('userDoc.edit', ['user_document' => $userD]);
    }

    public function destroy(User_Document $userD) {
        $userD->delete();
        return redirect()->route('userDoc.index')->with('status', 'el documento firmado ha sido eliminado');
    }
}
