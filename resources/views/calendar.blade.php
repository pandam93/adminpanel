@extends('adminlte::page')

@section('plugins.fullcalendar', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div id='calendar'></div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    selectable: true,
    events: [
      {
        title: 'All Day Event',
        start: '2022-04-01',
        end: 'null'
      },
      {
        title: 'Long Event',
        start: '2022-04-07',
        end: '2022-04-10'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2022-04-09T16:00:00'
      },
      {
        groupId: '999',
        title: 'Repeating Event',
        start: '2022-04-16T16:00:00'
      },
      {
        title: 'Conference',
        start: '2022-04-11',
        end: '2022-04-13'
      },
      {
        title: 'Meeting',
        start: '2022-04-12T10:30:00',
        end: '2022-04-12T12:30:00'
      },
      {
        title: 'Lunch',
        start: '2022-04-12T12:00:00'
      },
      {
        title: 'Meeting',
        start: '2022-04-12T14:30:00'
      },
      {
        title: 'Birthday Party',
        start: '2022-04-13T07:00:00'
      },
      {
      title: 'BCH237',
      start: '2022-04-25',
      end: '2022-04-28',
      extendedProps: {
        department: 'BioChemistry'
      },
      description: 'Lecture'
    },
      {
        title: 'Click for Google',
        url: 'http://google.com/',
        start: '2022-04-28'
      }
    ],
    eventDidMount: function(info) {
    alert(info.event.extendedProps.description);
    // {description: "Lecture", department: "BioChemistry"}
    },
    selectAllow: function(selectInfo) {
        console.log(selectInfo);
    }


  });
        calendar.setOption('locale', 'es');
        calendar.render();
      });

    </script>
@stop