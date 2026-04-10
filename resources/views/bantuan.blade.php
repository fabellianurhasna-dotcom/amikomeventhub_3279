<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan & FAQ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-indigo-50 to-purple-50 min-h-screen text-slate-800 antialiased selection:bg-indigo-200">

    <nav class="sticky top-0 z-50 bg-white/60 backdrop-blur-lg border-b border-white/40 shadow-sm mb-12">
        <div class="max-w-4xl mx-auto px-4 py-4 flex flex-wrap justify-center gap-2 md:gap-4">
            <a href="/" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Home</a>
            <a href="/profil" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Profil</a>
            <a href="/katalog" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Katalog</a>
            <a href="/bantuan" class="px-5 py-2.5 rounded-full text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-md shadow-indigo-200">Bantuan</a>
            <a href="/kontak" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Kontak</a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-6 pb-12">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-bold text-slate-800 mb-3">Pusat Bantuan</h1>
            <p class="text-slate-500">Ada pertanyaan? Kami punya jawabannya di bawah ini.</p>
        </div>

        <div class="space-y-5">
            <div class="bg-white/70 backdrop-blur-md rounded-2xl p-6 md:p-8 shadow-sm border border-white/60 hover:shadow-md hover:bg-white/90 transition-all duration-300">
                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-2">Apa itu AmikomEventHub?</h3>
                <p class="text-slate-600 leading-relaxed">Platform ini adalah pusat informasi untuk mendaftar dan mencari tahu berbagai event, seminar, dan workshop yang diselenggarakan secara resmi.</p>
            </div>
            
            <div class="bg-white/70 backdrop-blur-md rounded-2xl p-6 md:p-8 shadow-sm border border-white/60 hover:shadow-md hover:bg-white/90 transition-all duration-300">
                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-2">Bagaimana cara mendaftar event?</h3>
                <p class="text-slate-600 leading-relaxed">Sangat mudah! Cukup navigasi ke halaman <a href="/katalog" class="text-indigo-500 font-semibold hover:underline">Katalog</a>, temukan event yang cocok dengan minat Anda, lalu tekan tombol pendaftaran yang tersedia pada masing-masing kartu event.</p>
            </div>

            <div class="bg-white/70 backdrop-blur-md rounded-2xl p-6 md:p-8 shadow-sm border border-white/60 hover:shadow-md hover:bg-white/90 transition-all duration-300">
                <h3 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 mb-2">Apakah aplikasi ini menggunakan database?</h3>
                <p class="text-slate-600 leading-relaxed">Untuk versi saat ini, aplikasi masih berupa antarmuka statis yang dibangun untuk mempraktikkan dasar-dasar routing dan blade templating pada Laravel 11.</p>
            </div>
        </div>
    </main>

</body>
</html>