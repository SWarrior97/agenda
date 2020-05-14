import { Calendar } from '@fullcalendar/core';
import interactionPlugin from '@fullcalendar/interaction';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import '@fullcalendar/core/main.css';
import '@fullcalendar/daygrid/main.css';

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '/' + mm + '/' + dd;

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
  
    var calendar = new Calendar(calendarEl, {
      plugins: [ interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin  ],
      header:{
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: {
        url: '/getEvents/'+userID,
        type: 'GET',
        error: function() {
            alert('there was an error while fetching events!');
        },
        success: function(reply) {
            console.log(reply);
        }
    },
      eventDrop: function(event,dayDelta,minuteDelta,allDay,revertFunc) {
      },dateClick: function(date, jsEvent, view) {
          console.log(date.dateStr);
          $('#myModal').modal('show');
          $('#dataEvento').val(date.dateStr);
      },eventClick: function(event, jsEvent, view){
        event.preventDefault();
      },
    });


    calendar.render();
  });


  $(function() {
    

  });