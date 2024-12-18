<div id="zakat" class="px-5 xl:px-0 bg-primary">
    <div class="container py-24 mx-auto">
        <h2 class="mb-1 text-2xl font-black uppercase text-gray-50">Informasi Zakat</span>
        </h2>
        <p class="mb-6 text-[13px] font-medium uppercase text-gray-200">Pemasukan dan pengeluaran</p>

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
        {{ $this->table }}
    </div>
</div>
