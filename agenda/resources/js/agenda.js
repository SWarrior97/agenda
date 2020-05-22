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
var eventoEscolhido;

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
        if(confirm("Your sure you want to change the event date?\nEvent:"+event.event.title)){
          //TODO CHANGE EVENT DATE
        }else{
          window.location = '/home';
        }
      },dateClick: function(date, jsEvent, view) {
          console.log(date.dateStr);
          $('#myModal').modal('show');
          $('#dataEvento').val(date.dateStr);
      },eventClick: function(event, jsEvent, view){
        $.ajax({
          type : 'GET',
          url : '/getEvent/'+event.event.id,
          success : function(response) {
              eventoEscolhido = response;
              console.log(response);
              document.getElementById("eventoNameDetail").value = response.nome;
              document.getElementById("eventoDataDetail").value = response.data;
              document.getElementById("eventolocalDetail").value = response.local;
              document.getElementById("eventodescricaoDetail").value = response.description;
              document.getElementById("eventoHoraInicioDetail").value = response.hora_inico;
              document.getElementById("eventoHoraFimDetail").value = response.hora_fim;
              document.getElementById("eventTitleDetail").innerHTML = response.nome;
              
              $('#eventDetails').modal('show');
          }
      });
      },
    });


    calendar.render();
  });


  $(function() {
    var btn = document.getElementById("btnCancelarEventDetail");
    var btnRemover = document.getElementById("btnRemoverEvent");
    

    btn.onclick = function() {
      $('#eventDetails').modal('hide');
    }

    btnRemover.onclick = function(event) {
      event.preventDefault();
      if(confirm("You sure you want to delete that event?\nEvent:"+eventoEscolhido.nome)){
        $.ajax({
          type : 'POST',
          url : '/removeEvent/'+eventoEscolhido.id,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
          success : function(response) {
              alert("Event deleted with sucess");
              window.location.href = '/home';
          }
        });
      }
    }
    
  });