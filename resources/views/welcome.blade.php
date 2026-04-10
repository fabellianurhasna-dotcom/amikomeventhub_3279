<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-indigo-50 to-purple-50 min-h-screen text-slate-800 antialiased selection:bg-indigo-200 flex flex-col">

    <nav class="sticky top-0 z-50 bg-white/60 backdrop-blur-lg border-b border-white/40 shadow-sm mb-12">
        <div class="max-w-4xl mx-auto px-4 py-4 flex flex-wrap justify-center gap-2 md:gap-4">
            <a href="/" class="px-5 py-2.5 rounded-full text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-md shadow-indigo-200">Home</a>
            <a href="/profil" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Profil</a>
            <a href="/katalog" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Katalog</a>
            <a href="/bantuan" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Bantuan</a>
            <a href="/kontak" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Kontak</a>
        </div>
    </nav>

    <main class="flex-grow flex items-center justify-center px-6 pb-12">
        <div class="max-w-4xl w-full bg-white/80 backdrop-blur-xl rounded-[2.5rem] shadow-xl p-10 md:p-16 border border-white/60 relative overflow-hidden text-center group">
            
            <div class="absolute top-0 left-0 w-72 h-72 rounded-full bg-gradient-to-br from-indigo-200 to-purple-200 blur-3xl opacity-40 -translate-x-1/2 -translate-y-1/2 group-hover:scale-110 transition duration-700"></div>
            <div class="absolute bottom-0 right-0 w-72 h-72 rounded-full bg-gradient-to-tl from-blue-200 to-indigo-100 blur-3xl opacity-40 translate-x-1/3 translate-y-1/3 group-hover:scale-110 transition duration-700"></div>

            <div class="relative z-10">
                <div class="inline-block px-4 py-2 bg-indigo-50 border border-indigo-100 rounded-full mb-6">
                    <span class="text-xs font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600 tracking-wider uppercase">Tugas Laravel App</span>
                </div>
                
                <h1 class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-800 via-indigo-800 to-purple-800 mb-6 leading-tight">
                    Selamat Datang di <br/> <span class="text-indigo-600">AmikomEventHub</span>
                </h1>
                
                <p class="text-lg md:text-xl text-slate-500 mb-10 max-w-2xl mx-auto leading-relaxed">
                    Platform sentral untuk menemukan, mendaftar, dan mengelola event seru. Tingkatkan skill dan kembangkan jaringan profesional Anda bersama kami.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/katalog" class="px-8 py-4 rounded-full font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 shadow-lg shadow-indigo-200 transform hover:-translate-y-1 transition-all duration-300">
                        Jelajahi Event
                    </a>
                    <a href="/profil" class="px-8 py-4 rounded-full font-bold text-slate-600 bg-white border-2 border-slate-100 hover:border-indigo-200 hover:text-indigo-600 hover:bg-indigo-50 transform hover:-translate-y-1 transition-all duration-300">
                        Lihat Profil Praktikan
                    </a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>