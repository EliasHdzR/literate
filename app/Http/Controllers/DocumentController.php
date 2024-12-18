<?php

namespace App\Http\Controllers;

use App\Models\Template;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use LaravelQRCode\Facades\QRCode;

class DocumentController extends Controller
{
    public function index()
    {
        $templates = Template::all();
        $documents = Document::with('comments')
            ->latest()
            ->paginate(10);
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
            'name' => 'required|string|max:50',
            'folio' => 'required|string|max:10',
            'place' => 'required|string|max:30',
            'receiver_name' => 'required|string|max:50',
            'receiver_position' => 'required|string|max:80',
            'greeting' => 'required|string|max:50',
            'body' => 'required|string',
            'farewell' => 'required|string|max:50',
            'issuer_name' => 'required|string|max:50',
            'issuer_position' => 'required|string|max:80',
            'footer_text' => 'nullable|string|max:150',
        ]);

        DB::beginTransaction();


        try{
            if ($request['con_plantilla']){
                if ($request['header_logo']) {
                    $headerTemplateImagePath = public_path('storage/' . $request['header_logo']);

                    if (file_exists($headerTemplateImagePath)) {
                        $newImageName = basename($headerTemplateImagePath); // Mantén el nombre del archivo
                        $newImagePath = public_path('storage/logos/' . $newImageName);

                        if (!file_exists(dirname($newImagePath))) {
                            mkdir(dirname($newImagePath), 0755, true);
                        }

                        if (copy($headerTemplateImagePath, $newImagePath)) {
                            $validated['header_logo_url'] = 'logos/' . $newImageName;
                        } else {
                            throw new \Exception('Error al copiar el archivo.');
                        }
                    } else {
                        throw new \Exception('El archivo no existe en la ubicación especificada.');
                    }
                }

                if ($request['footer_logo']) {
                    $footerTemplateImagePath = public_path('storage/' . $request['footer_logo']);

                    if (file_exists($footerTemplateImagePath)) {
                        $newImageName = basename($footerTemplateImagePath); // Mantén el nombre del archivo
                        $newImagePath = public_path('storage/logos/' . $newImageName);

                        if (!file_exists(dirname($newImagePath))) {
                            mkdir(dirname($newImagePath), 0755, true);
                        }

                        if (copy($footerTemplateImagePath, $newImagePath)) {
                            $validated['footer_logo_url'] = 'logos/' . $newImageName;
                        } else {
                            throw new \Exception('Error al copiar el archivo.');
                        }
                    } else {
                        throw new \Exception('El archivo no existe en la ubicación especificada.');
                    }
                }
            }

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
            dd($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit(Document $document)
    {
        return view('documents.edit', ['document' => $document]);
    }

    public function update(Request $request, Document $document)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'folio' => 'required|string|max:10',
            'place' => 'required|string|max:30',
            'receiver_name' => 'required|string|max:50',
            'receiver_position' => 'required|string|max:80',
            'greeting' => 'required|string|max:50',
            'body' => 'required|string',
            'farewell' => 'required|string|max:50',
            'issuer_name' => 'required|string|max:50',
            'issuer_position' => 'required|string|max:80',
            'footer_text' => 'nullable|string|max:150',
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
        $document->load('signedDocument');

        $filePath = 'logos/' . uniqid() . '.png';
        QRCode::text($document->signedDocument->cfdi)
            ->setOutfile(public_path('storage/' . $filePath))
            ->png();
        $document->qrCodePath = $filePath;

        $document->signedDocument->cfdi = chunk_split($document->signedDocument->cfdi, 50);
        $pdf = Pdf::loadView('documents.pdf', compact('document'));
        Storage::delete('storage/'.$filePath);
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

    public function updateDate(Request $request, Document $document)
    {
        $request->validate([
            'signature_limit_date' => 'required|date|after_or_equal:today',
        ]);

        $document->signature_limit_date = $request->input('signature_limit_date');
        $document->save();

        return redirect()->back()->with('success', 'Fecha límite actualizada correctamente.');
    }

    public function share(Request $request, Document $document)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::find($request->input('user_id'));

        // Check if the document has already been shared with the user
        if ($document->users()->where('user_id', $user->id)->exists()) {
            return redirect()->route('documents.index')->with('error', 'El documento ya ha sido compartido con este usuario.');
        }

        // Attach the user to the document
        $document->users()->attach($user);

        return redirect()->route('documents.index')->with('success', 'Documento compartido exitosamente.');
    }

    public function commentDocument(Request $request, Document $document)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $document->comments()->create([
            'content' => $request->input('comment'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado exitosamente.');
    }
}
