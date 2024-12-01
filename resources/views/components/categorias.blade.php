<ul class="nav nav-pills gap-3 d-flex justify-content-center align-items-center">
    <!-- Dashboard -->
    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <svg width="24" height="24" class="nav-icon" fill="none">
                <g clip-path="url(#clip0_30789_32112)">
                    <path stroke="#53545C" d="M18.266 19.3475C17.8985 19.4998 17.4325 19.4998 16.5007 19.4998C15.569 19.4998 15.1029 19.4998 14.7354 19.3475C14.2453 19.1445 13.8559 18.7552 13.6529 18.2651C13.5007 17.8976 13.5007 17.4316 13.5007 16.4997C13.5007 15.5684 13.5007 15.1018 13.6529 14.7344C13.8559 14.2443 14.2453 13.855 14.7353 13.652C15.1029 13.4997 15.5688 13.4997 16.5007 13.4997C17.4326 13.4997 17.8978 13.5004 18.2654 13.6527C18.7554 13.8556 19.1448 14.245 19.3478 14.7351C19.5001 15.1026 19.5007 15.5678 19.5007 16.4997C19.5007 17.4316 19.5007 17.8976 19.3485 18.2651C19.1455 18.7552 18.7561 19.1445 18.266 19.3475Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path stroke="#53545C" d="M9.26597 19.3479C8.89843 19.5001 8.43248 19.5001 7.5006 19.5001C6.56898 19.5001 6.10279 19.5001 5.7353 19.3479C5.24524 19.1449 4.85585 18.7555 4.65286 18.2654C4.50062 17.8979 4.50062 17.4319 4.50062 16.5001C4.50062 15.5687 4.50062 15.1022 4.65282 14.7347C4.85581 14.2447 5.2452 13.8553 5.73525 13.6523C6.1028 13.5001 6.56874 13.5001 7.50062 13.5001C8.4325 13.5001 8.89776 13.5008 9.2653 13.653C9.75536 13.856 10.1448 14.2454 10.3477 14.7354C10.5 15.103 10.5006 15.5682 10.5006 16.5001C10.5006 17.432 10.5006 17.8979 10.3484 18.2654C10.1454 18.7555 9.75603 19.1449 9.26597 19.3479Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path stroke="#53545C" d="M16.501 10.4997C15.5694 10.4997 15.1032 10.4997 14.7357 10.3475C14.2457 10.1445 13.8563 9.75508 13.6533 9.26502C13.501 8.89748 13.501 8.43153 13.501 7.49966C13.501 6.56831 13.501 6.10176 13.6532 5.73432C13.8562 5.24427 14.2456 4.85488 14.7357 4.65189C15.1032 4.49965 15.5692 4.49965 16.501 4.49965C17.4329 4.49965 17.8982 4.50034 18.2657 4.65258C18.7558 4.85557 19.1452 5.24496 19.3482 5.73501C19.5004 6.10255 19.501 6.56779 19.501 7.49966C19.501 8.43153 19.501 8.89748 19.3488 9.26502C19.1458 9.75508 18.7564 10.1444 18.2664 10.3474C17.8989 10.4997 17.4329 10.4997 16.501 10.4997Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path stroke="#53545C" d="M9.26597 10.3474C8.89843 10.4997 8.43248 10.4997 7.5006 10.4997C6.56898 10.4997 6.10279 10.4997 5.7353 10.3475C5.24524 10.1445 4.85585 9.75508 4.65286 9.26502C4.50062 8.89748 4.50062 8.43153 4.50062 7.49966C4.50062 6.56831 4.50062 6.10176 4.65282 5.73432C4.85581 5.24427 5.2452 4.85488 5.73525 4.65189C6.1028 4.49965 6.56874 4.49965 7.50062 4.49965C8.4325 4.49965 8.89776 4.50034 9.2653 4.65258C9.75536 4.85557 10.1448 5.24496 10.3477 5.73501C10.5 6.10256 10.5006 6.56777 10.5006 7.49966C10.5006 8.43153 10.5006 8.89748 10.3484 9.26502C10.1454 9.75508 9.75603 10.1444 9.26597 10.3474Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <clipPath id="clip0_30789_32112">
                        <rect width="24" height="24" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('dashboard') ? '' : 'd-none' }}">{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('plantillas*') ? 'active' : '' }}" href="{{ route('templates.index') }}">            
            <svg width="24" height="24" class="nav-icon">
                <path d="M13.0004 3.00087C12.9048 3 12.7974 3 12.6747 3H8.2002C7.08009 3 6.51962 3 6.0918 3.21799C5.71547 3.40973 5.40973 3.71547 5.21799 4.0918C5 4.51962 5 5.08009 5 6.2002V17.8002C5 18.9203 5 19.4801 5.21799 19.9079C5.40973 20.2842 5.71547 20.5905 6.0918 20.7822C6.51921 21 7.079 21 8.19694 21L15.8031 21C16.921 21 17.48 21 17.9074 20.7822C18.2837 20.5905 18.5905 20.2842 18.7822 19.9079C19 19.4805 19 18.9215 19 17.8036V9.32568C19 9.20302 18.9999 9.09553 18.999 9M13.0004 3.00087C13.2858 3.00348 13.4657 3.01407 13.6382 3.05547C13.8423 3.10446 14.0379 3.18526 14.2168 3.29492C14.4186 3.41857 14.5918 3.59181 14.9375 3.9375L18.063 7.06298C18.4089 7.40889 18.5809 7.58136 18.7046 7.78319C18.8142 7.96214 18.8953 8.15726 18.9443 8.36133C18.9857 8.53379 18.9964 8.71454 18.999 9M13.0004 3.00087L13 5.80021C13 6.92031 13 7.48015 13.218 7.90797C13.4097 8.2843 13.7155 8.59048 14.0918 8.78223C14.5192 9 15.079 9 16.1969 9H18.999" stroke="#53545C" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('plantillas*') ? '' : 'd-none' }}">{{ __('Plantillas') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link p-2 px-3 {{ request()->is('documentos*') ? 'active' : '' }}" href="{{ route('documents.index') }}">            
            <svg width="24" height="24" class="nav-icon">
                <path d="M9 17H15M9 14H15M13.0004 3.00087C12.9048 3 12.7974 3 12.6747 3H8.2002C7.08009 3 6.51962 3 6.0918 3.21799C5.71547 3.40973 5.40973 3.71547 5.21799 4.0918C5 4.51962 5 5.08009 5 6.2002V17.8002C5 18.9203 5 19.4801 5.21799 19.9079C5.40973 20.2842 5.71547 20.5905 6.0918 20.7822C6.51921 21 7.079 21 8.19694 21L15.8031 21C16.921 21 17.48 21 17.9074 20.7822C18.2837 20.5905 18.5905 20.2842 18.7822 19.9079C19 19.4805 19 18.9215 19 17.8036V9.32568C19 9.20302 18.9999 9.09553 18.999 9M13.0004 3.00087C13.2858 3.00348 13.4657 3.01407 13.6382 3.05547C13.8423 3.10446 14.0379 3.18526 14.2168 3.29492C14.4186 3.41857 14.5918 3.59181 14.9375 3.9375L18.063 7.06298C18.4089 7.40889 18.5809 7.58136 18.7046 7.78319C18.8142 7.96214 18.8953 8.15726 18.9443 8.36133C18.9857 8.53379 18.9964 8.71454 18.999 9M13.0004 3.00087L13 5.80021C13 6.92031 13 7.48015 13.218 7.90797C13.4097 8.2843 13.7155 8.59048 14.0918 8.78223C14.5192 9 15.079 9 16.1969 9H18.999" stroke="#53545C" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span class="nav-text fw-medium ms-2 {{ request()->is('documentos*') ? '' : 'd-none' }}">{{ __('Documentos') }}</span>
        </a>
    </li>

</ul>