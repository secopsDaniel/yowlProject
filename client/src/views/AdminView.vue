<script setup></script>
<template>
<body class="flex h-screen overflow-hidden antialiased selection:bg-[#5412fc] selection:text-white">
    <!-- Sidebar -->
    <aside class="w-72 bg-[#FFFFFF] border-r border-[#E9ECEF] flex-shrink-0 flex flex-col transition-all duration-300 hidden lg:flex z-20 relative">
        <!-- Logo -->
        <div class="h-20 flex items-center px-8 border-b border-[#E9ECEF]">
            <div class="font-display font-semibold text-xl tracking-tighter text-[#212529] flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-[#5412fc] flex items-center justify-center text-white">
                    <iconify-icon icon="solar:box-minimalistic-linear" width="20" stroke-width="1.5"></iconify-icon>
                </div>
                E-VOTING
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium bg-[#5412fc] text-white transition-all">
                <iconify-icon icon="solar:widget-linear" width="20" stroke-width="1.5"></iconify-icon>
                Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-[#6C757D] hover:bg-[#F8F9FA] hover:text-[#5412fc] transition-all group">
                <iconify-icon icon="solar:clock-circle-linear" width="20" stroke-width="1.5" class="group-hover:text-[#5412fc]"></iconify-icon>
                Pemilihan Aktif
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-[#6C757D] hover:bg-[#F8F9FA] hover:text-[#5412fc] transition-all group">
                <iconify-icon icon="solar:users-group-rounded-linear" width="20" stroke-width="1.5" class="group-hover:text-[#5412fc]"></iconify-icon>
                Kandidat
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-[#6C757D] hover:bg-[#F8F9FA] hover:text-[#5412fc] transition-all group">
                <iconify-icon icon="solar:user-id-linear" width="20" stroke-width="1.5" class="group-hover:text-[#5412fc]"></iconify-icon>
                Data Pemilih
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-[#6C757D] hover:bg-[#F8F9FA] hover:text-[#5412fc] transition-all group">
                <iconify-icon icon="solar:inbox-in-linear" width="20" stroke-width="1.5" class="group-hover:text-[#5412fc]"></iconify-icon>
                Suara Masuk
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-[#6C757D] hover:bg-[#F8F9FA] hover:text-[#5412fc] transition-all group">
                <iconify-icon icon="solar:chart-square-linear" width="20" stroke-width="1.5" class="group-hover:text-[#5412fc]"></iconify-icon>
                Hasil Realtime
            </a>
            
            <div class="pt-4 pb-2">
                <div class="h-px bg-[#E9ECEF] w-full"></div>
            </div>
            
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-[#6C757D] hover:bg-[#F8F9FA] hover:text-[#5412fc] transition-all group">
                <iconify-icon icon="solar:document-text-linear" width="20" stroke-width="1.5" class="group-hover:text-[#5412fc]"></iconify-icon>
                Laporan
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-[#6C757D] hover:bg-[#F8F9FA] hover:text-[#5412fc] transition-all group">
                <iconify-icon icon="solar:settings-linear" width="20" stroke-width="1.5" class="group-hover:text-[#5412fc]"></iconify-icon>
                Pengaturan
            </a>
        </nav>

        <!-- System Status -->
        <div class="p-6 border-t border-[#E9ECEF] bg-[#F8F9FA]/50">
            <div class="flex items-center justify-between mb-3">
                <span class="text-xs font-medium text-[#6C757D] uppercase tracking-wider">Status Server</span>
                <div class="flex items-center gap-1.5 bg-[#28A745]/10 px-2 py-1 rounded-md">
                    <div class="w-2 h-2 rounded-full bg-[#28A745] animate-pulse"></div>
                    <span class="text-xs font-medium text-[#28A745]">Online</span>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-[#6C757D]">Latensi</span>
                    <span class="font-mono text-[#212529] text-xs font-medium">12ms</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-[#6C757D]">Sinkronisasi</span>
                    <span class="font-mono text-[#212529] text-xs font-medium">Baru saja</span>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="flex-1 flex flex-col min-w-0 bg-[#F8F9FA]">
        
        <!-- Header -->
        <header class="h-20 bg-[#FFFFFF] border-b border-[#E9ECEF] flex items-center justify-between px-6 lg:px-10 z-10 sticky top-0">
            <div class="flex items-center gap-4">
                <button class="lg:hidden text-[#495057] hover:text-[#5412fc]">
                    <iconify-icon icon="solar:hamburger-menu-linear" width="24" stroke-width="1.5"></iconify-icon>
                </button>
                <div>
                    <div class="flex items-center gap-2 text-xs font-medium text-[#6C757D] mb-1">
                        <span>Dashboard</span>
                        <iconify-icon icon="solar:alt-arrow-right-linear" width="12"></iconify-icon>
                        <span class="text-[#5412fc]">Overview</span>
                    </div>
                    <h1 class="font-display text-2xl font-semibold tracking-tight text-[#212529] leading-none">Pemilihan Aktif</h1>
                </div>
            </div>

            <div class="flex items-center gap-5">
                <!-- Search -->
                <div class="relative hidden md:block">
                    <iconify-icon icon="solar:magnifer-linear" width="18" class="absolute left-3.5 top-1/2 -translate-y-1/2 text-[#6C757D]"></iconify-icon>
                    <input type="text" placeholder="Cari data TPS, pemilih..." class="pl-10 pr-4 py-2.5 w-72 bg-[#F8F9FA] border border-[#E9ECEF] rounded-xl text-sm font-medium text-[#212529] placeholder-[#6C757D] focus:outline-none focus:border-[#5412fc] focus:ring-4 focus:ring-[#5412fc]/10 transition-all">
                </div>

                <div class="h-8 w-px bg-[#E9ECEF] hidden md:block"></div>

                <!-- Clock -->
                <div class="hidden md:flex flex-col items-end">
                    <span class="font-mono text-sm font-semibold text-[#212529]">14:35:22 WIB</span>
                    <span class="text-xs text-[#6C757D]">24 Okt 2025</span>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-[#E9ECEF] text-[#495057] hover:border-[#5412fc] hover:text-[#5412fc] hover:bg-[#F8F9FA] transition-all relative">
                        <iconify-icon icon="solar:bell-linear" width="20" stroke-width="1.5"></iconify-icon>
                        <span class="absolute top-2.5 right-2.5 w-2 h-2 rounded-full bg-[#DC3545] border-2 border-white"></span>
                    </button>
                    
                    <button class="flex items-center gap-3 pl-2 pr-4 py-1.5 rounded-xl border border-[#E9ECEF] hover:border-[#5412fc] transition-all bg-[#FFFFFF]">
                        <div class="w-8 h-8 rounded-lg bg-[#5412fc]/10 flex items-center justify-center text-[#5412fc] font-display font-semibold text-sm">
                            AD
                        </div>
                        <div class="hidden md:block text-left">
                            <div class="text-sm font-medium text-[#212529] leading-tight">Admin Pusat</div>
                            <div class="text-xs text-[#6C757D]">Super Admin</div>
                        </div>
                        <iconify-icon icon="solar:alt-arrow-down-linear" width="16" class="text-[#6C757D] hidden md:block"></iconify-icon>
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-y-auto p-6 lg:p-10">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6">
                <div>
                    <h2 class="font-display text-xl font-medium tracking-tight text-[#212529] mb-1">Pilkada Serentak 2025</h2>
                    <p class="text-sm text-[#6C757D]">Pantau perolehan suara secara real-time dari seluruh TPS</p>
                </div>
                <div class="flex items-center gap-3">
                    <button class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#FFFFFF] border border-[#E9ECEF] text-sm font-medium text-[#495057] hover:border-[#5412fc] hover:text-[#5412fc] transition-all shadow-sm">
                        <iconify-icon icon="solar:printer-linear" width="18" stroke-width="1.5"></iconify-icon>
                        Cetak Laporan
                    </button>
                    <button class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#5412fc] text-white text-sm font-medium hover:bg-[#4309d9] transition-all shadow-sm shadow-[#5412fc]/20">
                        <iconify-icon icon="solar:refresh-circle-linear" width="18" stroke-width="1.5"></iconify-icon>
                        Perbarui Data
                    </button>
                </div>
            </div>

            <!-- Overview Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <!-- Card 1 -->
                <div class="bg-[#FFFFFF] p-6 rounded-2xl border border-[#E9ECEF] border-t-4 border-t-[#5412fc] shadow-sm relative overflow-hidden group hover:shadow-md transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-12 h-12 rounded-xl bg-[#5412fc]/10 flex items-center justify-center text-[#5412fc]">
                            <iconify-icon icon="solar:users-group-two-rounded-linear" width="24" stroke-width="1.5"></iconify-icon>
                        </div>
                        <span class="text-xs font-medium text-[#28A745] bg-[#28A745]/10 px-2.5 py-1 rounded-full flex items-center gap-1">
                            <iconify-icon icon="solar:graph-up-linear" width="12"></iconify-icon> 100%
                        </span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-[#6C757D] mb-1">Total Pemilih Terdaftar</p>
                        <h3 class="font-mono text-3xl font-semibold tracking-tight text-[#5412fc]">152.450</h3>
                        <p class="text-xs text-[#6C757D] mt-2 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#5412fc]"></span> DPT Tetap Final
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#FFFFFF] p-6 rounded-2xl border border-[#E9ECEF] border-t-4 border-t-[#5412fc] shadow-sm relative overflow-hidden group hover:shadow-md transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-12 h-12 rounded-xl bg-[#5412fc]/10 flex items-center justify-center text-[#5412fc]">
                            <iconify-icon icon="solar:inbox-in-linear" width="24" stroke-width="1.5"></iconify-icon>
                        </div>
                        <span class="text-xs font-medium text-[#5412fc] bg-[#5412fc]/10 px-2.5 py-1 rounded-full flex items-center gap-1">
                            77.7%
                        </span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-[#6C757D] mb-1">Total Suara Masuk</p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="font-mono text-3xl font-semibold tracking-tight text-[#212529]">118.460</h3>
                        </div>
                        
                        <!-- Mini Progress -->
                        <div class="mt-3 flex items-center gap-3">
                            <div class="h-1.5 w-full bg-[#E9ECEF] rounded-full overflow-hidden">
                                <div class="h-full bg-[#5412fc] rounded-full" style="width: 77.7%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#FFFFFF] p-6 rounded-2xl border border-[#E9ECEF] border-t-4 border-t-[#5412fc] shadow-sm relative overflow-hidden group hover:shadow-md transition-all">
                    <div class="flex justify-between items-start mb-4">
                        <div class="w-12 h-12 rounded-xl bg-[#5412fc]/10 flex items-center justify-center text-[#5412fc]">
                            <iconify-icon icon="solar:map-point-linear" width="24" stroke-width="1.5"></iconify-icon>
                        </div>
                        <span class="text-xs font-medium text-[#FFC107] bg-[#FFC107]/10 px-2.5 py-1 rounded-full flex items-center gap-1">
                            10 Pending
                        </span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-[#6C757D] mb-1">TPS Mengirim Data</p>
                        <div class="flex items-baseline gap-2">
                            <h3 class="font-mono text-3xl font-semibold tracking-tight text-[#212529]">235</h3>
                            <span class="text-sm text-[#6C757D] font-medium">/ 245</span>
                        </div>
                        <p class="text-xs text-[#6C757D] mt-2 flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#28A745]"></span> 95.9% TPS Selesai
                        </p>
                    </div>
                </div>
            </div>

            <!-- Quick Recap & Candidates Layout -->
            <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">
                
                <!-- Candidates Section (Spans 3 cols) -->
                <div class="xl:col-span-3">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="font-display text-lg font-medium tracking-tight text-[#212529]">Perolehan Suara Kandidat</h2>
                        <a href="#" class="text-sm font-medium text-[#5412fc] hover:underline flex items-center gap-1">Lihat Detail <iconify-icon icon="solar:alt-arrow-right-linear"></iconify-icon></a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        
                        <!-- Candidate A -->
                        <div class="bg-[#FFFFFF] border border-[#E9ECEF] rounded-2xl p-6 relative hover:shadow-[0_12px_32px_rgba(84,18,252,0.08)] transition-all duration-300 pt-8">
                            <!-- Badge Nomor Urut -->
                            <div class="absolute -top-4 left-6 bg-[#212529] text-white px-5 py-1.5 rounded-full text-sm font-semibold border-4 border-[#FFFFFF] shadow-sm">
                                01
                            </div>
                            
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-14 h-14 rounded-full bg-[#F8F9FA] border-2 border-[#E9ECEF] flex items-center justify-center flex-shrink-0 relative overflow-hidden">
                                    <iconify-icon icon="solar:user-linear" width="24" class="text-[#6C757D]"></iconify-icon>
                                </div>
                                <div>
                                    <h3 class="font-display font-semibold text-[#212529] leading-snug">Ahmad & Sarah</h3>
                                    <p class="text-xs text-[#6C757D] mt-0.5 font-medium">Partai Mapan</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between items-end mb-2">
                                        <span class="text-xs font-medium text-[#6C757D] uppercase tracking-wider">Perolehan</span>
                                        <span class="font-mono text-2xl font-semibold text-[#212529]">45.230</span>
                                    </div>
                                    <div class="h-3 bg-[#F8F9FA] rounded-full overflow-hidden border border-[#E9ECEF]">
                                        <div class="h-full bg-[#5412fc] rounded-full opacity-60" style="width: 38.2%"></div>
                                    </div>
                                    <div class="text-right mt-1.5">
                                        <span class="text-sm font-semibold text-[#5412fc]">38.2%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Candidate B (Leading) -->
                        <div class="bg-[#FFFFFF] border border-[#5412fc]/20 rounded-2xl p-6 relative shadow-[0_8px_24px_rgba(84,18,252,0.06)] hover:shadow-[0_12px_32px_rgba(84,18,252,0.12)] transition-all duration-300 pt-8 ring-1 ring-[#5412fc]/10">
                            <!-- Badge Nomor Urut -->
                            <div class="absolute -top-4 left-6 bg-[#5412fc] text-white px-5 py-1.5 rounded-full text-sm font-semibold border-4 border-[#FFFFFF] shadow-sm">
                                02
                            </div>
                            
                            <!-- Leading Badge -->
                            <div class="absolute top-4 right-4 bg-[#28A745] text-white text-[10px] font-semibold uppercase tracking-wider px-2 py-1 rounded">
                                Unggul Sementara
                            </div>
                            
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-14 h-14 rounded-full bg-[#F8F9FA] border-2 border-[#5412fc] flex items-center justify-center flex-shrink-0 relative overflow-hidden">
                                    <iconify-icon icon="solar:user-bold-duotone" width="24" class="text-[#5412fc]"></iconify-icon>
                                </div>
                                <div>
                                    <h3 class="font-display font-semibold text-[#212529] leading-snug">Budi & Dewi</h3>
                                    <p class="text-xs text-[#6C757D] mt-0.5 font-medium">Partai Reformasi</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between items-end mb-2">
                                        <span class="text-xs font-medium text-[#6C757D] uppercase tracking-wider">Perolehan</span>
                                        <span class="font-mono text-2xl font-semibold text-[#5412fc]">52.450</span>
                                    </div>
                                    <div class="h-3 bg-[#F8F9FA] rounded-full overflow-hidden border border-[#E9ECEF]">
                                        <div class="h-full bg-[#5412fc] rounded-full relative overflow-hidden" style="width: 44.3%">
                                            <div class="absolute inset-0 bg-white/20 w-full h-full skew-x-12 translate-x-[-100%] animate-[shimmer_2s_infinite]"></div>
                                        </div>
                                    </div>
                                    <div class="text-right mt-1.5">
                                        <span class="text-sm font-semibold text-[#5412fc]">44.3%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Candidate C -->
                        <div class="bg-[#FFFFFF] border border-[#E9ECEF] rounded-2xl p-6 relative hover:shadow-[0_12px_32px_rgba(84,18,252,0.08)] transition-all duration-300 pt-8">
                            <!-- Badge Nomor Urut -->
                            <div class="absolute -top-4 left-6 bg-[#212529] text-white px-5 py-1.5 rounded-full text-sm font-semibold border-4 border-[#FFFFFF] shadow-sm">
                                03
                            </div>
                            
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-14 h-14 rounded-full bg-[#F8F9FA] border-2 border-[#E9ECEF] flex items-center justify-center flex-shrink-0 relative overflow-hidden">
                                    <iconify-icon icon="solar:user-linear" width="24" class="text-[#6C757D]"></iconify-icon>
                                </div>
                                <div>
                                    <h3 class="font-display font-semibold text-[#212529] leading-snug">Chandra & Eka</h3>
                                    <p class="text-xs text-[#6C757D] mt-0.5 font-medium">Partai Independen</p>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between items-end mb-2">
                                        <span class="text-xs font-medium text-[#6C757D] uppercase tracking-wider">Perolehan</span>
                                        <span class="font-mono text-2xl font-semibold text-[#212529]">20.780</span>
                                    </div>
                                    <div class="h-3 bg-[#F8F9FA] rounded-full overflow-hidden border border-[#E9ECEF]">
                                        <div class="h-full bg-[#5412fc] rounded-full opacity-30" style="width: 17.5%"></div>
                                    </div>
                                    <div class="text-right mt-1.5">
                                        <span class="text-sm font-semibold text-[#5412fc]">17.5%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Statistics Component -->
                    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Sah / Tidak Sah -->
                        <div class="bg-[#FFFFFF] p-6 rounded-2xl border border-[#E9ECEF] shadow-sm">
                            <h3 class="font-display text-base font-medium text-[#212529] mb-5">Validitas Suara</h3>
                            
                            <div class="space-y-5">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-[#5412fc]/5 border border-[#5412fc]/10 flex items-center justify-center text-[#5412fc]">
                                            <iconify-icon icon="solar:check-circle-linear" width="20"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-[#212529]">Suara Sah</p>
                                            <p class="text-xs text-[#6C757D]">Diterima sistem</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-mono text-lg font-semibold text-[#212529]">115.230</p>
                                        <p class="text-xs font-medium text-[#28A745]">97.3%</p>
                                    </div>
                                </div>

                                <div class="h-px bg-[#E9ECEF] w-full"></div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg bg-[#DC3545]/5 border border-[#DC3545]/10 flex items-center justify-center text-[#DC3545]">
                                            <iconify-icon icon="solar:close-circle-linear" width="20"></iconify-icon>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-[#212529]">Suara Tidak Sah</p>
                                            <p class="text-xs text-[#6C757D]">Ditolak / Rusak</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="font-mono text-lg font-semibold text-[#212529]">3.230</p>
                                        <p class="text-xs font-medium text-[#DC3545]">2.7%</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mini Chart Simulation -->
                        <div class="bg-[#FFFFFF] p-6 rounded-2xl border border-[#E9ECEF] shadow-sm">
                            <h3 class="font-display text-base font-medium text-[#212529] mb-5">Distribusi Wilayah Utama</h3>
                            
                            <div class="space-y-4">
                                <!-- Bar 1 -->
                                <div>
                                    <div class="flex justify-between text-xs font-medium mb-1.5">
                                        <span class="text-[#495057]">Jakarta Selatan</span>
                                        <span class="font-mono text-[#212529]">42.5K</span>
                                    </div>
                                    <div class="w-full h-2 bg-[#F8F9FA] rounded-full overflow-hidden border border-[#E9ECEF]/50">
                                        <div class="h-full bg-[#5412fc] rounded-full" style="width: 85%"></div>
                                    </div>
                                </div>
                                <!-- Bar 2 -->
                                <div>
                                    <div class="flex justify-between text-xs font-medium mb-1.5">
                                        <span class="text-[#495057]">Jakarta Barat</span>
                                        <span class="font-mono text-[#212529]">38.2K</span>
                                    </div>
                                    <div class="w-full h-2 bg-[#F8F9FA] rounded-full overflow-hidden border border-[#E9ECEF]/50">
                                        <div class="h-full bg-[#5412fc] opacity-80 rounded-full" style="width: 72%"></div>
                                    </div>
                                </div>
                                <!-- Bar 3 -->
                                <div>
                                    <div class="flex justify-between text-xs font-medium mb-1.5">
                                        <span class="text-[#495057]">Jakarta Pusat</span>
                                        <span class="font-mono text-[#212529]">24.8K</span>
                                    </div>
                                    <div class="w-full h-2 bg-[#F8F9FA] rounded-full overflow-hidden border border-[#E9ECEF]/50">
                                        <div class="h-full bg-[#5412fc] opacity-60 rounded-full" style="width: 54%"></div>
                                    </div>
                                </div>
                                <!-- Bar 4 -->
                                <div>
                                    <div class="flex justify-between text-xs font-medium mb-1.5">
                                        <span class="text-[#495057]">Lainnya</span>
                                        <span class="font-mono text-[#212529]">12.9K</span>
                                    </div>
                                    <div class="w-full h-2 bg-[#F8F9FA] rounded-full overflow-hidden border border-[#E9ECEF]/50">
                                        <div class="h-full bg-[#5412fc] opacity-40 rounded-full" style="width: 25%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar / Activity (Spans 1 col) -->
                <div class="space-y-6">
                    
                    <!-- Fast Recap Card -->
                    <div class="bg-[#FFFFFF] p-6 rounded-2xl border border-dashed border-[#5412fc] relative overflow-hidden">
                        <div class="absolute -right-6 -top-6 w-24 h-24 bg-[#5412fc]/5 rounded-full blur-xl"></div>
                        <h3 class="font-display text-sm font-semibold text-[#5412fc] uppercase tracking-wider mb-4 flex items-center gap-2">
                            <iconify-icon icon="solar:bolt-circle-linear" width="18"></iconify-icon> Rekap Cepat
                        </h3>
                        
                        <div class="space-y-4 relative z-10">
                            <div>
                                <p class="text-xs text-[#6C757D] mb-1">Status Penghitungan</p>
                                <p class="text-sm font-medium text-[#212529]">Berlangsung (Aman)</p>
                            </div>
                            <div>
                                <p class="text-xs text-[#6C757D] mb-1">Selisih Margin Teratas</p>
                                <p class="font-mono text-lg font-semibold text-[#5412fc]">7.220 <span class="text-xs font-medium text-[#495057]">suara (6.1%)</span></p>
                            </div>
                            <div>
                                <p class="text-xs text-[#6C757D] mb-1">Estimasi Selesai</p>
                                <p class="text-sm font-medium text-[#212529]">Hari ini, 18:00 WIB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline -->
                    <div class="bg-[#FFFFFF] p-6 rounded-2xl border border-[#E9ECEF] shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-display text-base font-medium text-[#212529]">Aktivitas Terkini</h3>
                            <button class="text-[#6C757D] hover:text-[#5412fc]">
                                <iconify-icon icon="solar:menu-dots-circle-linear" width="20"></iconify-icon>
                            </button>
                        </div>

                        <div class="relative before:absolute before:inset-0 before:ml-2 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-[#E9ECEF] before:to-transparent">
                            <!-- Standard timeline layout -->
                            <div class="relative pl-6 py-2 group">
                                <div class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-2 before:h-full before:px-px before:bg-[#E9ECEF] sm:before:ml-[0rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-2 after:w-2.5 after:h-2.5 after:bg-[#FFFFFF] after:border-2 after:border-[#5412fc] after:box-content after:rounded-full sm:after:ml-[0rem] after:-translate-x-1/2 after:translate-y-1.5">
                                    <div class="text-xs font-mono text-[#5412fc] mb-1 sm:mb-0">14:32</div>
                                </div>
                                <div class="text-[#212529] text-sm font-medium">TPS 23 Selesai</div>
                                <div class="text-[#6C757D] text-xs mt-0.5">Melaporkan selesai penghitungan & upload C1.</div>
                            </div>

                            <div class="relative pl-6 py-2 group">
                                <div class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-2 before:h-full before:px-px before:bg-[#E9ECEF] sm:before:ml-[0rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-2 after:w-2.5 after:h-2.5 after:bg-[#FFFFFF] after:border-2 after:border-[#5412fc] after:box-content after:rounded-full sm:after:ml-[0rem] after:-translate-x-1/2 after:translate-y-1.5">
                                    <div class="text-xs font-mono text-[#6C757D] mb-1 sm:mb-0">14:15</div>
                                </div>
                                <div class="text-[#212529] text-sm font-medium">Suara Masuk Baru</div>
                                <div class="text-[#6C757D] text-xs mt-0.5">250 suara masuk otomatis dari TPS 45.</div>
                            </div>

                            <div class="relative pl-6 py-2 group">
                                <div class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-2 before:h-full before:px-px before:bg-[#E9ECEF] sm:before:ml-[0rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-2 after:w-2.5 after:h-2.5 after:bg-[#FFFFFF] after:border-2 after:border-[#FFC107] after:box-content after:rounded-full sm:after:ml-[0rem] after:-translate-x-1/2 after:translate-y-1.5">
                                    <div class="text-xs font-mono text-[#6C757D] mb-1 sm:mb-0">13:50</div>
                                </div>
                                <div class="text-[#212529] text-sm font-medium">Kendala Teknis</div>
                                <div class="text-[#6C757D] text-xs mt-0.5">Petugas TPS 12 melaporkan kendala pada mesin printer.</div>
                            </div>

                            <div class="relative pl-6 py-2 group">
                                <div class="flex flex-col sm:flex-row items-start mb-1 group-last:before:hidden before:absolute before:left-2 sm:before:left-2 before:h-full before:px-px before:bg-[#E9ECEF] sm:before:ml-[0rem] before:self-start before:-translate-x-1/2 before:translate-y-3 after:absolute after:left-2 sm:after:left-2 after:w-2.5 after:h-2.5 after:bg-[#FFFFFF] after:border-2 after:border-[#E9ECEF] after:box-content after:rounded-full sm:after:ml-[0rem] after:-translate-x-1/2 after:translate-y-1.5">
                                    <div class="text-xs font-mono text-[#6C757D] mb-1 sm:mb-0">12:45</div>
                                </div>
                                <div class="text-[#6C757D] text-sm font-medium">Pembukaan Sesi</div>
                                <div class="text-[#6C757D] text-xs mt-0.5 opacity-70">TPS seluruh wilayah dibuka.</div>
                            </div>
                        </div>
                        
                        <button class="w-full mt-4 py-2 text-xs font-medium text-[#5412fc] bg-[#5412fc]/5 rounded-lg hover:bg-[#5412fc]/10 transition-colors">
                            Lihat Semua Log
                        </button>
                    </div>

                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-12 pt-6 border-t border-[#E9ECEF] flex flex-col md:flex-row items-center justify-between text-xs text-[#6C757D]">
                <p>&copy; 2025 E-Voting System. Hak Cipta Dilindungi.</p>
                <div class="flex gap-4 mt-2 md:mt-0">
                    <a href="#" class="hover:text-[#5412fc]">Bantuan</a>
                    <a href="#" class="hover:text-[#5412fc]">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-[#5412fc]">Syarat & Ketentuan</a>
                </div>
            </footer>
        </main>
    </div>

</body>
</template>
<style scoped>
        :root {
            --primary: #5412fc;
            --bg-body: #F8F9FA;
            --bg-surface: #FFFFFF;
            --text-main: #212529;
            --text-body: #495057;
            --text-muted: #6C757D;
            --border: #E9ECEF;
            --success: #28A745;
            --danger: #DC3545;
            --warning: #FFC107;
            --info: #17A2B8;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-body);
        }

        .font-display {
            font-family: 'Poppins', sans-serif;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #E9ECEF;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #D1D5DB;
        }
    </style>