<div class="mb-36">
    <div class="text-center">
        <p class="mb-0.5 text-[13px] font-medium uppercase text-gray-600">Informasi</p>
        <h2 class="mb-6 text-xl font-bold text-primary">Cek Status Bukti Transfer</span></h2>
    </div>

    <div class="p-5 bg-white rounded-lg shadow">
        {{-- <form wire:submit="show">
            {{ $this->form }}

        </form> --}}
        <button type="button" id="cek-status"
            class="w-full transition duration-75 rounded-lg gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm text-white bg-primary hover:bg-[#12c1cc] font-medium">
            Cek Status
        </button>
    </div>
    @push('scripts')
    <script type="module">
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).on('click', '#cek-status', async function(event) {
                const {
                    value: kode
                } = await Swal.fire({
                    input: "text",
                    inputLabel: "Kode Bukti Transfer",
                    inputPlaceholder: "Masukkan Kode Bukti Transfer",
                    confirmButtonText: "Cek Status",
                });
                if (kode) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('cari-kode.show') }}",
                        data: {
                            kode: kode
                        },
                        success: function(result) {
                            console.log(result);
                            if (result.success == false) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Something went wrong!",
                                    footer: '<a href="#">Why do I have this issue?</a>'
                                });
                            } else {
                                console.log(result.data);
                                if (result.data.status == 0) {var statusKode = 'Menunggu Konfirmasi Dari Admin atau Bendahara';}
                                if (result.data.status == 1 || result.data.status == 2) {var statusKode = `${result.data.keterangan}`;}
                                Swal.fire({
                                    title: `Status kode : ${kode}`,
                                    text: `${statusKode}`,
                                });
                            }
                        },
                        error: function(jqXHR, testStatus, error) {
                            console.log(error);
                        },
                        timeout: 8000
                    })
                }
            });
    </script>
    @endpush
</div>
