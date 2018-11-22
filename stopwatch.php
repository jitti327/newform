<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>  
  <script src="js/bootstrap.min.js"></script>

  <style>
    body{
      margin-top: 40px;
      text-align: center;
    }

    #output{
      width: 100%;
    }

    b{
      font-size: 40px;
      font-family: sans-serif;
    }

    a{
      font-size: 26px;
      font-family: sans-serif;
    }

    #myProgress {
      width: 100%;
      height: 3px;
      position: relative;
      background-color: #ddd;
    }

    #myBar {
      background-color: #4CAF50;
      width: 1%;
      height: 3px;
      position: absolute;
    }

    .bt{
      margin-top: 5px;
    }

    .seconds{
      font-size: 40px;
      font-family: sans-serif;
    }
  </style>
</head>
<body>
  <h1 style="color: lightblue;"> Stopwatch</h1><br>
  <div id="output"><span><b>0</b> <a>s</a>: <a>00</a></span></div>
  <div id="myProgress"></div>
  <div id="myBar"></div>
  <div class="bt"> 
    <button id='start' class="btn-primary">Start Time</button>
    <button id="reset" class="btn-danger">Reset Time</button>
  </div>
  <div class="bt"> 
    <button id='start1' class="btn-success">Start Time</button>
    <button id='stop1' class="btn-danger">Stop Time</button>
    <button id="reset1" class="btn-primary">Reset Time</button>
  </div>


<script type="text/javascript">

$(document).ready(function(){

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
      }else{ // i.e  $(this).text() == 'Stop Time'
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
