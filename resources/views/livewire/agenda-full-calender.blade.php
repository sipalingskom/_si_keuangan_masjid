<section id="agenda" class="px-5 xl:px-0">
    <div class="container py-24 mx-auto">
        <div id="calendar"></div>
    </div>

    @push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script type="module">
        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: @json($events),
                    eventClick: function(info) {
                        Swal.fire({
                            title: `<small><strong>Detail Agenda</strong></small><hr />`,
                            html: `
                                <div style="text-align: left">
                                    <table style="width: 100%;">
                                        <tr>
                                            <th style="padding: 4px;">Nama Kegiatan</th>
                                            <td style="padding: 4px;"> : </td>
                                            <td style="padding: 4px;">${info.event.title}</td>
                                        </tr>
                                        <tr>
                                            <th style="padding: 4px;">Waktu Mulai</th>
                                            <td style="padding: 4px;"> : </td>
                                            <td style="padding: 4px;">${info.event.start.getDate()} ${monthNames[info.event.start.getMonth()]} ${info.event.start.getFullYear()} </td>
                                        </tr>
                                        <tr>
                                            <th style="padding: 4px;">Waktu Selesai</th>
                                            <td style="padding: 4px;"> : </td>
                                            <td style="padding: 4px;">${info.event.end.getDate()} ${monthNames[info.event.end.getMonth()]} ${info.event.end.getFullYear()} </td>
                                        </tr>
                                    </table>
                                </div>
                            `,
                        });
                    }

                });
                calendar.render();
            });
    </script>
    @endpush
</section>
