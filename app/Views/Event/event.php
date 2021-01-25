<?= $this->extend('template/template'); ?>

<?= $this->Section('content'); ?>
<link href="<?= base_url('fullcalendar-5.5.1/lib/main.css') ?>" rel='stylesheet' />
<script src="<?= base_url('fullcalendar-5.5.1/lib/main.js') ?>"></script>
<script src="<?= base_url('fullcalendar-5.5.1/examples/js/jquery-3.5.1.min.js') ?>"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        $.getJSON("http://localhost:8080/api", function(data) {
            var items = [];
            $.each(data, function(key, val) {
                items.push({
                    "title": val.nama_event,
                    "url": "detail/" + val.id_event,
                    "start": val.tanggal_mulai,
                    "end": val.tanggal_selesei,
                });
            });

            const moonLanding = new Date();
            const a = "" + moonLanding.getFullYear() + "-" + moonLanding.getMonth() + 1;

            var calendar = new FullCalendar.Calendar(calendarEl, {
                height: '100%',
                expandRows: true,
                slotMinTime: '08:00',
                slotMaxTime: '20:00',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialView: 'dayGridMonth',
                initialDate: items['0'].start,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: items
            });
            // console.log();
            calendar.render();
        });
    });
</script>
<style>
    #calendar-container {
        position: fixed;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        background-color: white;
        box-shadow: whitesmoke;
    }

    .fc-header-toolbar {
        /*
        the calendar will be butting up against the edges,
        but let's scoot in the header's buttons
        */
        padding-top: 1em;
        padding-left: 1em;
        padding-right: 1em;
    }
@media (min-width: 576px) { 
    #calendar-container {
        position: fixed;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        background-color: white;
        box-shadow: whitesmoke;
    }

    .fc-header-toolbar {
        /*
        the calendar will be butting up against the edges,
        but let's scoot in the header's buttons
        */
        padding-top: 1em;
        padding-left: 1em;
        padding-right: 1em;
    }
 }

@media (min-width: 768px) { 
    #calendar-container {
        position: fixed;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        background-color: white;
        box-shadow: whitesmoke;
    }

    .fc-header-toolbar {
        /*
        the calendar will be butting up against the edges,
        but let's scoot in the header's buttons
        */
        padding-top: 1em;
        padding-left: 1em;
        padding-right: 1em;
    }
 }

@media (min-width: 992px) { 
    #calendar-container {
        position: fixed;
        top: 20px;
        left: 20px;
        right: 20px;
        bottom: 20px;
        background-color: white;
        box-shadow: whitesmoke;
    }

    .fc-header-toolbar {
        /*
        the calendar will be butting up against the edges,
        but let's scoot in the header's buttons
        */
        padding-top: 1em;
        padding-left: 1em;
        padding-right: 1em;
    }
 }

@media (min-width: 1200px) { 
    #calendar-container {
        position: fixed;
        top: 150px;
        left: 300px;
        right: 20px;
        bottom: 20px;
        background-color: white;
        box-shadow: whitesmoke;
    }

    .fc-header-toolbar {
        /*
        the calendar will be butting up against the edges,
        but let's scoot in the header's buttons
        */
        padding-top: 1em;
        padding-left: 1em;
        padding-right: 1em;
    }
 }

@media (min-width: 1400px) { 
    #calendar-container {
        position: fixed;
        top: 150px;
        left: 300px;
        right: 20px;
        bottom: 20px;
        background-color: white;
        box-shadow: whitesmoke;
    }

    .fc-header-toolbar {
        /*
        the calendar will be butting up against the edges,
        but let's scoot in the header's buttons
        */
        padding-top: 1em;
        padding-left: 1em;
        padding-right: 1em;
    }
 }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-body" id='calendar-container'>
                        <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>