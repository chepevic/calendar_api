import {url} from "./url.js";
import { deleteActivity } from "./deleteActivity.js";
import { updateActivity } from "./updateActivity.js";
import { closeModal } from "./closeModal.js";

export const getActivity=async(id)=>{
        try {
          const resp = await fetch(`${url}/api/activities/${id}`);
          const data = await resp.json();
          if (data) {
            const modal = document.querySelector("#modal");
            modal.style.display = "flex";
            const modalTitle = document.querySelector(".modal__title");
            modalTitle.innerHTML = "Activity";
            const modalBody = document.querySelector(".modal__body");
            modalBody.innerHTML = "";
            modalBody.innerHTML = `
    <form id="updateActivity" class="modal__form">
    <div class="modal__row">
        <label for="title" class="modal__label">Title: </label>
        <input type="text" id="title" name="title" class="modal__input" value="${data.title}">
        <span id="errorTitle" class="msgError"></span>
    </div>
    <div class="modal__row">
        <label for="description" class="modal__label">Description: </label>
  <textarea name="description" id="description" class="modal__textarea">
${data.description}
      </textarea>
      <span id="errorDescription" class="msgError"></span>
    </div>
    <div class="modal__row">
        <label for="date" class="modal__label">Date Start: </label>
        <input type="datetime-local" id="start_date" name="start_date" class="modal__input" value="${data.start}">
        <span id="errorStartDate" class="msgError"></span>
    </div>
    <div class="modal__row">
        <label for="end_date" class="modal__label">End Date: </label>
        <input type="datetime-local" id="end_date" name="end_date" class="modal__input" value="${data.end}">
        <span id="errorEndDate" class="msgError"></span>
    </div>
    <div class="modal__row">
        <button type="submit" id="enviar" class="modal__button">Update Activity <i class="fa-solid fa-arrow-right-long"></i></button>
        <button type="submit" id="deleteActivity" class="modal__button">Delete Activity <i class="fa-solid fa-arrow-right-long"></i></button>
    </div>
</form>`;
deleteActivity(id);
updateActivity(id);
closeModal();
}
        } catch (error) {
          console.log(error);
        }
      };
