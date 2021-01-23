<!-- <!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href="<?= base_url('fullcalendar-5.5.1/lib/main.css') ?>" rel='stylesheet' />
    <script src="<?= base_url('fullcalendar-5.5.1/lib/main.js') ?>"></script>
    <script src="<?= base_url('fullcalendar-5.5.1/examples/js/jquery-3.5.1.min.js') ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            // $.get("http://localhost:8080/api", function (data) {
            //   alert("Data Loaded: " + data);
            // });
            $.getJSON("http://localhost:8080/api", function(data) {
                var items = [];
                $.each(data, function(key, val) {
                    items.push({
                        "modals": '<button>Coba Button</button>',
                        "title": val.nama_event,
                        "start": val.tanggal_mulai,
                        "end": val.tanggal_selesei,
                    });
                });

                const moonLanding = new Date();
                const a = "" + moonLanding.getFullYear() + "-" + moonLanding.getMonth() + 1;
                
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialDate: a,
                    editable: true,
                    selectable: true,
                    businessHours: true,
                    dayMaxEvents: true, // allow "more" link when too many events
                    events: items
                });

                calendar.render();
            });
        });
    </script>
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div id='calendar'></div>
    <button>Coba Button</button>
</body>

</html> -->
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <!-- <link href='../lib/main.css' rel='stylesheet' />
<script src='../lib/main.js'></script> -->
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
        html,
        body {
            overflow: hidden;
            /* don't do scrollbars */
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
            padding: 50px;
        }

        #calendar-container {
            position: fixed;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
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
    </style>
</head>

<body>

    <div id='calendar-container'>
        <div id='calendar'></div>
    </div>

</body>

</html>