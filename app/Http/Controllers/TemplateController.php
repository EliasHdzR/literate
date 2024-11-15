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
            'name' => 'required',
            'header_logo_url' => 'required',
            'place' => 'required',
            'greeting' => 'required',
            'farewell' => 'required',
            'footer_text' => 'required',
            'footer_logo_url' => 'required',
        ]);

        Template::create($validated);

        return redirect()->route('templates.index')->with('success', 'Template agregado exitosamente');
    }

    public function edit(Template $template) {
        return view('templates.edit', ['template' => $template]);
    }

    public function destroy(Template $template) {
        $template->delete();
        return redirect()->route('templates.index')->with('status', 'el Template ha sido eliminado');
    }
}
