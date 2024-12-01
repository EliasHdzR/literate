@extends('layouts.app')

@section('title', 'Agregar Plantillas')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar Plantilla</small>
        <h2 class="fw-bold">INFORMACION GENERAL</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row w-75 p-4">
            <div class="col-md-8 mx-auto">
                <!-- formulario -->
                <form method="POST" action="{{ route('templates.store') }}" class="shadow-sm bg-white p-4 rounded" enctype="multipart/form-data">
                    @csrf
                    <!-- nombre almacen -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre de la plantilla</label>
                        <input type="text" class="form-control bg-white" id="name" name="name" required>
                    </div>
                    <!-- lugar -->
                    <div class="mb-3">
                        <label for="place" class="form-label">Lugar</label>
                        <input type="text" class="form-control bg-white" id="place" name="place">
                    </div>
                    <!-- saludo -->
                    <div class="mb-3">
                        <label for="greeting" class="form-label">Saludo</label>
                        <input type="text" class="form-control bg-white" id="greeting" name="greeting">
                    </div>
                    <!-- despedida -->
                    <div class="mb-3">
                        <label for="farewell" class="form-label">Despedida</label>
                        <input type="text" class="form-control bg-white" id="farewell" name="farewell">
                    </div>
                     <!-- contenedor de pie de pagina -->
                    <div class="mb-3">
                        <label for="footer_text" class="form-label">Pie de página</label>
                        <textarea name="footer_text" id="contenido" class="form-control contenido" rows="10"></textarea>
                    </div>
                    <!-- subir img -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="imagen-header" class="form-label">Logo del encabezado</label>
                            <div class="rounded d-flex flex-column align-items-center justify-content-center border" style="height: 12rem;">
                                <img src="" style="width: 6rem;" id="preview-header">
                                <span class="file-text mt-3" id="file-text-header">
                                    Ningún archivo seleccionado.
                                    <a class="text-primary fw-bold link-underline link-underline-opacity-0" href="#" onclick="document.getElementById('imagen-header').click(); return false;">Subir imagen</a>
                                </span>
                                <input type="file" hidden id="imagen-header" name="imagen-header" accept="image/*" onchange="updateFileName(this, 'file-text-header', 'preview-header')">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="imagen-footer" class="form-label">Logo de pie de página</label>
                            <div class="rounded d-flex flex-column align-items-center justify-content-center border" style="height: 12rem;">
                                <img src="" style="width: 6rem;" id="preview-footer">
                                <span class="file-text mt-3" id="file-text-footer">
                                    Ningún archivo seleccionado.
                                    <a class="text-primary fw-bold link-underline link-underline-opacity-0" href="#" onclick="document.getElementById('imagen-footer').click(); return false;">Subir imagen</a>
                                </span>
                                <input type="file" hidden id="imagen-footer" name="imagen-footer" accept="image/*" onchange="updateFileName(this, 'file-text-footer', 'preview-footer')">
                            </div>
                        </div>
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border"
                            onclick="window.location.href='{{ route('templates.index') }}'">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateFileName(input, fileTextId, previewId) {
        const file = input.files[0];
        if (file) {
            document.getElementById(fileTextId).textContent = file.name;
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById(previewId).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

</script>
@vite('resources/js/ckeditor.js')
@endsection

