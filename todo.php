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

    .fun{
      width: 100%;
      padding: 20px;
      min-height: 150px;
      text-align: center;
      background-color: #F44336;
    }

    .fun:after {
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

    .inputtask{
      margin-top: 20px;
      float: center;
      height: 20px;
    }

  /* Css For input */

    #Input{
      width: 300px;
      border: none;
      min-height: 36px;
    }

    .hi{
      padding-top: 20px;
    }

    .message{
      padding-top: 40px;
      text-align: center;
    }

    .inmessage{
      width: 300px;
    }

  /* Css For button */

    .btn-primary{
      margin-top: 20px;
    }

  /* Css For button hover */

    .btn-primary:hover{
      color: yellow;
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
    <div class="inputtask">
      <input type="text" id="Input" placeholder="Enter The Task Here..."/>
    </div>
    <div class="hi">
      <small class="required"></small>
    </div>
    <div class="message">
      <textarea class="inmessage" id="inmessage" name="message" placeholder="Enter your message here..." ></textarea>
    </div>
    <div>
      <small class="msgrequired"></small>
    </div>
      <button class="btn-primary">Add</button>    
  </div>


  <ul>
    <li>Hit the gym+
     <a> X </a></li>
    <li class="checked">Pay bills  <a> x </a></li>
    <li>Meet George <a> x </a> </li>
    <li>Buy eggs <a> x </a> </li>
    <li>Read a book <a> x </a> </li>
    <li>Organize office <a> x </a> </li>
  </ul>

  <script type="text/javascript">

    $(document).ready(function(){

      $('#Input').change(function(){
        Message(this , '.required' ); // Display the Error Message while Onchange
      });

      $('#Input').keyup(function(){
        Message(this , '.required' ); // Display the Error Message on keyup
      });

      $('#Input').blur(function(){
        Message(this , '.required' ); // Display the Error Message on blur if someone click on the text area and move it without inserting.
      });

      $('#inmessage').change(function(){
        Message(this , '.msgrequired' ); // Display the Error Message while Onchange
      });

      $('#inmessage').keyup(function(){
        Message(this , '.msgrequired' ); // Display the Error Message on keyup
      });

      $('#inmessage').blur(function(){
        Message(this , '.msgrequired' ); // Display the Error Message on blur if someone click on the text area and move it without inserting.
      });
    
    /*
     * Function Name : Message
     * This function is used to two parameters
     * checked the input value and display the required message 
     */

      function Message(input , errorId){
        $(errorId).html('');
        if( $(input).val() == "" ){
          $(errorId).html('This field is required');
          $(input).css("color: green");
          return;
        }
      }


     /*
      * THis function is used to accept the one parameter
      * Display the current date and time for add a new element 
      * Return the value
      */

      function Time( task ){
        var currentDate = new Date();
        var dd     = currentDate.getDate();
        var mm     = currentDate.getMonth()+1;
        var yyyy   = currentDate.getFullYear();
        var hours  = currentDate.getHours();
        var Minute = currentDate.getMinutes(); 
        $(task).html( hours + ":" + Minute +"/"+ dd + "-" + mm + "-" + yyyy); 
      } 
        
      var static = ["Study time", "Practical time"];

      function listing(text, message){
        $('ul').append("<li> <span>" +  text+ "<p class='descriptionValue'>" + message+ "</p>"+ "</span><a> X </a><div class='addTime'></div> </li>");
        Time( '.addTime' );
      }

        for(var i=0 ; i <= static.length ; i++){
          listing( static[i] );
        }



      $('button').click(function(){
        if(  $('input').val() == "" && $('#inmessage').val() =="" ) {
          $(".required").html('This field is required');
          $(".msgrequired").html('This field is required');
          $('input').css('color:white');
          return;
        }
        listing( $('input' ).val() , $('#inmessage').val() );
        $('input').val('');
        $('#inmessage').val('');
      });
         // Binding the anchor tags
        // This is static binding i.e done with anchor present in the HTML
        // $('a').click(onclickFunction);
         // Event binding using `on`
        // This is using because element are added dynamically
      $('ul').on( 'click', 'a',function(){
        $(this).closest('li').remove();
      });
      
       // Toggling class on li click
      $('ul').on('click','li',function(){
        $(this).toggleClass('checked');
      });

        

       /* var onclickFunction = function(){
          $(this).parent().remove();
          }

        // If we add a blank space it will stop us to add that.

          $('button').click(function(){

            if($('input').val() == "") {

        // show validation error;
            return;
            }

          $('ul').append("<li>" +  $('input').val() + "<a> x </a></li>"); //for add input value we add through add button

          $('input').val('');

          });



        // Event binding using `on`

          $('ul').on( 'click', 'a',function(){
            $(this).parent().remove();
            });


        // Function to add li dynamically

          $('ul').on( 'click', 'li',function(){ // checking the last dynamically added li whether it is checked or not.

          $(this).checked;

            if( $(this).hasClass('checked') ){   // check the li if checked or not 

              $(this).removeClass('checked');   // removing the class checked from li if checked. 
            }
            else{
              $(this).addClass('checked');     // adding the class checked on li if not checked. 
            }

        });*/   // Old method for todo task
 });

    </script>
</body>
</html>