@extends('layouts.app')

@section('title', 'Agregar Documento')

@section('content')
<div class="col px-5">
    <div class="text-center">
        <small class="text-muted fs-6">Agregar Documento</small>
        <h2 class="fw-bold">INFORMACIÓN DEL DOCUMENTO</h2>
    </div>
    <div class="d-flex justify-content-center">
        <div class="row w-75 p-4">
            <div class="col-md-8 mx-auto">
                <!-- formulario -->
                <form method="POST" action="{{ route('documents.store') }}" class="shadow-sm bg-white p-4 rounded" enctype="multipart/form-data">
                    @csrf
                    <!-- Nombre -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del Documento</label>
                        <input type="text" class="form-control bg-white" id="name" name="name" required>
                    </div>
                    <!-- Folio -->
                    <div class="mb-3">
                        <label for="folio" class="form-label">Folio</label>
                        <input type="text" class="form-control bg-white" id="folio" name="folio" required>
                    </div>
                    <!-- Logo del encabezado -->
                    <div class="mb-3">
                        <label for="header_logo_url" class="form-label">Logo del Encabezado</label>
                        <input type="file" class="form-control bg-white" id="header_logo_url" name="header_logo_url" accept="image/*">
                    </div>
                    <!-- Lugar -->
                    <div class="mb-3">
                        <label for="place" class="form-label">Lugar</label>
                        <input type="text" class="form-control bg-white" id="place" name="place" required>
                    </div>
                    <!-- Nombre del destinatario -->
                    <div class="mb-3">
                        <label for="receiver_name" class="form-label">Nombre del Destinatario</label>
                        <input type="text" class="form-control bg-white" id="receiver_name" name="receiver_name" required>
                    </div>
                    <!-- Cargo del destinatario -->
                    <div class="mb-3">
                        <label for="receiver_position" class="form-label">Cargo del Destinatario</label>
                        <input type="text" class="form-control bg-white" id="receiver_position" name="receiver_position" required>
                    </div>
                    <!-- Saludo -->
                    <div class="mb-3">
                        <label for="greeting" class="form-label">Saludo</label>
                        <input type="text" class="form-control bg-white" id="greeting" name="greeting" required>
                    </div>
                    <!-- Cuerpo -->
                    <div class="mb-3">
                        <label for="body" class="form-label">Cuerpo del Documento</label>
                        <textarea name="body" id="body" class="form-control" rows="10" required></textarea>
                    </div>
                    <!-- Despedida -->
                    <div class="mb-3">
                        <label for="farewell" class="form-label">Despedida</label>
                        <input type="text" class="form-control bg-white" id="farewell" name="farewell" required>
                    </div>
                    <!-- Nombre del emisor -->
                    <div class="mb-3">
                        <label for="issuer_name" class="form-label">Nombre del Emisor</label>
                        <input type="text" class="form-control bg-white" id="issuer_name" name="issuer_name" required>
                    </div>
                    <!-- Cargo del emisor -->
                    <div class="mb-3">
                        <label for="issuer_position" class="form-label">Cargo del Emisor</label>
                        <input type="text" class="form-control bg-white" id="issuer_position" name="issuer_position" required>
                    </div>
                    <!-- Texto del pie de página -->
                    <div class="mb-3">
                        <label for="footer_text" class="form-label">Texto del Pie de Página</label>
                        <textarea name="footer_text" id="footer_text" class="form-control" rows="3"></textarea>
                    </div>
                    <!-- Logo del pie de página -->
                    <div class="mb-3">
                        <label for="footer_logo_url" class="form-label">Logo del Pie de Página</label>
                        <input type="file" class="form-control bg-white" id="footer_logo_url" name="footer_logo_url" accept="image/*">
                    </div>
                    <!-- Fecha límite de firma -->
                    <div class="mb-3">
                        <label for="signature_limit_date" class="form-label">Fecha Límite de Firma</label>
                        <input type="date" class="form-control bg-white" id="signature_limit_date" name="signature_limit_date" required>
                    </div>
                    <!-- botones -->
                    <div class="d-flex justify-content-between gap-3">
                        <button type="button" class="btn btn-light flex-fill border" 
                            onclick="window.location.href='{{ route('documents.index') }}'">Regresar</button>
                        <button type="submit" class="btn btn-primary flex-fill">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
