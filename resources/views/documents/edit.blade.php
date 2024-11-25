@extends('layouts.app')

@section('title', 'Editar Documento')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Editar Documento</small>
        <h2 class="fw-bold">INFORMACIÓN DEL DOCUMENTO</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row w-75 p-4">
            <div class="col-md-8 mx-auto">
                <!-- formulario -->
                <form method="POST" action="{{ route('documents.update', ['document' => $document]) }}" class="shadow-sm bg-white p-4 rounded" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del documento</label>
                        <input type="text" class="form-control bg-white" id="name" name="name" value="{{ $document->name }}" required>
                    </div>

                    <!-- Folio -->
                    <div class="mb-3">
                        <label for="folio" class="form-label">Folio</label>
                        <input type="text" class="form-control bg-white" id="folio" name="folio" value="{{ $document->folio }}" required>
                    </div>

                    <!-- Lugar -->
                    <div class="mb-3">
                        <label for="place" class="form-label">Lugar</label>
                        <input type="text" class="form-control bg-white" id="place" name="place" value="{{ $document->place }}" required>
                    </div>

                    <!-- Receptor -->
                    <div class="mb-3">
                        <label for="receiver_name" class="form-label">Nombre del receptor</label>
                        <input type="text" class="form-control bg-white" id="receiver_name" name="receiver_name" value="{{ $document->receiver_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="receiver_position" class="form-label">Puesto del receptor</label>
                        <input type="text" class="form-control bg-white" id="receiver_position" name="receiver_position" value="{{ $document->receiver_position }}" required>
                    </div>

                    <!-- Saludo -->
                    <div class="mb-3">
                        <label for="greeting" class="form-label">Saludo</label>
                        <input type="text" class="form-control bg-white" id="greeting" name="greeting" value="{{ $document->greeting }}" required>
                    </div>

                    <!-- Cuerpo -->
                    <div class="mb-3">
                        <label for="body" class="form-label">Cuerpo del documento</label>
                        <textarea name="body" id="body" class="form-control" rows="10">{{ $document->body }}</textarea>
                    </div>

                    <!-- Despedida -->
                    <div class="mb-3">
                        <label for="farewell" class="form-label">Despedida</label>
                        <input type="text" class="form-control bg-white" id="farewell" name="farewell" value="{{ $document->farewell }}" required>
                    </div>

                    <!-- Pie de página -->
                    <div class="mb-3">
                        <label for="footer_text" class="form-label">Texto de pie de página</label>
                        <textarea name="footer_text" id="footer_text" class="form-control" rows="4">{{ $document->footer_text }}</textarea>
                    </div>

                    <!-- Fechas -->
                    <div class="mb-3">
                        <label for="signature_limit_date" class="form-label">Fecha límite para firma</label>
                        <input type="date" class="form-control bg-white" id="signature_limit_date" name="signature_limit_date" value="{{ $document->signature_limit_date }}" required>
                    </div>

                    <!-- Subir imágenes -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="header_logo_url" class="form-label">Logo del encabezado</label>
                            <div class="rounded d-flex flex-column align-items-center justify-content-center border" style="height: 12rem;">
                                <img src="{{ asset($document->header_logo_url) }}" style="width: 6rem;" alt="Logo encabezado">
                                <span class="file-text mt-3">
                                    Ningún archivo seleccionado.
                                    <a class="text-primary fw-bold link-underline link-underline-opacity-0" href="#" onclick="document.getElementById('header_logo_url').click(); return false;">Subir imagen</a>
                                </span>
                                <input type="file" hidden id="header_logo_url" name="header_logo_url" accept="image/*" onchange="updateFileName(this)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="footer_logo_url" class="form-label">Logo del pie de página</label>
                            <div class="rounded d-flex flex-column align-items-center justify-content-center border" style="height: 12rem;">
                                <img src="{{ asset($document->footer_logo_url) }}" style="width: 6rem;" alt="Logo pie de página">
                                <span class="file-text mt-3">
                                    Ningún archivo seleccionado.
                                    <a class="text-primary fw-bold link-underline link-underline-opacity-0" href="#" onclick="document.getElementById('footer_logo_url').click(); return false;">Subir imagen</a>
                                </span>
                                <input type="file" hidden id="footer_logo_url" name="footer_logo_url" accept="image/*" onchange="updateFileName(this)">
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
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
    function updateFileName(input) {
        const fileText = input.parentElement.querySelector('.file-text');
        if (input.files && input.files[0]) {
            fileText.innerHTML = input.files[0].name + ". ";
            const link = document.createElement("a");
            link.className = "text-primary fw-bold link-underline link-underline-opacity-0";
            link.href = "#";
            link.textContent = "Cambiar imagen";
            link.onclick = (e) => { e.preventDefault(); input.click(); };
            fileText.appendChild(link);
        }
    }
</script>
@vite('resources/js/ckeditor.js')
@endsection
