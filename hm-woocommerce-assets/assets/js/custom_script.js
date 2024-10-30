jQuery(document).ready(function ($) {


	$("#theme-3").countdowntimer({
                dateAndTime : available_on.date,
				size : "xs",
				regexpMatchFormat: "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})" ,
      			regexpReplaceWith: "$1<sup>days</sup> / $2<sup>hours</sup> / $3<sup>minutes</sup> / $4<sup>seconds</sup>"
		
	});

	$("#theme-5").countdowntimer({
               
                dateAndTime : available_on.date,
				size : "md",
				Days: {

					show: true,

					text: "Days",

					

				},
	});

    $(".theme-2").TimeCircles({
    	count_past_zero: false,
    	circle_bg_color:available_on.back_color,
    	time: { //  a group of options that allows you to control the options of each time unit independently.

				Days: {

					show: true,

					text: "Days",

					color: available_on.day_color

				},

				Hours: {

					show: true,

					text: "Hours",

					color: available_on.hour_color

				},

				Minutes: {

					show: true,

					text: "Minutes",

					color: available_on.min_color

				},

				Seconds: {

					show: true,

					text: "Seconds",

					color: available_on.sec_color

				}

			}

    });

    var min = $(".textDiv_Minutes span").text();
    var sec = $(".textDiv_Seconds span").text();
    if(min && sec =="0"){

        $('.time_circles').remove();
    }

    var them5 = $("#theme-5").text();

    if(them5 =="00:00:00:00"){

        $('#countdowntimer').remove();
    }

    var future = $("#future_date span sup").text();

    if(future =="/00"){

        $('#countdowntimer').remove();
    }

	
    var countDownDate = new Date(available_on.date).getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();
        
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        var id=document.getElementById("theme-1");
        var _id=document.getElementById("theme-4");
        if (typeof(id) != 'undefined' && id != null)
{
    	document.getElementById("day").innerHTML = days +"day";
        document.getElementById("hour").innerHTML = hours +"hours";
        document.getElementById("min").innerHTML = minutes +"min";
        document.getElementById("sec").innerHTML = seconds +"sec";



}
		if (typeof(_id) != 'undefined' && _id != null)
{
    	document.getElementById("day").innerHTML = days ;
        document.getElementById("hour").innerHTML = hours ;
        document.getElementById("min").innerHTML = minutes ;
        document.getElementById("sec").innerHTML = seconds ;



}

        // Output the result in an element with id="demo"
      
        
       
        if (distance < 0) {
            clearInterval(x);
            if (typeof(id) != 'undefined' && id != null){
            	id.innerHTML = "set price";
                if (id.innerHTML == "set price") { //.trim() will remove extra whitespace
                          id.remove();
                         
                        }
            }
            if (typeof(_id) != 'undefined' && _id != null){
            	_id.innerHTML = "set price";
            }
            
        }
    }, 1000);



        });
