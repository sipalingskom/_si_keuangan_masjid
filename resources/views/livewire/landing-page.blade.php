<main>

    {{-- Header Page --}}
    <livewire:landing-page.header />
    {{-- End Header Page --}}

    {{-- Infaq Page --}}
    <livewire:landing-page.infaq />
    {{-- End Infaq Page --}}

    {{-- Zakat Page --}}
    <livewire:landing-page.zakat />
    {{-- End Zakat Page --}}

    {{-- Agenda Page --}}
    <section id="agenda" class="px-5 xl:px-0">
        <div class="container py-24 mx-auto">
            <livewire:agenda-full-calender />
        </div>
    </section>
    {{-- End Agenda Page --}}

    {{-- Rekening Masjid Page --}}
    <livewire:landing-page.rekening-masjid />
    {{-- End Rekening Masjid Page --}}

    {{-- Kontak Page --}}
    <section id="kontak" class="px-5 xl:px-0">
        <div class="container py-24 mx-auto">
            <div class="w-full text-white card bg-gradient-to-r from-primary to-[#7EEDF4]">
                <div class="flex justify-between py-6">
                    <div>
                        <div class="flex justify-center card-body">
                            <h5 class="uppercase font-medium text-sm mb-1.5">Nomor Telepon atau Whatsapp (WA)</h5>
                            <p class="text-2xl font-bold">{{ $setting ? $setting->no_telp : "no_telp" }}</p>
                        </div>
                        <div class="flex justify-center card-body">
                            <h5 class="uppercase font-medium text-sm mb-1.5">Email</h5>
                            <p class="text-2xl font-bold">{{ $setting ? ucwords($setting->email) : "email" }}</p>
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
    <footer class="px-6 pt-6 pb-4 text-center bg-gray-900">
        <h2 class="mb-3 text-2xl no-underline fi-logo text-primary">
            {{ $setting ? ucwords($setting->nama_web) : "nama_web"}}
        </h2>
        <p class="w-full mx-auto mb-8 text-sm text-gray-100 md:w-1/2 lg:w-1/3">
            {{ $setting ? ucwords($setting->alamat) : "alamat"}}
        </p>
        <small class="text-gray-100"><span class="font-semibold">Copyright © {{ date('Y') }}</span> - <span
                class="text-xs font-extralight fi-logo">Sistem Informasi Keuangan Masjid.</span></small>
    </footer>
    {{-- End Footer --}}

    {{-- Back To Top --}}
    <section id="backtotop" class="hidden">
        <a href="#home" class="bg-white shadow rounded p-1.5 bottom-6 right-6 fixed backtotop cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#13ADB7"
                class="size-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 18.75 7.5-7.5 7.5 7.5" />
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 7.5-7.5 7.5 7.5" />
            </svg>
        </a>
    </section>
    {{-- End Back To Top --}}

</main>
