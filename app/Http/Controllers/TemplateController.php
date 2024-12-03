<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::latest()->paginate(10);
        return view('templates.index', compact('templates'));
    }

    public function create()
    {
        return view('templates.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'place' => 'required|string|max:30',
            'greeting' => 'required|string|max:50',
            'farewell' => 'required|string|max:50',
            'footer_text' => 'required|string|max:100',
            'imagen-header' => ['required','mimes:png,jpg,jpeg', 'max:2048'],
            'imagen-footer' => ['required','mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        DB::beginTransaction();

        try {
            $template = new Template();
            $template->name = $request->name;
            $template->place = $request->place;
            $template->greeting = $request->greeting;
            $template->farewell = $request->farewell;
            $template->footer_text = $request->footer_text;

            if($request->hasFile('imagen-header')){
                $request->validate([
                    'imagen-header' => ['mimes:png,jpg,jpeg', 'max:2048'],
                ]);

                $image = $request->file('imagen-header');
                $image_url = $image->store('template_images/', ['disk' => 'public']);
                $template->header_logo_url = $image_url;
            }

            if($request->hasFile('imagen-footer')){
                $request->validate([
                    'imagen-footer' => ['mimes:png,jpg,jpeg', 'max:2048'],
                ]);

                $image = $request->file('imagen-footer');
                $image_url = $image->store('template_images/', ['disk' => 'public']);
                $template->footer_logo_url = $image_url;
            }

            $template->save();
            DB::commit();
            return redirect()->route('templates.index')->with('success', 'Template agregado exitosamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('templates.index')->with('error', 'Error al agregar la plantilla ' . $e->getMessage());
        }
    }

    public function edit(Template $template)
    {
        return view('templates.edit', ['template' => $template]);
    }

    public function update(Request $request, Template $template)
    {
        $validated = $request->validate([
            'name' => 'nullable',
            'place' => 'nullable',
            'greeting' => 'nullable',
            'farewell' => 'nullable',
            'footer_text' => 'nullable',
        ]);

        DB::beginTransaction();

        try {
            if($request->hasFile('imagen-header')){
                $request->validate([
                    'imagen-header' => ['mimes:png,jpg,jpeg', 'max:2048'],
                ]);

                $imageHeader = $template->header_logo_url;
                if($imageHeader) Storage::disk('public')->delete($template->header_logo_url);

                $image = $request->file('imagen-header');
                $image_url = $image->store('template_images', ['disk' => 'public']);
                $validated['header_logo_url'] = $image_url;
            }

            if($request->hasFile('imagen-footer')){
                $request->validate([
                    'imagen-footer' => ['mimes:png,jpg,jpeg', 'max:2048'],
                ]);

                $imageFooter = $template->footer_logo_url;
                if($imageFooter) Storage::disk('public')->delete($template->footer_logo_url);

                $image = $request->file('imagen-footer');
                $image_url = $image->store('template_images/', ['disk' => 'public']);
                $validated['footer_logo_url'] = $image_url;
            }

            $template->update($validated);
            DB::commit();
            return redirect()->route('templates.index')->with('success', 'Template modificado exitosamente');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('templates.index')->with('error', 'Error al modificar la plantilla ' . $e->getMessage());
        }
    }

    public function destroy(Template $template)
    {
        $imageHeader = $template->header_logo_url;
        $imageFooter = $template->footer_logo_url;

        if($imageHeader) Storage::disk('public')->delete($imageHeader);
        if($imageFooter) Storage::disk('public')->delete($imageFooter);

        $template->delete();
        return redirect()->route('templates.index')->with('status', 'El Template ha sido eliminado');
    }
}
