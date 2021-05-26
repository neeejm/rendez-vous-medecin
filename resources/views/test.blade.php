<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js" ></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.css">
    <style>
        html, body {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  font-size: 14px;
}

#calendar {
  max-width: 1100px;
  margin: 40px auto;
}
    </style>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    initialDate: '2021-05-07',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events: [
      {
        title: 'All Day Event',
        start: '2021-05-01'
      },
      {
        title: 'Long Event',
        start: '2021-05-07',
        end: '2021-05-10'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2021-05-09T16:00:00'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2021-05-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2021-05-11',
        end: '2021-05-13'
      },
      {
        title: 'Meeting',
        start: '2021-05-12T10:30:00',
        end: '2021-05-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2021-05-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2021-05-12T14:30:00'
      },
      {
        title: 'Birthday Party',
        start: '2021-05-13T07:00:00'
      },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2021-05-28'
      }
    ]
  });

  calendar.render();
});

    </script>
</head>
<body>
    
    {{-- <div id='calendar'></div> --}}
    @php
        echo date("W");
    @endphp 

</body>
</html>