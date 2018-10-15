<!DOCTYPE html>
<html>
<head>
  <title>Slider</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style type="text/css">

    body{
      margin: 0;
      font-family: sans-serif;
    }

    .slide-container{
      width: 800px;
      position: relative;
      margin: 8px 250px;
    }
    .slides{
      display: none;
    }
    .previous{
      top: 50%;
      font-size: 45px;
      cursor: pointer;
      position: absolute;
      padding: 10px 10px;
      color: rgb(255,255,255);
      border-radius: 0px 3px 3px 0px;
    }

    .previous:hover{
      background-color: rgba(0,0,0,0.8);
    }

    .next{
      right: 0;
      top: 50%;
      margin-right: 0px; 
      font-size: 45px;
      cursor: pointer;
      padding: 10px 10px;
      position: absolute;
      color: rgb(255,255,255);
      border-radius: 3px 0px 0px 3px;
    }

    .next:hover{
      background-color: rgba(0,0,0,0.8);
    }

    .grid{
      text-align: center;
      padding: 10px 50px 0 0;
    }

    .gimg {
      cursor: pointer;
      margin: 0 2px;
      transition: background-color 0.6s ease;
    }

    .gimg:hover {
      background-color: rgba(0,0,0,0.8);
    }
  </style>
</head>
<body>
  <div class="slide-container">
    <div class="slides" style="display: block;">
      <div id="img1"><img src="images/Lighthouse.jpg" width="800px" height="500px"></div>
    </div>
    <div class="slides">
      <div id="img2"><img src="images/Desert.jpg" width="800px" height="500px"></div>
    </div>
    <div class="slides">
      <div id="img3"><img src="images/Hydrangeas.jpg" width="800px" height="500px"></div>
    </div>
      <a class="previous" id="prev">&#10094;</a>
      <a class="next"  id="nex">&#10095;</a>
  </div>
  <div class="grid">
    <img class="gimg" src="images/Lighthouse.jpg" width="100px" height="100px">
    <img class="gimg" src="images/Desert.jpg" width="100px" height="100px">
    <img class="gimg" src="images/Hydrangeas.jpg" width="100px" height="100px">
  </div>
  <script type="text/javascript">
    $(document).ready(function(){

      $('#nex').click(function(){

      })
    });
  </script>
</body>
</html>