<?php
if(isset($_GET["en"])){
  $close="The <b style='font-size:2em'>&pi;</b> day is close";
  $invitation="Join us in <a href='http://bit.ly/dia-de-pi' target='_blank'>Medellín to Celebrate Pi</a>";
  $arrived="The <b style=font-size:2em>&pi;</b> day has arrived.";
  $flag="es.png";
  $lang="es";
 }else{
  $close="El día de <b style='font-size:2em'>&pi;</b> esta cerca";
  $invitation="Únete a la <a href='http://bit.ly/dia-de-pi' target='_blank'>celebración en Medellín</a>";
  $arrived="El día de <b style=font-size:2em>&pi;</b> ha llegado.";
  $flag="en.png";
  $lang="en";
 }

echo<<<PI
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
<style>
@font-face {
    font-family: 'BebasNeueRegular';
    src: url('BebasNeue-webfont.eot');
    src: url('BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
    url('BebasNeue-webfont.woff') format('woff'),
    url('BebasNeue-webfont.ttf') format('truetype'),
    url('BebasNeue-webfont.svg#BebasNeueRegular') format('svg');
    font-weight: normal;
    font-style: normal;
}

.container {
    width: 100%;
    margin: 0 auto;
    overflow: hidden;
}

.clock {
    width: 100%;
    margin: 0 auto;
    padding: 30px;
    color: black;
}


a {
    color:white;
}

td {
    font-size: 6em;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    background:lightgray;
    padding:10px;
}

#text1 {
}

#text2 {
font-size:2em;
}

.text {
    //position:relative;
    font-size:4em;
    text-shadow:0 0 20px white;
}

body{
    //background:url("https://eric22222.files.wordpress.com/2007/02/pi_background.png");
    background:url("/diapi/pi.png");
    background-size:100%;
    font-family: Arial, Helvetica, sans-serif;
    color:white;
}

.number {
    color:white;
    background:black;
    padding:10px;
    text-shadow:0 0 20px white;
}

.texto {
    color:white;
    background:black;
    padding:10px;
    text-shadow:0 0 20px white;
    font-size:2em;
}

#point {
    position: relative;
    -moz-animation: mymove 1s ease infinite;
    -webkit-animation: mymove 1s ease infinite;
    padding-left: 10px;
    padding-right: 10px;
}

/* Simple Animation */
@-webkit-keyframes mymove {
    0% {opacity: 1.0;
	text-shadow: 0 0 20px black;
       }
    
    50% {
	opacity: 0;
	text-shadow: none;
    }
    
    100% {
	opacity: 1.0;
	text-shadow: 0 0 20px black;
    }
}

@-moz-keyframes mymove {
    0% {
        opacity: 1.0;
        text-shadow: 0 0 20px black;
    }
    
    50% {
        opacity: 0;
        text-shadow: none;
    }

    100% {
        opacity: 1.0;
        text-shadow: 0 0 20px black;
    };
}
</style>
</head>

<body>
  <div style="position:absolute;right:0px;padding:10px">
  <a href="?$lang"><img src="$flag"/></a>
  </div>
  <center id="text1" class="text">
    $close
  </center>
    
    <audio preload id="sound">
         <source src="pi.wav" type="audio/mpeg">
    </audio>

<script type="text/javascript">
function PlaySound(soundobj){
    var thissound=document.getElementById(soundobj);
    thissound.play();
}

$(document).ready(function() {
    
    //*ORIGINAL
    var fixed=false;
    var piday="14";
    var pimonth="03";
    var piyear="2015";
    var pihour="9";
    var pimin="26";
    var pisec="53";
    var picsec="59";
    //*/
    /*
    var piday="10";
    var pimonth="03";
    var piyear="2015";
    var pihour="03";
    var pimin="28";
    var pisec="00";
    var picsec="00";
    */

    var newDate = new Date();
    newDate.setDate(newDate.getDate());

    var now=new Date(newDate.getFullYear(),newDate.getMonth(),newDate.getUTCDate(),
		     newDate.getHours(),newDate.getMinutes());
    var fechastr=piyear+"-"+pimonth+"-"+piday+"T"+pihour+":"+pimin+":"+pisec+"."+picsec+"-05:00";
    var fecha=new Date(fechastr)
    //alert(now+","+fecha+","+now.getTime()+","+fecha.getTime());

    var secs=0;
    var msecs=0;
    var mins=0;
    var hour=0;
    var days=0;
    var months=0;
    var seconds=0;
    var mseconds=0;
    var hours=0;
    var minutes=0;
    var day=0;
    
    if(fixed){
	    $("#day").html(piday);
	    $("#year").html(piyear.substr(2,2));
	    $("#hours").html(pihour);
	    $("#min").html(pimin);
	    $("#sec").html(pisec);
	    $("#csec").html(picsec);

	    $("#text1").html("$arrived");
	    $(".number").css("color","yellow");
	    $(".number").css("font-size","7em");
	    PlaySound('sound');
	    $("#text2").html("");
    }else{
	msecs=setInterval( function() {
	    mseconds = new Date().getMilliseconds();
	    cseconds=(mseconds+"").substring(0,2);
	    $("#csec").html(( cseconds < 10 ? "0" : "" ) + 
			    cseconds);
	},1);
	
	mins=setInterval( function() {
	    minutes = new Date().getMinutes();
	    $("#min").html(( minutes < 10 ? "0" : "" ) + 
			   minutes);
	},10);
	
	hour=setInterval( function() {
	    hours = new Date().getHours();
	    $("#hours").html(hours);
	}, 10);

	days=setInterval( function() {
	    day = new Date().getDate();
	    $("#day").html(( day < 10 ? "0" : "" ) + day);
	}, 10);

	months=setInterval( function() {
	    month = new Date().getMonth();
	}, 10);

	secs=setInterval( function() {
	    seconds = new Date().getSeconds();
	    $("#sec").html(( seconds < 10 ? "0" : "" ) + 
			   seconds);
	    
	    if((day==piday && 
		hours==pihour && minutes==pimin && seconds==pisec) ||
	       now.getTime()>fecha.getTime()
	      ){
		clearInterval(secs);
		clearInterval(msecs);
		clearInterval(mins);
		clearInterval(hour);
		clearInterval(days);
		clearInterval(months);
		$("#csec").html(picsec);
		$("#sec").html(pisec);
		$("#min").html(pimin);
		$("#hours").html(pihour);
		$("#day").html(piday);
		$("#year").html(piyear.substr(2,2));

		$(".number").css("color","yellow");
		$(".number").css("font-size","7em");
		$("#text1").html("$arrived");
		PlaySound('sound');
		$("#text2").html("");
	    }

	},10);
    }

});
</script>
<center>
    <div class="clock">
    <table>
      <tr>
	<td class="number" id="month">3.</td>
	<td class="number" id="day"></td>
	<td class="number" id="year">15</td>
	<td class="number" id="hours"></td>
	<td class="number" id="min"></td>
	<td class="number" id="sec"></td>
	<td class="number" id="csec"></td>
      </tr>
      <tr>
	<td class="texto">Marzo</td>
	<td class="texto">14</td>
	<td class="texto">2015</td>
	<td class="texto">9<sup>h</sup></td>
	<td class="texto">26<sup>m</sup></td>
	<td class="texto">53<sup>s</sup>.</td>
	<td class="texto">59</td>
      </tr>
    </table>
  </div>
</center>

<center id="text2" class="text">
    $invitation
</center>
</body>
</html>
PI;
?>
