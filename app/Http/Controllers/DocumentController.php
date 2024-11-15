<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index() {
        $documents = Document::latest()->paginate(10);
        return view('documents.index', compact('documents'));
    }

    public function create() { return view('documents.create'); }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'folio' => 'required',
            'header_logo_url' => 'required',
            'place' => 'required',
            'receiver_name' => 'required',
            'receiver_position' => 'required',
            'greeting' => 'required',
            'body' => 'required',
            'farewell' => 'required', 
            'issuer_name' => 'required',
            'issuer_position' => 'required',
            'footer_text' => 'required',
            'footer_logo_url' => 'required',
            'signature_limit_date' => 'required',
        ]);

        Document::create($validated);

        return redirect()->route('documents.index')->with('success', 'Documento agregado exitosamente');
    }

    public function edit(Document $document) {
        return view('documents.edit', ['document' => $document]);
    }

    public function destroy(Document $document) {
        $document->delete();
        return redirect()->route('documents.index')->with('status', 'el Documento ha sido eliminado');
    }
}
