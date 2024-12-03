<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Signed_Document;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;

class DocumentController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $documents = $user->documents()->orderBy('created_at', 'desc')->get();
        return view('User.documents-index', compact('documents'));
    }

    public function sign(Request $request, Document $document){
        $user = auth()->user();
        $user = str_replace(' ', '',$user->name);
        $validated = $request->validate(
            [
                'cer' => 'required',
                'key' => 'required',
                'password' => 'required|string|max:255'
            ]
        );
        $now = Carbon::now()->format('Y-m-d-H:i:s.u');
        $file = $request->file('cer');
        $file->storeAs('signs', "public_$now.cer", ['disk' => 'public']);
        $file = $request->file('key');
        $file->storeAs('signs', "private_$now.key", ['disk' => 'public']);

        $output = Process::path('storage/signs')->input($request->password . "\n" . "private_$now.key" . "\n" . "public_$now.cer" . "\n" . $now . "\n" . $user . "\n" . $document->createOriginalString())->run('./signserver.sh');
        //$image_url = $image->store('logos', ['disk' => 'public']);

        $file = file_get_contents('storage/signs/firma_' . $now .'.sig');
        $cfdi = base64_encode($file);

        Signed_Document::create([
            'document_id' => $document->id,
            'signature_date' => now(),
            'original_string' => $document->createOriginalString(),
            'cfdi' => $cfdi,
            'base64' => $cfdi,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $document->status = 'Firmado';
        $document->save();

        return redirect()->route('user.documents.index');

    }

    public function cancelled($id)
    {
        $document = auth()->user()->documents()->findOrFail($id);
        $document->status = 'Cancelado';
        $document->save();

        return redirect()->route('user.documents.index')->with('status', 'Documento cancelado exitosamente.');
    }
}
