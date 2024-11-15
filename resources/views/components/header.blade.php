<div class="flex items-center justify-between bg-black text-white p-4 rounded-md">
    <h1 class="text-lg font-bold">Nombre del Sistema</h1>
    <button class="bg-gray-800 py-2 px-4 rounded-md">Tablero</button>
    <div class="flex items-center space-x-4">
        <button class="text-white"><i class="bi bi-gear"></i></button>
        <button class="text-white"><i class="bi bi-bell"></i></button>
        <div class="relative">
            <button class="bg-gray-300 text-black py-2 px-4 rounded-md">Admin</button>
            <!-- Dropdown items -->
            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-hover:block">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Perfil</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Cerrar sesión</a>
            </div>
        </div>
    </div>
</div>