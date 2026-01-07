<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Manajemen Talenta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <div class="bg-white">
        <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 ">
                <div class="flex items-center">
                    <div class="bg-blue-500 rounded-lg p-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('filament.admin.auth.login') }}" class="text-gray-500 hover:text-blue-500 transition">
                        Masuk
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6">
                    Selamat Datang di Dasbor Manajemen Talenta
                </h1>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    Sistem inovatif kami dirancang untuk mengelola, memantau, dan mendukung data talenta karyawan Anda secara digital, memastikan pengembangan potensi maksimal dan pengambilan keputusan strategis yang lebih baik untuk pertumbuhan perusahaan yang berkelanjutan.
                </p>
                <a href="{{ route('filament.admin.auth.login') }}" class="inline-block bg-blue-500 text-white px-8 py-3 rounded-lg hover:bg-blue-600 transition font-semibold">
                    Masuk ke Dashboard
                </a>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1583321500900-82807e458f3c?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Team collaboration" class="rounded-lg shadow-xl">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Tujuan Sistem -->
                <div class="p-10 rounded-lg shadow-xl">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Tujuan Sistem Manajemen Talenta</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="text-gray-500 mr-3 text-xl">•</span>
                            <span class="text-gray-700">Mengoptimalkan pengembangan karir karyawan melalui pemetaan potensi yang terstruktur.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-500 mr-3 text-xl">•</span>
                            <span class="text-gray-700">Meningkatkan retensi talenta dengan menyediakan jalur pengembangan yang jelas dan menarik.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-500 mr-3 text-xl">•</span>
                            <span class="text-gray-700">Menyediakan data kinerja dan potensi yang akurat untuk pengambilan keputusan manajemen yang strategis.</span>
                        </li>
                    </ul>
                </div>

                <!-- Manfaat Utama -->
                <div class="p-10 rounded-lg shadow-xl">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Manfaat Utama Sistem Manajemen Talenta</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <span class="text-gray-500 mr-3 text-xl">•</span>
                            <span class="text-gray-700">Mempermudah pemetaan potensi dan kinerja karyawan</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-500 mr-3 text-xl">•</span>
                            <span class="text-gray-700">Mendukung perencanaan pengembangan karier</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-gray-500 mr-3 text-xl">•</span>
                            <span class="text-gray-700">Menjadi dasar pengambilan keputusan manajemen</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    </div>

    <!-- Understanding Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Memahami Sistem Manajemen Talenta Kami</h2>
                <p class="text-gray-600 text-lg max-w-4xl mx-auto leading-relaxed">
                    Sistem Manajemen Talenta PT INKA menyediakan solusi komprehensif untuk mengoptimalkan potensi sumber daya manusia. Dari identifikasi bakat hingga pengembangan berkelanjutan, kami memastikan setiap karyawan memiliki jalur yang jelas menuju kesuksesan, sekaligus memberdayakan manajemen dengan wawasan yang dapat diandalkan.
                </p>
            </div>

            <!-- Three Pillars -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="p-7 rounded-lg shadow-xl text-center">
                    <div class=" w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Pengelolaan potensi karyawan yang komprehensif</h3>
                </div>

                <div class="p-7 rounded-lg shadow-xl text-center">
                    <div class=" w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Evaluasi dan pemetaan talenta yang akurat</h3>
                </div>

                <div class="p-7 rounded-lg shadow-xl text-center">
                    <div class=" w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Dukungan pengambilan keputusan manajemen strategis</h3>
                </div>
            </div>

            <!-- Train Image -->
            <div class="rounded-lg overflow-hidden shadow-xl">
                <img src="https://plus.unsplash.com/premium_photo-1661952633186-adf9f47719c3?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Modern train" class="w-full h-64 object-cover">
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-600 mb-1">PT Industri Kereta Api (Persero)</p>
                <p class="text-gray-500 text-sm">© 2024 Semua Hak Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>

</body>
</html>