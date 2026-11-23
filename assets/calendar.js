/* import { Calendar } from 'fullcalendar'
import dayGridPlugin from 'fullcalendar/daygrid'
import iCalendarPlugin from '@fullcalendar/icalendar'
import timeGridPlugin from "fullcalendar/timegrid"
import listPlugin from "fullcalendar/list";
import themePlugin from "fullcalendar/themes/classic";

import 'fullcalendar/skeleton.css'
import 'fullcalendar/themes/classic/theme.css'
import 'fullcalendar/themes/classic/palette.css'

const calendarfeed = document.getElementById('calendar-data');
//const data= calendarfeed.dataset('event');

const calendarEl = document.getElementById('calendar')

const calendar = new Calendar(calendarEl, {
  plugins: [themePlugin, timeGridPlugin, listPlugin, dayGridPlugin, iCalendarPlugin],
  initialView: "dayGridMonth",
  headerToolbar: {
    left: "prev,next today",
    center: "title",
    right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek",
  },
 // events: data,
})

calendar.render(); */