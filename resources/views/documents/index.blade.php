@extends('layouts.app')

@section('title', 'Documentos')

@section('content')
<div class="col px-5">
    <!-- Header de la sección -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="fs-2 fw-semibold">{{ __('Documentos') }}</div>
        </div>
        <!-- Botón para agregar documento -->
        <div class="col-2">
            <div class="d-flex align-items-center">
                <a class="btn btn-primary text-nowrap p-2 px-4 fw-medium w-100 shadow-sm" href="#" data-bs-toggle="modal" data-bs-target="#crear-documento">
                    <strong>Crear Documento</strong>
                </a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="crear-documento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Elegir Plantilla</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="">Crear documento a partir de plantilla: </p>
                    <form id="template-form" action="{{ route('documents.create') }}" method="POST">
                        @csrf
                        <select class="form-select" name="template_id" aria-label="Default select example">
                            <option value="" selected>Sin Plantilla</option>
                            @foreach ($templates as $template)
                                <option value="{{ $template->id }}">{{ $template->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" form="template-form" class="btn btn-primary">Crear</button>
                </div>
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
                                    <a class="p-2" href="{{ route('documents.export', ['id' => $document->id]) }}">
                                        <svg width="21" height="21" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_201_23365)">
                                                <path d="M5.27354 1.48242H1.94149V2.5931H5.27354V1.48242ZM5.55121 3.98146C5.47757 3.98146 5.40694 3.9522 5.35487 3.90013C5.3028 3.84806 5.27354 3.77743 5.27354 3.70379C5.27354 3.63014 5.3028 3.55952 5.35487 3.50744C5.40694 3.45537 5.47757 3.42612 5.55121 3.42612C5.62485 3.42612 5.69548 3.45537 5.74755 3.50744C5.79963 3.55952 5.82888 3.63014 5.82888 3.70379C5.82888 3.77743 5.79963 3.84806 5.74755 3.90013C5.69548 3.9522 5.62485 3.98146 5.55121 3.98146ZM4.7182 5.92515H2.49683V4.5368H4.7182V5.92515ZM5.55121 2.87078H1.66382C1.44289 2.87078 1.23101 2.95854 1.07479 3.11476C0.918574 3.27098 0.830811 3.48286 0.830811 3.70379V5.36981H1.94149V6.48049H5.27354V5.36981H6.38422V3.70379C6.38422 3.48286 6.29646 3.27098 6.14024 3.11476C5.98402 2.95854 5.77214 2.87078 5.55121 2.87078Z" fill="black"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_201_23365">
                                                    <rect width="6.6641" height="6.6641" fill="white" transform="translate(0.275513 0.649414)"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>
                                    <a class="p-2" href="{{ route('documents.edit', ['document' => $document]) }}">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.9562 17.5358H18" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.15 3.66233C11.7964 2.88982 12.9583 2.77655 13.7469 3.40978C13.7905 3.44413 15.1912 4.53232 15.1912 4.53232C16.0575 5.05599 16.3266 6.16925 15.7912 7.01882C15.7627 7.06432 7.84329 16.9704 7.84329 16.9704C7.57981 17.2991 7.17986 17.4931 6.75242 17.4978L3.71961 17.5358L3.03628 14.6436C2.94055 14.2369 3.03628 13.8098 3.29975 13.4811L11.15 3.66233Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.68402 5.50073L14.2276 8.99" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <a class="p-2" href="#" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $document->id }}">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.6041 8.39014C16.6041 8.39014 16.1516 14.0026 15.8891 16.3668C15.7641 17.496 15.0666 18.1576 13.9241 18.1785C11.7499 18.2176 9.57326 18.2201 7.39993 18.1743C6.30076 18.1518 5.61493 17.4818 5.49243 16.3726C5.22826 13.9876 4.77826 8.39014 4.77826 8.39014" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M17.7569 5.69963H3.62518" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.0339 5.69974C14.3797 5.69974 13.8164 5.23724 13.688 4.5964L13.4855 3.58307C13.3605 3.11557 12.9372 2.79224 12.4547 2.79224H8.92719C8.44469 2.79224 8.02136 3.11557 7.89636 3.58307L7.69386 4.5964C7.56552 5.23724 7.00219 5.69974 6.34802 5.69974" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
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
