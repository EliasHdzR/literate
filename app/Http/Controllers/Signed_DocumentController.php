<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Signed_DocumentController extends Controller
{
    public function index() {
        $signed = Signed_Document::latest()->paginate(10);
        return view('signed.index', compact('signed'));
    }

    public function create() { return view('signed.create'); }

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

        Signed_Document::create($validated);

        return redirect()->route('signed.index')->with('success', 'documento firmado agregado exitosamente');
    }

    public function edit(Signed_Document $signedD) {
        return view('signed.edit', ['signed_document' => $signedD]);
    }

    public function destroy(Signed_Document $signedD) {
        $signedD->delete();
        return redirect()->route('signed.index')->with('status', 'el documento firmado ha sido eliminado');
    }
}
