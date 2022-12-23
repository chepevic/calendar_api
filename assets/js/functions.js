import { url } from "./url.js";
import { createActivity } from "./createActivity.js";
import { getActivity } from "./getActivity.js";


window.onload = () => {
  const calendarEl = document.getElementById("calendar");
  const calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    selectable: true,
    editable: false,
    dayMaxEventRows: true,
    displayEventTime: true,
    dateClick: () => {
      createActivity();
    },
    events: `${url}/api/activities`,
  
    eventClick: (info) => {
      const id = info.event.id;
      getActivity(id);
    },
  });
  calendar.render();
};
