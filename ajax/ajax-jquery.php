<!DOCTYPE HTML>
<html>
  <head>
    <title>Ajax</title>
    <!-- <link rel="stylesheet" href="../css/custom-calculator.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <script src="../includes/jquery.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container" style="color: rgb(0,0,200)">
      Hi we calling ajax so check the response. 
      <div id="dynamic-output">

      </div>
    </div>
  <script type="text/javascript">

  // $("#dynamic-output").load("server.php");

  console.log('before we start');
  // Ajax
  $(document).ready(function($){
    $.ajax({
      url: "server.php",
      method: "POST",
      //dataType: "json",
      //async: false,
      //cache: false,
      data: {
        first  : "temp",
        second : "ok"
      },
      beforeSend: function(){
        console.log('Before sending request');
      },
      success: function(response){
        console.log('Yes we got the response' , response);
      },
      error: function(){
        console.log('This is error');
      },
      complete: function(){
        console.log('Request is complete');
      }
    });
  });

  console.log('After ajax call');


   // TODO

   // $.ajax
   // $.get
   // $.post
   // load()
   // ajaxComplete()
   // ajaxSetup()
   // ajaxPrefilter()

  </script>
  </body>
</html>