<!DOCTYPE html>
<html>
<head>
  <title>My new slider</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>  
  <script src="js/bootstrap.min.js"></script>
  <style>
  *{padding:0; margin:0;}
  ul {}
  ul li {
    float:left; 
    list-style:none; 
    position:relative; 
  }
  ul li a.next {
    position:absolute; 
    left:100px;
  }
  ul li a.previous{
    position:absolute; 
    left:0px;
  }
  ul li a.startover{
    position:absolute; 
    left:200px;
  }
</style>
</head>
<body>
  <ul>
    <li><img class="gimg" src="images/Lighthouse.jpg" width="800px" height="500px" /><a class="next" href="#">next</a></li>
    <li><img class="gimg" src="images/Desert.jpg" width="800px" height="500px" /><a class="next" href="#">next</a><a class="previous" href="#">prev</a></li>
    <li><img class="gimg" src="images/Hydrangeas.jpg" width="800px" height="500px" /><a class="next" href="#">next</a><a class="previous" href="#">prev</a></li>
  </ul>
  <script>
    $(document).ready (function() {
      var theImage = $('ul li img');
      var theWidth = theImage.width()
      //wrap into mother div
      $('ul').wrap('<div id="mother" />');
      //assign height width and overflow hidden to mother
      $('#mother').css({
        width: function() {
        return theWidth;
        },
        height: function() {
        return theImage.height();
        },
        position: 'relative',
        overflow: 'hidden'
      });
        //get total of image sizes and set as width for ul
      var totalWidth = theImage.length * theWidth;
      $('ul').css({
        width: function(){
        return totalWidth;
      }
      });

      $(theImage).each(
        function(intIndex){
          $(this).nextAll('a')
          .bind("click", function(){
            if($(this).is(".next")) {
              $(this).parent('li').parent('ul').animate({
                "margin-left": (-(intIndex + 1) * theWidth)
                  }, 1000)
              } else if($(this).is(".previous")){
              $(this).parent('li').parent('ul').animate({
                "margin-left": (-(intIndex - 1) * theWidth)
              }, 1000)
              } else if($(this).is(".startover")){
              $(this).parent('li').parent('ul').animate({
                "margin-left": (0)
              }, 1000)
          }
        });//close .bind()
      });//close .each()


    });//doc ready
</script>
</body>
</html>