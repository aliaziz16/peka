<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
<!-- SwiperJS CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Navbar -->
<nav x-data="{ open: false }" class="bg-gradient-to-r from-blue-600 to-blue-800 shadow-md fixed top-0 w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <i class="fas fa-user-shield text-white text-2xl"></i>
                <span class="text-xl font-bold text-white">Master Admin</span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4">
                <span class="text-white text-sm">👋 Halo, <strong>{{ session('nama_master_admin') }}</strong></span>
                <a href="{{ route('master.logout') }}"
                    class="text-white hover:text-red-300 transition font-medium text-sm">
                    <i class="fas fa-right-from-bracket mr-1"></i> Logout
                </a>
            </div>

            <!-- Mobile Button -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Dropdown -->
    <div x-show="open" x-cloak class="md:hidden bg-blue-700 text-white px-4 py-4 space-y-2">
        <div class="text-sm">👋 Halo, <strong>{{ session('nama_master_admin') }}</strong></div>
        <a href="{{ route('master.logout') }}"
            class="block text-white hover:text-red-300 text-sm"><i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
    </div>
</nav>

<!-- Main Content -->
<main class="pt-24 w-full">
    @yield('content')
</main>
