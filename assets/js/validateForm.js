const Title=()=>{
const title=document.querySelector("#title").value;
const errorTitle = document.querySelector("#errorTitle");
if(title==""){
    errorTitle.innerHTML="Title is required";
}
else if(title.trim().length>100){
    errorTitle.innerHTML="Title max of characters is 100";
}
else{
    errorTitle.innerHTML="";
    return title;
}
}
const Description=()=>{
const description=document.querySelector("#description")?.value;
const errorDescription=document.querySelector("#errorDescription");
if(description==""){
    errorDescription.innerHTML="Description is required";
}
else if(description.trim().length>255){
    errorDescription.innerHTML="Description max of characters is 255";
}
else{
    errorDescription.innerHTML="";
    return description;
}
}
const startDate=()=>{
const start_date=document.querySelector("#start_date")?.value;
const end_date=document.querySelector("#end_date")?.value;
const errorStartDate=document.querySelector("#errorStartDate");
if(start_date==""){
    errorStartDate.innerHTML="Start Date is required";
}
else if(start_date>end_date){
    errorStartDate.innerHTML="Start Date should be <= than End Date";
}
else{
    errorStartDate.innerHTML="";
    return start_date;
}
}
const endDate=()=>{
    const start_date=document.querySelector("#start_date")?.value;
    const end_date=document.querySelector("#end_date")?.value;
    const errorEndDate=document.querySelector("#errorEndDate");
if(end_date==""){
    errorEndDate.innerHTML="End Date is required";
}
else if(start_date>end_date){
    errorEndDate.innerHTML="End Date should be >= than Start Date";
}
else{
    errorEndDate.innerHTML="";
    return end_date;
}

}
const startTime=()=>{
const start_time=document.querySelector("#start_time")?.value;
const end_time=document.querySelector("#end_time")?.value;
const start_date=document.querySelector("#start_date")?.value;
const end_date=document.querySelector("#end_date")?.value;
const errorStartTime=document.querySelector("#errorStartTime");
if(start_time==""){
    errorStartTime.innerHTML="Start Time is required";
}
else if(start_date === end_date && parseFloat(start_time) > parseFloat(end_time)){
    errorStartTime.innerHTML="Start Time should be < than End Time";
}
else{
    errorStartTime.innerHTML="";
    return start_time;
}

}
const endTime=()=>{
const end_time=document.querySelector("#end_time")?.value;
const errorEndTime=document.querySelector("#errorEndTime");
if(end_time==""){
    errorEndTime.innerHTML="End Time is required";
}
else{
    errorEndTime.innerHTML="";
    return end_time;
}

}

export const validateForm=()=>{
  
    for(let i=0; i<=3; i++ ){
        switch(i){
            case 0:
                Title();
                break;
            case 1:
                Description();
                break;
            case 2:
                startDate();
                break;
            case 3:
                endDate();
                break;
        }
    }

    if(errorTitle.innerHTML=="" && errorDescription.innerHTML=="" && errorStartDate.innerHTML=="" && errorEndDate.innerHTML=="")
      {
        return true 
    }
    else{
        return false
    }

}