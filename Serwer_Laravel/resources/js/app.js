import './bootstrap';



import { Calendar } from '@fullcalendar/core'
import dayGridPlugin from '@fullcalendar/daygrid'

const calendarEl = document.getElementById('calendar')
const calendar = new Calendar(calendarEl, {
  plugins: [
    dayGridPlugin
    // any other plugins
  ],
  initialView: 'dayGridMonth',
  weekends: true,
  events: {
    url: '/inspections/get',
    method: 'GET',
    failure: function() {
      alert('There was an error while fetching inspections!');
    }
  }
})

calendar.render()


const showFormBtn = document.getElementById('show-form-btn');
const hideFormBtn = document.getElementById('hide-form-btn');
const formOverlay = document.querySelector('.form-overlay');

console.log(showFormBtn, hideFormBtn, formOverlay);
showFormBtn.addEventListener('click', () => {
  formOverlay.style.display = 'block';
});

hideFormBtn.addEventListener('click', () => {
  formOverlay.style.display = 'none';
});

const form = document.querySelector('form');
const formTitle = document.querySelector('.form-title');
const formMethod = document.querySelector('input[name="_method"]');

document.addEventListener('DOMContentLoaded', function() {
  const calendarEl = document.getElementById('calendar');
  const calendar = new FullCalendar.Calendar(calendarEl, {
    // konfiguracja kalendarza
    eventClick: function(info) {
      // wywołanie żądania AJAX po kliknięciu na przegląd
      fetch('/inspections/' + info.event.id + '/edit')
        .then(response => response.json())
        .then(data => {
          // wypełnienie formularza danymi
          formTitle.textContent = 'Edytuj przegląd';
          formMethod.value = 'PUT';
          form.action = '/inspections/' + data.id;
          document.querySelector('input[name="date"]').value = data.date;
          document.querySelector('textarea[name="notes"]').value = data.notes;
          // wyświetlenie formularza
          formOverlay.style.display = 'block';
        });
    }
  });
  calendar.render();
});

// pozostała część kodu obsługująca pokazywanie/ukrywanie formularza
