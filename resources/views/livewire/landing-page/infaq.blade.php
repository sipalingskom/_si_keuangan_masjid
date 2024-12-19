<div id="infaq" class="px-5 xl:px-0">
    <div class="container py-24 mx-auto">
        <h2 class="mb-1 text-2xl font-black text-gray-900 uppercase">Informasi <span class="text-primary">Infaq</span>
        </h2>
        <p class="mb-6 text-[13px] font-medium uppercase text-gray-600">Pemasukan dan pengeluaran</p>

        <div class="flex gap-3 mb-3">
            <div class="w-full text-white card bg-primary">
                <div class="flex justify-center card-body">
                    <h5 class="uppercase font-semibold text-sm mb-2.5">Total Infaq</h5>
                    <p class="text-xl font-bold">Rp {{ number_format($totalInfaq, '0', '', '.')
                        }}</p>
                </div>
            </div>
            <div class="w-full text-white border shadow-none card bg-primary/50 border-primary">
                <div class="flex justify-center card-body">
                    <h5 class="uppercase font-semibold text-sm mb-2.5">Pemasukan Infaq</h5>
                    <p class="text-xl font-bold">Rp {{ number_format(array_sum($pemasukanInfaq), '0', '', '.')
                        }}</p>
                </div>
            </div>
            <div class="w-full bg-transparent border shadow-none card border-primary text-primary">
                <div class="card-body">
                    <h5 class="uppercase font-semibold text-sm text-primary mb-2.5">Pengeluaran Infaq</h5>
                    <p class="text-xl font-bold">Rp {{ number_format(array_sum($pengeluaranInfaq), '0', '', '.')
                        }}</p>
                </div>
            </div>
        </div>

        {{ $this->table }}
    </div>
</div>
