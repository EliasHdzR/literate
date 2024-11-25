<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

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
            'header_logo_url' => ['sometimes','nullable','mimes:png.jpg,jpge','max:2048'],
            'place' => 'required',
            'receiver_name' => 'required',
            'receiver_position' => 'required',
            'greeting' => 'required',
            'body' => 'required',
            'farewell' => 'required', 
            'issuer_name' => 'required',
            'issuer_position' => 'required',
            'footer_text' => 'required',
            'footer_logo_url' => ['sometimes','nullable','mimes:png.jpg,jpge','max:2048'],
            'signature_limit_date' => 'required',
        ]);

        // Asignar imágenes provisionales si no se suben archivos
    if ($request->hasFile('header_logo_url')) {
        $validated['header_logo_url'] = $request->file('header_logo_url')->store('logos', 'public');
    } else {
        $validated['header_logo_url'] = '/public/img/logoTamaulipas.png'; // Ruta provisional
    }

    if ($request->hasFile('footer_logo_url')) {
        $validated['footer_logo_url'] = $request->file('footer_logo_url')->store('logos', 'public');
    } else {
        $validated['footer_logo_url'] = '/public/img/logoTamaulipas.png'; // Ruta provisional
    }

        Document::create($validated);

        return redirect()->route('documents.index')->with('success', 'Documento agregado exitosamente');
    }

    public function update(Request $request, Document $document) {
        $validated = $request->validate([
            'name' => 'required',
            'folio' => 'required',
            'header_logo_url' => ['sometimes', 'nullable', 'mimes:png,jpg,jpeg', 'max:2048'],
            'place' => 'required',
            'receiver_name' => 'required',
            'receiver_position' => 'required',
            'greeting' => 'required',
            'body' => 'required',
            'farewell' => 'required',
            'issuer_name' => 'required',
            'issuer_position' => 'required',
            'footer_text' => 'required',
            'footer_logo_url' => ['sometimes', 'nullable', 'mimes:png,jpg,jpeg', 'max:2048'],
            'signature_limit_date' => 'required|date',
        ]);
    
        // Actualiza el documento con los datos validados
        $document->update($validated);
    
        return redirect()->route('documents.index')->with('success', 'Documento actualizado exitosamente');
    }    

    public function edit(Document $document) {
        return view('documents.edit', ['document' => $document]);
    }

    public function destroy(Document $document) {
        $document->delete();
        return redirect()->route('documents.index')->with('status', 'el Documento ha sido eliminado');
    }
}
