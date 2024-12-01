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
                <form method="POST" action="{{ route('documents.update', [$document]) }}" class="shadow-sm bg-white p-4 rounded" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del documento</label>
                        <input type="text" class="form-control bg-white" id="name" name="name" value="{{ $document->name }}">
                    </div>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Folio -->
                    <div class="mb-3">
                        <label for="folio" class="form-label">Folio</label>
                        <input type="text" class="form-control bg-white" id="folio" name="folio" value="{{ $document->folio }}">
                    </div>
                    @error('folio')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Lugar -->
                    <div class="mb-3">
                        <label for="place" class="form-label">Lugar</label>
                        <input type="text" class="form-control bg-white" id="place" name="place" value="{{ $document->place }}">
                    </div>
                    @error('place')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Receptor -->
                    <div class="mb-3">
                        <label for="receiver_name" class="form-label">Nombre del receptor</label>
                        <input type="text" class="form-control bg-white" id="receiver_name" name="receiver_name" value="{{ $document->receiver_name }}">
                    </div>
                    @error('receiver_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="receiver_position" class="form-label">Puesto del receptor</label>
                        <input type="text" class="form-control bg-white" id="receiver_position" name="receiver_position" value="{{ $document->receiver_position }}">
                    </div>
                    @error('receiver_position')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Saludo -->
                    <div class="mb-3">
                        <label for="greeting" class="form-label">Saludo</label>
                        <input type="text" class="form-control bg-white" id="greeting" name="greeting" value="{{ $document->greeting }}">
                    </div>
                    @error('greeting')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Cuerpo -->
                    <div class="mb-3">
                        <label for="body" class="form-label">Cuerpo del documento</label>
                        <textarea name="body" id="body" class="form-control contenido" rows="10">{{ $document->body }}</textarea>
                    </div>
                    @error('body')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Despedida -->
                    <div class="mb-3">
                        <label for="farewell" class="form-label">Despedida</label>
                        <input type="text" class="form-control bg-white" id="farewell" name="farewell" value="{{ $document->farewell }}">
                    </div>
                    @error('farewell')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Nombre del emisor -->
                    <div class="mb-3">
                        <label for="issuer_name" class="form-label">Nombre del Emisor</label>
                        <input type="text" class="form-control bg-white" id="issuer_name" name="issuer_name" value="{{ $document->issuer_name }}">
                        @error('issuer_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Cargo del emisor -->
                    <div class="mb-3">
                        <label for="issuer_position" class="form-label">Cargo del Emisor</label>
                        <input type="text" class="form-control bg-white" id="issuer_position" name="issuer_position" value="{{ $document->issuer_position }}">
                        @error('issuer_position')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Pie de página -->
                    <div class="mb-3">
                        <label for="footer_text" class="form-label">Texto de pie de página</label>
                        <textarea name="footer_text" id="footer_text" class="form-control contenido" rows="4">{{ $document->footer_text }}</textarea>
                    </div>
                    @error('footer_text')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- Subir imágenes -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="header_logo" class="form-label">Logo del encabezado</label>
                            <div class="rounded d-flex flex-column align-items-center justify-content-center border" style="height: 12rem;">
                                <img src="{{ asset('storage/'.$document->header_logo_url) }}" style="width: 6rem;">
                                <span class="file-text mt-3">
                                    Ningún archivo seleccionado.
                                    <a class="text-primary fw-bold link-underline link-underline-opacity-0" href="#" onclick="document.getElementById('header_logo').click(); return false;">Subir imagen</a>
                                </span>
                                <input type="file" hidden id="header_logo" name="header_logo" accept="image/*" onchange="updateFileName(this)">
                            </div>
                            @error('header_logo')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="footer_logo" class="form-label">Logo del pie de página</label>
                            <div class="rounded d-flex flex-column align-items-center justify-content-center border" style="height: 12rem;">
                                <img src="{{ asset('storage/'.$document->footer_logo_url) }}" style="width: 6rem;">
                                <span class="file-text mt-3">
                                    Ningún archivo seleccionado.
                                    <a class="text-primary fw-bold link-underline link-underline-opacity-0" href="#" onclick="document.getElementById('footer_logo').click(); return false;">Subir imagen</a>
                                </span>
                                <input type="file" hidden id="footer_logo" name="footer_logo" accept="image/*" onchange="updateFileName(this)">
                            </div>
                            @error('footer_logo')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
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
            fileText.innerHTML = `${input.files[0].name}. <a href="#" class="text-primary fw-bold link-underline link-underline-opacity-0" onclick="document.getElementById('${input.id}').click(); return false;">Cambiar imagen</a>`;
        } else {
            fileText.textContent = "Ningún archivo seleccionado.";
        }
    }

</script>
@vite('resources/js/ckeditor.js')
@endsection
