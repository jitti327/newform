<?php


ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=pdo;host=127.0.0.1'; # Data Source Name

$user = 'root';  
$password = 'root';

try {

  $dbh = new PDO($dsn, $user, $password );

  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Database insert

  // API Call

  // New connection

  $email  = "shubham@gmail.com";
  $status = "active";

  // MYSQL  INJECTION
  // ("SELECT * FROM users WHERE email = ".$_POST['email']." AND status=".$_POST['status']." LIMIT 1" )

  // "SELECT * FROM users WHERE email ='shubham@gmail.com' AND status='active' LIMIT 1"

  // $email  = "' && (SELECT * FROM user)'";
  // $status = "active";


  // "SELECT * FROM users WHERE email =' ' && (SELECT * FROM user)' AND status='active' LIMIT 1"


  //TODO : Adding username check here
  // Select * from user where username = "username"
  // If records exist, then return error


  $row = [
    'username'   => 'email@gmail.com',
    'password'   => md5('password'),
    'first_name' => 'My first name',
  ];


  $sql = "
   INSERT 
    INTO `user`
      (`username`, `password`, `first_name`) 
    VALUES 
      (:username , :password , :first_name  )
  ";

  $statement = $dbh->prepare($sql);
  $status    = $statement->execute($row);

  if ($status) {
    $lastId = $dbh->lastInsertId();
    echo $lastId;
  }


  if( $status === false){
    echo 'We got error';
    print_r( $dbh->errorInfo() );
  }

  echo "<pre>";
    var_dump($status);
  echo "</pre>";



  # Prepare Statement 

  // $stmt = $pdo->prepare("SELECT `id`, `username`, `password`, `first_name` FROM `user` WHERE 1");
  // $stmt->execute([
  //   'email'  => $email, 
  //   'status' => $status
  // ]);
  // $user = $stmt->fetch();

} catch (PDOException $e) {
	//echo 'Sorry we are unable to process your request, please contact support team';
  echo 'Connection failed: ' . $e->getMessage();
} 