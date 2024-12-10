<main>

    {{-- Header Page --}}
    <header class="flex items-center justify-center min-h-screen bg-slate-50" id="home"
        style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('/img/david-rodrigo-kZ1zThg6G40-unsplash.jpg'); background-position: center; background-size: cover">
        <div class="text-center">
            <h2 class="mb-5 text-3xl no-underline text-primary fi-logo">
                _SIKeuangan<span class="font-bold">Masjid</span>
            </h2>
            <p class="w-full px-5 mx-auto text-white lg:w-3/5">Sistem Informasi Keuangan Masjid merupakan
                sistem informasi yang digunakan untuk mengelola pemasukan dan pengeluaran masjid, mulai dari zakat serta
                infaq yang bersifat masjid dan sosial.</p>
        </div>
    </header>
    {{-- End Header Page --}}

    {{-- Infaq Page --}}
    <section id="infaq" class="px-5 xl:px-0">
        <div class="container py-24 mx-auto">
            <p class="mb-1 text-[13px] font-medium uppercase text-gray-600">Pemasukan dan pengeluaran</p>
            <h2 class="mb-6 text-2xl font-bold text-gray-900">Infaq <span class="text-primary">Masjid</span> dan <span
                    class="text-primary">Sosial</span></h2>

            <div class="flex gap-3 mb-3">
                <div class="w-full text-white card bg-primary">
                    <div class="flex justify-center card-body">
                        <h5 class="uppercase font-medium text-sm mb-2.5">Total Infaq</h5>
                        <p class="text-xl font-semibold">Rp {{ number_format($totalInfaq, '0', '', '.')
                            }}</p>
                    </div>
                </div>
                <div class="w-full text-white border shadow-none card bg-primary/50 border-primary">
                    <div class="flex justify-center card-body">
                        <h5 class="uppercase font-medium text-sm mb-2.5">Pemasukan Infaq</h5>
                        <p class="text-xl font-semibold">Rp {{ number_format(array_sum($pemasukanInfaq), '0', '', '.')
                            }}</p>
                    </div>
                </div>
                <div class="w-full bg-transparent border shadow-none card border-primary text-primary">
                    <div class="card-body">
                        <h5 class="uppercase font-medium text-sm text-primary mb-2.5">Pengeluaran Infaq</h5>
                        <p class="text-xl font-semibold">Rp {{ number_format(array_sum($pengeluaranInfaq), '0', '', '.')
                            }}</p>
                    </div>
                </div>
            </div>

            {{-- List Infaq Tabel --}}
            <livewire:list-infaq />
        </div>
    </section>
    {{-- End Infaq Page --}}

    {{-- Zakat Page --}}
    <section id="zakat" class="px-5 xl:px-0 bg-primary">
        <div class="container py-24 mx-auto">
            <p class="mb-1 text-[13px] font-medium uppercase text-gray-200">Pemasukan dan pengeluaran</p>
            <h2 class="mb-6 text-2xl font-bold text-gray-50">Zakat</h2>

            <div class="flex gap-3 mb-3">
                <div class="w-full bg-white text-primary card">
                    <div class="flex justify-center card-body">
                        <h5 class="uppercase font-medium text-sm mb-2.5">Total Zakat</h5>
                        <p class="text-xl font-semibold">Rp {{ number_format($totalZakat, '0', '', '.')
                            }}</p>
                    </div>
                </div>
                <div class="w-full border border-white shadow-none text-primary card bg-white/70">
                    <div class="flex justify-center card-body">
                        <h5 class="uppercase font-medium text-sm mb-2.5">Pemasukan Zakat</h5>
                        <p class="text-xl font-semibold">Rp {{ number_format(array_sum($pemasukanZakat), '0', '', '.')
                            }}</p>
                    </div>
                </div>
                <div class="w-full text-white bg-transparent border border-white shadow-none card">
                    <div class="card-body">
                        <h5 class="uppercase font-medium text-sm mb-2.5">Pengeluaran Zakat</h5>
                        <p class="text-xl font-semibold">Rp {{ number_format(array_sum($pengeluaranZakat), '0', '', '.')
                            }}</p>
                    </div>
                </div>
            </div>

            {{-- List Zakat Tabel --}}
            <livewire:list-zakat />
        </div>
    </section>
    {{-- End Zakat Page --}}

    {{-- Rekening Masjid Page --}}
    <section id="rekmasjid" class="px-5 xl:px-0">
        <div class="container py-24 mx-auto">
            <div class="text-center">
                <p class="mb-1 text-[13px] font-medium uppercase text-gray-600">Informasi</p>
                <h2 class="mb-6 text-2xl font-bold text-gray-900">Rekening <span class="text-primary">Masjid</span></h2>
            </div>

            <div class="flex flex-col w-full gap-3 lg:flex-row">
                @foreach ($rekeningZakat as $rekZakat)
                <div class="w-full text-white card bg-gradient-to-r from-primary to-[#7EEDF4]">
                    <div class="flex justify-center card-body">
                        <h5 class="uppercase font-medium text-sm mb-2.5">Bank Penerima Infaq dan Zakat</h5>
                        <p class="text-2xl font-bold">{{ strtoupper($rekZakat->jenis_bank) }} - {{ $rekZakat->no_rek }}
                        </p>
                        <p class="text-xl font-semibold">{{ ucwords($rekZakat->nama) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- End Rekening Masjid Page --}}

    {{-- Kontak Page --}}
    <section id="kontak" class="px-5 xl:px-0">
        <div class="container py-24 mx-auto">
            <div class="w-full text-white card bg-gradient-to-r from-primary to-[#7EEDF4]">
                <div class="flex justify-between py-6">
                    <div>
                        <div class="flex justify-center card-body">
                            <h5 class="uppercase font-medium text-sm mb-1.5">Nomor Telepon atau Whatsapp (WA)</h5>
                            <p class="text-2xl font-bold">{{ $setting ?? "no_telp" }}</p>
                        </div>
                        <div class="flex justify-center card-body">
                            <h5 class="uppercase font-medium text-sm mb-1.5">Email</h5>
                            <p class="text-2xl font-bold">{{ $setting ?? "email" }}</p>
                        </div>
                    </div>
                    <img src="{{ asset('img/undraw_contact_us_re_4qqt.svg') }}" alt=""
                        class="hidden px-6 w-96 md:inline" />
                </div>
            </div>
        </div>
    </section>
    {{-- End Kontak Page --}}

    {{-- Footer --}}
    <footer class="px-6 pt-6 pb-4 text-center bg-gray-950">
        <h2 class="mb-3 text-2xl no-underline fi-logo text-primary">
            _SIKeuangan<span class="font-bold">Masjid</span>
        </h2>
        <p class="w-full mx-auto mb-8 text-sm text-gray-100 md:w-1/2 lg:w-1/3">
            {{ ucwords($setting) ?? "alamat" }}
        </p>
        <small class="text-gray-100"><span class="font-semibold">Copyright © {{ date('Y') }}</span> - <span
                class="text-xs font-extralight fi-logo">Sistem Informasi Keuangan Masjid.</span></small>
    </footer>
    {{-- End Footer --}}

</main>
