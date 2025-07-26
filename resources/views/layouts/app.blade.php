<!DOCTYPE html>
<html lang="en-US">

<head>
	<link rel="shortcut icon" href="images/logo-only.png">
	<title>TITIK PEKA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Tailwind CSS CDN -->
	<script src="https://cdn.tailwindcss.com"></script>
	<!-- Font Awesome CDN -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
	<!-- SwiperJS CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>

<body class="bg-gray-200 text-gray-800">

	<div class="w-full">
		<header class="bg-gray-800 text-white py-4 shadow-md">
			<div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-4 px-6">
				<!-- Logo dan Judul -->
				<a href="{{ route('home') }}" class="flex items-center gap-3">
					<img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto h-10 bg-white px-4 py-1 rounded-full shadow">
				</a>

				<!-- Sosial Media -->
				<div class="flex gap-4 text-xl">
					<a href="#" class="hover:text-emerald-300 transition"><i class="fab fa-twitter"></i></a>
					<a href="#" class="hover:text-emerald-300 transition"><i class="fab fa-facebook"></i></a>
					<a href="#" class="hover:text-emerald-300 transition"><i class="fab fa-youtube"></i></a>
					<a href="#" class="hover:text-emerald-300 transition"><i class="fab fa-instagram"></i></a>
				</div>
			</div>
		</header>

		<nav id="navbar" class="bg-emerald-700 text-white shadow sticky top-0 z-50" x-data="{ menuOpen: false }">
			<div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-3">
				<!-- Logo -->
				<a href="{{ url('/') }}" class="flex items-center space-x-2">
					<img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto h-10 bg-white px-4 py-1 rounded-full shadow">
				</a>

				<!-- Menu Utama -->
				<div class="hidden md:flex items-center space-x-6">
					<a href="{{ url('/') }}" class="hover:text-gray-300 font-medium">Beranda</a>

					<!-- Dropdown Tentang -->
					<div class="relative" x-data="{ open: false }">
						<button @click="open = !open" class="font-medium hover:text-gray-300 flex items-center space-x-1">
							<span>Tentang</span>
							<i class="fa-solid fa-chevron-down text-xs"></i>
						</button>
						<div x-show="open" @click.outside="open = false" class="absolute bg-white text-emerald-700 mt-3 rounded-lg shadow-lg py-2 w-40 z-50" x-transition>
							<a href="#" class="block px-4 py-2 hover:bg-emerald-100">Sejarah</a>
							<a href="#" class="block px-4 py-2 hover:bg-emerald-100">Struktur PK</a>
							<a href="#" class="block px-4 py-2 hover:bg-emerald-100">Visi Misi</a>
						</div>
					</div>

					<!-- Dropdown Departemen -->
					<div class="relative" x-data="{ open: false }">
						<button @click="open = !open" class="font-medium hover:text-gray-300 flex items-center space-x-1">
							<span>Departemen</span>
							<i class="fa-solid fa-chevron-down text-xs"></i>
						</button>
						<div x-show="open" @click.outside="open = false" class="absolute bg-white text-emerald-700 mt-3 rounded-lg shadow-lg py-2 w-48 z-50" x-transition>
							<a href="#" class="block px-4 py-2 hover:bg-emerald-100">Dakwah & Pengabdian</a>
							<a href="#" class="block px-4 py-2 hover:bg-emerald-100">Kaderisasi</a>
							<a href="#" class="block px-4 py-2 hover:bg-emerald-100">Organisasi</a>
							<a href="#" class="block px-4 py-2 hover:bg-emerald-100">Olahraga & Seni Budaya</a>
							<a href="#" class="block px-4 py-2 hover:bg-emerald-100">LPP</a>
							<a href="#" class="block px-4 py-2 hover:bg-emerald-100">Lembaga Perekonomian</a>
						</div>
					</div>

					<a href="{{ route('blog.berita') }}" class="hover:text-gray-300 font-medium">Berita</a>
					<a href="#" class="hover:text-gray-300 font-medium">Kontak</a>
				</div>

				<!-- Search & Login -->
				<div class="hidden md:flex items-center space-x-4">
					<div class="relative">
						<input type="text" placeholder="Cari berita..." class="rounded-full px-4 py-2 text-black w-48 focus:outline-none focus:ring-2 focus:ring-emerald-400">
						<button class="absolute right-3 top-2 text-emerald-700"><i class="fas fa-search"></i></button>
					</div>
					<a href="{{ route('admin.login') }}" class="bg-white text-emerald-700 font-bold px-4 py-2 rounded-full hover:bg-emerald-100">Login</a>
				</div>

				<!-- Mobile Hamburger -->
				<div class="md:hidden">
					<button @click="menuOpen = !menuOpen" class="text-3xl"><i class="fas fa-bars"></i></button>
				</div>
			</div>

			<!-- Mobile Menu -->
			<div x-show="menuOpen" class="md:hidden bg-emerald-800 px-4 py-3 space-y-2 text-white" x-transition>
				<a href="#" class="block py-2">Beranda</a>
				<a href="#" class="block py-2">Tentang</a>
				<a href="#" class="block py-2">Departemen</a>
				<a href="#" class="block py-2">Berita</a>
				<a href="#" class="block py-2">Kontak</a>
				<a href="#" class="block py-2 bg-white text-emerald-700 text-center rounded-lg">Login</a>
			</div>
		</nav>


		<main class="w-full">
			@yield('content')
		</main>

		<footer class="bg-gradient-to-t from-emerald-900 to-emerald-600 text-white pt-12 pb-6 relative">
			<div class="w-24 h-1 bg-emerald-400 mx-auto mb-8 rounded-full"></div>
			<div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-8 px-4 items-center">
				<!-- Maps -->
				<div class="rounded-lg overflow-hidden shadow-lg">
					<h2 class="text-xl font-bold mb-3">Basecamp Kami</h2>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.523882266383!2d112.2394978!3d-7.517691300000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78150063d144db%3A0x37c828f83e51bb8d!2sPondok%20PEKA!5e0!3m2!1sid!2sid!4v1753181038597!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>

				<!-- Konten -->
				<div class="space-y-6 text-left">
					<img src="images/logo.png" alt="Logo" class="w-auto h-20 bg-white px-6 py-2 rounded-full shadow">
					<h2 class="text-2xl font-bold">Teras Informasi dan Kreatifitas<br>PK IPNU IPPNU UNWAHA</h2>
					<div class="flex justify-start space-x-6 text-3xl">
						<a href="#" class="hover:text-emerald-400 transition"><i class="fab fa-twitter"></i></a>
						<a href="#" class="hover:text-emerald-400 transition"><i class="fab fa-facebook"></i></a>
						<a href="#" class="hover:text-emerald-400 transition"><i class="fab fa-instagram"></i></a>
						<a href="#" class="hover:text-emerald-400 transition"><i class="fab fa-youtube"></i></a>
					</div>
					<p class="text-sm text-gray-300 max-w-md">Teras Informasi dan Kreatifitas PK IPNU IPPNU Universitas KH. A. Wahab Hasbullah. Menginspirasi, Mengabdi, Berkarya.</p>
					<p class="text-xs text-gray-400">&copy; 2025 TITIK PEKA - PK IPNU IPPNU UNWAHA. All rights reserved.</p>
				</div>
			</div>

			<!-- Scroll to top -->
			<a href="#" class="absolute bottom-5 right-5 bg-emerald-600 hover:bg-emerald-700 text-white p-3 rounded-full shadow-md transition transform hover:-translate-y-1" title="Kembali ke atas">
				<i class="fa-solid fa-arrow-up"></i>
			</a>
		</footer>

	</div>

	<script>
		const navbar = document.getElementById('navbar');
		window.addEventListener('scroll', function() {
			if (window.scrollY > 100) {
				navbar.classList.remove('hidden');
				navbar.classList.add('fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'shadow-md');
			} else {
				navbar.classList.add('hidden');
				navbar.classList.remove('fixed', 'top-0', 'left-0', 'right-0', 'z-50', 'shadow-md');
			}
		});
	</script>
	<script src="js/jquery.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>