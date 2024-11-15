<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;

class TemplateController extends Controller
{
    public function index() {
        $templates = Template::latest()->paginate(10);
        return view('templates.index', compact('templates'));
    }

    public function create() { return view('templates.create'); }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'nullable',
            'header_logo_url' => ['sometimes','nullable','mimes:png.jpg,jpge','max:2048'],
            'place' => 'nullable',
            'greeting' => 'nullable',
            'farewell' => 'nullable',
            'footer_text' => 'nullable',
            'footer_logo_url' => ['sometimes','nullable','mimes:png.jpg,jpge','max:2048'],
        ]);

        Template::create($validated);

        return redirect()->route('templates.index')->with('success', 'Template agregado exitosamente');
    }

    public function update(Request $request, Template $template) {
    
        $validated = $request->validate([
            'name' => 'nullable',
            'header_logo_url' => ['sometimes','nullable','mimes:png.jpg,jpge','max:2048'],
            'place' => 'nullable',
            'greeting' => 'nullable',
            'farewell' => 'nullable',
            'footer_text' => 'nullable',
            'footer_logo_url' => ['sometimes','nullable','mimes:png.jpg,jpge','max:2048'],
        ]);
    
        $template->update($validated);
    
        return redirect()->route('templates.index')->with('status', 'plantilla modificada exitosamente');
    }

    public function edit(Template $template) {
        return view('templates.edit', ['template' => $template]);
    }

    public function destroy(Template $template) {
        $template->delete();
        return redirect()->route('templates.index')->with('status', 'el Template ha sido eliminado');
    }
}
