<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami</title>
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
            <a href="/bantuan" class="px-5 py-2.5 rounded-full text-sm font-medium text-slate-600 hover:text-indigo-600 hover:bg-white/80 transition-all duration-300">Bantuan</a>
            <a href="/kontak" class="px-5 py-2.5 rounded-full text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-500 text-white shadow-md shadow-indigo-200">Kontak</a>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-6 pb-12">
        <div class="bg-white/80 backdrop-blur-xl rounded-[2rem] shadow-xl p-8 md:p-12 border border-white/60 relative overflow-hidden">
            
            <div class="absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-gradient-to-tr from-indigo-200 to-blue-100 blur-3xl opacity-60 z-0"></div>

            <div class="relative z-10 text-center mb-10">
                <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-700 to-purple-700 mb-3">Hubungi Kami</h1>
                <p class="text-slate-500">Punya pertanyaan lebih lanjut atau ingin berkolaborasi? Kirimkan pesan Anda.</p>
            </div>

            <form action="#" class="relative z-10 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="nama" class="text-sm font-semibold text-slate-700 ml-1">Nama Lengkap</label>
                        <input type="text" id="nama" class="w-full px-5 py-3.5 bg-white/50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:bg-white transition-all shadow-sm placeholder-slate-400" placeholder="John Doe">
                    </div>
                    
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-semibold text-slate-700 ml-1">Alamat Email</label>
                        <input type="email" id="email" class="w-full px-5 py-3.5 bg-white/50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:bg-white transition-all shadow-sm placeholder-slate-400" placeholder="john@example.com">
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="pesan" class="text-sm font-semibold text-slate-700 ml-1">Pesan Anda</label>
                    <textarea id="pesan" rows="4" class="w-full px-5 py-3.5 bg-white/50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:bg-white transition-all shadow-sm placeholder-slate-400 resize-none" placeholder="Tuliskan pesan Anda di sini..."></textarea>
                </div>

                <button type="button" class="w-full py-4 rounded-xl font-bold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 shadow-lg shadow-indigo-200 transform hover:-translate-y-0.5 transition-all duration-300">
                    Kirim Pesan Sekarang
                </button>
            </form>

            <div class="relative z-10 mt-10 pt-8 border-t border-slate-200/60 flex flex-col md:flex-row justify-center items-center gap-6 text-sm text-slate-500">
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-500 font-bold">@</span>
                    <span>fabellianurhasnaalyasusanto@students.amikom.ac.id</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-8 h-8 rounded-full bg-indigo-50 flex items-center justify-center text-indigo-500 font-bold">#</span>
                    <span>+62 812-36-78-54</span>
                </div>
            </div>

        </div>
    </main>

</body>
</html>