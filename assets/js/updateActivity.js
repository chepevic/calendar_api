import { url } from "./url.js";
import { validateForm } from "./validateForm.js";

export const updateActivity=(id)=>{

const updateActivity = document.querySelector("#updateActivity");
updateActivity.addEventListener("submit", async (e) => {
  try {
    e.preventDefault();
    const validar = validateForm(); 
    if (validar === true) {
      let formData = new FormData(updateActivity);
      const resp = await fetch(`${url}/api/activities/${id}`, {
        method: "PUT",
        body: JSON.stringify(Object.fromEntries(formData)),
        headers: {
          "content-type": "application/json",
        },
      });
      const data_resp = await resp.json();
  
      if ((data_resp.message = "activity was updated")) {
        modal.style.display = "none";
        Swal.fire({
          icon: "success",
          iconColor: "#95191C",
          title: "<h4>Activity was updated</h4>",
          confirmButtonText: "Close",
          confirmButtonColor: "#95191C",
      
        });
        setTimeout(() => {
          window.location.href = `${url}`;
        }, 1500);
      } else {
        Swal.fire({
          icon: "success",
          iconColor: "#95191C",
          title: data_resp.message,
          confirmButtonText: "Close",
          confirmButtonColor: "#95191C",
          timer: "1500",
        });
      }
    } 

 
    
  } catch (error) {
    console.log(error);
  }
});
}