<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Praktikan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-indigo-50 to-purple-50 min-h-screen text-slate-800 antialiased selection:bg-indigo-200">

    <nav class="sticky top-0 z-50 bg-white/60 backdrop-blur-lg border-b border-white/40 shadow-sm mb-12">
        <div class="max-w-4xl mx-auto px-4 py-4 flex flex-wrap justify-center gap-2 md:gap-4">
            <a href="/" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Home</a>
            <a href="/profil" class="px-5 py-2.5 rounded-full text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-md shadow-indigo-200">Profil</a>
            <a href="/katalog" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Katalog</a>
            <a href="/bantuan" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Bantuan</a>
            <a href="/kontak" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Kontak</a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-6 pb-12">
        <div class="bg-white/80 backdrop-blur-xl rounded-[2rem] shadow-xl p-8 md:p-12 border border-white/60 relative overflow-hidden group hover:shadow-2xl transition-all duration-500">
            <div class="absolute top-0 right-0 -mr-16 -mt-16 w-48 h-48 rounded-full bg-gradient-to-br from-purple-200 to-indigo-200 blur-3xl opacity-50 group-hover:opacity-70 transition duration-500"></div>
            
            <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8 relative z-10">
                <div class="h-32 w-32 shrink-0 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-5xl shadow-lg shadow-indigo-200 ring-4 ring-white">
                    P
                </div>
                <div class="text-center md:text-left">
                    <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 to-purple-700 mb-4">Profil </h1>
                    <div class="space-y-2">
                        <p class="text-lg text-slate-600"><span class="font-semibold text-slate-800">Nama:</span> Fabellia Nurhasna Alya S </p>
                        <p class="text-lg text-slate-600"><span class="font-semibold text-slate-800">NIM:</span> 24.12.3279 </p>
                        <p class="text-lg text-slate-600"><span class="font-semibold text-slate-800">Kelas:</span> Sistem Informasi 04 </p>
                    </div>
                </div>
            </div>
            
            <div class="mt-10 pt-8 border-t border-slate-200/60 relative z-10">
                <p class="text-slate-600 leading-relaxed text-lg">
                    Halo! Saya adalah mahasiswa yang sedang mengeksplore framework Laravel✨
                </p>
            </div>
        </div>
    </main>

</body>
</html>