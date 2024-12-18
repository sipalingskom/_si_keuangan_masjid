<div>
    <div class="fixed z-50 w-full py-1 transition-all duration-300" id="navbar">
        <nav class="container mx-auto bg-transparent navbar">
            <div class="navbar-start">
                <a href="#home" class="text-base no-underline fi-logo text-primary">
                    {{-- _SIKeuangan<span class="font-bold">Masjid</span> --}}
                    {{ $setting ? $setting->nama_web : "nama_web"}}
                </a>
            </div>
            <div class="navbar-center max-sm:hidden">
                <ul class="flex gap-6 p-0 text-sm text-white" id="nav-list">
                    <li><a href="#infaq">Infaq</a></li>
                    <li><a href="#zakat">Zakat</a></li>
                    <li><a href="#agenda">Agenda</a></li>
                    <li><a href="#rekmasjid">Rek. Masjid</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </div>
            <div class="items-center gap-4 navbar-end">
                <div class="dropdown relative inline-flex sm:hidden rtl:[--placement:bottom-end]">
                    <button id="dropdown-default" type="button"
                        class="dropdown-toggle btn btn-text btn-secondary btn-square" aria-haspopup="menu"
                        aria-expanded="false" aria-label="Dropdown">
                        <span class="icon-[tabler--menu-2] dropdown-open:hidden size-5"></span>
                        <span class="icon-[tabler--x] dropdown-open:block hidden size-5"></span>
                    </button>
                    <ul class="hidden dropdown-menu dropdown-open:opacity-100 min-w-64" role="menu"
                        aria-orientation="vertical" aria-labelledby="dropdown-default">
                        <li><a class="dropdown-item" href="#infaq">Infaq</a></li>
                        <li><a class="dropdown-item" href="#zakat">Zakat</a></li>
                        <li><a class="dropdown-item" href="#agenda">Agenda</a></li>
                        <li><a class="dropdown-item" href="#rekmasjid">Rek. Masjid</a></li>
                        <li><a class="dropdown-item" href="#kontak">Kontak</a></li>
                    </ul>
                </div>
                <a class="w-20 py-1.5 text-sm font-semibold text-center border rounded-lg border-primary text-primary hover:text-white hover:bg-primary duration-300 transition"
                    href="{{ route('filament.app.auth.login') }}">Sign up</a>
            </div>
        </nav>
    </div>
</div>
