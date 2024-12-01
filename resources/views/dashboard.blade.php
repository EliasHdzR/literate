@extends('layouts.app')

@section('content')
<div class="col px-5">
    <!-- header seccion -->
    <div class="d-flex justify-content-center align-items-center mb-4">
        <!-- titulo de la seccion -->
        <div class="col-md-8 p-0">
            <div class="fs-2 fw-semibold"> {{ __('Recientes') }} </div>
        </div>
        <!-- buscador -->
        <div class="col-md-4">
            <form class="d-flex position-relative" role="search">
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

    <!-- documentos recientes -->
    <div class="d-flex justify-content-center mb-3">
        <div class="col-md-8 w-100 p-0">
            <div class="card bg-white p-4">

                <div class="d-flex align-items-center gap-4">
                    <div class="fs-5 fw-semibold m-0">Documentos</div>
                    <div class="col" id="botones">
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE MES</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE AÑO</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">DESDE EL PRINCIPIO</button>            
                    </div>
                </div>
               
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <!-- Your content here -->
                    @foreach ($templates as $template)
                        <div class="col">
                            <div class="card shadow-sm bg-white border-0 h-100">
                                <div class="card-body d-flex flex-column p-0">
                                    <img src="{{ asset('img/logoTamaulipas.png') }}" alt="" class="rounded-top-3">
                                </div> 
                                <div class="card-body d-flex flex-column">
                                    <h1 class="fs-5 fw-bold">{{ $template->name }}</h1>
                                    <small class="fs-6 fw-medium text-truncate">
                                        <svg fill="#000000" width="16px" height="16px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <title>time</title>
                                            <path d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z"></path>
                                        </svg>
                                        {{ $template->created_at }}
                                    </small>
                                    <div class="d-flex justify-content-end mt-2">
                                        <a class="p-2" href="{{ route('templates.edit', ['template' => $template]) }}">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.9562 17.5358H18" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.15 3.66233C11.7964 2.88982 12.9583 2.77655 13.7469 3.40978C13.7905 3.44413 15.1912 4.53232 15.1912 4.53232C16.0575 5.05599 16.3266 6.16925 15.7912 7.01882C15.7627 7.06432 7.84329 16.9704 7.84329 16.9704C7.57981 17.2991 7.17986 17.4931 6.75242 17.4978L3.71961 17.5358L3.03628 14.6436C2.94055 14.2369 3.03628 13.8098 3.29975 13.4811L11.15 3.66233Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.68402 5.50073L14.2276 8.99" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <a class="p-2" href="#" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $template->id }}">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.6041 8.39014C16.6041 8.39014 16.1516 14.0026 15.8891 16.3668C15.7641 17.496 15.0666 18.1576 13.9241 18.1785C11.7499 18.2176 9.57326 18.2201 7.39993 18.1743C6.30076 18.1518 5.61493 17.4818 5.49243 16.3726C5.22826 13.9876 4.77826 8.39014 4.77826 8.39014" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M17.7569 5.69963H3.62518" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M15.0339 5.69974C14.3797 5.69974 13.8164 5.23724 13.688 4.5964L13.4855 3.58307C13.3605 3.11557 12.9372 2.79224 12.4547 2.79224H8.92719C8.44469 2.79224 8.02136 3.11557 7.89636 3.58307L7.69386 4.5964C7.56552 5.23724 7.00219 5.69974 6.34802 5.69974" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>                              
                                        <!-- el modal aka formulario delete item -->
                                        <div class="modal fade" id="eliminar-{{ $template->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirme su accion</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="">Esta seguro de querer borrar el siguiente item: </p>
                                                        <div class="card-body d-flex flex-column p-0">
                                                            <img src="{{ asset('img/logoTamaulipas.png') }}" alt="" class="rounded-3">
                                                        </div> 
                                                        <p class="mt-4"> Nombre: <strong> {{ $template->name }} </strong></p>
                                                        <p class="m-0"> Fecha de creación: <strong> {{ $template->created_at }} </strong></p>    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('templates.destroy', $template) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="submit" class="btn btn-primary">Eliminar item</button>
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

    <!-- plantillas recientes -->
    <div class="d-flex justify-content-center mb-3">
        <div class="col-md-8 w-100 p-0">
            <div class="card bg-white p-4">

                <div class="d-flex align-items-center gap-4">
                    <div class="fs-5 fw-semibold m-0">Plantillas</div>
                    <div class="col" id="botones">
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE MES</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE AÑO</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">DESDE EL PRINCIPIO</button>            
                    </div>
                </div>
               
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <!-- Your content here -->
                    @foreach ($templates as $template)
                        <div class="col">
                            <div class="card shadow-sm bg-white border-0 h-100">
                                <div class="card-body d-flex flex-column p-0">
                                    <img src="{{ asset('img/logoTamaulipas.png') }}" alt="" class="rounded-top-3">
                                </div> 
                                <div class="card-body d-flex flex-column">
                                    <h1 class="fs-5 fw-bold">{{ $template->name }}</h1>
                                    <small class="fs-6 fw-medium text-truncate">
                                        <svg fill="#000000" width="16px" height="16px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                            <title>time</title>
                                            <path d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z"></path>
                                        </svg>
                                        {{ $template->created_at }}
                                    </small>
                                    <div class="d-flex justify-content-end mt-2">
                                        <a class="p-2" href="{{ route('templates.edit', ['template' => $template]) }}">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.9562 17.5358H18" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.15 3.66233C11.7964 2.88982 12.9583 2.77655 13.7469 3.40978C13.7905 3.44413 15.1912 4.53232 15.1912 4.53232C16.0575 5.05599 16.3266 6.16925 15.7912 7.01882C15.7627 7.06432 7.84329 16.9704 7.84329 16.9704C7.57981 17.2991 7.17986 17.4931 6.75242 17.4978L3.71961 17.5358L3.03628 14.6436C2.94055 14.2369 3.03628 13.8098 3.29975 13.4811L11.15 3.66233Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.68402 5.50073L14.2276 8.99" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                        <a class="p-2" href="#" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $template->id }}">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.6041 8.39014C16.6041 8.39014 16.1516 14.0026 15.8891 16.3668C15.7641 17.496 15.0666 18.1576 13.9241 18.1785C11.7499 18.2176 9.57326 18.2201 7.39993 18.1743C6.30076 18.1518 5.61493 17.4818 5.49243 16.3726C5.22826 13.9876 4.77826 8.39014 4.77826 8.39014" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M17.7569 5.69963H3.62518" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M15.0339 5.69974C14.3797 5.69974 13.8164 5.23724 13.688 4.5964L13.4855 3.58307C13.3605 3.11557 12.9372 2.79224 12.4547 2.79224H8.92719C8.44469 2.79224 8.02136 3.11557 7.89636 3.58307L7.69386 4.5964C7.56552 5.23724 7.00219 5.69974 6.34802 5.69974" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>                              
                                        <!-- el modal aka formulario delete item -->
                                        <div class="modal fade" id="eliminar-{{ $template->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirme su accion</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="">Esta seguro de querer borrar el siguiente item: </p>
                                                        <div class="card-body d-flex flex-column p-0">
                                                            <img src="{{ asset('img/logoTamaulipas.png') }}" alt="" class="rounded-3">
                                                        </div> 
                                                        <p class="mt-4"> Nombre: <strong> {{ $template->name }} </strong></p>
                                                        <p class="m-0"> Fecha de creación: <strong> {{ $template->created_at }} </strong></p>    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('templates.destroy', $template) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                                <button type="submit" class="btn btn-primary">Eliminar item</button>
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
</div>
@endsection
