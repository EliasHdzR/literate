<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentController extends Controller
{
    public function index()
    {
        $templates = Template::all();
        $documents = Document::latest()->paginate(10);
        return view('documents.index', compact('documents', 'templates'));
    }

    public function create(Request $request)
    {
        if ($request->template_id != NULL) {
            $template = Template::find($request->input('template_id'));
            return view('documents.create-from-template', compact('template'));
        }

        return view('documents.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'folio' => 'required|string|max:20',
            'place' => 'required|string|max:255',
            'receiver_name' => 'required|string|max:255',
            'receiver_position' => 'required|string|max:255',
            'greeting' => 'required|string|max:255',
            'body' => 'required|string',
            'farewell' => 'required|string|max:255',
            'issuer_name' => 'required|string|max:255',
            'issuer_position' => 'required|string|max:255',
            'footer_text' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();

        try{
            $headerLogo = $request->file('imagen-header')
                ? $request->file('imagen-header')->store('logos', 'public')
                : $request->input('header-logo-url');
            $validated['header_logo_url'] = $headerLogo;

            $footerLogo = $request->file('imagen-footer')
                ? $request->file('imagen-footer')->store('logos', 'public')
                : $request->input('footer-logo-url');
            $validated['footer_logo_url'] = $footerLogo;

            Document::create($validated);
            DB::commit();
            return redirect()->route('documents.index')->with('success', 'Documento agregado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al subir las imágenes ' . $e->getMessage());
        }

        Document::create($validated);

        return redirect()->route('documents.index')->with('success', 'Documento agregado exitosamente');
    }

    public function update(Request $request, Document $document)
    {
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

    public function edit(Document $document)
    {
        return view('documents.edit', ['document' => $document]);
    }

    public function export($id)
    {
        $document = Document::findOrFail($id);
        $pdf = Pdf::loadView('documents.pdf', compact('document'));
        return $pdf->download('documento.pdf');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index')->with('status', 'el Documento ha sido eliminado');
    }
}
