import { url } from "./url.js";

export const deleteActivity = (id) => {
  const delete_activity = document.querySelector("#deleteActivity");
  delete_activity.addEventListener("click", async (e) => {
    e.preventDefault();
   const modal=document.querySelector("#modal");
    Swal.fire({
      icon: "warning",
      iconColor: "#95191C",
      text: `Are you sure to delete this activity?`,
      showCancelButton: true,
      CancelButtonColor: "#4D5064",
      confirmButtonText: `Eliminar`,
      confirmButtonColor: "#95191C",
    }).then((result) => {
      if (result.isConfirmed) {
        fetch(`${url}/api/activities/${id}`, {
          method: "DELETE",
          headers: {
            "content-type": "application/json",
          },
        }).then((response) => {
          console.log(response);
          if (response.status == 200) {
            console.log("entro")
            modal.style.display = "none";
            Swal.fire({
              icon: "success",
              iconColor: "#95191C",
              title: "Activity was deleted",
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
              title: response.message,
              confirmButtonText: "Close",
              confirmButtonColor: "#95191C",
            });
          }
        });
      
      } 
  else if (result.isDenied) {
      Swal.fire("Changes are not saved", "", "info");
    }
  });
  });
};

// end delete activity
