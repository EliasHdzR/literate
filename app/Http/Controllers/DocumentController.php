<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class DocumentController extends Controller
{
    public function index()
    {
        $templates = Template::all();
        $documents = Document::latest()->paginate(10);
        $users = User::where('role', 'user')->orderBy('name')->get();
        return view('documents.index', compact('documents', 'templates', 'users'));
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
            if($request->hasFile('header_logo')){
                $request->validate([
                    'header_logo' => ['mimes:png,jpg,jpeg','max:2048'],
                ]);

                $image = $request->file('header_logo');
                $image_url = $image->store('logos', ['disk' => 'public']);
                $validated['header_logo_url'] = $image_url;
            }

            if($request->hasFile('footer_logo')){
                $request->validate([
                    'footer_logo' => ['mimes:png,jpg,jpeg','max:2048'],
                ]);

                $image = $request->file('footer_logo');
                $image_url = $image->store('logos', ['disk' => 'public']);
                $validated['footer_logo_url'] = $image_url;
            }

            Document::create($validated);
            DB::commit();
            return redirect()->route('documents.index')->with('success', 'Documento agregado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Ocurrió un error al subir las imágenes ' . $e->getMessage());
        }
    }

    public function edit(Document $document)
    {
        return view('documents.edit', ['document' => $document]);
    }

    public function update(Request $request, Document $document)
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
            if($request->hasFile('header_logo')){
                $request->validate([
                    'header_logo' => ['mimes:png,jpg,jpeg', 'max:2048'],
                ]);

                $imageHeader = $document->header_logo_url;
                if($imageHeader) Storage::disk('public')->delete($document->header_logo_url);

                $image = $request->file('header_logo');
                $image_url = $image->store('logos', ['disk' => 'public']);
                $validated['header_logo_url'] = $image_url;
            }

            if($request->hasFile('footer_logo')){
                $request->validate([
                    'footer_logo' => ['mimes:png,jpg,jpeg', 'max:2048'],
                ]);

                $imageFooter = $document->footer_logo_url;
                if($imageFooter) Storage::disk('public')->delete($document->footer_logo_url);

                $image = $request->file('footer_logo');
                $image_url = $image->store('logos', ['disk' => 'public']);
                $validated['footer_logo_url'] = $image_url;
            }

            $document->update($validated);
            DB::commit();
            return redirect()->route('documents.index')->with('success', 'Documento actualizado exitosamente');
        } catch (\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function export($id)
    {
        $document = Document::findOrFail($id);
        $pdf = Pdf::loadView('documents.pdf', compact('document'));
        return $pdf->download('documento.pdf');
    }

    public function destroy(Document $document)
    {
        $imageHeader = $document->header_logo_url;
        $imageFooter = $document->footer_logo_url;

        if($imageHeader) Storage::disk('public')->delete($imageHeader);
        if($imageFooter) Storage::disk('public')->delete($imageFooter);

        $document->delete();
        return redirect()->route('documents.index')->with('status', 'el Documento ha sido eliminado');
    }
}
