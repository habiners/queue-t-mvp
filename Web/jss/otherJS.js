
    var d = new Date();
    var dYear= d.getFullYear();
    var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    var dMonth= d.getMonth();
    var dDate= d.getDate();
    var dHours= d.getHours();
    var dMin= d.getMinutes();
    var delim= ":"
    var daylight= "AM"

    if(dHours>12){
        dHours-=12;
        daylight= "PM"
    }
    var time= `${months[d.getMonth()]} ${dDate}, ${dYear} | ${dHours}:${dMin} ${daylight}`
    document.getElementById("dashboardDateView").innerHTML = time;


    document.getElementById("dateAppointmentView").innerHTML = months[d.getMonth()]+" "+ d.getDate() +", "+ d.getFullYear();
    document.getElementById("dateAppointmentView2").innerHTML = months[d.getMonth()]+" "+ d.getDate() +", "+ d.getFullYear();

   

  

 