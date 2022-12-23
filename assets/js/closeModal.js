export const closeModal=()=>{
    const close_modal = document.querySelector("#close_modal");
      close_modal.addEventListener("click", () => {
        modal.style.display = "none";
      });
}