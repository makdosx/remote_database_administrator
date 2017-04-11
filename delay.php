<html>
<head>




<style>

#img_position
{
position:fixed;	
top:20%;
left:0%;	
height:50em;
width:100%
}




#clock
{
background: url('/images/header1.jpg');
background-size: 100% 100%;
background-repeat: no-repeat;
position: absolute;
left:0%;
top: 0%;
height:5em;
width:100%;
text-align:center;
}





#fail
{
position: absolute;
left:10%;
top: 2%;
border-style:solid;
border-width:0.5em;
border-color:silver;
border-radius: 25px;
background-color:black;	
height:1.2em;
width:15em;
text-align:center;	
}




.time
{
position: absolute;
left:35%;
top: 30%;
border-style:solid;
border-width:0.5em;
border-color:silver;
border-radius: 25px;
background-color:black;	
height:1.2em;
width:5em;
text-align:center;	
}





#sec
{
position: absolute;
left:30%;
top: 55%;
border-style:solid;
border-width:0.5em;
border-color:silver;
border-radius: 25px;
background-color:black;	
height:1.2em;
width:7em;
text-align:center;
}

</style>
 
 
 
 
 
 


</head>

<body id="body">


 <div align="center">
 <div id="clock"> 
   <br>
  <font color="white" size="4"> Failed attempt please try again in </font> 
    &nbsp; &nbsp;
   <font color="white" size="5" id="countdowntimertxt"> </font> 
    &nbsp; &nbsp;
   <font color="white" size="4"> seconds </font> 
   </div>
   </div>


    <script type="text/javascript">
    var sTime = new Date().getTime();
    var countDown = 10; // Number of seconds to count down from.        

    function UpdateCountDownTime() {
        var cTime = new Date().getTime();
        var diff = cTime - sTime;
        var timeStr = '';
        var seconds = countDown - Math.floor(diff / 1000);
        if (seconds >= 0) {
            var hours = Math.floor(seconds / 3600);
            var minutes = Math.floor( (seconds-(hours*3600)) / 60);
            seconds -= (hours*3600) + (minutes*60);
            
            if( seconds < 10){
                timeStr = timeStr + "0" + seconds;
            }else{
                timeStr = timeStr + "" + seconds;
            }
            document.getElementById("countdowntimertxt").innerHTML = timeStr;
        }else{
            document.getElementById("countdowntimertxt").style.display="none";
            clearInterval(counter);
        }
    }
    UpdateCountDownTime();
    var counter = setInterval(UpdateCountDownTime, 500);
    </script>



   <div align="center" id="img_position">
     <img src="/images/stop_ddos.png">
    </div>
	
	

</body>
</html>


<?php
 
 
 
echo "<script>location.href = 'index.php';</script>";

 
 
?>



