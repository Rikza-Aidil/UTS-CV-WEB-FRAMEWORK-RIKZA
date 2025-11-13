<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Pribadi - <?= isset($biodata) ? $biodata['nama_lengkap'] : '[Nama Anda]' ?></title>
    <!-- Memuat Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Memuat font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Mengatur font default ke Inter */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a; /* bg-slate-900 */
        }
        
        /* Konten halaman (untuk navigasi SPA) */
        .page-content {
            display: none; /* Sembunyikan semua halaman by default */
            animation: fadeIn 0.5s ease-in-out; /* Animasi fade-in */
        }
        
        /* Tampilkan halaman pertama (Home) */
        #page-home {
            display: block;
        }

        /* Styling untuk tombol nav-link yang aktif */
        .nav-link.active {
            background-color: #2563eb; /* bg-blue-600 */
            color: white;
            transform: translateX(4px); /* Efek 'selected' */
        }

        /* Animasi Keyframes */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom scrollbar (opsional, untuk estetika) */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #1e293b; /* bg-slate-800 */
        }
        ::-webkit-scrollbar-thumb {
            background: #3b82f6; /* bg-blue-500 */
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #2563eb; /* bg-blue-600 */
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
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Home</span>
                        </a>
                    </li>
                        <a href="<?= base_url('pendidikan') ?>" class="nav-link w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422A12.083 12.083 0 0112 10a12.083 12.083 0 01-6.16 0L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7m0 0l-6.16-3.422A12.083 12.083 0 0112 17a12.083 12.083 0 016.16 0L12 21z"></path></svg>
                        <span>Pendidikan</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('pengalaman') ?>" class="nav-link w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.103V11a2 2 0 00-2-2h-1a2 2 0 00-2 2v2.103M3 13.103V11a2 2 0 012-2h1a2 2 0 012 2v2.103M12 16v5m0 0l-3-3m3 3l3-3M3 11V6a2 2 0 012-2h14a2 2 0 012 2v5"></path></svg>
                            <span>Pengalaman</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('skills') ?>" class="nav-link w-full flex items-center space-x-3 px-4 py-3 rounded-lg text-slate-300 hover:bg-slate-700 hover:text-white transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path></svg>
                            <span>Keahlian</span>
                        </a>
                    </li>
                </ul>
        </nav>

        <!-- Konten Utama (Halaman Dinamis) -->
        <main class="flex-grow p-6 md:p-10 bg-slate-900 rounded-b-xl md:rounded-r-xl md:rounded-b-none overflow-y-auto" style="height: calc(100vh - 4rem); /* 80vh min-h di kontainer, ini untuk scroll */">
            <section id="page-home" class="page-content">
                <?php if (isset($biodata) && !empty($biodata)): ?>
                    <p class="bg-slate-800 p-6 rounded-lg shadow-inner mb-8"><?= $biodata['profil_singkat'] ?></p>

                    <div class="bg-slate-800 p-6 rounded-lg shadow-inner mb-8">
                        <h3 class="text-2xl font-semibold text-white mb-4">Tentang Saya</h3>
                        <p class="text-slate-300 leading-relaxed">
                            <?= $biodata['deskripsi_lengkap'] ?>
                        </p>
                    </div>

                    <h3 class="text-2xl font-semibold text-white mb-6">Informasi Kontak</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-slate-800 p-6 rounded-lg shadow-lg flex items-center space-x-4 transition-all duration-300 hover:shadow-blue-500/20 hover:scale-[1.03]">
                            <svg class="w-8 h-8 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <div>
                                <span class="text-sm text-slate-400">Email</span>
                                <p class="text-lg font-medium text-white"><?= $biodata['email'] ?></p>
                            </div>
                        </div>
                        <div class="bg-slate-800 p-6 rounded-lg shadow-lg flex items-center space-x-4 transition-all duration-300 hover:shadow-blue-500/20 hover:scale-[1.03]">
                            <svg class="w-8 h-8 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <div>
                                <span class="text-sm text-slate-400">Telepon</span>
                                <p class="text-lg font-medium text-white"><?= $biodata['telepon'] ?></p>
                            </div>
                        </div>
                        <div class="bg-slate-800 p-6 rounded-lg shadow-lg flex items-center space-x-4 transition-all duration-300 hover:shadow-blue-500/20 hover:scale-[1.03]">
                            <svg class="w-8 h-8 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <div>
                                <span class="text-sm text-slate-400">Lokasi</span>
                                <p class="text-lg font-medium text-white"><?= $biodata['alamat'] ?></p>
                            </div>
                        </div>
                        <div class="bg-slate-800 p-6 rounded-lg shadow-lg flex items-center space-x-4 transition-all duration-300 hover:shadow-blue-500/20 hover:scale-[1.03]">
                            <svg class="w-8 h-8 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <span class="text-sm text-slate-400">Tempat, Tanggal Lahir</span>
                                <p class="text-lg font-medium text-white">
                                    <?= $biodata['tempat_lahir'] ?>, <?= date('d M Y', strtotime($biodata['tanggal_lahir'])) ?>
                                </p>
                            </div>
                        </div>
                        <div class="bg-slate-800 p-6 rounded-lg shadow-lg flex items-center space-x-4 transition-all duration-300 hover:shadow-blue-500/20 hover:scale-[1.03]">
                            <!-- Logo LinkedIn -->
                            <svg class="w-8 h-8 text-blue-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14a5 5 0 00-5 5v14a5 5 0 005 5h14a5 5 0 005-5v-14a5 5 0 00-5-5zM8.339 19h-3.004v-9.339h3.004v9.339zM6.837 8.377a1.74 1.74 0 110-3.48 1.74 1.74 0 010 3.48zM20 19h-3.003v-4.848c0-1.157-.023-2.645-1.612-2.645-1.613 0-1.86 1.26-1.86 2.56v4.933h-3.004v-9.339h2.884v1.277h.041c.401-.757 1.381-1.557 2.845-1.557 3.044 0 3.607 2.005 3.607 4.613v5.006z" />
                            </svg>
                            <div>
                                <span class="text-sm text-slate-400">LinkedIn</span>
                                <p class="text-lg font-medium text-white">
                                <a href="<?= esc($biodata['linkedin']) ?>" target="_blank" class="hover:text-blue-400 transition-colors">
                                    Klik untuk kunjungi LinkedIn
                                </a>
                                </p>
                            </div>
                        </div>

                        <div class="bg-slate-800 p-6 rounded-lg shadow-lg flex items-center space-x-4 transition-all duration-300 hover:shadow-blue-500/20 hover:scale-[1.03]">
                            <!-- Logo GitHub -->
                            <svg class="w-8 h-8 text-blue-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 .5a12 12 0 00-3.8 23.4c.6.1.8-.2.8-.6v-2.3c-3.3.7-4-1.5-4-1.5a3.2 3.2 0 00-1.3-1.8c-1-.7.1-.7.1-.7a2.6 2.6 0 011.9 1.3 2.7 2.7 0 003.7 1.1 2.7 2.7 0 01.8-1.7c-2.6-.3-5.4-1.3-5.4-6a4.7 4.7 0 011.3-3.3 4.3 4.3 0 01.1-3.2s1-.3 3.3 1.3a11.4 11.4 0 016 0c2.3-1.6 3.3-1.3 3.3-1.3a4.3 4.3 0 01.1 3.2 4.7 4.7 0 011.3 3.3c0 4.7-2.8 5.7-5.4 6a3 3 0 01.8 2.3v3.4c0 .3.2.6.8.5A12 12 0 0012 .5z" />
                            </svg>
                            <div>
                                <span class="text-sm text-slate-400">GitHub</span>
                                <p class="text-lg font-medium text-white">
                                <a href="<?= esc($biodata['github']) ?>" target="_blank" class="hover:text-blue-400 transition-colors">
                                    Klik untuk kunjungi GitHub
                                </a>
                                </p>
                            </div>
                        </div>

                        <div class="bg-slate-800 p-6 rounded-lg shadow-lg flex items-center space-x-4 transition-all duration-300 hover:shadow-blue-500/20 hover:scale-[1.03]">
                            <!-- Logo Instagram -->
                            <svg class="w-8 h-8 text-blue-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.65 0 3 1.35 3 3v10c0 1.65-1.35 3-3 3H7c-1.65 0-3-1.35-3-3V7c0-1.65 1.35-3 3-3h10zm-5 3a5 5 0 105 5 5 5 0 00-5-5zm0 8.2a3.2 3.2 0 113.2-3.2A3.2 3.2 0 0112 15.2zm4.5-8.9a1.1 1.1 0 11-1.1 1.1 1.1 1.1 0 011.1-1.1z" />
                            </svg>
                            <div>
                                <span class="text-sm text-slate-400">Instagram</span>
                                <p class="text-lg font-medium text-white">
                                <a href="<?= esc($biodata['instagram']) ?>" target="_blank" class="hover:text-blue-400 transition-colors">
                                    Klik untuk kunjungi Instagram
                                </a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="text-center text-slate-400 mt-6">Data profil tidak ditemukan.</p>
                <?php endif; ?>
            </section>

        </main>
    </div>

    <script>
        // Simpan referensi ke halaman-halaman
        const pages = document.querySelectorAll('.page-content');
        // Simpan referensi ke tombol navigasi
        const navLinks = document.querySelectorAll('.nav-link');

        function showPage(pageId, clickedButton) {
            // Sembunyikan semua halaman
            pages.forEach(page => {
                page.style.display = 'none';
            });
            
            // Tampilkan halaman yang diminta
            const activePage = document.getElementById(pageId);
            if (activePage) {
                activePage.style.display = 'block';
            }

            // Atur status 'active' pada tombol navigasi
            navLinks.forEach(link => {
                link.classList.remove('active');
            });
            if (clickedButton) {
                clickedButton.classList.add('active');
            }
        }

        // Inisialisasi: Tampilkan halaman 'home' dan set tombol 'home' sebagai aktif saat pertama kali dimuat
        document.addEventListener('DOMContentLoaded', () => {
            showPage('page-home', document.querySelector('.nav-link')); // Tombol pertama adalah home
        });
    </script>
</body>
</html>