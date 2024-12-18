<header class="flex items-center justify-center min-h-screen bg-slate-50" id="home"
    style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('/img/david-rodrigo-kZ1zThg6G40-unsplash.jpg'); background-position: center; background-size: cover">
    <div class="text-center">
        <h2 class="mb-5 text-3xl no-underline text-primary fi-logo">
            {{-- _SIKeuangan<span class="font-bold">Masjid</span> --}}
            {{ $setting ? ucwords($setting->nama_web) : "nama_web"}}
        </h2>
        <p class="w-full px-5 mx-auto text-white lg:w-3/5">Sistem Informasi Keuangan Masjid merupakan
            sistem informasi yang digunakan untuk mengelola pemasukan dan pengeluaran masjid, mulai dari zakat serta
            infaq yang bersifat masjid dan sosial.</p>
    </div>
</header>
