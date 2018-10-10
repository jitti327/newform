<!DOCTYPE html>
<html>
<head>
  <title>Todo Function Learning </title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style type="text/css">
  
  /* Css For Whole Body*/

    body{
      margin: 0;
    }

  /* Css For Div */

    div{
      width: 100%;
      padding: 20px;
      min-height: 150px;
      background-color: #F44336;
    }

    div:after {
      content: "";
      clear: both;
      display: table;
      }

  /* Css For h2 */

    h2{
      color: white;
      font-size: 42px;
      text-align: center;
    }

  /* Css For input */

    #In{
      width: 75%;
      float: left;
      border: none;
      min-height: 36px;
      border-radius: 0;
      padding-left: 10px;
    }

  /* Css For button */

    .btn{
      width: 25%;
      border: none;
      border-radius: 0;
    }

  /* Css For button hover */

    .btn:hover{
      color: red;
      background-color: #bfbfbf;
    }

  /* Css For ul */

    ul{
      padding: 0;
    }

  /* Css For li */

    ul li{
      font-size: 20px; 
      list-style-type: none;
      background-color: #ddd;
      padding: 12px 30px 12px 40px;
    }

  /* Css For close(a tag) */

    a{
      float: right;
      height: 20px; 
      width: 20px;
      font-size: 12px;
      padding-left: 5px;
    }

  /* Css For close(a tag)hover */

    a:hover{
      float: right;
      font-size: 12px;
      height: 20px; 
      width: 20px;
      padding-left: 5px;
      background-color: red;
    }

  /* Css For class if checked */

    .checked{
      color: #fff;       
      background-color: #949292;
      text-decoration: line-through; 
    }

  /* Css For the icon before checked*/

    .checked:before{
      content: '';
      left: 20px;
      width: 7px;
      height: 15px;
      border-color: #fff;
      position: absolute;
      border-style: solid;
      transform: rotate(45deg);
      border-width: 0 3px 4px 0;
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

      // If we add a blank space it will stop us to add that.

      $('button').click(function(){

      if(  $('input').val() == "") {
      // show validation error;
      return;
    }

    $('ul').append("<li>" +  $('input').val() + "<a> X </a></li>"); //for add input value we add through add button

      $('input').val('');

      });



    // Binding the anchor tags


      $('a').click(onclickFunction);


    // Function to add li dynamically

    $('ul').on( 'click', 'li',function(){ // checking the last dynamically added li whether it is checked or not.

      $(this).checked;

      if( $(this).hasClass('checked') ){   // check the li if checked or not 

        $(this).removeClass('checked');   // removing the class checked from li if checked. 
      }
      else{
        $(this).addClass('checked');     // adding the class checked on li if not checked. 
      }

    });
 });

    </script>
</body>
</html>