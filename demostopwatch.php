<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <style>
    body{
      margin-top: 40px;
      text-align: center;
    }

    #output{
    }

    b{
      font-size: 48px;
      font-family: sans-serif;
    }

    a{
      font-size: 26px;
    }
    .bt{
      margin-top: 10px;
    }


  </style>
</head>
<body>
  <h1 style="color: lightblue;">Stopwatch</h1>
 <div class="stopwatch">
 <div id="output"><b>0</b><a>s</a>:<a>00</a></div>
 </div>
 <div class="bt">
   <button id="start" class="btn-success">Start Time</button>
   <button id="stop" class="btn-danger">Stop Time</button>
   <button id="reset" class="btn-primary">Reset Time</button>
 </div>


<script type="text/javascript">

  $(document).ready(function(){

    var intervalTracker; 

    var seconds = 0; // Track the number of seconds
    var counter = 0; // Track the number of time setInterval execute 

  $('#start').click(function(){

     intervalTracker == null;

    if(intervalTracker !==null){
      clearInterval( intervalTracker );
    }

    intervalTracker = setInterval(function(){
    var currentDate = new Date();

  $('#output').html( "<b>" + seconds + "</b>" + "<a>s</a>" + " : " + "<a>" + parseInt(currentDate.getMilliseconds()/10) + "</a>");
      
    if(counter % 10 == 0){
      seconds++;
    }
      counter++;      
    }, 100 );

  });

  $('#stop').click(function(){
    clearInterval( intervalTracker );
  })

  $('#reset').click(function(){
    clearInterval( intervalTracker );
    var seconds = 0;
    var counter = 0;
  $('#output').html( "<b>" + seconds + "</b>" + "<a>s</a>" + " : " + "<a> 00 </a>");
  })

  });

</script>



</body>
</html>
