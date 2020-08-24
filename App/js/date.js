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
		var time2= `${months[d.getMonth()]} ${dDate}, ${dYear}`
        var time3= `${months[d.getMonth()]} ${dDate}, ${dYear}`
        
		document.getElementById("dateAppointmentView7").innerHTML = months[d.getMonth()]+" "+ d.getDate() +", "+ d.getFullYear();
		document.getElementById("dateAppointmentView8").innerHTML = time3;
		