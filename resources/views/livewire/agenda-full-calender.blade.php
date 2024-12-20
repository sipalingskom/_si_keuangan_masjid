<section id="agenda" class="px-5 xl:px-0">
    <div class="container py-24 mx-auto">
        <div id="calendar"></div>
    </div>

    @push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: @json($events),
                });
                calendar.render();
            });
    </script>
    @endpush
</section>
