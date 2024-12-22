<div class="mb-36">
    <div class="text-center">
        <p class="mb-0.5 text-[13px] font-medium uppercase text-gray-600">Informasi</p>
        <h2 class="mb-6 text-xl font-bold text-primary">Cek Status Bukti Transfer</span></h2>
    </div>

    <div class="p-5 bg-white rounded-lg shadow">
        <form wire:submit="show">
            {{ $this->form }}

            <button type="submit"
                class="mt-6 w-full transition duration-75 rounded-lg gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm text-white bg-primary hover:bg-[#12c1cc] font-medium">
                Cek Status
            </button>
        </form>
    </div>
    @push('scripts')
    <script type="module">
        console.log({!! json_encode($data) !!});
    </script>
    @endpush
</div>
