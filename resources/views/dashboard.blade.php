@extends('layouts.app')

@section('content')
<div class="col px-5">
    <!-- header seccion -->
    <div class="d-flex justify-content-center align-items-center mb-4">
        <!-- titulo de la seccion -->
        <div class="col-md-8 p-0">
            <div class="fs-2 fw-semibold"> {{ __('Recientes') }} </div>
        </div>
    </div>

    <!-- documentos recientes -->
    <div class="d-flex justify-content-center mb-3">
        <div class="col-md-8 w-100 p-0">
            <div class="card bg-white p-4">

            <div class="d-flex align-items-center gap-4 mb-4">
                    <div class="fs-5 fw-semibold m-0">Documentos</div>
                    <div class="col" id="botones">
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE MES</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">ESTE AÑO</button>
                        <button type="button" data-bs-toggle="button" class="btn btn-primary text-nowrap p-1 px-2 me-1 fw-medium" onclick="bloquearSeleccion(this)">DESDE EL PRINCIPIO</button>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <!-- Your content here -->
                    @foreach ($documents as $document)
                    @if ($document->status != 'Cancelado')
                    <div class="col">
                        <div class="card shadow-sm bg-white border-0 h-100">
                            <div class="card-body d-flex flex-column p-0">
                                <img src="{{ asset('storage/'.$document->header_logo_url ?? 'img/default-logo.png') }}" class="rounded-top-3">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h1 class="fs-5 fw-bold">{{ $document->name }}</h1>
                                <small class="fs-6 fw-medium text-truncate">
                                    <svg fill="#000000" width="16px" height="16px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z"></path>
                                    </svg>
                                    {{ $document->created_at }}
                                </small>
                                <small class="fs-6 fw-medium text-truncate">
                                        <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" width="18px" height="18px" viewBox="0 0 448 448" id="svg2" version="1.1" inkscape:version="0.91 r13725" sodipodi:docname="status-info-outline.svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title id="title3339">status-info-outline</title> <defs id="defs4"> <pattern y="0" x="0" height="6" width="6" patternUnits="userSpaceOnUse" id="EMFhbasepattern"></pattern> </defs> <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="0.98994952" inkscape:cx="239.70135" inkscape:cy="220.8132" inkscape:document-units="px" inkscape:current-layer="layer1" showgrid="true" units="px" inkscape:snap-bbox="true" inkscape:bbox-nodes="true" inkscape:window-width="1173" inkscape:window-height="914" inkscape:window-x="279" inkscape:window-y="1047" inkscape:window-maximized="0"> <inkscape:grid type="xygrid" id="grid3336" spacingx="16" spacingy="16" empspacing="2"></inkscape:grid> </sodipodi:namedview> <metadata id="metadata7"> <rdf:rdf> <cc:work rdf:about=""> <dc:format>image/svg+xml</dc:format> <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type> <dc:title>status-info-outline</dc:title> </cc:work> </rdf:rdf> </metadata> <g inkscape:label="Layer 1" inkscape:groupmode="layer" id="layer1" transform="translate(0,-604.36209)"> <text sodipodi:linespacing="125%" id="text3347" y="628.57739" x="-1063.7494" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:90px;line-height:125%;font-family:'Segoe UI';-inkscape-font-specification:'Segoe UI';text-align:start;letter-spacing:0px;word-spacing:0px;text-anchor:start;fill:#000000;fill-opacity:1;stroke:none" xml:space="preserve"> <tspan id="tspan3349" y="0" x="0" sodipodi:role="line"> <tspan id="tspan3351" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:90px;font-family:'Segoe UI';-inkscape-font-specification:'Segoe UI';fill:#000000" dy="0" dx="0"></tspan> </tspan> </text> <path id="path3342" style="fill-opacity:1;stroke:none" d="m 264,724.36206 a 40,40.000015 0 0 1 -40,40.00002 40,40.000015 0 0 1 -40,-40.00002 40,40.000015 0 0 1 40,-40.00001 40,40.000015 0 0 1 40,40.00001 z m -72,72 64,0 0,160.00003 -64,0 z m 32,-191.99997 a 224,224 0 0 0 -224,224 224,224 0 0 0 224,224.00001 224,224 0 0 0 224,-224.00001 224,224 0 0 0 -224,-224 z m 0,32 a 192,192 0 0 1 192,192 192,192 0 0 1 -192,192.00001 192,192 0 0 1 -192,-192.00001 192,192 0 0 1 192,-192 z"></path> </g> </g></svg>
                                        {{ 'Estado: '.$document->status }}
                                    </small>
                                <div class="d-flex justify-content-end mt-2">
                                    <!-- ESTE BOTON Y MODAL NO VAN EN EL LADO DEL EDITOR, SOLO SE LE VAN A MOSTRAR AL USUARIO
                                    PERO LO PONGO AQUÍ PORQUE LA FUNCIONALIDAD DE COMPARTIR DOCUMENTO AÚN NO EXISTE-->
                                    <!-- boton firmar -->
                                    <a class="p-2" href="#" data-bs-toggle="modal" data-bs-target="#firmar-documento">
                                        <svg width="32px" height="32px" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                                                <path d="M8 9.00006H6.2C5.0799 9.00006 4.51984 9.00006 4.09202 9.21805C3.71569 9.40979 3.40973 9.71575 3.21799 10.0921C3 10.5199 3 11.08 3 12.2001V17.8001C3 18.9202 3 19.4802 3.21799 19.908C3.40973 20.2844 3.71569 20.5903 4.09202 20.7821C4.51984 21.0001 5.07989 21.0001 6.2 21.0001H17.787C18.9071 21.0001 19.4671 21.0001 19.895 20.7821C20.2713 20.5903 20.5772 20.2844 20.769 19.908C20.987 19.4802 20.987 18.9202 20.987 17.8001V12.0001M6 15.0001H6.01M10 15H10.01M11.5189 12.8946L12.8337 12.6347C13.5432 12.4945 13.8979 12.4244 14.2287 12.2953C14.5223 12.1807 14.8013 12.0318 15.06 11.8516C15.3514 11.6487 15.607 11.393 16.1184 10.8816L21.2668 5.73321C21.9541 5.04596 21.9541 3.9317 21.2668 3.24444C20.5796 2.55719 19.4653 2.55719 18.7781 3.24445L13.5416 8.48088C13.0625 8.96004 12.8229 9.19963 12.6294 9.47121C12.4576 9.71232 12.3131 9.97174 12.1986 10.2447C12.0696 10.5522 11.9921 10.8821 11.837 11.5417L11.5189 12.8946Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                        </svg>
                                    </a>
                                    <!-- modal firmar -->
                                    <div class="modal fade" id="firmar-documento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Firmar Documento</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="sign-form" action="#" method="POST">
                                                        @csrf
                                                        <label for="cer">Llave Pública</label>
                                                        <input type="file" id="cer" name="cer"><br>
                                                        <label for="key">Llave Privada</label>
                                                        <input type="file" id="key" name="key"><br>
                                                        <label for="password">Contraseña</label>
                                                        <input type="password" id="password" name="password">
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" form="sign-form" id="btn-compartir" class="btn btn-primary" disabled>Compartir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- boton fechaLimite -->
                                    <a class="p-2" href="#" data-bs-toggle="modal" data-bs-target="#fechaLimite-documento-{{ $document->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon" style="width: 23px; height: 23px; vertical-align: middle; fill: currentColor; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1">
                                            <path d="M883.278513 148.539035l-43.016723 0 0-12.780071c0-38.310537-31.199583-69.632917-69.323878-69.632917l-1.02433 0c-38.129412 0-69.323878 31.321356-69.323878 69.632917l0 12.780071L317.20292 148.539035l0-12.780071c0-38.310537-31.195489-69.632917-69.323878-69.632917l-1.055029 0c-38.127366 0-69.322855 31.321356-69.322855 69.632917l0 12.780071-42.924625 0c-38.127366 0-69.323878 31.351032-69.323878 69.609381l0 665.701614c0 38.309514 31.195489 69.632917 69.323878 69.632917l748.70198 0c38.127366 0 69.322855-31.323403 69.322855-69.632917l0-665.701614C952.601368 179.890067 921.405879 148.539035 883.278513 148.539035L883.278513 148.539035zM728.318232 135.758963c0-23.024389 18.632359-41.777499 41.594327-41.777499l1.02433 0c22.931269 0 41.593304 18.753109 41.593304 41.777499L812.530193 259.615852c0 23.024389-18.662035 41.778522-41.593304 41.778522l-1.02433 0c-22.961968 0-41.594327-18.754133-41.594327-41.778522L728.318232 135.758963 728.318232 135.758963zM205.23071 135.758963c0-23.024389 18.632359-41.777499 41.599444-41.777499l1.048889 0c22.903639 0 41.594327 18.753109 41.594327 41.777499L289.473369 259.615852c0 23.024389-18.691711 41.778522-41.594327 41.778522l-1.048889 0c-22.967084 0-41.599444-18.754133-41.599444-41.778522L205.23071 135.758963 205.23071 135.758963zM883.278513 897.807926l-748.70198 0c-7.519254 0-13.864776-6.468318-13.864776-13.957897L120.711757 394.394489l776.433578 0 0 489.455541C897.144312 891.338584 890.797767 897.807926 883.278513 897.807926L883.278513 897.807926zM222.614635 494.083955l127.918391 0 0 62.950727L222.614635 557.034682 222.614635 494.083955 222.614635 494.083955zM445.963493 494.083955l126.906342 0 0 62.950727L445.963493 557.034682 445.963493 494.083955 445.963493 494.083955zM668.299277 494.083955l124.873032 0 0 62.950727L668.299277 557.034682 668.299277 494.083955 668.299277 494.083955zM222.614635 622.00951l127.918391 0 0 61.927421L222.614635 683.936931 222.614635 622.00951 222.614635 622.00951zM445.963493 622.00951l126.906342 0 0 61.927421L445.963493 683.936931 445.963493 622.00951 445.963493 622.00951zM668.299277 622.00951l124.873032 0 0 61.927421L668.299277 683.936931 668.299277 622.00951 668.299277 622.00951zM222.614635 746.884588l127.918391 0 0 64.97278L222.614635 811.857369 222.614635 746.884588 222.614635 746.884588zM445.963493 746.884588l126.906342 0 0 64.97278L445.963493 811.857369 445.963493 746.884588 445.963493 746.884588zM668.299277 746.884588l124.873032 0 0 64.97278L668.299277 811.857369 668.299277 746.884588 668.299277 746.884588zM668.299277 746.884588"/>
                                        </svg>
                                    </a>
                                    <!-- modal fechaLimite -->
                                    <div class="modal fade" id="fechaLimite-documento-{{ $document->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Añadir Fecha Límite</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="fechaLimite-form-{{ $document->id }}" action="{{ route('documents.updateDate', ['document' => $document->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="mb-3">
                                                            <label for="signature_limit_date" class="form-label">Fecha Límite</label>
                                                            <input type="date" class="form-control" id="signature_limit_date" name="signature_limit_date" value="{{ $document->signature_limit_date ? $document->signature_limit_date : '' }}" min="{{ date('Y-m-d') }}" required>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" form="fechaLimite-form-{{ $document->id }}" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- boton compartir -->
                                    <a class="p-2" href="#" data-bs-toggle="modal" data-bs-target="#compartir-documento-{{ $document->id }}">
                                        <svg fill="#000000" width="21px" height="21px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                                            <path d="M28.183 29.668h-26v-20h8.050l2.023-1.948-0.052-0.052h-10.021c-1.105 0-2 0.896-2 2v20c0 1.105 0.895 2 2 2h26c1.105 0 2-0.895 2-2v-15.646l-2 1.909v13.737zM8.442 21.668l2.015-0c1.402-7.953 8.329-14 16.684-14 0.351 0 0.683 0.003 1.019 0.005l-3.664 3.664c-0.39 0.39-0.39 1.024 0 1.414 0.195 0.196 0.452 0.293 0.708 0.293s0.511-0.098 0.706-0.293l5.907-6.063-5.907-6.064c-0.39-0.391-1.023-0.391-1.414 0-0.39 0.391-0.39 1.024 0 1.414l3.631 3.63c-0.314-0-0.624-0.002-0.944-0.002-9.47 0-17.299 6.936-18.741 16.001z"></path> </g>
                                        </svg>
                                    </a>
                                    <!-- modal compartir -->
                                    <div class="modal fade" id="compartir-documento-{{ $document->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Compartir Documento</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="share-form-{{ $document->id }}" action="{{ route('documents.share', ['document' => $document->id]) }}" method="POST">
                                                        @csrf
                                                        <select class="form-select" name="user_id" id="user-select-{{ $document->id }}">
                                                            <option value="" selected>Elegir Usuario</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" form="share-form-{{ $document->id }}" id="btn-compartir" class="btn btn-primary">Compartir</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- boton editar -->
                                    <a class="p-2" href="{{ route('documents.edit', ['document' => $document]) }}">
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.9562 17.5358H18" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.15 3.66233C11.7964 2.88982 12.9583 2.77655 13.7469 3.40978C13.7905 3.44413 15.1912 4.53232 15.1912 4.53232C16.0575 5.05599 16.3266 6.16925 15.7912 7.01882C15.7627 7.06432 7.84329 16.9704 7.84329 16.9704C7.57981 17.2991 7.17986 17.4931 6.75242 17.4978L3.71961 17.5358L3.03628 14.6436C2.94055 14.2369 3.03628 13.8098 3.29975 13.4811L11.15 3.66233Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.68402 5.50073L14.2276 8.99" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>

                                    <!-- boton eliminar -->
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
                @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- plantillas recientes -->
    <div class="d-flex justify-content-center mb-3">
        <div class="col-md-8 w-100 p-0">
            <div class="card bg-white p-4">

            <div class="d-flex align-items-center gap-4 mb-4">
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
                                    <img src="{{ asset('storage/'.$template->header_logo_url ?? 'img/default-logo.png') }}" alt="" class="rounded-top-3">
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
                                                            <img src="{{ asset('storage/'.$template->header_logo_url ?? 'img/default-logo.png') }}" alt="" class="rounded-3">
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
