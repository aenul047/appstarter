<!DOCTYPE html>
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
                        "title": val.nama_event,
                        "start": val.tanggal_mulai,
                        "end": val.tanggal_selesei,
                    });
                });
                console.log(items);

                const moonLanding = new Date();
                const Landing = new Date();
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

</body>

</html>