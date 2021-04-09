var myInterval=[]; var AttemptedAns = []; var TotalTime = 0;          

function CleartTimer() {
	clearInterval(myInterval);
	$("#time-text").hide();
	var eid = $("#examID").val();
	$("#timers").html("<a href='assessments.php?id="+eid+"' class='btn btn-sm btn-info'>Exam Start</a>"); 
}

function CoundownTimer(e) {
	var t = 60 * e;

	myInterval = setInterval(function() {

		myTimeSpan = 1e3 * t, $(".timer-title").text(GetTime(myTimeSpan)), t < 600 ? ($(".timer-title").addClass("time-ending"), $(".timer-title").removeClass("time-started")) : ($(".timer-title").addClass("time-started"), $(".timer-title").removeClass("time-ending")); 
		if(t > 0)
		{
			t -= 1;
		}else{
            // alert("Time Up");
            CleartTimer();}
        }, 1e3)
}

function GetTime(e) {
	parseInt(e % 1e3 / 100);
	var t = parseInt(e / 1e3 % 60),
	a = parseInt(e / 6e4 % 60),
	n = parseInt(e / 36e5 % 24);
	return (n = n < 10 ? "0" + n : n) + ":" + (a = a < 10 ? "0" + a : a) + ":" + (t < 10 ? "0" + t : t)
}

var rs = parseInt($("#hdfTestDuration").val());

if(rs!=0){
CoundownTimer(rs);
}

