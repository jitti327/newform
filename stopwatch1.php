<!DOCTYPE html>
<html>
<head>
	<title>Stop Watch With Timer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>  
  <script src="js/bootstrap.min.js"></script>
  <style type="text/css">

  	.container{	
  		width   				  : 500px;
  		margin-top 			  : 40px;  		
  		min-height 			  : 300px;
  		border 					  : 1px solid grey;
  		background-color  : rgb(229, 232, 232);
  	}

  	.stopwatch{
  		width         		: 50%;
  		float  						: left;
  		height  					: 40px;
  		border  					: none;
  		background-color  : rgb(174, 214, 241);
  	}

  	.timer{
  		width  					  : 49%;
  		float  					  : right;
  		height  				  : 40px;
  		border  				  : none;  		
  		background-color  : rgb(163, 228, 215);
  	}

  	#output{
  		text-align     	  : center;
  	}
    b{
      font-size 	 			: 40px;
      font-family  			: sans-serif;
    }

    a{
      font-size 				: 26px;
      font-family 			: sans-serif;
    }
    .st{
  		width  					  : 50%;
  		float 					  : left;
  		height 					  : 30px;
  		border   				  : none;
  		background-color  : rgb(215, 189, 226);
    }
    .re{
  		width  						: 49%;
  		float  						: right;
  		height 					  : 30px;
  		border  					: none;
  		background-color 	: rgb(249, 231, 159);
  	}
    .st1{
  		width  						: 130px;    	
  		height   					: 30px;
  		border    				: none;
  		background-color  : rgb(163, 228, 215);  		
    }
    .sto{
  		width  						: 130px;   	
    	margin   					: 10px;
  		height  					: 30px;
  		border  					: none;
  		background-color  : rgb(245, 183, 177); 
    }
    .re1{
  		width  						: 130px;    	
  		height   					: 30px;
  		border  					: none;
  		background-color  : rgb(174, 182, 191); 
  	}
  </style>
</head>
<body>
	<div class="container">
		<div class="col-md-12" id="form">
      <h1 class="text-center" style="color: RGB(250, 128, 114);">Stop Watch With Timer</h1><hr>
      <div col-lg-9> <button id="watch" class="stopwatch">STOP WATCH</button>&nbsp;<button id="timer" class="timer">TIMER</button></div><hr>
      <div id="hi">
	      <div id="output"><span><b>0</b> <a>s</a>: <a>00</a></span></div>      
			  <div class="bt"> 
			    <button id='start' class="st">Start Time</button>&nbsp;
			    <button id="reset" class="re">Reset Time</button>
			  </div>
			  <div class="bt"> 
			    <button id='start1' class="st1">Start Time</button>
			    <button id='stop1' class="sto">Stop Time</button>
			    <button id="reset1" class="re1">Reset Time</button>
			  </div>
			</div>
    </div>
	</div>
	<script type="text/javascript">

$(document).ready(function(){

	$("#timer").click(function(){
    $("#hi").css('display','none');
	});

	$("#watch").click(function(){
	  $("#hi").css('display','block');
	});

  var intervalTracker = null; 

  var seconds = 0; // Track the number of seconds
  var counter = 0; // Track the number of time setInterval execute 
  var width = 1;   // Track the width of progress bar

  $('#start').click(function(){ //Start the time using start button


    // Use can also use html() function

    
    if( $(this).text()  === 'Start Time'){


      intervalTracker = setInterval(function(){
        var currentDate = new Date();

        var deciSecond =  parseInt(currentDate.getMilliseconds()/10);
        
        if(deciSecond >= 0 && deciSecond <= 9){
          deciSecond = "0" + deciSecond;
        }
        
      $('#output').html("<b>" + seconds + "</b>" + " <a>s</a>" + " : " + "<a>" + deciSecond + "</a>" );
        
        if(counter % 100 == 0){
          seconds++;
        }
        counter++;
        width++;

        if(width <= 100){
          $('#myBar').css('width', width +'%');
          console.log('width', width);
        }

      }, 10);


      // 100 mill Second = 1 Second
      // 10  mill Second = 1/10 Second
      // 50 mill Second  =  1/2 Second

        $(this).text('Stop Time');
    }
      else{ // i.e  $(this).text() == 'Stop Time'
        clearInterval( intervalTracker );
        $(this).text('Start Time');
      }
    
  });
  
  $('#stop').click(function(){ //Stop the time using Stop button
    clearInterval( intervalTracker );
  })
  
  $('#reset').click(function(){ // Reset the whole time using reset button

    var currentDate = new Date();

    clearInterval( intervalTracker );
    seconds = 0;
    counter = 0;

  $('#output').html("<b>" + seconds + "</b>" + " <a>s</a>" + " : " + "<a> 00 </a>" );

  $('#start').text('Start Time');

  })

  $('#start1').click(function(){

     intervalTracker == null;

    if(intervalTracker !==null){
      clearInterval( intervalTracker );
    }

    intervalTracker = setInterval(function(){
    var currentDate = new Date();

  $('#output').html( "<b>" + seconds + "</b>" + "<a>s</a>" + " : " + "<a>" + parseInt(currentDate.getMilliseconds()/10) + "</a>");
      
    if(counter % 100 == 0){
      seconds++;
    }
      counter++;
    }, 10 );

    if( $('#start').text()  === 'Start Time'){
      $('#start').text('Stop Time');
    }

  });

  $('#stop1').click(function(){
    clearInterval( intervalTracker );
    if( $('#start').text()  === 'Stop Time'){
      $('#start').text('Start Time');
    }

  })

  $('#reset1').click(function(){
    var currentDate = new Date();
    if(intervalTracker !==null){
      clearInterval( intervalTracker );
    }
      seconds = 0;
    counter = 0;
  $('#output').html("<b>" + seconds + "</b>" + " <a>s</a>" + " : " + "<a> 00 </a>" );
  $('#start').text('Start Time');

  })

});

</script>	
</body>
</html>