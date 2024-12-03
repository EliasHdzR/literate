@extends('layouts.app')

@section('title', 'Documentos')

@section('content')
    <div class="col px-5">
        <!-- Header de la sección -->
        <div class="row align-items-center mb-4">
            <div class="col">
                <div class="fs-2 fw-semibold">{{ __('Documentos') }}</div>
            </div>
        </div>
        <!-- Contenedor de documentos -->
        <div class="d-flex gap-4">
            @if ($documents->isEmpty())
                <div class="col">
                    <div class="fs-5 fw-medium">No hay documentos disponibles</div>
                </div>
            @endif
            <div class="container p-0 flex-grow-1">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($documents as $document)
                        <div class="col">
                            <div class="card shadow-sm bg-white border-0 h-100">
                                <div class="card-body d-flex flex-column p-0">
                                    <img src="{{ asset('storage/'.$document->header_logo_url ?? 'img/default-logo.png') }}" alt="Logo del documento" class="rounded-top-3">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h1 class="fs-5 fw-bold">{{ $document->name }}</h1>
                                    <small class="fs-6 fw-medium text-truncate">
                                        <svg fill="#000000" width="16px" height="16px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z"></path>
                                        </svg>
                                        {{ 'Creación: '.$document->created_at }}
                                    </small>
                                    <small class="fs-6 fw-medium text-truncate">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon" style="width: 23px; height: 23px; vertical-align: middle; fill: currentColor; overflow: hidden;" viewBox="0 0 1024 1024" version="1.1">
                                            <path d="M883.278513 148.539035l-43.016723 0 0-12.780071c0-38.310537-31.199583-69.632917-69.323878-69.632917l-1.02433 0c-38.129412 0-69.323878 31.321356-69.323878 69.632917l0 12.780071L317.20292 148.539035l0-12.780071c0-38.310537-31.195489-69.632917-69.323878-69.632917l-1.055029 0c-38.127366 0-69.322855 31.321356-69.322855 69.632917l0 12.780071-42.924625 0c-38.127366 0-69.323878 31.351032-69.323878 69.609381l0 665.701614c0 38.309514 31.195489 69.632917 69.323878 69.632917l748.70198 0c38.127366 0 69.322855-31.323403 69.322855-69.632917l0-665.701614C952.601368 179.890067 921.405879 148.539035 883.278513 148.539035L883.278513 148.539035zM728.318232 135.758963c0-23.024389 18.632359-41.777499 41.594327-41.777499l1.02433 0c22.931269 0 41.593304 18.753109 41.593304 41.777499L812.530193 259.615852c0 23.024389-18.662035 41.778522-41.593304 41.778522l-1.02433 0c-22.961968 0-41.594327-18.754133-41.594327-41.778522L728.318232 135.758963 728.318232 135.758963zM205.23071 135.758963c0-23.024389 18.632359-41.777499 41.599444-41.777499l1.048889 0c22.903639 0 41.594327 18.753109 41.594327 41.777499L289.473369 259.615852c0 23.024389-18.691711 41.778522-41.594327 41.778522l-1.048889 0c-22.967084 0-41.599444-18.754133-41.599444-41.778522L205.23071 135.758963 205.23071 135.758963zM883.278513 897.807926l-748.70198 0c-7.519254 0-13.864776-6.468318-13.864776-13.957897L120.711757 394.394489l776.433578 0 0 489.455541C897.144312 891.338584 890.797767 897.807926 883.278513 897.807926L883.278513 897.807926zM222.614635 494.083955l127.918391 0 0 62.950727L222.614635 557.034682 222.614635 494.083955 222.614635 494.083955zM445.963493 494.083955l126.906342 0 0 62.950727L445.963493 557.034682 445.963493 494.083955 445.963493 494.083955zM668.299277 494.083955l124.873032 0 0 62.950727L668.299277 557.034682 668.299277 494.083955 668.299277 494.083955zM222.614635 622.00951l127.918391 0 0 61.927421L222.614635 683.936931 222.614635 622.00951 222.614635 622.00951zM445.963493 622.00951l126.906342 0 0 61.927421L445.963493 683.936931 445.963493 622.00951 445.963493 622.00951zM668.299277 622.00951l124.873032 0 0 61.927421L668.299277 683.936931 668.299277 622.00951 668.299277 622.00951zM222.614635 746.884588l127.918391 0 0 64.97278L222.614635 811.857369 222.614635 746.884588 222.614635 746.884588zM445.963493 746.884588l126.906342 0 0 64.97278L445.963493 811.857369 445.963493 746.884588 445.963493 746.884588zM668.299277 746.884588l124.873032 0 0 64.97278L668.299277 811.857369 668.299277 746.884588 668.299277 746.884588zM668.299277 746.884588"/>
                                        </svg>
                                        {{ $document->signature_limit_date ? 'Fecha Límite Firmado: '.$document->signature_limit_date : 'Sin Fecha Límite' }}
                                    </small>
                                    <small class="fs-6 fw-medium text-truncate">
                                        <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" width="18px" height="18px" viewBox="0 0 448 448" id="svg2" version="1.1" inkscape:version="0.91 r13725" sodipodi:docname="status-info-outline.svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title id="title3339">status-info-outline</title> <defs id="defs4"> <pattern y="0" x="0" height="6" width="6" patternUnits="userSpaceOnUse" id="EMFhbasepattern"></pattern> </defs> <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="0.98994952" inkscape:cx="239.70135" inkscape:cy="220.8132" inkscape:document-units="px" inkscape:current-layer="layer1" showgrid="true" units="px" inkscape:snap-bbox="true" inkscape:bbox-nodes="true" inkscape:window-width="1173" inkscape:window-height="914" inkscape:window-x="279" inkscape:window-y="1047" inkscape:window-maximized="0"> <inkscape:grid type="xygrid" id="grid3336" spacingx="16" spacingy="16" empspacing="2"></inkscape:grid> </sodipodi:namedview> <metadata id="metadata7"> <rdf:rdf> <cc:work rdf:about=""> <dc:format>image/svg+xml</dc:format> <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type> <dc:title>status-info-outline</dc:title> </cc:work> </rdf:rdf> </metadata> <g inkscape:label="Layer 1" inkscape:groupmode="layer" id="layer1" transform="translate(0,-604.36209)"> <text sodipodi:linespacing="125%" id="text3347" y="628.57739" x="-1063.7494" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:90px;line-height:125%;font-family:'Segoe UI';-inkscape-font-specification:'Segoe UI';text-align:start;letter-spacing:0px;word-spacing:0px;text-anchor:start;fill:#000000;fill-opacity:1;stroke:none" xml:space="preserve"> <tspan id="tspan3349" y="0" x="0" sodipodi:role="line"> <tspan id="tspan3351" style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:90px;font-family:'Segoe UI';-inkscape-font-specification:'Segoe UI';fill:#000000" dy="0" dx="0"></tspan> </tspan> </text> <path id="path3342" style="fill-opacity:1;stroke:none" d="m 264,724.36206 a 40,40.000015 0 0 1 -40,40.00002 40,40.000015 0 0 1 -40,-40.00002 40,40.000015 0 0 1 40,-40.00001 40,40.000015 0 0 1 40,40.00001 z m -72,72 64,0 0,160.00003 -64,0 z m 32,-191.99997 a 224,224 0 0 0 -224,224 224,224 0 0 0 224,224.00001 224,224 0 0 0 224,-224.00001 224,224 0 0 0 -224,-224 z m 0,32 a 192,192 0 0 1 192,192 192,192 0 0 1 -192,192.00001 192,192 0 0 1 -192,-192.00001 192,192 0 0 1 192,-192 z"></path> </g> </g></svg>
                                        {{ 'Estado: '.$document->status }}
                                    </small>
                                    <div class="d-flex justify-content-end mt-2">
                                        <!-- Botón del menú desplegable -->
                                        @if($document->status != 'Cancelado')
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton-{{ $document->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                Acciones
                                            </button>
                                            <!-- Opciones del menú -->
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $document->id }}">
                                                @if($document->status != 'Firmado')
                                                    <li>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#firmar-documento-{{ $document->id }}">
                                                            <svg width="32px" height="32px" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                                                                    <path d="M8 9.00006H6.2C5.0799 9.00006 4.51984 9.00006 4.09202 9.21805C3.71569 9.40979 3.40973 9.71575 3.21799 10.0921C3 10.5199 3 11.08 3 12.2001V17.8001C3 18.9202 3 19.4802 3.21799 19.908C3.40973 20.2844 3.71569 20.5903 4.09202 20.7821C4.51984 21.0001 5.07989 21.0001 6.2 21.0001H17.787C18.9071 21.0001 19.4671 21.0001 19.895 20.7821C20.2713 20.5903 20.5772 20.2844 20.769 19.908C20.987 19.4802 20.987 18.9202 20.987 17.8001V12.0001M6 15.0001H6.01M10 15H10.01M11.5189 12.8946L12.8337 12.6347C13.5432 12.4945 13.8979 12.4244 14.2287 12.2953C14.5223 12.1807 14.8013 12.0318 15.06 11.8516C15.3514 11.6487 15.607 11.393 16.1184 10.8816L21.2668 5.73321C21.9541 5.04596 21.9541 3.9317 21.2668 3.24444C20.5796 2.55719 19.4653 2.55719 18.7781 3.24445L13.5416 8.48088C13.0625 8.96004 12.8229 9.19963 12.6294 9.47121C12.4576 9.71232 12.3131 9.97174 12.1986 10.2447C12.0696 10.5522 11.9921 10.8821 11.837 11.5417L11.5189 12.8946Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                            </svg>
                                                            Firmar
                                                        </a>
                                                    </li>
                                                @endif
                                                    <li>
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
                                                            Imprimir
                                                        </a>
                                                    </li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#comentar-documento-{{ $document->id }}">
                                                        <svg width="23px" height="23px" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <path d="M4.49999 20.25C4.37892 20.2521 4.25915 20.2248 4.1509 20.1705C4.04266 20.1163 3.94916 20.0366 3.87841 19.9383C3.80766 19.8401 3.76175 19.7261 3.74461 19.6063C3.72747 19.4864 3.73961 19.3641 3.77999 19.25L5.37999 14C5.03175 13.0973 4.85539 12.1375 4.85999 11.17C4.8584 10.1057 5.06918 9.0518 5.47999 8.06999C5.88297 7.13047 6.45975 6.27549 7.17999 5.54999C7.90382 4.82306 8.76344 4.24545 9.70999 3.84999C10.6889 3.4344 11.7415 3.22021 12.805 3.22021C13.8685 3.22021 14.9211 3.4344 15.9 3.84999C17.3341 4.46429 18.5573 5.48452 19.4191 6.7851C20.2808 8.08568 20.7434 9.60985 20.75 11.17C20.7437 13.2771 19.9065 15.2966 18.42 16.79C17.6945 17.5102 16.8395 18.087 15.9 18.49C14.0091 19.2819 11.8865 19.3177 9.96999 18.59L4.71999 20.19C4.64977 20.22 4.57574 20.2402 4.49999 20.25ZM12.8 4.74999C11.5334 4.75547 10.2962 5.13143 9.24068 5.83153C8.18519 6.53164 7.35763 7.52528 6.85999 8.68999C6.19883 10.2911 6.19883 12.0889 6.85999 13.69C6.91957 13.8548 6.91957 14.0352 6.85999 14.2L5.62999 18.37L9.77999 17.11C9.94477 17.0504 10.1252 17.0504 10.29 17.11C11.0824 17.439 11.932 17.6083 12.79 17.6083C13.648 17.6083 14.4976 17.439 15.29 17.11C16.0708 16.7813 16.779 16.3018 17.3742 15.6989C17.9693 15.096 18.4397 14.3816 18.7583 13.5967C19.077 12.8118 19.2376 11.9717 19.231 11.1245C19.2244 10.2774 19.0508 9.4399 18.72 8.65999C18.2234 7.50094 17.398 6.51285 16.3459 5.81792C15.2937 5.123 14.0609 4.75171 12.8 4.74999Z" fill="#000000"></path>
                                                            </g>
                                                        </svg>
                                                        Ver Comentarios
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#eliminar-{{ $document->id }}">
                                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16.6041 8.39014C16.6041 8.39014 16.1516 14.0026 15.8891 16.3668C15.7641 17.496 15.0666 18.1576 13.9241 18.1785C11.7499 18.2176 9.57326 18.2201 7.39993 18.1743C6.30076 18.1518 5.61493 17.4818 5.49243 16.3726C5.22826 13.9876 4.77826 8.39014 4.77826 8.39014" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M17.7569 5.69963H3.62518" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M15.0339 5.69974C14.3797 5.69974 13.8164 5.23724 13.688 4.5964L13.4855 3.58307C13.3605 3.11557 12.9372 2.79224 12.4547 2.79224H8.92719C8.44469 2.79224 8.02136 3.11557 7.89636 3.58307L7.69386 4.5964C7.56552 5.23724 7.00219 5.69974 6.34802 5.69974" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        Cancelar Emisión
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>

                                    <!-- Modal Firmar -->
                                    <div class="modal fade" id="firmar-documento-{{ $document->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="firmarDocumentoLabel-{{ $document->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="firmarDocumentoLabel-{{ $document->id }}">Firmar Documento</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="sign-form-{{ $document->id }}" action="{{route('documents.sign', $document->id)}}" method="POST" enctype="multipart/form-data">
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
                                                    <button type="submit" form="sign-form-{{ $document->id }}" class="btn btn-primary">Firmar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- modal comentar -->
                                    <div class="modal fade max-h-[60vh]" id="comentar-documento-{{ $document->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ver Comentarios</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body max-h-[30vh] overflow-y-auto">
                                                    @if($document->comments->isEmpty())
                                                        <div class="card mb-2">
                                                            <div class="card-body">
                                                                <p class="card-text">No hay comentarios</p>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @foreach($document->comments as $comment)
                                                        <div class="card mb-2">
                                                            <div class="card-header">
                                                                <strong>{{ $comment->user->name }} - {{ date('D, d M Y H:i:s', strtotime($comment->created_at)) }}</strong>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="card-text">{{ $comment->content }}</p>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal para confirmación de eliminación -->
                                    <div class="modal fade" id="eliminar-{{ $document->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">Confirmar acción</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Estás seguro de que deseas cancelar este documento?</p>
                                                    <p><strong>Nombre:</strong> {{ $document->name }}</p>
                                                    <p><strong>Fecha de creación:</strong> {{ $document->created_at }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <form action="{{ route('user.documents.cancel', $document->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-primary">Cancelar Documento</button>
                                                    </form>
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
