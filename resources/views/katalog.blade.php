<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-indigo-50 to-purple-50 min-h-screen text-slate-800 antialiased selection:bg-indigo-200">

    <nav class="sticky top-0 z-50 bg-white/60 backdrop-blur-lg border-b border-white/40 shadow-sm mb-12">
        <div class="max-w-4xl mx-auto px-4 py-4 flex flex-wrap justify-center gap-2 md:gap-4">
            <a href="/" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Home</a>
            <a href="/profil" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Profil</a>
            <a href="/katalog" class="px-5 py-2.5 rounded-full text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-md shadow-indigo-200">Katalog</a>
            <a href="/bantuan" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Bantuan</a>
            <a href="/kontak" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Kontak</a>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-6 pb-12">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 to-purple-700 mb-4">Eksplorasi Event</h1>
            <p class="text-slate-500 text-lg">Temukan kegiatan seru dan tingkatkan skill Anda di AmikomEventHub.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="group bg-white/70 backdrop-blur-md rounded-[2rem] shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 p-8 border border-white/50">
                <div class="flex justify-between items-start mb-6">
                    <div class="h-14 w-14 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-2xl shadow-md flex items-center justify-center text-white font-bold text-xl group-hover:scale-110 transition-transform duration-300">
                        W
                    </div>
                    <span class="px-4 py-1.5 bg-emerald-50/80 text-emerald-600 rounded-full text-xs font-bold tracking-wide uppercase shadow-sm">Workshop</span>
                </div>
                <h2 class="text-2xl font-bold text-slate-800 mb-3 group-hover:text-indigo-600 transition-colors">Mastering Laravel 11</h2>
                <p class="text-slate-500 mb-8 leading-relaxed">Pelajari fitur-fitur terbaru dari framework PHP terpopuler langsung dari ahlinya dengan studi kasus nyata.</p>
                <button class="w-full py-3.5 bg-white text-indigo-600 border-2 border-indigo-100 font-semibold rounded-xl hover:bg-indigo-50 hover:border-indigo-200 transition-all shadow-sm">Daftar Sekarang</button>
            </div>

            <div class="group bg-white/70 backdrop-blur-md rounded-[2rem] shadow-lg hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 p-8 border border-white/50">
                <div class="flex justify-between items-start mb-6">
                    <div class="h-14 w-14 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl shadow-md flex items-center justify-center text-white font-bold text-xl group-hover:scale-110 transition-transform duration-300">
                        S
                    </div>
                    <span class="px-4 py-1.5 bg-blue-50/80 text-blue-600 rounded-full text-xs font-bold tracking-wide uppercase shadow-sm">Seminar</span>
                </div>
                <h2 class="text-2xl font-bold text-slate-800 mb-3 group-hover:text-indigo-600 transition-colors">Karir di Era AI</h2>
                <p class="text-slate-500 mb-8 leading-relaxed">Mempersiapkan diri menghadapi disrupsi teknologi dan melihat peluang kerja baru di masa depan.</p>
                <button class="w-full py-3.5 bg-white text-indigo-600 border-2 border-indigo-100 font-semibold rounded-xl hover:bg-indigo-50 hover:border-indigo-200 transition-all shadow-sm">Daftar Sekarang</button>
            </div>
        </div>
    </main>

</body>
</html>