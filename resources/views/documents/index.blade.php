@extends('layouts.app')

@section('title', 'Documentos') 

@section('content')
<div class="col px-5">
    <!-- Header de la sección -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="fs-2 fw-semibold">{{ __('Documentos') }}</div>
        </div>
        <!-- Buscador -->
        <div class="col-md-4 p-0">
            <div class="d-flex p-0 gap-2">
                <form class="d-flex position-relative w-100" role="search">
                    <input class="form-control border-secondary px-4 p-2 bg-white border-0 shadow-sm" 
                        type="search" placeholder="Busca algún documento" aria-label="Search">
                    <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent me-2" type="button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.7666" cy="11.7666" r="8.98856" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.0183 18.4851L21.5423 22" stroke="#1C1D22" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <!-- Botón para agregar documento -->
        <div class="col-2">
            <div class="d-flex align-items-center">
                <button type="button" onclick="window.location.href='{{ route('documents.create') }}'" class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm">
                    <strong>Agregar Documento +</strong>
                </button>
            </div>
        </div>
    </div>
    <!-- Contenedor de documentos -->
    <div class="d-flex gap-4">
        <div class="container p-0 flex-grow-1">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($documents as $document)
                    <div class="col">
                        <div class="card shadow-sm bg-white border-0 h-100">
                            <div class="card-body d-flex flex-column p-0">
                                <img src="{{ asset($document->header_logo_url ?? 'img/default-logo.png') }}" alt="Logo del documento" class="rounded-top-3">
                            </div> 
                            <div class="card-body d-flex flex-column">
                                <h1 class="fs-5 fw-bold">{{ $document->name }}</h1>
                                <small class="fs-6 fw-medium text-truncate">
                                    <svg fill="#000000" width="16px" height="16px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z"></path>
                                    </svg>
                                    {{ $document->created_at }}
                                </small>
                                <div class="d-flex justify-content-end mt-2">
                                    <a class="p-2" href="{{ route('documents.edit', ['document' => $document]) }}">
                                        <!-- SVG de edición -->
                                    </a>
                                    <a class="p-2" href="#" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $document->id }}">
                                        <!-- SVG de eliminar -->
                                    </a>
                                    <!-- Modal para confirmación de eliminación -->
                                    <div class="modal fade" id="eliminar-{{ $document->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">Confirmar acción</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estás seguro de que deseas eliminar este documento?</p>
                                                    <p><strong>Nombre:</strong> {{ $document->name }}</p>
                                                    <p><strong>Fecha de creación:</strong> {{ $document->created_at }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('documents.destroy', $document) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>         
                                </div>
                            </div>   
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
