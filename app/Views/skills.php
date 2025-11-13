<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Keahlian' ?></title>
    <!-- Memuat Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a;
        }
    </style>
</head>
<body class="text-slate-200 p-4 md:p-8">
    <!-- Kontainer Utama Aplikasi CV -->
    <div class="max-w-7xl mx-auto bg-slate-800 rounded-2xl shadow-2xl flex flex-col md:flex-row min-h-[80vh] overflow-hidden">

        <!-- Sidebar / Navigasi Kiri -->
        <nav class="w-full md:w-72 lg:w-80 flex-shrink-0 p-8 bg-slate-800 border-b md:border-b-0 md:border-r border-slate-700">
            <div class="flex flex-col items-center text-center md:sticky top-8">
                <!-- Foto Profil -->
                <?php
                // jika $biodata mungkin null, guard dulu
                $foto = isset($biodata['foto']) && $biodata['foto'] ? $biodata['foto'] : 'default.png';
                $fotoUrl = base_url('uploads/' . $foto);
                ?>
                <img src="<?= esc($fotoUrl) ?>" alt="Foto Profil" class="profile-img" />
                
                <!-- Nama dan status -->
                <h1 class="text-2xl font-bold text-white mb-1"><?= isset($biodata) ? $biodata['nama_lengkap'] : '[Nama Anda]' ?></h1>
                <p class="text-md text-blue-400 font-medium mb-6"><?= isset($biodata) ? $biodata['status'] : '[Jabatan Anda, mis: Web Developer]' ?></p>

                <!-- Tombol Navigasi -->
                <ul class="w-full space-y-3 mb-6">
                    <li>
                        <a href="<?= base_url('') ?>" class="nav-link active w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200">
                            <!-- Icon Home (Inline SVG) -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Home</span>
                        </a>
                    </li>
                   <li>
                        <a href="<?= base_url('pendidikan') ?>" class="nav-link w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200">
                        <!-- Icon Pendidikan -->
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 10a12.083 12.083 0 01-6.16 0L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7m0 0l-6.16-3.422A12.083 12.083 0 0112 17a12.083 12.083 0 016.16 0L12 21z"></path></svg>
                        <span>Pendidikan</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('pengalaman') ?>" class="nav-link w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200">
                            <!-- Icon Pengalaman -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.103V11a2 2 0 00-2-2h-1a2 2 0 00-2 2v2.103M3 13.103V11a2 2 0 012-2h1a2 2 0 012 2v2.103M12 16v5m0 0l-3-3m3 3l3-3M3 11V6a2 2 0 012-2h14a2 2 0 012 2v5"></path></svg>
                            <span>Pengalaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('skills') ?>" class="nav-link w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200">
                            <!-- Icon Keahlian -->
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            <span>Keahlian</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow p-6 md:p-10 bg-slate-900 rounded-b-xl md:rounded-r-xl md:rounded-b-none overflow-y-auto">
            <section class="mb-8">
                <h2 class="text-3xl font-bold text-white mb-6">Keahlian Saya</h2>
                <div class="space-y-6">
                    <?php if(!empty($skills)): ?>
                        <?php foreach($skills as $item): ?>
                            <div class="relative p-4 bg-slate-700 rounded-lg shadow-md">
                                <h3 class="text-xl font-semibold text-white"><?= esc($item['nama_skill']) ?></h3>
                                <p class="text-slate-400 mt-2"><?= esc($item['deskripsi']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-center text-slate-400 mt-6">🛠️ Belum ada data keahlian</p>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>
</body>
</html>