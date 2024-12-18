@extends('layouts.app')

@section('title', 'Crear Documento')

@section('content')
    <div class="col px-5">
        <div class="text-center">
            <small class="text-muted fs-6">Crear Documento</small>
            <h2 class="fw-bold">INFORMACION GENERAL</h2>
        </div>
        <div class="d-flex justify-content-center">
            <div class="row w-75 p-4">
                <div class="col-md-8 mx-auto">
                    <!-- formulario -->
                    <form method="POST" action="{{ route('documents.store') }}" class="shadow-sm bg-white p-4 rounded" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control bg-white" name="con_plantilla" value="plantilla">

                        <!-- nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del documento</label>
                            <input type="text" class="form-control bg-white" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- folio -->
                        <div class="mb-3">
                            <label for="folio" class="form-label">Folio</label>
                            <input type="text" class="form-control bg-white" id="folio" name="folio" value="{{ old('folio') }}" required>
                            @error('folio')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- lugar -->
                        <div class="mb-3">
                            <label for="place" class="form-label">Lugar</label>
                            <input type="text" class="form-control bg-white" id="place" name="place" value="{{ old('place', $template->place ?? '') }}" required>
                            @error('place')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- saludo -->
                        <div class="mb-3">
                            <label for="greeting" class="form-label">Saludo</label>
                            <input type="text" class="form-control bg-white" id="greeting" name="greeting" value="{{ old('greeting', $template->greeting ?? '') }}" required>
                            @error('greeting')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- destinatario nombre -->
                        <div class="mb-3">
                            <label for="receiver_name" class="form-label">Nombre del Destinatario</label>
                            <input type="text" class="form-control bg-white" id="receiver_name" name="receiver_name" value="{{ old('receiver_name') }}" required>
                            @error('receiver_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- destinatario puesto -->
                        <div class="mb-3">
                            <label for="receiver_position" class="form-label">Puesto del Destinatario</label>
                            <input type="text" class="form-control bg-white" id="receiver_position" name="receiver_position" value="{{ old('receiver_position') }}" required>
                            @error('receiver_position')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- cuerpo -->
                        <div class="mb-3">
                            <label for="body" class="form-label">Cuerpo</label>
                            <textarea name="body" id="body" class="form-control contenido" rows="10">{{ old('body') }}</textarea>
                            @error('body')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- despedida -->
                        <div class="mb-3">
                            <label for="farewell" class="form-label">Despedida</label>
                            <input type="text" class="form-control bg-white" id="farewell" name="farewell" value="{{ old('farewell', $template->farewell ?? '') }}" required>
                            @error('farewell')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- remitente nombre -->
                        <div class="mb-3">
                            <label for="issuer_name" class="form-label">Nombre del Remitente</label>
                            <input type="text" class="form-control bg-white" id="issuer_name" name="issuer_name" value="{{ old('issuer_name') }}" required>
                            @error('issuer_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- remitente puesto -->
                        <div class="mb-3">
                            <label for="issuer_position" class="form-label">Puesto del Remitente</label>
                            <input type="text" class="form-control bg-white" id="issuer_position" name="issuer_position" value="{{ old('issuer_position') }}" required>
                            @error('issuer_position')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- pie de página -->
                        <div class="mb-3">
                            <label for="footer_text" class="form-label">Pie de página</label>
                            <textarea name="footer_text" id="footer_text" class="form-control contenido" rows="10">{{ old('footer_text', $template->footer_text ?? '') }}</textarea>
                            @error('footer_text')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- subir img -->
                        <div class="row mb-3">
                            <!-- Logo del encabezado -->
                            <div class="col-md-6">
                                <label for="header_logo" class="form-label">Logo del encabezado</label>
                                <div class="rounded d-flex flex-column align-items-center justify-content-center border" style="height: 12rem;">
                                    <img src="{{ old('header-logo-url') ? asset('storage/'.old('header-logo-url')) : ($template->header_logo_url ? asset('storage/'.$template->header_logo_url) : '') }}" style="width: 6rem;" id="preview-header">
                                    <input type="file" hidden id="imagen-header" name="imagen-header" accept="image/*" onchange="updateFileName(this, 'file-text-header', 'preview-header', 'header-logo-hidden')">
                                    <!-- Campo oculto para URL actual -->
                                    <input type="hidden" id="header_logo_hidden" name="header_logo" value="{{ old('header-logo-url') ?? ($template->header_logo_url ?? '') }}">
                                </div>
                            </div>

                            <!-- Logo de pie de página -->
                            <div class="col-md-6">
                                <label for="footer_logo" class="form-label">Logo de pie de página</label>
                                <div class="rounded d-flex flex-column align-items-center justify-content-center border" style="height: 12rem;">
                                    <img src="{{ old('footer-logo-url') ? asset('storage/'.old('footer-logo-url')) : ($template->footer_logo_url ? asset('storage/'.$template->footer_logo_url) : '') }}"
                                         style="width: 6rem;"
                                         id="preview-footer"
                                         alt="Vista previa del logo">
                                    <input type="file" hidden id="imagen-footer" name="imagen-footer" accept="image/*" onchange="updateFileName(this, 'file-text-footer', 'preview-footer', 'footer-logo-hidden')">
                                    <!-- Campo oculto para URL actual -->
                                    <input type="hidden" id="footer_logo_hidden" name="footer_logo" value="{{ old('footer-logo-url') ?? ($template->footer_logo_url ?? '') }}">
                                </div>
                            </div>
                        </div>


                        <!-- botones -->
                        <div class="d-flex justify-content-between gap-3">
                            <button type="button" class="btn btn-light flex-fill border" onclick="window.location.href='{{ route('documents.index') }}'">Regresar</button>
                            <button type="submit" class="btn btn-primary flex-fill">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateFileName(input, textElementId, previewElementId, hiddenInputId) {
            const file = input.files[0];
            const textElement = document.getElementById(textElementId);
            const previewElement = document.getElementById(previewElementId);
            const hiddenInput = document.getElementById(hiddenInputId);

            if (file) {
                textElement.textContent = file.name;
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewElement.src = e.target.result;
                };
                reader.readAsDataURL(file);

                hiddenInput.value = '';
            } else {
                textElement.textContent = 'Ningún archivo seleccionado.';
                previewElement.src = '';
            }
        }
    </script>
    @vite('resources/js/ckeditor.js')
@endsection
