<!DOCTYPE html>
<html>
  <head>
    <title>Learning Todo Function</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>

    /* Css for the whole Body content */
    body {
      margin: 0;
    }

    /* Css for div having class fun */

    .fun{
      background-color: #F44336;
      padding: 20px;
      color: white;
      text-align: center;
    }

    /* Css used for content after the div fun */
    .fun:after {
      content: "";
      display: table;
      clear: both;
      }

    h2{
      font-size: 42px;
      text-align: center;
    }


    #In{
      margin: 0;
      border: none;
      width: 75%;
      border-radius: 0;
      padding: 10px;
      float: left;
      font-size: 18px;
    }

    .btn {
      padding: 10px;
      width: 25%;
      background: #d9d9d9;
      color: #555;
      float: left;
      text-align: center;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
      border-radius: 0;
      }

    .btn:hover{
      background-color: #bfbfbf;
      color: red;
    }

    ul {
      margin: 0;
      padding: 0;
    }

    ul li {
      position: relative;
      padding: 12px 35px 12px 40px;
      list-style-type: none;
      background: #ddd;
      font-size: 20px;
      transition: 0.2s;
    }


    a{
      float: right;
      font-size: 12px;
      height: 20px; 
      width: 20px;
      padding-left: 5px;
    }

    a:hover{
      float: right;
      color: white;
      background-color: red;
      height: 20px; 
      width: 20px;
      padding-left: 5px;
    }

    li .fa{
      display: none;
    }
    .checked{
      background-color: #949292;
      color: #fff; 
      text-decoration: line-through;        
    }

    .checked:before{
      content: '';
      position: absolute;
      border-color: #fff;
      border-style: solid;
      border-width: 0 3px 4px 0;
      top: 17px;
      left: 20px;
      transform: rotate(45deg);
      height: 15px;
      width: 7px;
    }


    </style>
  </head>
<body>

    <div id="todo" class="fun">
      <h2>My To Do List</h2>
      <input type="text" id="In" placeholder="Enter The Text Here...">
      <button class="btn"> Add </button>
    </div>

    <ul>
      <li>Hit the gym <a> X </a></li>
      <li class="checked">Pay bills <a> X </a></li>
      <li>Meet George <a> X </a> </li>
      <li>Buy eggs <a> X </a> </li>
      <li>Read a book <a> X </a> </li>
      <li>Organize office <a> X </a> </li>
    </ul>


    <script type="text/javascript">

    $(document).ready(function(){


    var onclickFunction = function(){
      console.log("Default binding");
      $(this).parent().remove();
      }

      $('button').click(function(){

      if(  $('input').val() == "") {
      // show validation error;
      return;
    }

    $('ul').append("<li>" +  $('input').val() + "<a> X </a></li>");

      $('input').val('');

      // Not a good appoach
      // Because this is binding event multiple time on same 'a'

      // $('a').click(function(){
      //   console.log("Inner binding");
      //   $(this).parent().remove();
      // });


      // Better way of binding
      // $('li').last().find('a').click(function(){
      //   console.log('I am the last element adeed');
      //    $(this).parent().remove();
      // });

      // Unbinding and then doing the rebinding
      // $('a').unbind("click", onclickFunction);
      // $('a').click(onclickFunction);
      });



    // Binding the anchor tags
      $('a').click(onclickFunction);


    // Event binding using `on`

    $('ul').on( 'click', 'a',function(){
      console.log("Default binding");
      $(this).parent().remove();
      });



    $('ul').on( 'click', 'li',function(){

      $(this).checked;

      if( $(this).hasClass('checked') ){

        $(this).removeClass('checked');
      }
      else{
        $(this).addClass('checked');
      }

      });

    $('a').click(function(){
      console.log(' Second binding ');
      });

 });

    </script>


</body>
</html>