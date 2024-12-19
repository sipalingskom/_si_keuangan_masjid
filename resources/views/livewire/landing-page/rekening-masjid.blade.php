<div id="rekmasjid" class="px-5 xl:px-0 bg-primary">
    <div class="container py-24 mx-auto">
        <div class="text-center">
            <p class="mb-1 text-[13px] font-medium uppercase text-gray-200">Informasi</p>
            <h2 class="mb-6 text-2xl font-bold text-gray-50">Rekening Masjid</span></h2>
        </div>

        <div class="flex flex-col w-full gap-3 mb-6 lg:flex-row">
            @foreach ($rekeningMasjid as $rekMasjid)
            <div class="w-full card bg-gradient-to-r from-white to-gray-100">
                <div class="flex justify-center card-body">
                    <p class="text-lg font-black text-gray-900">{{ strtoupper($rekMasjid->jenis_bank) }}</p>
                    <p class="mb-2 text-xl font-black text-gray-900">{{ $rekMasjid->no_rek }}</p>
                    <p class="font-bold text-sm text-[#71717A]">{{ ucwords($rekMasjid->nama) }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- From --}}
        <div class="p-5 bg-white rounded-lg shadow">
            <h3 class="text-base font-semibold leading-6 text-gray-950">Bukti Transaksi</h3>
            <p class="pb-6 overflow-hidden text-sm text-gray-500 break-words">Input bukti transaksi zakat atau infaq.
            </p>

            <form wire:submit="create">
                {{ $this->form }}

                <button type="submit"
                    class="mt-6 w-full transition duration-75 rounded-lg gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm text-white bg-primary hover:bg-[#12c1cc] font-medium">
                    Kirim Bukti Transfer
                </button>
            </form>
        </div>
    </div>
</div>
