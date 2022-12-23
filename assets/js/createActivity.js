import { closeModal } from "./closeModal.js";
import { url } from "./url.js";
import { validateForm } from "./validateForm.js";

export const createActivity = () => {
  const modal = document.querySelector("#modal");
  modal.style.display = "flex";
  const modalTitle = document.querySelector(".modal__title");
  modalTitle.innerHTML = "New Activity";
  const modalBody = document.querySelector(".modal__body");
  modalBody.innerHTML = "";
  modalBody.innerHTML = `
    <form id="createActivity" class="modal__form">
    <div class="modal__row">
        <label for="title" class="modal__label">Title: </label>
        <input type="text" id="title" name="title" class="modal__input">
        <span id="errorTitle" class="msgError"></span>
    </div>
<div class="modal__row">
<label for="description" class="modal__label">Description: </label>
<textarea name="description" id="description" class="modal__textarea"></textarea>
<span id="errorDescription" class="msgError"></span>
</div>
    <div class="modal__row">
        <label for="date" class="modal__label">Start Date: </label>
        <input type="datetime-local" id="start_date" name="start_date" class="modal__input">
        <span id="errorStartDate" class="msgError"></span>
    </div>
    <div class="modal__row">
        <label for="end_date" class="modal__label">End Date: </label>
        <input type="datetime-local" id="end_date" name="end_date" class="modal__input">
        <span id="errorEndDate" class="msgError"></span>
    </div>
    <div class="modal__row">
        <button type="submit" id="enviar" class="modal__button">Create Activity <i class="fa-solid fa-arrow-right-long"></i></button>
    </div>
</form>
    `;
  closeModal();
  const create_activity = document.querySelector("#createActivity");
  create_activity.addEventListener("submit", async (e) => {
    try {
      e.preventDefault();
      const validar = validateForm();      
      if (validar === true) {
        let formData = new FormData(create_activity);
        const resp = await fetch(`${url}/api/activities`, {
          method: "POST",
          body: JSON.stringify(Object.fromEntries(formData)),
          headers: {
            "content-type": "application/json",
          },
        });
        const data_resp = await resp.json();
        if (data_resp.message === "activity was created") {
          create_activity.reset();
          modal.style.display = "none";
          Swal.fire({
            icon: "success",
            iconColor: "#95191C",
            title: "Activity Created",
            confirmButtonText: "Close",
            confirmButtonColor: "#95191C",
           
          });
          setTimeout(() => {
            window.location.href = `${url}`;
          }, 2000);
        } else {
          Swal.fire({
            icon: "success",
            iconColor: "#95191C",
            title: data_resp.message,
            confirmButtonText: "Close",
            confirmButtonColor: "#95191C",
          });
        }
      }
    } catch (error) {
      console.log(error);
    }
  });
};
